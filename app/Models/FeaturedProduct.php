<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeaturedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id',
        'tagline'
    ];

    public function car()
    {
        return $this->belongsTo(Car::class);
    }
}