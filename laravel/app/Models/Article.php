<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model{
    
    protected $fillable = ['name', 'author_id'];
    public function author() {
        return $this->belongsTo(Author::class);
    }

    // 4. An article has many audiences 
    public function audiences() {
        return $this->hasMany(Audience::class);
    }

    // 6. An article has many comments (Polymorphic)
    public function comments() {
        return $this->morphMany(Comment::class, 'commentable');
    }
}
