@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editar Perfil</h2>
    <form action="{{ route('perfil.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->datosPersonales->data_nombre }}" required>
        </div>
        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $user->datosPersonales->data_apellido }}" required>
        </div>
        <!-- Add more fields to edit other profile data -->
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>
@endsection
