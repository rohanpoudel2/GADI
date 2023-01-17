<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::get('/', function () {
        return view('home');
    });

    Route::get('/shop', [CarController::class, 'index'])->name('cars.show');
    
    Route::get('/shop/product/{id}', function () {
        return view('product');
    });
    
    Route::get('/contact', function () {
        return view('contact');
    });




Route::middleware(['auth','verified','admin'])->group(function () {
    Route::get('/dashboard',[DashboardController::class, 'stats'])->name('dashboard');

    Route::get('/addCar', [CarController::class, 'create'])->name('dashboard.addCarForm');
    Route::post('/addCar', [CarController::class, 'store'])->name('dashboard.addCar');
    Route::get('/cars',[CarController::class,'index'])->name('dashboard.showCars');
    Route::delete('/cars', [CarController::class, 'destroy'])->name('dashboard.DestoryCar');
    Route::get('/editCar',[CarController::class,'edit'])->name('dashboard.editCarForm');
    Route::patch('/editCar',[CarController::class,'update'])->name('dashboard.editCar');

    Route::get('/addBrand', [BrandController::class, 'create'])->name('dashboard.addBrandForm');
    Route::post('/addBrand', [BrandController::class, 'store'])->name('dashboard.addBrand');
    Route::get('/brands', [BrandController::class, 'index'])->name('dashboard.showBrands');
    Route::delete('/brands', [BrandController::class, 'destroy'])->name('dashboard.DestoryBrand');
    Route::get('/editBrand', [BrandController::class, 'edit'])->name('dashboard.editBrandForm');
    Route::patch('/editBrand', [BrandController::class, 'update'])->name('dashboard.editBrand');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';