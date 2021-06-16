<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterTraderController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\product\ViewProductController;
use App\Http\Controllers\Auth\RegisterCustomerController;

Route::get('/registerCustomer', [RegisterCustomerController::class,'index'])->name('registerCustomer');
Route::get('/registerTrader', [RegisterTraderController::class,'index'])->name('registerTrader');
Route::get('/login', [LoginController::class,'index'])->name('login');
Route::get('/cart', [CartController::class,'index'])->name('cart');
Route::get('/wishlist', [WishlistController::class,'index'])->name('wishlist');
Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

//TODO: change route of product
Route::get('/product', [ViewProductController::class,'index'])->name('product');

Route::get('/invoice', function () {
    return view('invoice');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/', function () {
    return view('home');
});
