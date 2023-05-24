<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\OrderController;
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
})->name('welcome');

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
Route::resource('/order' , OrderController::class)->only(['index' , 'show' ,  'destroy']);
Route::post('/order/status/{cart_item}' , [OrderController::class , 'changeStatus'])->name('order.status');


// Public Route:
Route::get('/landing/{page}' , [LandingController::class , 'loadPage'])->name('landing');
Route::post('landing/shop/{shop}' , [LandingController::class , 'showShop'])->name('shop.show');
Route::get('/landing/shop/{shop}' , [LandingController::class , 'showOneShop'])->name('show.one');
Route::get('/landig/product/{product}' , [LandingController::class , 'showProduct'])->name('show.product');


// Cart Route:
Route::post('/cart/manage/{product}' , [CartController::class , 'manage'])->name('cart.manage');
Route::post('/cart/finish' , [CartController::class , 'finish'])->name('cart.finish');
Route::delete('/cart/{cart_item}' , [CartController::class , 'remove'])->name('cart.remove');

// Comments
Route::post('/comment' , [CommentController::class , 'store'])->name('comment.store');





