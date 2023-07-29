<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

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
