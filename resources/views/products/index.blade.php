@extends('layout.admin')
@section('titulo', 'Inventario de productos')
@section('contenido')
@can('users.create')
<div class="d-flex align-items-center justify-content mb-4">
    @can('productos.create')
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('productos.create') }}">Agregar</a>
    </div>
    @endcan
    @can('productos.inactives')
    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('productos.inactives') }}">Ver Productos Inactivos</a>
    </div>
    @endcan
</div>
@endcan
<div class="table-responsive">
    <table class="table text-center align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Linea</th>
                <th scope="col">Producto</th>
                <th scope="col">Unidad</th>
                @can('productos.edit')
                <th scope="col">Cantidad(Stock)</th>
                <th scope="col">Precio</th>
                <th scope="col" colspan=3>Acciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product) 
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->linea_producto }}</td>
                    <td>{{ $product->nameProduct }}</td>
                    <td>
                        {{ $product->unitProduct }} con {{ $product->cantidadUnit }} 
                        <?php echo ($product->unitProduct == "Caja")?"Bolsas":"Piezas"; ?>
                    </td>
                    <td>{{ $product->cantidad_Stock }}</td>
                    <td> $ {{ $product->priceProduct }} MXN</td>
                    <td> 
                        @can('productos.edit')
                        <a href="{{ route('productos.edit', $product->id) }}" class="btn btn-sm btn-info">Editar</a> 
                        @endcan
                    </td>
                    <td> 
                        @can('productos.inactive')
                        <a href="{{ route('productos.inactive', $product->id) }}" class="btn btn-sm btn-warning">Inactivar</a> 
                        @endcan
                    </td>
                    <td>
                        @can('clientes.destroy')
                        <form action="{{ route('productos.destroy', $product->id)}}" method="post">
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
