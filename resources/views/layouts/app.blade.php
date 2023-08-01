<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SenaSoft</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/index.css')}}">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light menuSuperior">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{asset('assets/img/Logo.png')}}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                        @else
                        <div class="btn-group">
                            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                {{ Auth::user()->datosPersonales->data_nombre }} {{ Auth::user()->datosPersonales->data_apellido }}
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <select class="select btn" id="roleSelect">
                                        @if (Auth::user()->tieneRol('1'))
                                            <option>Comprador</option>
                                        @endif
                                        @if (Auth::user()->tieneRol('2'))
                                            <option>Vendedor</option>
                                        @endif
                                    </select>
                                </li>
                                <li id="agregarVehiculoOption" style="display: none;">
                                    <a class="dropdown-item" href="{{ route('vehiculos.agregar') }}">Agregar vehiculo</a>
                                </li>
                                <li id="editarPerfilOption" style="display: none;">
                                    <a class="dropdown-item" href="">Editar perfil</a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        Cerrar Sesión
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                                                              
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="p-4 main" style="width:100%;height: calc(100vh - 56px - 56px);overflow:auto;">
            @yield('content')
        </main>
        <footer>
            Camila Arias © Prueba Senasoft 2023
        </footer>
    </div>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --}}
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js"
        integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous">
    </script>
<script>
    $(document).ready(function () {
        // Function to toggle the visibility of the "Editar perfil" and "Agregar vehiculo" options
        function toggleOptions() {
            var roleSelect = $("#roleSelect");
            var editarPerfilOption = $("#editarPerfilOption");
            var agregarVehiculoOption = $("#agregarVehiculoOption");

            // Check if the selected value is "Vendedor" (role id 2)
            if (roleSelect.val() === "Vendedor") {
                editarPerfilOption.show();
                agregarVehiculoOption.show();
            } else {
                editarPerfilOption.hide();
                agregarVehiculoOption.hide();
            }
        }

        // Call the function on page load
        toggleOptions();

        // Call the function when the dropdown selection changes
        $("#roleSelect").change(function () {
            toggleOptions();
        });
    });
</script>

</body>

</html>
