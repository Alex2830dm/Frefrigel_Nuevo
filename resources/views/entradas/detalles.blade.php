@extends('layout.index')
@section('titulo', 'Detalles de Entrada a Inventario')
@section('contenido')
@foreach ($entrada as $entrada)
<div class="container">
    <div class="row">
            {{-- <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="card border-primary mb-3" style="max-width: 40rem;">
                    <div class="card-header bg-transparent border-primary">{{ $venta->nameClient }} - {{ $venta->rsCliente }}</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $venta->contactClient }} - {{ $venta->jobcontactClient }}</h5>
                        <p class="card-text">
                            {{ $venta->addressStreet }}, {{ $venta->addressColony }}, {{ $venta->addressMunicipality }}, {{ $venta->addressState }}, {{ $venta->addressCP }}
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-primary">
                        <a href="" class="btn btn-sm btn-outline-danger">Descargar Comprobante</a>
                    </div>
                </div>
            </div> --}}
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="card border-primary mb-3" style="max-width: 40rem;">
                    <div class="card-header bg-transparent border-primary">Frefrigel S.A de C.V</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $entrada->name }} {{ $entrada->p_apellido }} {{ $entrada->s_apellido }}</h5>
                        <p class="card-text">
                            Juan Escutia, San Miguel Totoltepec, Toluca, México, 520200
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-primary">
                        <b>Fecha y Hora de Entrada:</b> {{ $entrada->created_at }}
                    </div>
                </div>
            </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table text-center align-middle table-bordered table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">ID Producto</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad en Inventario Antes</th>
                            <th scope="col">Cantidad de entrada</th>
                            <th scope="col">Cantidad en Inventario Actual</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles_entrada as $detalle)
                        <tr>
                            <td>{{$detalle->id_producto}}</td>
                            <td>{{$detalle->descripcion}}</td>
                            <td>{{$detalle->cantidad - $detalle->cantidad_venta}} {{$detalle->unitProduct}}</td>
                            <td>{{$detalle->cantidad_venta}} {{$detalle->unitProduct}}</td>
                            <td>{{$detalle->cantidad}} {{$detalle->unitProduct}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
