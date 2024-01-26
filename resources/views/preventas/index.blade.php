@extends('layout.index')
@section('titulo', 'Preventas')
@section('contenido')
<div class="container">
    <div class="d-flex align-items-center justify-content mb-4">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('preventas.preventa') }}">Realizar Preventa</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover text-center">
            <thead class="table-primary">
                <th scope="col">Folio</th>
                <th scope="col">Cliente</th>
                <th scope="col">Total</th>
                <th scope="col">Fecha de Entrega</th>
                <th scope="col" colspan="2">Opciones</th>
            </thead>
            <tbody>
                @foreach ($preventas as $preventa)
                    <tr>
                        <th scope="col"> {{ $preventa->folio }} </th>
                        <td> {{ $preventa->cliente }} </td>
                        <td> $ {{ $preventa->total_venta }} MXN</td>
                        <td> {{ $preventa->fecha_entrega }} </td>
                        <td>
                            <a href="{{ route('preventas.show', $preventa->folio)}}" class="btn btn-sm btn-success"> Entregar a Cliente </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection