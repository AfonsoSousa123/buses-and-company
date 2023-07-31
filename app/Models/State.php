<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'states';

    protected $fillable = [
        'name',
        'class',
        'color',
    ];

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function threads()
    {
        return $this->hasMany(Thread::class);
    }
}
