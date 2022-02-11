<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
