<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model{

    protected $fillable = ['name', 'user_id'];
    
    // 1. An author has one user 
    public function user() {
        return $this->belongsTo(User::class);
    }

    // 3. An author wrote multiple articles 
    public function articles() {
        return $this->hasMany(Article::class);
    }

    // 7. An author has many comments (Polymorphic) 
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }

    // 9. An author has many audience (Has Many Through) 
    public function audiences() {
        return $this->hasManyThrough(Audience::class, Article::class);
    }
}
