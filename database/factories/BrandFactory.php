<?php

namespace Database\Factories;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
        return [
            'image' => function () {
                $images = glob(storage_path('app/public/images/fakeBrands/*'));
                $randomImage = $images[array_rand($images)];
                $path = Storage::putFile('public/images/brands', $randomImage);
                return $path;
            },
            'name' => $this->faker->unique()->company()
        ];
    }
}