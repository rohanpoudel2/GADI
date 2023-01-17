<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Providers\CountServiceProvider;

class DashboardController extends Controller
{
  public function stats():View
  {
    $carCount= CountServiceProvider::getCurrentCarCount();
    $recentlyAddedCar = CountServiceProvider::getRecentlyAddedCar();
    $recentlyDeletedCar = CountServiceProvider::getRecentlyDeletedCar();

    $brandCount = CountServiceProvider::getCurrentBrandCount();
    $recentlyAddedBrand = CountServiceProvider::getRecentlyAddedBrand();
    $recentlyDeletedBrand = CountServiceProvider::getRecentlyDeletedBrand();
    
    $normalUser = CountServiceProvider::getNormalUserCount();

    return View('dashboard.dashboard',compact('carCount','recentlyAddedCar','recentlyDeletedCar','brandCount','recentlyAddedBrand','recentlyDeletedBrand','normalUser'));
  }
}