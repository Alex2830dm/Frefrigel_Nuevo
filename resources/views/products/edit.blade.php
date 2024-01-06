@extends('layout.index')
@section('titulo', 'Registro de Productos')
@section('contenido')
<form action="{{ route('products.update', $product->id)}} " method="POST" enctype="multipart/form-data">
    @csrf @method('put')
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="form-label">Producto:</label>
                <input type="text" name="nameProduct" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $product->nameProduct }}" />
                @error('nameProducto') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="form-label">Descripción del Producto:</label>
                <input type="text" name="descriptionProduct" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ $product->descriptionProduct }}" />
                @error('descriptionProduct') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Unidad del Producto:</label>
                <select name="unitProduct" class="form-select" id="">
                    <option value="">-- Selecciona una Unidad --</option>
                    <option <?php echo ($product->unitProduct == "Caja")?"selected":""; ?> value="Caja">Caja</option>
                    <option <?php echo ($product->unitProduct == "Pieza")?"selected":""; ?> value="Pieza">Pieza</option>
                </select>
                @error('unitProduct') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <label for="">Precio del Producto:</label>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="number" name="priceProduct" class="form-control" value="{{ $product->priceProduct }}">
                @error('email') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-left align-items-left g-2">
        {{-- <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Tipo de Producto:</label>
                <select name="typeProduct" class="form-select" id="">
                    <option value="">-- Selecciona el tipo de producto --</option>
                </select>
                @error('typeProduct') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
    </div>
    </div> --}}
    <div class="col-6">
        <div class="mb-3">
            <label for="" class="form-label">Foto del producto:</label><br>
            @if($product->foto == "foto.jpg")
            <img src="{{ asset('assets/imgs/'.$product->foto)}}" alt="{{ $product->foto }}" height="100px">
            @else
            <img src="{{ asset('assets/imgs/products/'.$product->foto)}}" alt="{{ $product->foto }}" height="100px">
            @endif
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="" class="form-label">Foto:</label>
            <input type="file" name="imageProduct" id="" class="form-control" placeholder=""
                aria-describedby="helpId" />
        </div>
    </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary"> Guardar Datos </button>
    <a href="{{ route('products.index')}}" class="btn btn-danger">Cancelar</a>

</form>
@endsection