@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Agregar Vehículo</h3>
    <form action="{{ route('vehiculos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="modelo" class="form-label">Placa</label>
            <input type="text" class="form-control" id="modelo" name="veh_placa" required>
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="number" class="form-control" id="modelo" name="veh_modelo" required>
        </div>
        <div class="mb-3">
            <label for="marca" class="form-label">Marca</label>
            <input type="text" class="form-control" id="marca" name="veh_marca" required>
        </div>
        <div class="mb-3">
            <label for="color" class="form-label">Color</label>
            <input type="text" class="form-control" id="color" name="veh_color" required>
        </div>
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select class="form-control" id="estado" name="veh_estado" required>
                <option value="Nuevo">Nuevo</option>
                <option value="Usado">Usado</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" class="form-control" id="precio" name="veh_precio" required>
        </div>
        <div class="mb-3">
            <label for="categoria" class="form-label">Categoría</label>
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
