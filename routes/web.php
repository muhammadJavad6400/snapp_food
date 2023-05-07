<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\RestoreController;
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







