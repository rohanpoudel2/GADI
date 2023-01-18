<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Brand>
 */
class BrandFactory extends Factory
{

    protected $model = Brand::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $images = File::allFiles(public_path('images/brands'));
        return [
            'image' => url('images/brands/' . basename($images[array_rand($images)])),
            'name' => $this->faker->randomElement(['BMW', 'AUDI', 'MERCEDES', 'PORSCHE'])
        ];
    }
}