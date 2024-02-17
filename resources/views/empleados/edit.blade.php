@extends('layout.index')
@section('titulo', 'Editar Datos del Empleado')
@section('contenido')
<form action="{{ route('empleados.update', $empleado->id)}} " method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="form-label">Nombre(s):</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $empleado->name }}" />
                @error('name') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Primer apellido:</label>
                <input type="text" name="p_apellido" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $empleado->p_apellido }}" />
                @error('p_apellido') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Segundo Apellido:</label>
                <input type="text" name="s_apellido" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $empleado->s_apellido }}" />
                @error('s_apellido') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">No. Teléfono:</label>
                <input type="number" name="telefono" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ $empleado->telefono }}" />
                @error('telefono') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="" class="form-label">Foto:</label>
                    <input type="file" name="foto" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                </div>
            </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary"> Guardar Datos </button>
    <a href="" class="btn btn-danger">Cancelar</a>

</form>
@endsection
