<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Admin\DasdboardController;
use App\Http\Controllers\Products\ShopController;
use App\Http\Controllers\Admin\Blog_AdminController;
use App\Http\Controllers\Admin\Product_AdminController;

Route::get('/', function () {
    return view('layout');
});

// Route::get('/login', 'AuthController@login');
// Route::post('/login', 'AuthController@postLogin');

// Route::get('/register', 'AuthController@register');
// Route::post('/register', 'AuthController@postRegister');

// Route::get('/logout', 'AuthController@logout');
Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/products/shop', 'App\Http\Controllers\Products\ShopController');

Route::get('admincp/dashboard', [DasdboardController::class, 'index'])->name('dashboard');

Route::resource('/blog-admin', Blog_AdminController::class);
Route::resource('/product-admin', Product_AdminController::class);
