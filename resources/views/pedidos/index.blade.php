@extends('layout.index')
@section('titulo', 'Historial de Pedidos')
@section('contenido')
<div class="container">
    @can('preventas.preventa')
    <div class="d-flex align-items-center justify-content mb-4">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('pedidos.pedido') }}">Realizar Pedido</a>
    </div>
    @endcan
    <div class="table-responsive">
        <table class="table table-hover text-center">
            <thead class="table-primary">
                <th scope="col">Folio</th>
                <th scope="col">Cliente</th>
                <th scope="col">Fecha de Entrega</th>
                <th scope="col" colspan="2">Opciones</th>
            </thead>
            <tbody>
                @foreach ($preventas as $preventa)
                    <tr>
                        <th scope="col"> {{ $preventa->folio }} </th>
                        <td> {{ $preventa->cliente }} </td>
                        <td> {{ $preventa->fecha_entrega }} </td>
                        <td>
                            @can('preventas.show')
                            <a href="{{ route('pedidos.show', $preventa->folio)}}" class="btn btn-sm btn-success"> Detalles </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection