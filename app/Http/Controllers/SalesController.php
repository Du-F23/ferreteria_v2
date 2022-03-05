<?php

namespace App\Http\Controllers;


use App\Http\Requests\StoreSalesRequest;
use App\Http\Requests\UpdateSalesRequest;
use App\Models\Sales;
use App\Models\Clients;
use App\Models\Category;
use App\Models\Products;
use App\Models\User;


class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sales=Sales::latest()->paginate(20);
        return view('sales.index',[
            'sales'=>$sales,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $venta=new Sales;
        $categorias = Category::select('id', 'name')->orderBy('name')->get();
        $clientes = Clients::select('id', 'name')->orderBy('name')->get();
        $products = Products::select('id', 'name')->orderBy('name')->get();
        $usuarios = User::select('id', 'name')->orderBy('name')->get();
        return view('sales.add', compact('categorias', 'clientes', 'venta', 'products','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSalesRequest $request)
    {
        Sales::create([
            'client_id'=>$request->client_id
            ,'product_id'=>$request->product_id
            ,'user_id'=>$request->user_id
            //,'cantidad'=>$request->cantidad,
            ,'category_id'=>$request->category_id

        ]);
        return redirect('/sales')->with('mesage', 'La venta se ha agregado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sales $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sales $sales,$id)
    {
        $venta=Sales::findOrFail($id);
        $products=Products::select('id', 'name')->orderBy('name')->get();
        $categorias = Category::select('id', 'name')->orderBy('name')->get();
        $clientes = Clients::select('id', 'name')->orderBy('name')->get();
        $usuarios = User::select('id', 'name')->orderBy('name')->get();
        return view('sales.edit', compact('categorias', 'products', 'clientes', 'usuarios', 'venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalesRequest  $request
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalesRequest $request, Sales $sales)
    {
        $venta=Sales::findOrFail($id);
        $venta->update($request->all());
        return redirect('/sales')->with('mesage', 'la venta se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sales $sales)
    {
        $sales->delete();
        return redirect('/sales')->with('mesage', 'la venta se ha eliminado exitosamente!');
    }
}
