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

Route::group(['middleware' => 'role:customer', 'prefix' => 'customer', 'as' => 'customer.'], function() {

    Route::get('/', function () {
        return view('customer.dashboard');
    })->name('dashboard');
    Route::get('products', [ProductController::class, 'index'])
                ->name('guest.products.index');

    Route::get('/products/{product}', [ProductController::class, 'show'])
                ->name('guest.products.show');
    Route::resource('orders', OrderController::class)->except('edit', 'update');
});
