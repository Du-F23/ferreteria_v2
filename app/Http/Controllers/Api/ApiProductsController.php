<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;

class ApiProductsController extends Controller
{
    //Funcion para mostrar todos los productos
    public function showAll()
    {
        $products = Products::all();
        return response()->json($products, 200);
    }

    //Funcion para mostrar un solo producto
    public function showOne($id)
    {
        $product = Products::find($id);
        return response()->json($product, 200);
    }

}
