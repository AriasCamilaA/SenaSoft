@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="{{asset('assets/css/vehiculos.css')}}">
<div class="container agregarVehiculo shadow">
    <div class="titleForm py-4">
        <h2>Agregar Vehículo</h2>
        <a href="/" class="btn btn-light btnHome">
            <img src="{{asset('assets/img/Home.png')}}" alt="">
        </a>
    </div>
    <form action="{{ route('vehiculos.store') }}" method="POST" class="formAgregarVehiculo">
        @csrf

        <div class="dobleImput">
            <div class="input-group">
                <span class="input-group-text tituloInput">Placa</span>
                <input type="text" class="form-control" id="modelo" name="veh_placa" required>
            </div>
            <div class="input-group">
                <span class="input-group-text tituloInput">Modelo</span>
                <input type="number" class="form-control" id="modelo" name="veh_modelo" required>
            </div>
        </div>
        <div class="dobleImput">
            <div class="input-group">
                <span class="input-group-text tituloInput">Marca</span>
                <input type="text" class="form-control" id="marca" name="veh_marca" required>
            </div>
            <div class="input-group">
                <span class="input-group-text tituloInput">Color</span>
                <input type="text" class="form-control" id="color" name="veh_color" required>
            </div>
        </div>
        <div class="dobleImput">
            <div class="input-group">
                <span class="input-group-text tituloInput">Estado</span>
                <select class="form-control" id="estado" name="veh_estado" required>
                    <option value="Nuevo">Nuevo</option>
                    <option value="Usado">Usado</option>
                </select>
            </div>
            <div class="input-group">
                <span class="input-group-text tituloInput">Precio</span>
                <input type="number" class="form-control" id="precio" name="veh_precio" required>
            </div>
        </div>
        <div class="input-group">
            <span class="input-group-text tituloInput">Categoría</span>
            <select class="form-control" id="categoria" name="cat_id_fk" required>
                @foreach ($categorias as $categoria)
                <option value="{{ $categoria->cat_id }}">{{ $categoria->cat_tipo }}</option>
                @endforeach
            </select>
        </div>
        <input class="d-none" name="data_id_fk" value="{{Auth::user()->datosPersonales->data_id}}">
        <button type="submit" class="btn btn-primary">Agregar</button>
    </form>
</div>
@endsection
