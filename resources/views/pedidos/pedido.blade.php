@extends('layout.index')
@section('titulo', 'Realizar Pedido')
@section('estilos')
<style>
    .accordion {
        background-color: #eee;
        color: #444;
        cursor: pointer;
        padding: 18px;
        width: 100%;
        border: none;
        text-align: left;
        outline: none;
        font-size: 15px;
        transition: 0.4s;
    }

    .active,
    .accordion:hover {
        background-color: #ccc;
    }

    .accordion:after {
        content: '\002B';
        color: #777;
        font-weight: bold;
        float: right;
        margin-left: 5px;
    }

    .active:after {
        content: "\2212";
    }

    .panel {
        padding: 0 18px;
        background-color: white;
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.2s ease-out;
    }

</style>
@endsection
@section('contenido')
<form action="{{ route('pedidos.store') }}" method="post">
    @csrf
    @foreach($folio as $folio)
    <input type="hidden" name="folio_pedido" value="<?php echo ($folio->folio == " ")?"1":$folio->folio + 1; ?>">
    @endforeach
    <input type="hidden" name="id_cliente" value="{{ auth()->user()->id_identificacion }}">
    <div class="row">
        <div class="d-flex align-items-center justify-content mb-4">
            <input type="submit" value="Guadar Pedido" class="btn btn-success btn-sm">
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-lg-10 col-sm-10 col-md-10 col-xs-12">
            @foreach ($categorias as $categoria)
            <button type="button" class="accordion">{{ $categoria->categoria }}</button>
            <div class="panel">
                <table class="table">
                    @foreach ($productos as $producto)
                    @if($producto->id_categoria == $categoria->id)
                    <tr>
                        <td rowspan="2">
                            <img src="{{ asset('assets/imgs/products/'.$producto->foto) }}" height="150px" width="auto"
                                alt="{{ $producto->nameProduct }}">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <b><h5 class="card-title text-danger">{{ $producto->descriptionProduct }}</h5></b>
                            <div class="align-content-end" style="width: 18rem;">
                                <small class="text-muted">Cantidad A Pedir:</small>
                                <input type="number" name="" id="" class="form-control " value="0">
                            </div>
                        </td>
                    </tr>
                    @endif
                    @endforeach
                </table>
            </div>
            @endforeach
        </div>
    </div>

</form>
<script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function () {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }

</script>

@endsection
