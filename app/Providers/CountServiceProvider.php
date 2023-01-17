<?php

namespace App\Providers;

use App\Models\FeaturedProduct;
use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;
use App\Models\Car;
use App\Models\User;
use App\Models\Brand;

class CountServiceProvider extends ServiceProvider
{
  private static $carCount;
  private static $recentlyAddedCars;
  private static $brandCount;
  private static $recentlyAddedBrands;
  private static $normalUserCount;
  private static $featuredProductCount;

  public static function getCurrentCarCount()
  {
    if (!self::$carCount) {
      self::$carCount = Car::get()->count();
    }
    return self::$carCount;
  }

  public static function setCurrentCarCount($count)
  {
    self::$carCount = $count;
  }

  public static function getRecentlyAddedCar()
  {
    if (!self::$recentlyAddedCars) {
      self::$recentlyAddedCars = Car::where('created_at', '>=', Carbon::now()->subDays(5))->count();
    }
    return self::$recentlyAddedCars;
  }

  public static function getNormalUserCount()
  {
    if (!self::$normalUserCount) {
      self::$normalUserCount = User::where('is_admin', 0)->count();
    }
    return self::$normalUserCount;
  }

  public static function getCurrentBrandCount()
  {
    if (!self::$brandCount) {
      self::$brandCount = Brand::get()->count();
    }
    return self::$brandCount;
  }

  public static function getRecentlyAddedBrand()
  {
    if (!self::$recentlyAddedBrands) {
      self::$recentlyAddedBrands = Brand::where('created_at', '>=', Carbon::now()->subDays(5))->count();
    }
    return self::$recentlyAddedBrands;
  }

  public static function getFeaturedProductCount()
  {
    if (!self::$featuredProductCount) {
      self::$featuredProductCount = FeaturedProduct::get()->count();
    }
    return self::$featuredProductCount;
  }

}