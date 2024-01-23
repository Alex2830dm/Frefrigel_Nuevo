@extends('layout.index')
@section('titulo', 'Venta Nueva')
@section('contenido')
<form action="{{ route('ventas.store') }}" method="POST">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <table>
                    <thead>
                        <tr>
                            <td>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class='bx bx-search-alt' ></i></span>
                                    <input type="text" id="searchInput" class="form-control" placeholder="Buscar por producto nombre...">
                                </div>
                            </td>
                        </tr>
                        
                    </thead>
                    <br>
                    <tbody>
                        <tr>
                            <td>
                                <div class="row" id="cards">
                                    @foreach ($productos as $producto)
                                    <div class="card mb-3" style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img src="{{ asset('assets/imgs/products/'.$producto->foto) }}"
                                                    class="img-fluid rounded-start" alt="...">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h5 class="card-title" id="producto_venta">{{ $producto->nameProduct }} -
                                                        <small class="text-muted">{{ $producto->unitProduct }}</small></h5>
                                                    <p class="card-text"><b>Precio: </b> $ <i
                                                            id="precio_venta">{{ $producto->priceProduct }}</i> MXN</p>
                                                    {{-- <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p> --}}
                                                    <button type="button" class="btn btn-dark btn-sm"
                                                        data-id="{{ $producto->id }}">Agregar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                <div class="table-responsive">
                    <table class="table text-center align-middle table-bordered table-hover mb-0">
                        <thead class="table-primary">
                            <tr>
                                @foreach($folio as $folio)
                                <b>Folio de Venta: </b> <?php echo ($folio->folio == " ")?"1":$folio->folio + 1; ?>
                                <input type="hidden" name="folio" value="<?php echo ($folio->folio == " ")?"1":$folio->folio + 1; ?>">
                                @endforeach
                                <input type="hidden" name="id_encargado" value="{{auth()->user()->id}}">
                            </tr>
                            <tr>
                                <select name="id_cliente" id="id_cliente" class="form-select">
                                    <option value="">-- Selecciona un cliente --</option>
                                    @foreach ($clientes as $cliente)
                                    <option value="{{$cliente->id}}">{{ $cliente->nameClient }}</option>
                                    @endforeach
                                </select>
                            </tr> <br>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Acción</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody id="items"></tbody>
                        <tfoot>
                            <tr id="footer">
                                <th scope="row" colspan="5">Carrito vacío</th>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                                <th scope="col">Tipo de Pago</th>
                                <td>
                                    <input type="radio" name="tipo_pago" id="" value="Contado"> Contado
                                </td>
                                <td>
                                    <input type="radio" name="tipo_pago" id="" value="Credito"> Credito
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <hr>
                <input type="submit" value="Guardar Venta" class="btn btn-sm btn-success">
                <a href="" class="btn btn-sm btn-danger">Cancelar</a>
            </div>
        </div>
    </div>

    <template id="template-carrito">
        <tr>
            <th scope="row"> 1 </th>
            <input type="hidden" name="id_producto[]">
            <td>Producto</td>
            <td> 1 </td>
            <input type="hidden" name="cantidad[]">
            <td>
                <button type="button" class="btn btn-info btn-sm">
                    +
                </button>
                <button type="button" class="btn btn-danger btn-sm">
                    -
                </button>
            </td>
            <td> $ <span>500</span> MXN </td>
            <input type="hidden" name="importe[]">
        </tr>
    </template>

    <template id="template-footer">
        <th scope="row" colspan="2">Total productos</th>
        <td>10</td>
        <td>
            <button class="btn btn-danger btn-sm" id="vaciar-carrito">
                vaciar todo
            </button>
        </td>
        <td class="font-weight-bold">
            $ <span>5000</span> MXN
        </td>
        <input type="hidden" name="total_venta">
    </template>
</form>
@endsection
@section('scripts')
<script src="{{asset('assets/js/busqueda.js')}}"></script>
<script src="{{asset('assets/js/ventas.js')}}"></script>
@endsection
