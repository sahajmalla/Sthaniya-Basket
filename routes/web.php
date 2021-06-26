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

// LOGIN
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::post('/login', [LoginController::class,'read']);

//TODO: change route of product
Route::get('/product/{product:prod_name}', [ViewProductController::class,'index'])->name('product');

// ORDER
Route::get('/order', [OrderController::class,'index'])->name('order');

// INVOICE
Route::get('/invoice', function () {
    return view('invoice');
});

// CHECKOUT
Route::view('/checkout', 'checkout')->middleware(['auth', 'verified'])->name('home');

// FORGOT PASSWORD
Route::view('/forgotPassword', 'auth.forgot-password')->name('forgot-password');

Route::view('/verifyTrader', 'verifyTrader')->name('verifyTrader');

Route::resource('products', ProductController::class);

// HOME
Route::get('/', [HomeController::class,'index'])->name('home');

// REVIEW
Route::post('/review/{product:prod_name}/create', [ReviewController::class,'store'])->name('review');
Route::delete('/review/{review}', [ReviewController::class,'destroy'])->name('review.destroy');

// WISHLIST
Route::get('/wishlist', [WishlistController::class,'index'])->name('wishlist');
Route::post('/wishlist/{product:prod_name}', [WishlistController::class,'store'])->name('addToWishlist');
Route::delete('/wishlist/{product}', [WishlistController::class,'destroy'])->name('wishlist.destroy');

// CART
Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::post('/cart/{product:prod_name}', [CartController::class,'store'])->name('addToCart');
Route::delete('/cart/{product:prod_name}', [CartController::class,'destroy'])->name('cart.destroy');