<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogControllerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ServiceController;

Route::get('/', function () {
    return view('layout');
});

Route::get('/login', 'AuthController@login');
Route::post('/login', 'AuthController@postLogin');

Route::get('/register', 'AuthController@register');
Route::post('/register', 'AuthController@postRegister');

Route::get('/logout', 'AuthController@logout');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/about', [AboutController::class]);



