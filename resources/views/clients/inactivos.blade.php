@extends('layout.admin')
@section('titulo', 'Listado de clientes inactivos')
@section('contenido')
@can('users.create')
<div class="d-flex align-items-center justify-content mb-4">
    {{-- <div class="col-2">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('products.create') }}">Agregar</a>
    </div>
    <div class="col-2">
        <a type="button" class="btn btn-success btn-sm" href="{{ route('products.inactives') }}">Ver Clientes Inactivos</a>
    </div> --}}
</div>
@endcan
<div class="table-responsive">
    <table class="table text-center align-middle table-bordered table-hover mb-0" id="tabla_id">
        <thead>
            <tr class="table-info">
                <th scope="col">#</th>
                <th scope="col">Cliente</th>
                <th scope="col">Representante</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Email</th>
                <th scope="col" colspan=3>Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
@endsection
