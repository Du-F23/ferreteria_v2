<?php

namespace App\Http\Controllers\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Rutas api showAll
Route::get('/category', [ApiCategoryController::class, 'showAll']);
Route::get('/clients', [ApiClientsController::class, 'showAll']);
Route::get('/products', [ApiProductsController::class, 'showAll']);

//Rutas api showOne
Route::get('/category/{id}', [ApiCategoryController::class, 'showOne']);
Route::get('/clients/{id}', [ApiClientsController::class, 'showOne']);
Route::get('/products/{id}', [ApiProductsController::class, 'showOne']);
