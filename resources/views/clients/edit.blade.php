@extends('layout.app')

@section('content')
    <div class="container justify-content-center">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                            <h6 class="text-white text-capitalize ps-3">Editar Cliente</h6>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <div class="container">
                                <form action="{{route('client.update', ['id'=>$clients->id])}}" method="POST">
                                    {{-- generar el token para el envio de dato csrf --}}
                                    @csrf
                                    @method('PUT')
                                    <label class="col" for="">Nombre cliente:</label>
                                    <br>
                                    <input id= "name" class="col-12 inputborder" type="text" name="name" value="{{$clients->name}}">
                                    <br>
                                    <label class="col" for="">Direccion cliente:</label>
                                    <input id= "home_address" class="col-12 inputborder" type="text" name="home_address" value="{{$clients->home_address}}">
                                    <br>
                                    <label for="subtitle" class="col-sm-2 col-form-label">Numero Telefonico</label>
                                    <input class="form-control" name="phone_number" id="phone_number" type="number" placeholder="Numero telefonico" value="{{$clients->phone_number}}">
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-primary">Guardar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
