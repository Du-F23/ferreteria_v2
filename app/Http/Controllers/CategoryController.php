<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $categories = Category::latest()->paginate(20);
        return view('categories.index', [
            'categories' => $categories,
        ]);
    }
    
    public function store(StoreCategoryRequest $request)
    {
        Category::create([
            'name'=>$request->name
        ]);
        return redirect('/category')->with('mesage', 'la categoria se ha agregado exitosamente!');

    }

    public function show(Category $category)
    {
        return response()->json($categories);
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
            //return $category;
            return view('categories.edit',['category'=>$category]);
    }

    public function update(UpdateCategoryRequest $request ,Category $category, $id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->all());
        return redirect('/category')->with('mesageUpdate', 'la categoria se ha modificado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect('/category')->with('mesageDelete', 'la categoria se ha eliminado exitosamente!');
    }
}
