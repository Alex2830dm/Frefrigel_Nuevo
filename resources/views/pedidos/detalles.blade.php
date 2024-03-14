@extends('layout.admin')
@section('titulo', 'Detalles del Pedido')
@section('contenido')
{{-- <input type="hidden" name="folio_venta" value="{{ $venta->id }}"> --}}
<div class="container">
    <div class="row">
        @foreach ($venta as $venta)
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="card border-primary mb-3" style="max-width: 40rem;">
                <div class="card-header bg-transparent border-primary">{{ $venta->nameClient }} -
                    {{ $venta->rsCliente }}</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $venta->contactClient }} - {{ $venta->jobcontactClient }}</h5>
                    <p class="card-text">
                        {{ $venta->addressStreet }}, {{ $venta->addressColony }}, {{ $venta->addressMunicipality }},
                        {{ $venta->addressState }}, {{ $venta->addressCP }}
                    </p>
                </div>
                <div class="card-footer bg-transparent border-primary">
                    <a href="{{ route('pedidos.comprobante', $venta->folio) }}" class="btn btn-sm btn-danger">Descargar Comprobante</a>
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
        @endforeach
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table text-center align-middle table-bordered table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="">Img.</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad Vendida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles_venta as $detalle)
                        <tr>
                            <td> <img src="{{ asset('assets/imgs/products/'.$detalle->foto)}}" height="60px" width="auto" alt=""></td>
                            <td>
                                {{$detalle->descripcion}} </td>
                            <td>
                                {{$detalle->cantidad_venta}} - {{$detalle->unitProduct}}
                                <input type="hidden" class="form-control-sm" name="cantidad_entrega[]"
                                    value="{{$detalle->cantidad_venta}}" readonly>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- <script type="text/javascript">
    $(document).ready(function () {
        $('#cantidad_entrega').keyup(function () {
            var precio = $('#precio_entrega').val(); //obtiene el costo del producto
            var cantidad = $('#cantidad_entrega').val(); //obtiene la cantidad
            var total = precio * cantidad;
            $("#importe_entrega").val();
            $("#importe_entrega").val(total);
        });        
    });
</script> --}}
@endsection
