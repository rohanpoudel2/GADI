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
        'colors',
        'price'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }
}