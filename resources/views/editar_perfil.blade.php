@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{asset('assets/css/vehiculos.css')}}">
<div class="container agregarVehiculo shadow p-4">
<div class="titleForm">
    <h2>Editar Perfil</h2>
    <a href="/" class="btn btn-light btnHome">
        <img src="{{asset('assets/img/Home.png')}}" alt="">
    </a>
</div>
    @if(session('success'))
        <div class="alert alert-success" id="success-alert">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('perfil.update') }}" method="POST" class="formAgregarVehiculo">
        @csrf
        @method('PUT')

        <div class="dobleImput">
            <div class="input-group">
                <span class="input-group-text tituloInput">Nombre</span>
            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $user->datosPersonales->data_nombre }}" maxlength="50" required>
            </div>
            <div class="input-group">
                <span class="input-group-text tituloInput">Apellido</span>
            <input type="text" class="form-control" id="apellido" name="apellido" value="{{ $user->datosPersonales->data_apellido }}" maxlength="50" required>
            </div>
        </div>
        <div class="dobleImput">
            <div class="input-group">
                <span class="input-group-text tituloInput">Nombre</span>
            <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $user->datosPersonales->data_telefono }}" maxlength="10" required>
            </div>
            <div class="input-group">
                <span class="input-group-text tituloInput">Apellido</span>
            <input type="text" class="form-control" id="correo" name="correo" value="{{ $user->datosPersonales->data_correo }}" maxlength="50" required>
            </div>
        </div>

        <div class="input-group">
            <span class="input-group-text tituloInput">Usuario</span>
        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $user->email }}" maxlength="10" required disabled>
        </div>
        <!-- Add more fields to edit other profile data -->
        <button type="submit" class="btn btn-primary bg-oscuro">Guardar Cambios</button>
    </form>
</div>
@endsection
