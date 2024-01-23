@extends('layout.index')
@section('titulo', 'Entradas de Productos')
@section('contenido')
<form action="{{ route('entradas.store') }}" method="post">
    @csrf
    <div class="row">
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="form-group">
                <label for="">Folio de Entrada</label>
                @foreach($folio as $folio)
                    <input type="text" class="form-control" name="folio" value="<?php echo ($folio->folio == " ")?"1":$folio->folio + 1; ?>" @readonly(true)>
                @endforeach
            </div>

            <div class="form-group">
                <label for="">Encargado de la entrada: </label>
                <input type="hidden" name="id_encargado" value="{{auth()->user()->id}}" readonly>
                <input type="text" class="form-control" value="{{auth()->user()->name}}" readonly>
            </div>

            <label>Productos: </label>
            <select  id="idProducto" class="form-select">
                <option value="0">Elige Un Producto</option>
                @foreach ($productos as $producto)
                <option value="{{$producto->id}}">{{$producto->descriptionProduct}} - {{$producto->unitProduct}}</option>
                @endforeach  
            </select>

            <div id="info01"></div>
            <br>
            <div class="form-group">
                <button type="button" class="btn btn-primary" id="bt_add">Agregar</button>
            </div>
        </div>
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <div class="table-response">
                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color: #A9D0F5">
                        <th>Opciones</th>
                        <th>Producto</th>
                        <th>Cantidad</th>             
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="submit" class="btn btn-danger">Cancelar</button>
            </div>
        </div>
    </div>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $("#idProducto").change(function () {
            var idProducto = $("#idProducto").val();
            //alert(idProducto);
            if (idProducto == 0) {
                $("#info01").empty();
                $("#info02").empty();
            } else {
                $("#info01").load("{{ route('entradas.info_producto') }}?id=" + idProducto);
            }
        });
        //------------------------------------------------------------
        $('#bt_add').click(function () {
            agregar();
        });
    });
    var cont = 0;
    total = 0;
    subtotal = [];

    function limpiar() {
        $('#idProducto').val(0);
        $("#pcantidad").val("");
        $("#pprecio").val("");
        $("#ptotal").val("");
    }

    function evaluar() {
        if (total > 0) {
            $("#guardar").show()
        } else {
            $("#guardar").hide()
        }
    }

    function eliminar(index) {
        total = total - subtotal[index];
        $("#total").html(total);
        $("#fila" + index).remove();
        evaluar();
    }

    function agregar() {
        id_producto = $('#idProducto').val();
        producto = $('#producto').val();
        unidad = $('#punidad').val();
        cantidad = $('#pcantidad').val();
        if (id_producto != "" && cantidad != "" && cantidad > 0) {
            var fila = "<tr class='button' id='fila" + cont + "'>" +
                "<td><button type='button' class='btn btn-sm btn-warning' onclick='eliminar(" + cont + ");'> X </button></td>" +
                "<td><input type='hidden' name='id_producto[]' value='" + id_producto + "'readonly>" + producto + " - " + unidad + "</td>" +
                "<td><input type='hidden' name='cantidad[]' value='" + cantidad + "' readonly>" + cantidad + "</td>" +
            "</tr>";
            cont++;
            limpiar();
            $("#total").val(total);
            evaluar();
            $("#detalles").append(fila);
        } else {
            alert('Error al ingresar el detalle del ingreso, revise los datos del producto');
        }
    }

</script>
@endsection