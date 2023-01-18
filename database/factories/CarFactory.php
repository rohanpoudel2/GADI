<?php

namespace Database\Factories;

use App\Models\Brand;
use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{

    protected $model = Car::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'image' => function () {
                $images = glob(storage_path('app/public/images/fakeCars/*'));
                $randomImage = $images[array_rand($images)];
                $path = Storage::putFile('public/images/cars', $randomImage);
                return $path;
            },
            'brand_id' => Brand::all()->random()->id,
            'type' => $this->faker->randomElement(['SUV', 'Sedan', 'Pickup', 'Sport']),
            'model' => $this->faker->word,
            'year' => $this->faker->year,
            'engine' => $this->faker->randomElement(['V12', 'V8', 'V6', 'BOXER', 'Four Cylinder', 'Three Cylinder']),
            'power' => $this->faker->randomNumber(3),
            'topspeed' => $this->faker->randomNumber(3),
            'interior' => $this->faker->randomElement(['Leather', 'Cloth', 'Carbon']),
            'transmission' => $this->faker->randomElement(['Automatic', 'Manual']),
            'description' => $this->faker->sentence(10),
            'price' => $this->faker->randomNumber(5)
        ];
    }
}