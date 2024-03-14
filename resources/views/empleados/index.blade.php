@extends('layout.admin')
@section('titulo', 'Listado de Empleados')
@section('contenido')
@can('users.create')
<div class="d-flex align-items-center justify-content mb-4">
    <a type="button" class="btn btn-success btn-sm" href="{{ route('empleados.create') }}">Agregar</a>
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
            @foreach ($empleados as $empleado)
                @foreach ($users as $user)
                    @if($user->tipo_usuario == 1 && $empleado->id == $user->id_identificacion)
                        <tr>
                            <td scope="col"> {{ $empleado->id }} </td>
                            <td> {{ $user->username}} </td>
                            <td> {{ $empleado->name }} {{ $empleado->p_apellido }} {{ $empleado->s_apellido }} </td>
                            <td> @foreach($user->roles as $role) {{ $role->name}} @endforeach</td>
                            <td> {{ $user->email }} </td>
                            @can('users.edit')
                                <td> <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-sm btn-primary">Editar</a> </td>
                            @endcan()
                            @can('users.delete')
                                <td>
                                    <form action="{{ route('empleados.destroy', $user->id) }}" method="post">
                                        @csrf @method('delete')
                                        <input type="hidden" name="id_empleado" value="{{ $empleado->id}}">
                                        <input type="submit" class="btn btn-sm btn-danger" value="Eliminar">
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>
@endsection
