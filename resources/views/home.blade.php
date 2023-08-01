<link rel="stylesheet" href="{{asset('assets/css/vehiculos.css')}}">
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="filtros">
        <div class="titiloFiltros">
            <h4>Filtros</h4>
            <a class="btn btn-danger" href="/">x</a>
        </div>
        <h5 class="filtro_title">
            → Categoria
        </h5>
        <form action="{{ route('vehiculos.index') }}" method="GET">
            @foreach ($categorias as $categoria)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="categoria" value="{{ $categoria->cat_id }}" id="categoria_{{ $categoria->cat_id }}" {{ $categoriaId == $categoria->cat_id ? 'checked' : '' }}>
                    <label class="form-check-label" for="categoria_{{ $categoria->cat_id }}">
                        {{ $categoria->cat_tipo }}
                    </label>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
        </form>
        <h5 class="filtro_title">
            → Precio
        </h5>
        <form action="{{ route('vehiculos.index') }}" method="GET">
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" name="precio_minimo" placeholder="Mínimo" value="{{ $precioMinimo }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text">$</span>
                <input type="text" class="form-control" name="precio_maximo" placeholder="Máximo" value="{{ $precioMaximo }}">
            </div>
            <button type="submit" class="btn btn-primary">Aplicar Filtro</button>
        </form>
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
                    @if ($request->filled('precio_minimo') && $request->filled('precio_maximo'))
                        <th>Telefono</th>
                    @endif
                    @if (!$request->filled('precio_minimo') && !$request->filled('precio_maximo'))
                        <th>Detalles</th>
                    @endif
                    <th class="d-none">Categoria</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->veh_modelo }}</td>
                    <td>{{ $vehiculo->veh_marca }}</td>
                    <td>{{ $vehiculo->veh_color }}</td>
                    <td>{{ $vehiculo->veh_estado }}</td>
                    <td>{{ $vehiculo->veh_precio }}</td>
                    @if ($request->filled('precio_minimo') && $request->filled('precio_maximo'))
                        <td>{{ $vehiculo->datosPersonales->data_telefono }}</td>
                    @endif
                    <td>
                        @if (!$request->filled('precio_minimo') && !$request->filled('precio_maximo'))
                            <button 
                            type="button" 
                            class="btn btn-primary btn-ver-vendedor" 
                            data-toggle="modal" 
                            data-target="#modalVendedor"
                            data-nombre="{{ $vehiculo->datosPersonales->data_nombre }} {{ $vehiculo->datosPersonales->data_apellido }}"
                            data-telefono="{{ $vehiculo->datosPersonales->data_telefono }}"
                            data-correo="{{ $vehiculo->datosPersonales->data_correo }}">
                            Ver Vendedor
                            </button>
                        @endif
                    </td>
                    <td class="d-none">{{ $vehiculo->categoria->cat_tipo }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal para mostrar información del vendedor -->
<div class="modal fade" id="modalVendedor" tabindex="-1" role="dialog" aria-labelledby="modalVendedorLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVendedorLabel">Información del Vendedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Nombre: <span id="nombreVendedor"></span></p>
                <p>Teléfono: <span id="telefonoVendedor"></span></p>
                <p>Correo: <span id="correoVendedor"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Función para mostrar la información del vendedor en el modal
    $('.btn-ver-vendedor').on('click', function () {
        console.log("HOLAA")
        var nombre = $(this).data('nombre');
        var telefono = $(this).data('telefono');
        var correo = $(this).data('correo');
        console.log(nombre, telefono, correo)
        $('#nombreVendedor').text(nombre);
        $('#telefonoVendedor').text(telefono);
        $('#correoVendedor').text(correo);
    });
</script>
@endsection
