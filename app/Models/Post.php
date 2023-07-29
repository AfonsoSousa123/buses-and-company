<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','body'];

    public function comments()
    {

        return $this->hasMany(Comment::class);

    }

    public function user() // comment->user->name
    {
        return $this->belongsTo(User::class);
    }
}
