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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/{id}', 'show')->name('products.show');

    Route::get('/products/{id}/edit', 'edit')->name('products.edit');
    Route::put('/products/{id}', 'update')->name('products.update');

    Route::delete('/products/{product}', 'destroy')->name('products.destroy');

    Route::get('/addProducts', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
});

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories.index');
    Route::get('/categories/{id}', 'show')->name('categories.show');

    Route::get('/categories/{id}/edit', 'edit')->name('categories.edit');
    Route::put('/categories/{id}', 'update')->name('categories.update');

    Route::delete('/categories/{id}', 'destroy')->name('categories.destroy');

    Route::get('/addCategories', 'create')->name('categories.create');
    Route::post('/categories', 'store')->name('categories.store');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/customer.php';
//USUARIOS
/*
Route::get('AddUser', function () {
    return view('admin.users.create');
})-> name('User.Add');;

Route::get('EditUser', function () {
    return view('admin.users.edit');
})->name('User.Edit');;

Route::get('EditUser/{id}', [UserController::class, 'edit']);
Route::post('UpdateUser/{id}', [UserController::class, 'update']);
Route::get('DestroyUser/{id}', [UserController::class, 'destroy']);

Route::post('/AddUser', [UserController::class, 'store'])-> name('User.Add');

//
//productS
Route::get('/ViewProducts',[ProductController::class, 'index']);



Route::post('/AddProduct', [ProductController::class, 'store'])->name('Product.Add');

Route::get('/AddProduct', function () {
    return view('admin.products.create');
})->name('Product.Add');;

Route::get('/AddProduct',[ProductController::class, 'showCategorys']);
//Route::get('/ViewProducts',[ProductController::class, 'showCategorys']);

Route::get('EditProduct/{id}', [ProductController::class, 'edit']);
Route::post('UpdateProduct/{id}', [ProductController::class, 'update']);
Route::get('DestroyProduct/{id}', [ProductController::class, 'destroy']);

Route::get('UpdateProduct', function () {
    return view('admin.products.edit');
})->name('Product.Update');;
//
//categories

Route::get('/ViewCategories',[CategoryController::class, 'index'])->name('Category.Index');

Route::post('/ViewCategories', [CategoryController::class, 'store'])->name('Category.Add');

Route::get('DestroyCategoy/{id}', [CategoryController::class, 'destroyC']);
Route::get('DestroySubCategoy/{id}', [CategoryController::class, 'destroySC']);
Route::get('DestroySubSubCategoy/{id}', [CategoryController::class, 'destroySSC']); */
