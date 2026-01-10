<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // 8. A user wrote many comments
    public function user() {
        return $this->belongsTo(User::class);
    }

    // Polymorphic inverse
    public function commentable() {
        return $this->morphTo();
    }
}
