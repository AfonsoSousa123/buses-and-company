<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'Pnome', 'Unome', 'username', 'email', 'password', 'job-title'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts()
    {

        return $this->hasMany(Post::class);

    }

    public function comments()
    {

        return $this->hasMany(Comment::class);

    }

    public function buses()
    {

        return $this->hasMany(Buses::class);

    }

    public function users()
    {

        return $this->hasMany(User::class);

    }
}
