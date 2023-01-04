<?php

use App\Http\Controllers\FormController;
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

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/shop/product/{id}', function ($id) {
    return view('product');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::POST('/test-form', [FormController::class, 'testRideForm']);