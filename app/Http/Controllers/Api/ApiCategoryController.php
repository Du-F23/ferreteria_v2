<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class ApiCategoryController extends Controller
{
    public function showAll(){
        $categories = Category::all();
        return response()->json($categories);        
    }

    //Funcion para mostrar una sola categoria
    public function showOne($id){
        $category = Category::find($id);
        return response()->json($category);
    }
}
