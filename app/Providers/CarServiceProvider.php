<?php

namespace App\Providers;

use App\Models\Car;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CarServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::composer('components.layout', function ($view) {
            $carCount = CountServiceProvider::getCurrentCarCount();
            if ($carCount == 0) {
                $view;
            } else {
                $cars = Car::with('brand')->get();
                $view->with('cars', $cars);
            }
        });
    }
}