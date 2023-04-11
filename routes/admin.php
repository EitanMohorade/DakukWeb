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
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function() {
    
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/users/{search?}', [UserController::class, 'index'])->name('users.index');
    Route::resource('users', UserController::class)->except('index');
    Route::get('/users/{user}/restore', [UserController::class, 'index'])->name('users.restore');

    Route::resource('products', ProductController::class);
    Route::get('/searchProducts', [ProductController::class, 'search'])->name('products.search');
    Route::get('/products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');


    Route::resource('categories', CategoryController::class);
    Route::get('/searchCategories', [CategoryController::class, 'search'])->name('categories.search');
    Route::get('/categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

    Route::resource('orders', OrderController::class)->only('index', 'show', 'destroy');

});