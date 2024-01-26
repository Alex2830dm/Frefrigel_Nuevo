@extends('layout.index')
@section('titulo', 'Detalles de la Venta')
@section('contenido')
<form action="{{ route('preventas.entrega') }}" method="post">
    @csrf
    @foreach ($venta as $venta)
    <input type="hidden" name="folio_venta" value="{{ $venta->folio }}">
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
                                <th scope="col">Entrega</th>
                                <th scope="col">Producto</th>
                                <th scope="col">Cantidad Vendida</th>
                                <th scope="col">Precio x Producto</th>
                                <th scope="col">Importe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalles_venta as $detalle)
                            <tr>
                                <td>
                                    <input type="hidden" name="id_producto[]" value="{{$detalle->id_producto}}" readonly>
                                    <input type="hidden" name="id_detalle[]" value="{{ $detalle->iddetalle }}" readonly>
                                    <select name="entregado[]" id="" class="form-select form-select-sm">
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </td>
                                <td>
                                    {{$detalle->descripcion}} </td>
                                <td> 
                                    {{$detalle->cantidad_venta}} - {{$detalle->unitProduct}}
                                    <input type="hidden" class="form-control-sm" name="cantidad_entrega[]" value="{{$detalle->cantidad_venta}}" readonly>
                                </td>
                                <td> $ {{$detalle->priceProduct}} MXN </td>
                                <td>
                                    $ {{$detalle->importe_venta}} MXN 
                                    <input type="hidden" name="importe_entrega[]" value="{{$detalle->importe_venta}}" readonly>
                                </td>
                            </tr>
                            {{-- <tr>
                                <td>
                                    <input type="checkbox" name="" id="" checked>
                                    <input type="hidden" name="" value="{{$detalle->id_producto}}">
                                </td>
                                <td>{{$detalle->descripcion}}</td>
                                <td>
                                    <input type="number" class="form-control-sm" data-id="cantidad_entrega" value="{{$detalle->cantidad_venta}}"> {{$detalle->unitProduct}}</td>
                                <td>
                                    $ {{$detalle->priceProduct}} MXN
                                    <input type="hidden" name="" data-id="precio_entrega" value="{{$detalle->priceProduct}}">
                                </td>
                                <td>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="text" class="form-control-sm" data-id="importe_entrega" value="{{$detalle->importe_venta}}" readonly>
                                        <span class="input-group-text">MXN</span>
                                    </div>
                                </td>
                            </tr> --}}
                            @endforeach
                        </tbody>
                        <thead>
                            <tr>
                                <td colspan="3"></td>
                                <td><b>Total de venta:</b></td>
                                <td>$ {{ $venta->total_venta }} MXN</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <input type="submit" value="Realizar Entrega" class="btn btn-outline-success btn-sm">
    @endforeach
</form>
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
