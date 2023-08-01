<link rel="stylesheet" href="{{asset('assets/css/vehiculos.css')}}">
@extends('layouts.app')

@section('content')

<div class="container">
    <div class="filtros">
        <h4>Filtros</h4>
        <h5 class="filtro_title">
            → Categoria
        </h5>
        @foreach ($categorias as $categoria)
            <a href="{{ route('vehiculos.categoria', $categoria->cat_id) }}" class="btn btn-outline-primary">{{ $categoria->cat_tipo }}</a>
        @endforeach
        <h5 class="filtro_title">
            → Precio
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
                    <th>Telefono</th>
                    <th>Detalles</th>
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
                    <td>{{ $vehiculo->datosPersonales->data_telefono }}</td>
                    <td>
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
