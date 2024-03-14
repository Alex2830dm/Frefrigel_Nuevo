@extends('layout.admin')
@section('titulo', 'Listado de Permisos')
@section('contenido')
@can('users.create')
<div class="d-flex align-items-center justify-content mb-4">
    <div class="col-2">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('roles.index') }}">Ver Roles</a>
    </div>
</div>
@endcan
<div class="table-responsive">
    <table class="table text-center align-middle table-bordered table-hover mb-0" id="tabla_id">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Permiso</th>
                {{-- <th scope="col">Descripción del Permiso</th> --}}
                {{-- <th scope="col" colspan=2>Acciones</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($permissions as $permission)
            <tr>
                <td scope="col"> {{ $permission->id }} </td>
                <td> {{ $permission->name }} </td>
               {{--  <td> {{ $permission->description }} </td> --}}
                {{-- <td>
                    @forelse ($rol->permissions as $permission)
                    <span>{{ $permission->name}}, </span>
                    @empty
                    <span class="badge badge-danger">No permission added</span>
                    @endforelse

                </td> --}}
                {{-- <td> <a href="{{ route('permissions.edit', $permission->id) }}" class="btn btn-sm btn-primary">Editar</a> </td>
                <td>
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="post">
                        @csrf @method('delete')
                        <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                    </form>
                </td> --}}
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
