<br>
<div class="alert alert-primary" role="alert">
    <div class="row">
        @foreach ($datos as $dato)
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <label>Producto: </label>
            <input type="text"  class="form-control" id="producto" value="{{$dato->nameProduct}}" readonly>
        </div>
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <label>Unidad: </label>
            <input type="text"  class="form-control" id="punidad" value="{{$dato->unitProduct}}" >
        </div>
        @endforeach
        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
            <label>Cantidad: </label>
            <input type="text" class="form-control" id="pcantidad">
        </div>
    </div>
</div>
{{-- <script type="text/javascript">
    $(document).ready(function () {
        $('#pcantidad').keyup(function () {
            var precio = $('#pprecio').val(); //obtiene el costo del producto
            var cantidad = $('#pcantidad').val(); //obtiene la cantidad
            var total = precio * cantidad;
            $("#pcosto").val(total);
        });        
    });

</script> --}}