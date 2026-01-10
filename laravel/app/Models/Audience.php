<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Audience extends Model{
    protected $fillable = ['name', 'user_id', 'article_id'];

    // 2. An audience has one user 
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function article() {
        return $this->belongsTo(Article::class);
    }

    // 5. An audience has many comments (Polymorphic) 
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
