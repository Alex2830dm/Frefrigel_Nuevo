@extends('layout.admin')
@section('titulo', 'Producción del Día')
@section('contenido')
<div class="container">
    <div class="row">
        @foreach ($produccion as $producto)
        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
            <table>
                <tr>
                    <img src="{{ asset('assets/imgs/products/'.$producto->foto) }}" height="150px" class="rounded mx-auto d-block" alt="{{ $producto->descriptionProduct}}">
                    <hr>
                </tr>
                <tr>
                    <div class="card border-primary mb-3" style="max-width: 18rem;">
                        <div class="card-header">{{ $producto->nameProduct }}</div>
                        <div class="card-body text-primary">
                            <h5 class="card-title">{{ $producto->descriptionProduct}}</h5>
                            <p class="card-text">
                                <b>Cantidad a producir:</b> {{$producto->cantidad_total}} -
                                {{ $producto->unitProduct }}
                            </p>
                        </div>
                    </div>
                </tr>
            </table>
        </div>
        @endforeach
    </div>
</div>
@endsection
