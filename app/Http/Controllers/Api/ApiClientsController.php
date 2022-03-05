<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clients;

class ApiClientsController extends Controller
{
    //Funcion para mostrar todos los clientes
    public function showAll()
    {
        $clients = Clients::all();
        return response()->json($clients, 200);
    }


    //Funcion para mostrar un solo cliente
    public function showOne($id)
    {
        $client = Clients::find($id);
        return response()->json($client, 200);
    }
}
