<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'brand_id',
        'type',
        'model',
        'year',
        'engine',
        'power',
        'topspeed',
        'interior',
        'transmission',
        'description',
        'price'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function featuredproduct()
    {
        return $this->hasOne(FeaturedProduct::class);
    }
}