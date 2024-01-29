@extends('layout.index')
@section('titulo', 'Listado de productos inactivos')
@section('contenido')
@can('users.create')
<div class="d-flex align-items-center justify-content mb-4">
    <div class="col-2">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('productos.index') }}">Ver Productos Activos</a>
    </div>
</div>
@endcan
<div class="table-responsive">
    <table class="table text-center align-middle table-bordered table-hover mb-0" id="tabla_id">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Producto</th>
                <th scope="col">Unidad</th>
                <th scope="col">Cantidad(Stock)</th>
                <th scope="col">Precio</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product) 
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->nameProduct }}</td>
                    <td>{{ $product->unitProduct }}</td>
                    <td>{{ $product->cantidad }}</td>
                    <td>{{ $product->priceProduct }}</td>
                    <td> <a href="{{ route('productos.active', $product->id) }}" class="btn btn-sm btn-success">Activar</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
