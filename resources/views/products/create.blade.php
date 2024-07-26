@extends('layout.index')
@section('titulo', 'Registro de Productos')
@section('contenido')
<div class="container">
    <form action="{{ route('productos.store')}} " method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                <div class="mb-3">
                    <label for="" class="form-label">Código del Producto:</label>
                    <input type="text" name="codeProduct" id="" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ old('codeProduct') }}" />
                    @error('codeProduct') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
                </div>
            </div>
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
                <div class="mb-3">
                    <label for="" class="form-label">Producto:</label>
                    <input type="text" name="nameProduct" id="" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ old('nameProducto') }}" />
                    @error('nameProducto') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                <div class="mb-3">
                    <label for="" class="form-label">Descripción del Producto:</label>
                    <input type="text" name="descriptionProduct" id="" class="form-control" placeholder=""
                        aria-describedby="helpId" value="{{ old('descriptionProduct') }}" />
                    @error('descriptionProduct') <small id="helpId" class="text-muted"> {{ $message }} </small>
                    @enderror
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="mb-3">
                    <label for="" class="form-label">Unidad del Producto:</label>
                    <select name="unitProduct" class="form-select" id="unitProduct">
                        <option value="">-- Selecciona una Unidad --</option>
                        <option value="Caja">Caja</option>
                        <option value="Bolsa">Bolsa</option>
                    </select>
                    @error('unitProduct') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="" class="form-label">Cantidad por Unidad</label>
                <div class="input-group mb-3">
                    <input type="number" name="cantidadUnit" class="form-control"
                        aria-describedby="input-cantidad-unidad" placeholder="0">
                    <span class="input-group-text" id="input-cantidad-unidad">Piezas</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="mb-3">
                    <label for="" class="form-label">Linea de Producto:</label>
                    <select name="linea_producto" id="linea_producto" class="form-select">
                        <option value="0"> -- Selecciona tipo de producto --</option>
                        <option value="1"> Frefrigel </option>
                        <option value="2"> Dulces </option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="mb-3">
                    <label for="" class="form-label">Categoria del Producto:</label>
                    <div id="select_categorias">
                        <select name="id_categoria" id="" class="form-select">
                            <option value="0"> -- Selecciona la categoria --</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-left align-items-left g-2">
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <label for="">Precio del Producto:</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" name="priceProduct" class="form-control" value="{{ old('priceProduct') }}">
                    @error('email') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
                </div>
            </div>
            <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                <div class="mb-3">
                    <label for="" class="form-label">Foto:</label>
                    <input type="file" name="imageProduct" id="" class="form-control" placeholder=""
                        aria-describedby="helpId" />
                </div>
            </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary"> Guardar Datos </button>
        <a href="{{ route('productos.index')}}" class="btn btn-danger">Cancelar</a>

    </form>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $("#unitProduct").change(function () {
            var unidadProducto = $("#unitProduct").val();
            if (unidadProducto == "Caja") {
                console.log("bolsas");
                $("#input-cantidad-unidad").text('Bolsas');
            } else if (unidadProducto == "Bolsa") {
                console.log("piezas");
                $("#input-cantidad-unidad").text('Piezas');
            }
        });

        $("#tipo_producto").change(function () {
            var tipo_producto = $("#tipo_producto").val();
            //alert(tipo_producto);
            if (tipo_producto == 1 || tipo_producto == 2) {
                $("#select_categorias").load("{{ route('select_categorias') }}?tipo_producto=" +
                    tipo_producto);
            } else if (tipo_producto == 0) {
                $("#tipo_producto").empty();
                $("#select_categorias").html("Debes de seleccionar una categoria")
            }
        });
    });

</script>
@endsection
