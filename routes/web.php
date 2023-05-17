<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// default laravel Route
Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

// Admin Routes:
Route::resource('/shop' , ShopController::class)->except('show');
Route::post("/product/{id}/restore", [ProductController::class , 'restore'])->name('product.restore');
Route::resource('/product', ProductController::class)->except('show');


// Public Route:
Route::get('/landing/{page}' , [LandingController::class , 'loadPage'])->name('landing');
Route::get('landing/shop/{shop}' , [LandingController::class , 'showShop'])->name('shop.show');


// Cart Route:
Route::post('/cart/manage/{product}' , [CartController::class , 'manage'])->name('cart.manage');
Route::post('/cart/finish' , [CartController::class , 'finish'])->name('cart.finish');
Route::delete('/cart/{cart_item}' , [CartController::class , 'remove'])->name('cart.remove');





