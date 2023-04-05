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

require __DIR__.'/auth.php';
//users
Route::get('/ViewUsers',[UserController::class, 'index'])->name('User.Index');

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
Route::get('DestroySubSubCategoy/{id}', [CategoryController::class, 'destroySSC']);
