@extends('layout.index')
@section('titulo', 'Listado de Roles')
@section('contenido')
@can('users.create')
<div class="d-flex align-items-center justify-content mb-4">
    <div class="col-2">
        <a type="button" class="btn btn-success btn-sm" href="{{ url('roles/create') }}">Crear Rol Nuevo</a>
    </div>
    <div class="col-2">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('permissions.index') }}">Ver Permisos</a>
    </div>
</div>
@endcan
<div class="table-responsive">
    <table class="table text-center align-middle table-bordered table-hover mb-0" id="tabla_id">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Rol</th>
                {{-- <th scope="col">Total de Permisos</th> --}}
                <th scope="col" colspan=2>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $rol)
            <tr>
                <td scope="col"> {{ $rol->id }} </td>
                <td> {{ $rol->name }} </td>
                {{-- <td>
                    @forelse ($rol->permissions as $permission)
                    <span>{{ $permission->name}}, </span>
                    @empty
                    <span class="badge badge-danger">No permission added</span>
                    @endforelse

                </td> --}}
                <td> <a href="{{ route('roles.edit', $rol->id) }}" class="btn btn-sm btn-primary">Editar</a> </td>
                <td>
                    <form action="{{ route('roles.delete', $rol->id) }}" method="post">
                        @csrf @method('delete')
                        <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
