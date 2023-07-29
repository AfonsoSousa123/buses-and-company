<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'name',
        'owner',
        'password',
        'begin_year',
        'user_id',
        'state_id',
    ];

    public function buses()
    {
        return $this->hasMany(Bus::class);
    }

}
