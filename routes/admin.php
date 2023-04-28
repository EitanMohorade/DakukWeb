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

Route::group(['middleware' => 'role:admin', 'prefix' => 'admin'], function () {

    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::patch('/users/{user}/restore', [UserController::class, 'restore'])->name('users.restore');

    Route::resource('products', ProductController::class);
    Route::patch('/products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');


    Route::resource('categories', CategoryController::class);
    Route::patch('/categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

    Route::resource('orders', OrderController::class);
    Route::patch('/orders/{order}/restore', [OrderController::class, 'restore'])->name('orders.restore');
});
