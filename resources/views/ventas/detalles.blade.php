@extends('layout.index')
@section('titulo', 'Detalles de la Venta')
@section('contenido')
@foreach ($venta as $venta)
<div class="container">
    <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
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
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="card border-primary mb-3" style="max-width: 40rem;">
                    <div class="card-header bg-transparent border-primary">Frefrigel S.A de C.V</div>
                    <div class="card-body">
                        <h5 class="card-title">{{ $venta->name }} {{ $venta->p_apellido }} {{ $venta->s_apellido }}</h5>
                        <p class="card-text">
                            Juan Escutia, San Miguel Totoltepec, Toluca, México, 520200
                        </p>
                    </div>
                    <div class="card-footer bg-transparent border-primary">
                        <b>Fecha y Hora de Venta:</b> {{ $venta->created_at }}
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
                            <th scope="col">Cantidad Vendida</th>
                            <th scope="col">Precio x Producto</th>
                            <th scope="col">Importe</th>
                            <th scope="col">Estatus</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles_venta as $detalle)
                        <tr>
                            <td>{{$detalle->id_producto}}</td>
                            <td>{{$detalle->descripcion}}</td>
                            <td>{{$detalle->cantidad_venta}} {{$detalle->unitProduct}}</td>
                            <td>$ {{$detalle->priceProduct}} MXN</td>
                            <td>$ {{$detalle->importe_venta}} MXN</td>
                            <td>
                                <?php echo ($detalle->entregado == 1)?"Entregado":"No Recibido"; ?>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <thead>
                        <tr>
                            <td colspan="3"></td>
                            <td><b>Total de venta:</b></td>
                            @if(session('estatus'))
                                <td class="fw-bolder text-success" colspan="2"> $ {{ $venta->total_venta }} MXN </td>
                            @else
                            <td colspan="2">$ {{ $venta->total_venta }} MXN</td>
                            @endif
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
