@extends('layout.index')
@section('titulo', 'Historial de Pedidos')
@section('contenido')
<div class="container">
    @can('pedidos.pedido')
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
                @foreach ($pedidos as $pedido)
                    <tr>
                        <th scope="col"> {{ $pedido->folio }} </th>
                        <td> {{ $pedido->cliente }} </td>
                        <td> {{ $pedido->fecha_entrega }} </td>
                        <td>
                            @can('pedidos.show')
                            <a href="{{ route('pedidos.show', $pedido->folio)}}" class="btn btn-sm btn-success"> Detalles </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection