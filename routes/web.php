<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SubCategoriaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dev-marcas', [MarcaController::class, 'index'])->name('marcas-mantenedor');
Route::post('/dev-marcas', [MarcaController::class, 'store'])->name('marca-registrar');
Route::get('/dev-marcas/{id}', [MarcaController::class, 'show'])->name('marca-editar');
Route::post('/dev-marcas/{id}', [MarcaController::class, 'update'])->name('marca-actualizar');
Route::get('/eliminar-marca/{id}', [MarcaController::class, 'destroy'])->name('marca-eliminar');

Route::get('/dev-categorias', [CategoriaController::class, 'index'])->name('categorias-mantenedor');
Route::post('/dev-categorias', [CategoriaController::class, 'store'])->name('categoria-registrar');
Route::get('/dev-categorias/{id}', [CategoriaController::class, 'show'])->name('categoria-editar');
Route::post('/dev-categorias/{id}', [CategoriaController::class, 'update'])->name('categoria-actualizar');
Route::get('/eliminar-categoria/{id}', [CategoriaController::class, 'destroy'])->name('categoria-eliminar');

Route::get('/dev-subcategorias', [SubCategoriaController::class, 'index'])->name('subcategorias-mantenedor');
Route::post('/dev-subcategorias', [SubCategoriaController::class, 'store'])->name('subcategoria-registrar');
Route::get('/dev-subcategoria/{id}', [SubCategoriaController::class, 'show'])->name('subcategoria-editar');
Route::post('/dev-subcategoria/{id}', [SubCategoriaController::class, 'update'])->name('subcategoria-actualizar');
Route::get('/eliminar-subcategoria/{id}', [SubCategoriaController::class, 'destroy'])->name('subcategoria-eliminar');


Route::get('/dev-productos', [ProductoController::class, 'index'])->name('productos-mantenedor');
Route::post('/dev-productos', [ProductoController::class, 'store'])->name('producto-registrar');
Route::get('/dev-producto/{id}', [ProductoController::class, 'show'])->name('producto-editar');
Route::post('/dev-producto/{id}', [ProductoController::class, 'update'])->name('producto-actualizar');
Route::get('/eliminar-producto/{id}', [ProductoController::class, 'destroy'])->name('producto-eliminar');

Route::get('/', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
