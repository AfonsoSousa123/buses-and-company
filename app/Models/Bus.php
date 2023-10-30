<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bus extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'uuid',
        'licence_plate',
        'brand_id',
        'state_id',
        'user_id',
        'company_id',
        'model',
        'prod_year',
        'engine',
        'engine_num',
        'fuel',
        'chassis',
        'chassis_num',
        'capacity',
        'width',
        'height',
        'length_btw_axis',
        'weight',
        'description',
        'body_work',
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
