@extends('layout.admin')
@section('titulo', 'Registro de Clientes')
@section('contenido')
<form action="{{ route('clientes.store')}} " method="POST" enctype="multipart/form-data">
    @csrf
    <h6>Datos de la empresa</h6>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="nameClient" class="form-label">Cliente / Compañia:</label>
                <input type="text" name="nameClient" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('nameClient') }}" />
                @error('nameClient') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="rsCliente" class="form-label">Razón Social:</label>
                <input type="text" name="rsCliente" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('rsCliente') }}" />
                @error('rsCliente') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="phoneClient" class="form-label">No. Teléfono:</label>
                <input type="number" name="phoneClient" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('phoneClient') }}" />
                @error('phoneClient') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="emailClient" class="form-label">Correo Electronico:</label>
                <input type="email" name="emailClient" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('emailClient') }}" />
                @error('emailClient') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <hr>
    <h6>Datos del contacto</h6>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="contactClient" class="form-label">Nombre del contacto: *</label>
                <input type="text" name="contactClient" id="" class="form-control" value="{{ old('contactClient') }}">
                @error('contactClient') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <label for="jobcontactClient">Puesto del contacto: *</label>
            <input type="text" name="jobcontactClient" id="" class="form-control" value="{{ old('jobcontactClient') }}">
            @error('jobcontactClient') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="phonecontactClient" class="form-label">No. Teléfono: *</label>
                <input type="number" name="phonecontactClient" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('phonecontactClient') }}" />
                @error('phonecontactClient') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="emailcontactClient" class="form-label">Correo Electronico: *</label>
                <input type="email" name="emailcontactClient" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('emailcontactClient') }}" />
                @error('emailcontactClient') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <hr>
    <h6>Domicilio de entrega</h6>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Calle y Número: *</label>
                <input type="text" name="addressStreet" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('addressStreet') }}" />
                @error('addressStreet') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="" class="form-label">Colonia: *</label>
                <input type="text" name="addressColony" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('addressColony') }}" />
                @error('addressColony') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="addressMunicipality" class="form-label">Municipio: *</label>
                <input type="text" name="addressMunicipality" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('addressMunicipality') }}" />
                @error('addressMunicipality') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
        <div class="col-6">
            <div class="mb-3">
                <label for="addressState" class="form-label">Estado: *</label>
                <input type="text" name="addressState" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('addressState') }}" />
                @error('addressState') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-left align-items-left g-2">
        <div class="col-6">
            <div class="mb-3">
                <label for="addressCP" class="form-label">Código Postal: *</label>
                <input type="text" name="addressCP" id="" class="form-control" placeholder="" aria-describedby="helpId" value="{{ old('addressCP') }}" />
                @error('addressCP') <small id="helpId" class="text-muted"> {{ $message }} </small> @enderror
            </div>
        </div>
    </div>
    <div class="row justify-content-left align-items-left g-2">
            <div class="col-6">
                <div class="mb-3">
                    <label for="imageClient" class="form-label">Logo compañia / cliente:</label>
                    <input type="file" name="imageClient" id="" class="form-control" placeholder="" aria-describedby="helpId" />
                </div>
            </div>
    </div>
    <hr>
    <button type="submit" class="btn btn-primary"> Guardar Datos </button>
    <a href="{{ route('clientes.index')}}" class="btn btn-danger">Cancelar</a>

</form>
@endsection
