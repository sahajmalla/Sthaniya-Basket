<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\UserImageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\UpdateDetailsController;
use App\Http\Controllers\Auth\RegisterShopController;
use App\Http\Controllers\product\ViewProductController;

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'store']);

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

// FORGOT PASSWORD
Route::view('/forgotPassword', 'auth.forgot-password')->name('forgot-password');

Route::view('/verifyTrader', 'verifyTrader')->name('verifyTrader');

Route::resource('products', ProductController::class)->middleware(['auth','verified','checkUserTrader','isShopAvailable']);

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
Route::put('/cart/{product:prod_name}', [CartController::class,'update'])->name('cart.update');
Route::patch('/cart/{product:prod_name}', [CartController::class,'patch'])->name('cart.patch');


// CHECKOUT
Route::get('/checkout', [CheckoutController::class,'index'])
    ->middleware(['auth', 'verified'])->name('checkout');

Route::post('/checkout/{total_price}/{total_quantity}/{total_items}}', [CheckoutController::class,'store'])
    ->middleware(['auth', 'verified'])->name('checkout.add');

//update details
Route::get('/updateDetails',[UpdateDetailsController::class,'index'])->name('updateDetails')->middleware('auth');

//upload user image
Route::post('/updateDetails',[UserImageController::class,'userImageUploadPost'])->name('image.upload')->middleware('auth');

//register shop
Route::get('/registerShop',[RegisterShopController::class,'index'])->name('registerShop')->middleware(['auth','verified','checkUserTrader']);
Route::post('/registerShop',[RegisterShopController::class,'store']);

