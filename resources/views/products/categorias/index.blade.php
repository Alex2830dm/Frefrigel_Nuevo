@extends('layout.admin')
@section('titulo', 'Categorias Para Los Productos')
@section('contenido')
<div class="d-flex align-items-center justify-content mb-4">
    @can('productos.create')
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('categorias.create') }}">Agregar</a>
    </div>
    @endcan
    @can('productos.inactives')
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('productos.index') }}">Inventario de Productos</a>
    </div>
    @endcan
</div>
<div class="table-responsive">
    <table class="table text-center align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Categoria</th>
                <th scope="col" colspan=2>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $categoria) 
                <tr>
                    <td>{{ $categoria->id }}</td>
                    <td>{{ $categoria->categoria }}</td>
                    <td> 
                        @can('productos.edit')
                        <a href="{{ route('categorias.edit', $categoria->id) }}" class="btn btn-sm btn-info">Editar</a> 
                        @endcan
                    </td>
                    <td>
                        @can('clientes.destroy')
                        <form action="{{ route('categorias.delete', $categoria->id)}}" method="post">
                            @csrf @method('delete')
                            <input type="submit" value="Eliminar" class="btn btn-sm btn-danger">
                        </form>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection