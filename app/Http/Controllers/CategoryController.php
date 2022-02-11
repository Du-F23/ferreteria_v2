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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::findOrFail($id);
            //return $category;
            return view('categorias.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCategoryRequest  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
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
