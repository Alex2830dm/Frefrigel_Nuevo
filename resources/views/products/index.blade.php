@extends('layout.admin')
@section('titulo', 'Inventario de productos')
@section('contenido')
@can('users.create')
<div class="d-flex align-items-center justify-content mb-4">
    @can('productos.create')
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('productos.create') }}">Agregar</a>
    </div>
    @endcan
    @can('productos.inactives')
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('productos.inactives') }}">Ver Productos Inactivos</a>
    </div>
    @endcan
    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
        <a type="button" class="btn btn-success btn-sm" id="mostrar_formulario_importacion">Importar Productos</a>
    </div>
</div>
<div id="formulario_importacion">
    <div class="d-flex align-items-center justify-content mb-4">
        <form action="{{ route('productos.importar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="importacion_datos_productos" id="" class="form-control" accesskey=".xlsx, .xls"> <br>
            <input type="submit" value="Enviar Datos" class="btn btn-sm btn-success">
            <button type="button" id="ocultar_formulario_importacion" class="btn btn-sm btn-danger">Cerrar Formulario</button>
        </form>
    </div>
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
                <th scope="col">Categoria</th>
                <th scope="col">Precio Por Mayoreo</th>
                <th scope="col" colspan=3>Acciones</th>
                @endcan
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product) 
                <tr>
                    <td>{{ $product->id }}</td>
                    <td> <?php echo ($product->linea_producto == "1")?"Frefrigel":"Ducles"; ?> </td>
                    <td>{{ $product->nameProduct }}</td>
                    <td>
                        {{ $product->unitProduct }} con {{ $product->cantidadUnit }} 
                        <?php echo ($product->unitProduct == "Caja")?"Bolsas":"Piezas"; ?>
                    </td>
                    <td>
                        @foreach($categorias as $categoria)
                            @if($product->id_categoria == $categoria->id)
                                {{ $categoria->categoria }}
                            @endif
                        @endforeach
                    </td>
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
    <div class="pagination">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function(){
        $("#formulario_importacion").hide();
		$("#mostrar_formulario_importacion").click(function(){
			$('#formulario_importacion').show(500);
		});
        $("#ocultar_formulario_importacion").click(function(){
			$('#formulario_importacion').hide(500);
		});
    });
</script>
@endsection