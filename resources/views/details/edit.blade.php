@extends('layout.app')

@section('content')
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Editar Categoria</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="container">
                            <form
                                action="{{ route('details.update', ['id'=>$detailSales->id]) }}"
                                method="POST">
                                {{-- generar el token para el envio de dato csrf --}}
                                @csrf
                                @method('PUT')
                                <div>
                                    <label class="col" for="">Nombre Producto:</label>
                                </div>
                                <br>
                                <div class="card">
                                    <div class="card-header card-header-primary">
                                        <h4 class="card-title">Editar producto</h4>
                                        <!-- <p class="card-category">User information</p> -->
                                    </div>
                                    <div class="card-body ">
                                        <div class="row">
                                            <label for="subtitle" class="col-sm-2 col-form-label">Cantidad</label>
                                            <div class="col-sm-7">
                                                <div class="form-group bmd-form-group is-filled">
                                                    <input class="form-control" name="cantidad" id="cantidad"
                                                        type="number" placeholder="Cantidad" required
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="subtitle" class="col-sm-2 col-form-label">Subtotal</label>
                                            <div class="col-sm-7">
                                                <div class="form-group bmd-form-group is-filled">
                                                    <input class="form-control" name="subtotal" id="subtotal"
                                                        type="number" placeholder="Subtotal" required
                                                        aria-required="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="product_id" class="col-sm-2 col-form-label">Producto</label>
                                            <div class="col-sm-7">
                                                <select class="form-group bmd-form-group" name="product_id"
                                                    id="product_id">
                                                    <option selected value="">Selecciona</option>
                                                    @foreach($productos as $producto)
                                                        <option value="{!! $producto->id !!}">{{ $producto->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label for="sale_id" class="col-sm-2 col-form-label">Venta</label>
                                            <div class="col-sm-7">
                                                <select class="form-group bmd-form-group" name="sale_id" id="sale_id">
                                                    <option selected value="">Selecciona</option>
                                                    @foreach($sales as $sale)
                                                        <option value="{!! $sale->id !!}">{{ $sale->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
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
