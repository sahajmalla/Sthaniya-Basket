<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterTraderController;
use App\Http\Controllers\Auth\RegisterCustomerController;

Route::get('/registerCustomer', [RegisterCustomerController::class,'index'])->name('registerCustomer');
Route::get('/registerTrader', [RegisterTraderController::class,'index'])->name('registerTrader');
Route::get('/login', [LoginController::class,'index'])->name('login');

Route::get('/', function () {
    return view('home');
});
