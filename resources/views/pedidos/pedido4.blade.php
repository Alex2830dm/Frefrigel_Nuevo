@extends('layout.index')
@section('contenido')
<div class="row">
    <div class="col-lg-10 col-sm-10 col-md-10 col-xs-12">
        <h4 class="display-6">Realizar Pedido</h4>
    </div>
    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
        <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Ver Pedido
        </button>
    </div>
</div>
<hr>
<div class="table-responsive">
    <nav>
        <div class="nav nav-tabs" id="nav-tab" role="tablist">
            @foreach ($categorias as $categoria)
            <button class="nav-link <?php echo ($categoria->id == 1)?'active':''; ?>" id="nav-{{$categoria->id}}-tab"
                data-bs-toggle="tab" data-bs-target="#nav-{{$categoria->id}}" type="button" role="tab"
                aria-controls="nav-{{$categoria->id}}" aria-selected="true">{{$categoria->categoria}}</button>
            @endforeach
        </div>
    </nav>
</div>
<div class="tab-content" id="nav-tabContent">
    @foreach ($categorias as $categoria)
    <div class="tab-pane fade show <?php echo ($categoria->id == 1)?'active':''; ?>" id="nav-{{$categoria->id}}" 
        role="tabpanel" aria-labelledby="nav-{{$categoria->id}}-tab">
        <div class="row" id="cards">
            @foreach ($productos as $producto)
            @if($producto->id_categoria == $categoria->id)
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="card mb-3" style="max-width: 400px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="{{ asset('assets/imgs/products/'.$producto->foto) }}"
                                class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title text-danger" id="producto_venta">{{ $producto->nameProduct }}
                                    -
                                    <small class="text-muted">{{ $producto->unitProduct }}</small></h5>
                                <p class="card-text"><b>Precio: </b> $ <i
                                        id="precio_venta">{{ $producto->priceProduct }}</i>
                                    MXN</p>
                                <p class="card-text"><small class="text-muted">Cantidad a Pedir</small></p>
                                <input type="number" class="form-control" id="cantidad_pedido">
                                <button type="button" class="btn btn-dark btn-sm"
                                    data-id="{{ $producto->id }}">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex align-items-start">
    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
        @foreach ($categorias as $categoria)
        <button class="nav-link <?php echo ($categoria->id == 1)?'active':''; ?>" id="v-pills-{{$categoria->id}}-tab"
            data-bs-toggle="pill" data-bs-target="#v-pills-{{$categoria->id}}" type="button" role="tab"
            aria-controls="v-pills-{{$categoria->id}}" aria-selected="false">{{$categoria->categoria}}</button>
        @endforeach
    </div>
    <div class="tab-content" id="v-pills-tabContent">
        @foreach ($categorias as $categoria)
        <div class="tab-pane fade <?php echo ($categoria->id == 1)?'show active':''; ?>" id="v-pills-{{$categoria->id}}"
            role="tabpanel" aria-labelledby="v-pills-{{$categoria->id}}-tab">
            <div class="row" id="cards">
                @foreach ($productos as $producto)
                @if($producto->id_categoria == $categoria->id)
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                    <div class="card mb-3" style="max-width: 400px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <img src="{{ asset('assets/imgs/products/'.$producto->foto) }}"
                                    class="img-fluid rounded-start" alt="...">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title text-danger" id="producto_venta">{{ $producto->nameProduct }}
                                        -
                                        <small class="text-muted">{{ $producto->unitProduct }}</small></h5>
                                    <p class="card-text"><b>Precio: </b> $ <i
                                            id="precio_venta">{{ $producto->priceProduct }}</i>
                                        MXN</p>
                                    <p class="card-text"><small class="text-muted">Cantidad a Pedir</small></p>
                                    {{-- <button type="button" class="btn btn-dark btn-sm" data-id="{{ $producto->id }}">Agregar</button>
                                    --}}
                                    <input type="number" class="form-control" id="cantidad_pedido">
                                    <button type="button" class="btn btn-dark btn-sm"
                                        data-id="{{ $producto->id }}">Agregar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>
<hr>
{{-- <div class="accordion" id="accordionExample">
    @foreach ($categorias as $categoria)
    <div class="accordion-item">
        <h2 class="accordion-header" id="heading{{$categoria->id}}">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$categoria->id}}"
    aria-expanded="true" aria-controls="collapse{{$categoria->id}}">
    {{$categoria->categoria}}
</button>
</h2>
<div id="collapse{{$categoria->id}}" class="accordion-collapse collapse <?php echo ($categoria->id == 1)?'show':''; ?>"
    aria-labelledby="heading{{$categoria->id}}" data-bs-parent="#accordionExample">
    <div class="accordion-body">
        <div class="row" id="cards">
            @foreach ($productos as $producto)
            @if($categoria->id == $producto->id_categoria)
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="card mb-3" style="max-width: 400px;">
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
                                        id="precio_venta">{{ $producto->priceProduct }}</i>
                                    MXN</p>
                                <p class="card-text"><small class="text-muted">Cantidad a Pedir</small></p>
                                <input type="number" class="form-control" id="cantidad_pedido">
                                <button type="button" class="btn btn-dark btn-sm"
                                    data-id="{{ $producto->id }}">Agregar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>
</div>
</div>
@endforeach

</div> --}}


<template id="template-carrito">
    <tr>
        <th scope="row"> 1 </th>
        <input type="hidden" name="id_productoPedido[]">
        <td>Producto</td>
        <td> 1 </td>
        <input type="hidden" name="cantidad_ProductoPedido[]">
        <td>
            <button type="button" class="btn btn-info btn-sm">
                +
            </button>
            <button type="button" class="btn btn-danger btn-sm">
                -
            </button>
        </td>
        <td> $ <span>500</span> MXN </td>
        <input type="hidden" name="importe_ProductoPedido[]">
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
    <input type="hidden" name="total_pedido">
</template>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles del Pedido</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pedidos.store')}}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="table-responsive">
                        <table class="table text-center align-middle table-bordered table-hover mb-0">
                            <thead class="table-primary">
                                <tr>
                                    @foreach($folio as $folio)
                                    <b>Folio del Pedido: </b>
                                    <?php echo ($folio->folio == " ")?"1":$folio->folio + 1; ?>
                                    <input type="hidden" name="folio_pedido"
                                        value="<?php echo ($folio->folio == " ")?"1":$folio->folio + 1; ?>">
                                    @endforeach
                                </tr>
                                <tr>
                                    @if(auth()->user()->hasRole('Administrador'))
                                    <select name="id_cliente" id="id_cliente" class="form-select">
                                        <option value="">-- Selecciona un cliente --</option>
                                        @foreach ($clientes as $cliente)
                                        <option value="{{$cliente->id}}">{{ $cliente->nameClient }}</option>
                                        @endforeach
                                    </select>
                                    @elseif(auth()->user()->hasRole('Cliente'))
                                    <input type="hidden" name="id_cliente"
                                        value="{{ auth()->user()->id_identificacion}}">
                                    @endif
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
                            </tfoot>
                        </table>
                    </div>
                    <hr>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <input type="submit" value="Guardar Pedido" class="btn btn-sm btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{asset('assets/js/ventas.js')}}"></script>
@endsection
