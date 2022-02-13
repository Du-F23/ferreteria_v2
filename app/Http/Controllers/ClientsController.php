<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClientsRequest;
use App\Http\Requests\UpdateClientsRequest;
use App\Models\Clients;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client=Clients::latest()->paginate(20);
        return view('clients.index',['client'=>$client]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        $cliente=new Clients;
        return view('clients.add', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClientsRequest  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(StoreClientsRequest $request)
    {

        Clients::create([
            'name'=>$request->name,
            'home_address'=>$request->home_address,
            'phone_number'=>$request->phone_number,
        ]);
        return redirect('/client')->with('message', 'El Cliente se ha agregado exitosamente!');
    }



    public function edit($id)
    {
        $clients= Clients::findOrFail($id);
        return view('clients.edit', [
            'clients'=>$clients
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClientsRequest  $request
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(UpdateClientsRequest $request, Clients $clients, $id)
    {
        $clients=Clients::findOrFail($id);
        $clients->update($request->all());
        return redirect('/client')->with('messageUpdate', 'El cliente se a actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Clients  $clients
     * @return \Illuminate\Http\Response
     */
    public function destroy(Clients $clients)
    {
        $clients->delete();
        return redirect('/client')->with('messageDelete', 'El cliente se a eliminado de maneta correcta');
    }
}
