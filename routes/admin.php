<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Admin Routes
| Using the middleware 'role:admin' to check if the incoming user is an administrator
| Setting the route prefixes to 'admin'
| Setting the route name prefixes to 'admin.'
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('orders', OrderController::class)->only('index', 'show', 'destroy');
});