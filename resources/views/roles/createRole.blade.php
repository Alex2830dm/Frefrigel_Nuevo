@extends('layout.index')
@section('titulo', 'Nuevo Rol')
@section('contenido')
<form action="{{ route('roles.store') }}" method="post">
    @csrf
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="form-label">Nombre del Rol:</label>
                <input type="text" name="nameRol" id="" class="form-control" placeholder="" aria-describedby="helpId"
                    value="{{ old('nameRol') }}" />
                @error('nameRol') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table text-center align-middle table-bordered table-hover mb-0" id="tabla_id">
            <tbody>
                @foreach ($permissions as $permissio)
                <tr>
                    <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="permissions[]"
                                    value="{{ $permissio->id }}">
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
                    </td>
                    <td>
                        {{$permissio->name}}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <hr>
    <input type="submit" value="Guardar Rol" class="btn btn-primary">
    <a href="{{ route('roles.index')}}" class="btn btn-danger">Cancelar</a>
</form>
@endsection
