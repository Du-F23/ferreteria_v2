<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDetailSalesRequest;
use App\Http\Requests\UpdateDetailSalesRequest;
use App\Models\DetailSales;
use App\Models\Products;
use App\Models\Sales;

class DetailSalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail=DetailSales::latest()->paginate(20);
        return view('details.index', [
            'detail'=>$detail
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $detailSales=new DetailSales;
        $productos=Products::select('id', 'name')->orderBy('name')->get();
        $sales=Sales::select('id')->orderBy('id')->get();

        return view('details.add', [
            'detailSales'=>$detailSales,
            'productos'=>$productos,
            'sales'=>$sales
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailSalesRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailSalesRequest $request)
    {
        DetailSales::create([
            'cantidad'=>$request->cantidad,
            'subtotal'=>$request->subtotal,
            'product_id'=>$request->product_id,
            'sale_id'=>$request->sale_id
        ]);

        return redirect('/details')->with('mesage', 'El detalle de venta se ha agregado exitosamente!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailSales  $detailSales
     * @return \Illuminate\Http\Response
     */
    public function show(DetailSales $detailSales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailSales  $detailSales
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productos=Products::select('id', 'name')->orderBy('name')->get();
        $sales=Sales::select('id', 'name')->orderBy('name')->get();
        $details=DetailSales::find($id);

        return view('details.edit', data:[
            'details'=>$details,
            'productos'=>$productos,
            'sales'=>$sales
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailSalesRequest  $request
     * @param  \App\Models\DetailSales  $detailSales
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailSalesRequest $request, DetailSales $detailSales,$id)
    {
        $detailSales=DetailSales::findOrFail($id);
        $detailSales->update($request->all());

        return redirect('/details')->with('mesageUpdate', 'El detalle de venta se ha actualizado exitosamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailSales  $detailSales
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailSales $detailSales)
    {
        $detailSales->delete();

        return redirect('/details')->with('mesageDelete', 'El detalle de venta se ha eliminado exitosamente!');
    }
}
