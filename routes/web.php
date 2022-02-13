<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


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

//Categorias Rutas
Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');

//Productos Rutas
Route::get('/product', [ProductsController::class, 'index'])->name('product.index');
Route::get('/product/add', [ProductsController::class, 'create'])->name('product.create');
Route::post('/product', [ProductsController::class, 'store'])->name('product.store');
Route::put('/product/{id}/update', [ProductsController::class, 'update'])->name('product.update');
Route::get('/product/{id}/edit', [ProductsController::class, 'edit'])->name('product.edit');
Route::delete('/product/{product}', [ProductsController::class, 'destroy'])->name('product.destroy');

//Clientes Rutas
Route::get('/client', [ClientsController::class, 'index'])->name('client.index');
Route::get('/client/add', [ClientsController::class, 'create'])->name('client.create');
Route::post('/client/', [ClientsController::class, 'store'])->name('client.store');
Route::put('/client/{id}/update', [ClientsController::class, 'update'])->name('client.update');
Route::get('/client/{id}/edit', [ClientsController::class, 'edit'])->name('client.edit');
Route::delete('/client/{clients}', [ClientsController::class, 'destroy'])->name('client.destroy');
