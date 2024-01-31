@extends('layout.index')
@section('titulo', 'Historial de Ventas')
@section('contenido')
<div class="container">
    @can('ventas.venta')
    <div class="d-flex align-items-center justify-content mb-4">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('ventas.venta') }}">Nueva Venta</a>
    </div>
    @endcan
    <div class="table-responsive">
        <table class="table table-hover text-center">
            <thead class="table-primary">
                <th scope="col">Folio</th>
                <th scope="col">Cliente</th>
                <th scope="col">Total</th>
                <th scope="col">Fecha y Hora de Venta</th>
                <th scope="col" colspan="2">Opciones</th>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <th scope="col"> {{ $venta->folio }} </th>
                        <td> {{ $venta->cliente }} </td>
                        <td> $ {{ $venta->total_venta }} MXN</td>
                        <td> {{ $venta->fecha }} </td>
                        <td>
                            @can('ventas.show')
                            <a href="{{ route('ventas.show', $venta->folio)}}" class="btn btn-sm btn-primary"> Ver Detalles </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection