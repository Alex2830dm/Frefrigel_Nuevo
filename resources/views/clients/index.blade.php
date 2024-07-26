@extends('layout.index')
@section('titulo', 'Listado de clientes')
@section('contenido')
@can('users.create')
<div class="d-flex align-items-center justify-content mb-4">
    @can('clientes.create')
    <div class="col-2">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('clientes.create') }}">Agregar</a>
    </div>
    @endcan
    {{-- <div class="col-2">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('clientes.inactives') }}">Ver Clientes
    Inactivos</a>
</div> --}}
</div>
@endcan
<div class="table-responsive">
    <table class="table text-center align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Persona de Contacto</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Email</th>
                <th scope="col" colspan=3>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
            @foreach ($users as $user)
            @if($user->tipo_usuario == 2 && $cliente->id == $user->id_identificacion)
            <tr>
                <td> {{ $cliente->id }}</td>
                <td> {{ $cliente->nameClient }}</td>
                <td> {{ $cliente->contactClient }}</td>
                <td> {{ $cliente->phonecontactClient }}</td>
                <td> {{ $user->email }}</td>
                <td>
                    @can('clientes.edit')
                    <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-sm btn-primary">Editar</a>
                    @endcan
                </td>
                {{-- <td> <a href="{{ route('clientes.inactive', $cliente->id)}}" class="btn btn-sm
                btn-warning">Inactivar</a> </td> --}}
                <td>
                    @can('clientes.destroy')
                    <form action="{{ route('clientes.destroy', $cliente->id)}}" method="post">
                        @csrf @method('delete')
                        <input type="submit" value="Eliminar" class="btn btn-sm btn-danger">
                    </form>
                    @endcan
                </td>
            </tr>
            @endif
            @endforeach

            @endforeach
        </tbody>
    </table>
</div>
@endsection
