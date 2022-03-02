<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use App\Models\Category;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = Products::latest()->paginate(20);
        return view('product.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $producto=new Products;
        $categorias = Category::select('id', 'name')->orderBy('name')->get();
        return view('product.add', compact('categorias', 'producto'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreProductsRequest $request
     * @return Application|Redirector|RedirectResponse
     */
    public function store(StoreProductsRequest $request)
    {
        Products::create([
            'name'=>$request->name,
            'cantidad'=>$request->cantidad,
            'precio'=>$request->precio,
            'stock'=>$request->stock,
            'category_id'=>$request->category_id,
        ]);
        return redirect('/product')->with('mesage', 'El producto se ha agregado exitosamente!');
    }

    public function edit($id)
    {
        $categorias = Category::select('id', 'name')->orderBy('name')->get();
        $product=Products::find($id);
        return view('product.edit', data: [
            'product'=>$product,
            'categorias'=>$categorias,
        ]);
    }


    public function update(UpdateProductsRequest $request, Products $products,$id)
    {
        $product=Products::findOrFail($id);
        $product->update($request->all());
        return redirect('/product')->with('mesage', 'el producto se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Products $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $product)
    {
        $product->delete();
        return redirect('/product')->with('mesageDelete', 'El producto se ha eliminado exitosamente!');
    }
}
