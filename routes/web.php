<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterTraderController;
use App\Http\Controllers\product\ViewProductController;
use App\Http\Controllers\Auth\RegisterCustomerController;

// Route::get('/registerCustomer', [RegisterCustomerController::class,'index'])->name('registerCustomer');
// Route::post('/registerCustomer', [RegisterCustomerController::class,'store']);

// Route::post('/logout', [LogoutController::class,'index'])->name('logout');

Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'read']);

//TODO: change route of product
Route::get('/product/{product:prod_name}', [ViewProductController::class,'index'])->name('product');

Route::get('/order', [OrderController::class,'index'])->name('order');

Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::get('/cart/{product:prod_name}', [CartController::class,'add'])->name('addToCart');

Route::get('/invoice', function () {
    return view('invoice');
});

Route::view('/checkout', 'checkout')->middleware(['auth', 'verified'])->name('home');

Route::view('/forgotPassword', 'auth.forgot-password')->name('forgot-password');

Route::view('/verifyTrader', 'verifyTrader')->name('verifyTrader');

Route::resource('products', ProductController::class);

Route::get('/', [HomeController::class,'index'])->name('home');

Route::post('/review/{product:prod_name}/create', [ReviewController::class,'store'])->name('review');
Route::delete('/review/{review}', [ReviewController::class,'destroy'])->name('review.destroy');

Route::get('/wishlist', [WishlistController::class,'index'])->name('wishlist');
Route::get('/wishlist/{product:prod_name}', [WishlistController::class,'store'])->name('addToWishlist');
Route::delete('/wishlist/{product}', [WishlistController::class,'destroy'])->name('wishlist.destroy');