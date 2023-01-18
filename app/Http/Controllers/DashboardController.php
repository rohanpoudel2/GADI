<?php

namespace App\Http\Controllers;

use App\Models\FeaturedProduct;
use App\Models\Car;
use Illuminate\View\View;
use App\Providers\CountServiceProvider;

class DashboardController extends Controller
{
  public function stats(): View
  {
    $carCount = CountServiceProvider::getCurrentCarCount();
    $recentlyAddedCar = CountServiceProvider::getRecentlyAddedCar();

    $brandCount = CountServiceProvider::getCurrentBrandCount();
    $recentlyAddedBrand = CountServiceProvider::getRecentlyAddedBrand();

    $normalUser = CountServiceProvider::getNormalUserCount();

    $featuredProductCount = CountServiceProvider::getFeaturedProductCount();

    $cars = Car::with('brand')->get();

    if ((string) $featuredProductCount != 0) {
      $featuredProduct = FeaturedProduct::with('car')->get();
      return View('dashboard.dashboard', compact('carCount', 'recentlyAddedCar', 'brandCount', 'recentlyAddedBrand', 'normalUser', 'featuredProduct', 'cars'));
    } else {
      return View('dashboard.dashboard', compact('carCount', 'recentlyAddedCar', 'brandCount', 'recentlyAddedBrand', 'normalUser', 'cars'));
    }

  }
}