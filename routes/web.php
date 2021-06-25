<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterTraderController;
use App\Http\Controllers\product\ViewProductController;
use App\Http\Controllers\Auth\RegisterCustomerController;

Route::get('/registerCustomer', [RegisterCustomerController::class,'index'])->name('registerCustomer');
Route::post('/registerCustomer', [RegisterCustomerController::class,'store']);

Route::get('/registerTrader', [RegisterTraderController::class,'index'])->name('registerTrader');
Route::post('/registerTrader', [RegisterTraderController::class,'store']);

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'read']);

Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::get('/wishlist', [WishlistController::class,'index'])->name('wishlist');

Route::get('/order', [OrderController::class,'index'])->name('order');


// Route::post('/logout', [LogoutController::class,'index'])->name('logout');

//TODO: change route of product
//Route::get('/product', [ViewProductController::class,'index'])->name('product');

Route::get('/invoice', function () {
    return view('invoice');
});

// Route::get('/checkout', function () {
//     return view('checkout')->middleware(['auth', 'verified']);
// })->name('checkout');

Route::view('/checkout', 'checkout')->middleware(['auth', 'verified'])->name('home');

// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::view('/', 'home')->name('home');

Route::view('/verifyTrader', 'verifyTrader')->name('verifyTrader');

Route::resource('products', ProductController::class);


