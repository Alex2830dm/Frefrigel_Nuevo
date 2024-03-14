@extends('layout.admin')
@section('titulo', 'Registro de Productos')
@section('contenido')
<div class="container">
    <form action="{{ route('productos.store')}} " method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="form-label">Producto:</label>
                    <input type="text" name="nameProduct" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('nameProducto') }}" />
                    @error('nameProducto') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center g-2">
            <div class="col-12">
                <div class="mb-3">
                    <label for="" class="form-label">Descripción del Producto:</label>
                    <input type="text" name="descriptionProduct" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('descriptionProduct') }}" />
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
                        <option value="Caja">Caja</option>
                        <option value="Pieza">Pieza</option>
                    </select>
                    @error('unitProduct') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="" class="form-label">Categoria del Producto:</label>
                    <select name="id_categoria" id="" class="form-select">
                        <option value="0"> -- Selecciona la categoria --</option>
                        @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->categoria }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
        </div>
        <div class="row justify-content-left align-items-left g-2">
            <div class="col-6">
                <label for="">Precio del Producto:</label>
                <div class="input-group mb-3">
                    <span class="input-group-text">$</span>
                    <input type="text" name="priceProduct" class="form-control" value="{{ old('priceProduct') }}">
                    @error('email') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
                </div>
            </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="" class="form-label">Foto:</label>
                        <input type="file" name="imageProduct" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                    </div>
                </div>
        </div>
        <hr>
        <button type="submit" class="btn btn-primary"> Guardar Datos </button>
        <a href="{{ route('productos.index')}}" class="btn btn-danger">Cancelar</a>
    
    </form>
</div>
@endsection
