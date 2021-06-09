<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::get('/login', [LoginController::class,'index'])->name('login');

Route::get('/', function () {
    return view('home');
});
