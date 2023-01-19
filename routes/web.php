<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeaturedProductController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestRideController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\NewsletterController;
use App\Models\FeaturedProduct;
use App\Models\Wishlist;
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

Route::get('/', [FeaturedProductController::class, 'index'])->name('featured.car');

Route::post('/newsletter', [NewsletterController::class, 'store']);

Route::get('/shop', [CarController::class, 'index'])->name('cars.show');

Route::middleware('auth')->group(function () {
    Route::get('/wishlist', [WishlistController::class, 'show'])->name('wishlist.show');
    Route::post('/wishlist', [WishlistController::class, 'create'])->name('wishlist.add');
    Route::delete('/wishlist', [WishlistController::class, 'destroy'])->name('wishlist.delete');
});

Route::get('/checkout/{id}', [PaymentController::class, 'index'])->name('show.checkout');
Route::post('/checkout/{id}', [PaymentController::class, 'checkout'])->middleware('auth')->name('checkout');

Route::get('/shop/product/{id}', [CarController::class, 'show'])->name('car.show');

Route::post('/addTestRide', [TestRideController::class, 'store'])->middleware('auth')->name('add.TestRide');

Route::get('/dashboard', [DashboardController::class, 'stats'])->middleware('auth')->name('dashboard');

Route::middleware(['auth', 'verified', 'admin'])->group(function () {

    Route::post('/dashboard', [FeaturedProductController::class, 'store'])->name('dashboard.addFeatured');
    Route::delete('/dashboard', [FeaturedProductController::class, 'destroy'])->name('dashboard.deleteFeatured');

    Route::get('/addCar', [CarController::class, 'create'])->name('dashboard.addCarForm');
    Route::post('/addCar', [CarController::class, 'store'])->name('dashboard.addCar');
    Route::get('/cars', [CarController::class, 'index'])->name('dashboard.showCars');
    Route::delete('/cars', [CarController::class, 'destroy'])->name('dashboard.DestoryCar');
    Route::get('/editCar', [CarController::class, 'edit'])->name('dashboard.editCarForm');
    Route::patch('/editCar', [CarController::class, 'update'])->name('dashboard.editCar');

    Route::get('/addBrand', [BrandController::class, 'create'])->name('dashboard.addBrandForm');
    Route::post('/addBrand', [BrandController::class, 'store'])->name('dashboard.addBrand');
    Route::get('/brands', [BrandController::class, 'index'])->name('dashboard.showBrands');
    Route::delete('/brands', [BrandController::class, 'destroy'])->name('dashboard.DestoryBrand');
    Route::get('/editBrand', [BrandController::class, 'edit'])->name('dashboard.editBrandForm');
    Route::patch('/editBrand', [BrandController::class, 'update'])->name('dashboard.editBrand');

    Route::get('/users', [UserController::class, 'index'])->name('dashboard.showUsers');
    Route::delete('/users', [UserController::class, 'destroy'])->name('dashboard.DestoryUser');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';