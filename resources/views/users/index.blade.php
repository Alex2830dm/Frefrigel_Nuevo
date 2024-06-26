@extends('layout.admin')
@section('titulo', 'Listado de usuarios')
@section('contenido')
@can('users.create')
<div class="d-flex align-items-center justify-content mb-4">
    <a type="button" class="btn btn-success btn-sm" href="{{ url('users/create') }}">Agregar</a>
</div>
@endcan
<div class="table-responsive">
    <table class="table text-center align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">User</th>
                <th scope="col">Nombre Completo</th>
                <th scope="col">Puesto</th>
                <th scope="col">Email</th>
                <th scope="col" colspan=2>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td scope="col"> {{ $user->id }} </td>
                    <td> {{ $user->username}}  </td>
                    <td> {{ $user->name }}</td>
                    <td> @foreach($user->roles as $role) {{ $role->name}} @endforeach</td>
                    <td> {{ $user->email }} </td>
                    @if($user->tipo_usuario == 1)
                    @can('users.edit')
                    <td> <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-primary">Editar</a> </td>
                    @endcan()
                    {{-- <td> <a href="" class="btn btn-sm btn-warning"> Dar Baja </a> </td> --}}
                    @can('users.delete')
                    <td>
                        <form action="{{ route('users.destroy', $user->id) }}" method="post">
                            @csrf @method('delete')
                            <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                        </form>
                    </td>
                    @endcan
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
