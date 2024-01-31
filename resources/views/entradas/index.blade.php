@extends('layout.index')
@section('titulo', 'Historial de Entradas a Inventario')
@section('contenido')
<div class="container">
    @can('entradas.entrada')
    <div class="d-flex align-items-center justify-content mb-4">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('entradas.entrada') }}">Nueva Entrada</a>
    </div>
    @endcan
    <div class="table-responsive">
        <table class="table table-hover text-center">
            <thead class="table-primary">
                <th scope="col">Folio</th>
                <th scope="col">Encargado de la entrada</th>
                <th scope="col">Fecha y Hora de entrada</th>
                <th scope="col" colspan="2">Opciones</th>
            </thead>
            <tbody>
                @foreach ($entradas as $entrada)
                    <tr>
                        <th scope="col"> {{ $entrada->folio }} </th>
                        <td> {{ $entrada->name }} {{ $entrada->p_apellido }} {{ $entrada->s_apellido }} </td>
                        <td> {{ $entrada->fecha }} </td>
                        <td>
                            @can('entradas.show')
                            <a href="{{ route('entradas.show', $entrada->folio)}}" class="btn btn-sm btn-primary"> Ver Detalles </a>
                            @endcan
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection