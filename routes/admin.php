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
        return view('dashboard');
    })->name('dashboard');
    Route::controller(UserController::class)->group(function () {
        Route::get('/users', 'index')->name('users.index');
        Route::get('/users/create', 'create')->name('users.create');
        Route::post('/users', 'store')->name('users.store');
        Route::get('/users/{user}', 'show')->name('users.show');
        Route::get('/users/{user}/edit', 'edit')->name('users.edit');
        Route::put('/users/{user}', 'update')->name('users.update');
        Route::delete('/users/{user}/delete', 'delete')->name('users.index');
        Route::get('/users/{user}/restore', 'restore')->name('users.restore');
    });
/*     Route::get('/users/create', [UserController::class, 'index'])->name('users.index');
    Route::resource('users', UserController::class)->except('index');
    Route::get('/users/{user}/restore', [UserController::class, 'index'])->name('users.restore'); */

    Route::resource('products', ProductController::class);
    Route::get('/products/{product}/restore', [ProductController::class, 'restore'])->name('products.restore');


    Route::resource('categories', CategoryController::class);
    Route::get('/categories/{category}/restore', [CategoryController::class, 'restore'])->name('categories.restore');

    Route::resource('orders', OrderController::class)->only('index', 'show', 'destroy');
});
