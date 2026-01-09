<?php

namespace App\Policies;

use App\Models\Category;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CategoryPolicy
{

    public function viewAny(User $user): bool
    {
        return false;
    }

    public function view(User $user, Category $category): bool
    {
        if ($user->hasRole('admin')) return true; // admin sees all
        if ($user->hasRole('manager')) return $category->project->created_by === $user->id;
        if ($user->hasRole('staff')) return $category->assigned_to === $user->id;

        return false;
    }

    public function create(User $user): bool
    {
        return false;
    }

    public function updateStatus(User $user, Category $category): bool
    {
        return $user->hasRole('staff') && $category->assigned_to === $user->id;
    }

    public function delete(User $user, Category $category): bool
    {
        return false;
    }

    public function restore(User $user, Category $category): bool
    {
        return false;
    }

    public function forceDelete(User $user, Category $category): bool
    {
        return false;
    }
}
