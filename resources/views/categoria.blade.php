<!-- categoria.blade.php -->
@extends('layouts.app')

@section('content')
    <!-- Contenido específico de la categoría -->
    <div class="container">
        <h1>Vehículos de la categoría {{ $categoria->cat_tipo }}</h1>
        <!-- Aquí los botones para cada categoría (opcional si deseas mostrarlos en ambas vistas) -->
        <div class="d-flex flex-wrap">
            @foreach ($categorias as $categoriaBoton)
                <a href="{{ route('vehiculos.categoria', $categoriaBoton->cat_id) }}" class="btn btn-outline-primary {{ $categoria->cat_id == $categoriaBoton->cat_id ? 'active' : '' }}">{{ $categoriaBoton->cat_tipo }}</a>
            @endforeach
        </div>
        <div class="vehiculos">
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
                    @foreach ($vehiculos as $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->veh_modelo }}</td>
                        <td>{{ $vehiculo->veh_marca }}</td>
                        <td>{{ $vehiculo->veh_color }}</td>
                        <td>{{ $vehiculo->veh_estado }}</td>
                        <td>{{ $vehiculo->veh_precio }}</td>
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
