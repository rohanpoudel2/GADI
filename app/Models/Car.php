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

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query
                ->where('model', 'like', '%' . request('search') . '%')
                ->orWhere('description', 'like', '%' . request('search') . '%');
        } else if ($filters['brand'] ?? false) {
            $query
                ->where('brand_id', 'like', '%' . request('brand') . '%');
        } else if ($filters['price'] ?? false) {
            $query
                ->where('price', '<=', request('price'));
        }
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function featuredproduct()
    {
        return $this->hasOne(FeaturedProduct::class);
    }

    public function testride()
    {
        return $this->hasMany(TestRide::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}