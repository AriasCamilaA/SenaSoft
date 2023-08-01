<link rel="stylesheet" href="{{asset('assets/css/vehiculos.css')}}">
@extends('layouts.app')

@section('content')
{{-- <input type="radio" class="btn-check" name="options-base" id="option5" autocomplete="off" checked>
<label class="btn" for="option5">Checked</label>

<input type="radio" class="btn-check" name="options-base" id="option6" autocomplete="off">
<label class="btn" for="option6">Radio</label> --}}

<div class="container">
    <div class="filtros">
        <h4>Filtros</h4>
        <h5 class="filtro_title">
            → Categoria
            <input type="radio" class="btn-check" name="tipoFilto" id="categoria" autocomplete="off" checked>
            <label class="radioFiltro btn btn btn-outline-primary" for="categoria"></label>
        </h5>
            <button type="button"
            class="categoria btn btn-outline-primary">primera</button><button type="button"
            class="categoria btn btn-outline-primary">segunda</button><button type="button"
            class="categoria btn btn-outline-primary">tercera</button>
        <h5 class="filtro_title">
            → Precio
            <input type="radio" class="btn-check" name="tipoFilto" id="precio" autocomplete="off" >
            <label class="radioFiltro btn btn-outline-primary" for="precio"></label>
        </h5>
    </div>
    <div class="vehiculos">
        <h3>Vehículos</h3>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Modelo</th>
                    <th>Marca</th>
                    <th>Color</th>
                    <th>Estado</th>
                    <th>Precio</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2013</td>
                    <td>Chevrolet Aveo</td>
                    <td>Azul</td>
                    <td>Nuevo</td>
                    <td>25000000</td>
                    <td><button type="button" class="btn btn-primary">Ver Vendedor</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection
