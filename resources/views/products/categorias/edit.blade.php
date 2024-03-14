@extends('layout.admin')
@section('titulo', 'Categorias Para Los Productos')
@section('contenido')
<form action="{{ route('categorias.update', $categoria->id )}}" method="post">
    @csrf @method('put')
    <div class="row justify-content-left align-items-left g-2">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="mb-3">
                <label for="categoria" class="form-label">Nombre de la Categoria:</label>
                <input type="text" class="form-control" name="categoria" value="{{ $categoria->categoria }}">
                {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
            </div>
        </div>
    </div>
    <div class="row justify-content-left align-items-left g-2">
        <hr>
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <button type="submit" class="btn btn-primary">Guardar Datos</button>
        </div>
    </div>
</form>
@endsection