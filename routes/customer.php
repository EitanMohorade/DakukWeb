<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Customer Routes
| Using the middleware 'role:customer' to check if the incoming user is an administrator
| Setting the route name prefixes to 'customer.'
|--------------------------------------------------------------------------
*/

Route::group(['middleware' => 'role:customer', 'prefix' => 'user', 'as' => 'customer.'], function() {
    Route::resource('profile', ProfileController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class)->except('edit', 'update');
});
