<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index')->name('home');
});

/* Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/{product}', 'show')->name('products.show');
    Route::get('/searchProducts', 'search')->name('products.search');

    Route::get('/products/{product}/edit', 'edit')->name('products.edit');
    Route::put('/products/{product}', 'update')->name('products.update');

    Route::delete('/products/{product}', 'destroy')->name('products.destroy');

    Route::get('/addProducts', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{category}', 'show')->name('categories.show');
    Route::get('/searchCategories', 'search')->name('categories.search');

    Route::get('/categories/{category}/edit', 'edit')->name('categories.edit');
    Route::put('/categories/{category}', 'update')->name('categories.update');

    Route::delete('/categories/{category}', 'destroy')->name('categories.destroy');

    Route::get('/addCategories', 'create')->name('categories.create');
    Route::post('/categories', 'store')->name('categories.store');
}); */

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/customer.php';