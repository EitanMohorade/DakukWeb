<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CategoriaController;
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
//USUARIOS
Route::get('/verUsuarios',[UsuarioController::class, 'show'])->name('verUsuarios');

Route::get('agregarUsuario', function () {
    return view('Eitan.usuarios.agregarUsuario');
})-> name('agregarUsuario');;

Route::get('editarUsuario', function () {
    return view('Eitan.usuarios.editarUsuario');
})->name('editarUsuarios');;

Route::get('editarUsuario/{id}', [UsuarioController::class, 'edit']);
Route::post('actualizarUsuario/{id}', [UsuarioController::class, 'update']);
Route::get('eliminarUsuario/{id}', [UsuarioController::class, 'destroy']);

Route::post('/agregarUsuario', [UsuarioController::class, 'store'])-> name('agregarUsuario');

//
//PRODUCTOS
Route::get('/verProductos',[ProductosController::class, 'show']);



Route::post('/agregarProductos', [ProductosController::class, 'store'])->name('agregarProducto');

Route::get('/agregarProductos', function () {
    return view('Eitan.productos.agregarProductos');
})->name('agregarProducto');;

Route::get('/agregarProductos',[ProductosController::class, 'showCategorys']);
//Route::get('/verProductos',[ProductosController::class, 'showCategorys']);

Route::get('editarProducto/{id}', [ProductosController::class, 'edit']);
Route::post('actualizarProducto/{id}', [ProductosController::class, 'update']);
Route::get('eliminarProducto/{id}', [ProductosController::class, 'destroy']);

Route::get('editarProducto', function () {
    return view('Eitan.productos.editarProducto');
})->name('editarProducto');;
//
//CATEGORIAS

Route::get('/agregarVerCategorias',[CategoriaController::class, 'show'])->name('verCategorias');

Route::post('/agregarVerCategorias', [CategoriaController::class, 'store'])->name('agregarCategoria');

Route::get('eliminarCategoria/{id}', [CategoriaController::class, 'destroyC']);
Route::get('eliminarSubCategoria/{id}', [CategoriaController::class, 'destroySC']);
Route::get('eliminarSubSubCategoria/{id}', [CategoriaController::class, 'destroySSC']);
