<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductsRequest;
use App\Http\Requests\UpdateProductsRequest;
use App\Models\Products;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

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
     * @return Response
     */
    public function store(StoreProductsRequest $request)
    {
        Products::create([
            'name'=>$request->name,
            'cantidad'=>$request->cantidad,
            'precio'=>$request->precio,
            'category_id'=>$request->category_id,
        ]);
        return redirect('/product')->with('mesage', 'El producto se ha agregado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param Products $products
     * @return Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Products $products
     * @return Response
     */
    public function edit($id)
    {
        $categorias = Category::select('id', 'name')->orderBy('name')->get();
        $product=Products::findOrFail($id);
        return view('product.edit',[
            'product'=>$product,
            'categorias'=>$categorias,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateProductsRequest $request
     * @param Products $products
     * @return Response
     */
    public function update(UpdateProductsRequest $request, Products $id)
    {
        $product=Products::findOrFail($id);
        $product->update($request->all());
        return redirect('/productos')->with('mesage', 'el producto se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Products $products
     * @return Application|RedirectResponse|Redirector
     */
    public function destroy(Products $products): Redirector|RedirectResponse|Application
    {
        $products->delete();
        return redirect('/products')->with('mesageDelete', 'El producto se ha eliminado exitosamente!');
    }
}
