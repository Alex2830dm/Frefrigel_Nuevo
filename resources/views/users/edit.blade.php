@extends('layout.index')
@section('titulo', 'Edición de datos')
@section('contenido')
<form action="{{ route('users.update', $user->id)}} " method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row">
        <div class="col-12">
            <div class="mb-3">
                <label for="" class="form-label">Nombre(s):</label>
                <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId"
                    value="{{ $user->name }}" />
                @error('name') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Primer apellido:</label>
                <input type="text" name="p_apellido" id="" class="form-control" placeholder="" aria-describedby="helpId"
                    value="{{ $user->p_apellido }}" />
                @error('p_apellido') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Segundo Apellido:</label>
                <input type="text" name="s_apellido" id="" class="form-control" placeholder="" aria-describedby="helpId"
                    value="{{ $user->s_apellido }}" />
                @error('s_apellido') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Correo Electronio:</label>
                <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId"
                    value="{{ $user->email }}" />
                @error('email') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">No. Teléfono:</label>
                <input type="number" name="telefono" id="" class="form-control" placeholder="" aria-describedby="helpId"
                    value="{{ $user->telefono }}" />
                @error('telefono') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>

    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Foto del Usuario:</label><br>
                @if($user->foto == "foto.jpg")
                <img src="{{ asset('assets/imgs/'.$user->foto)}}" alt="{{ $user->foto }}" height="100px">
                @else
                <img src="{{ asset('assets/imgs/users/'.$user->foto)}}" alt="{{ $user->foto }}" height="100px">
                @endif
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Foto:</label>
                <input type="file" name="foto" id="" class="form-control" placeholder="" aria-describedby="helpId" />
            </div>
        </div>
    </div>
    <div class="row justify-content-left align-items-left g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Usuario:</label> <br>
                <input type="text" name="username" class="form-control" id="" placeholder="username" value="{{ $user->username }}">
                @error('username') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Establecer Rol:</label> <br>
                @foreach ($roles as $role)
                    <input type="checkbox" name="roles" id="" value="{{$role->name}}" {{ $user->roles->contains($role->id) ? 'checked' : ''}}> {{$role->name}} <br>
                @endforeach
            </div>
        </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary"> Guardar Datos </button>
    <a href="" class="btn btn-danger">Cancelar</a>
</form>
@endsection
