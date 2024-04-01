<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Frefrigel</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{asset('assets/imgs/letras.png')}}" alt="" height="24">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @can('productos.index')
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('productos.index') }}">Productos</a>
                    </li>
                    @endcan
                    @can('clientes.index')
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('clientes.index') }}">Clientes</a>
                    </li>
                    @endcan
                    @can('pedidos.index')
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('pedidos.index') }}">Pedidos</a>
                    </li>
                    @endcan
                    @can('users.index')
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('empleados.index') }}">Empleados</a>
                    </li>
                    @endcan
                    @can('users.index')
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('users.index') }}">Usuarios</a>
                    </li>
                    @endcan
                </ul>
                <div class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{auth()->user()->name}}
                    </a>

                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="post" id="logout-form">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    Cerrar Sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav> <br>
    <div class="container">
        @yield('titulo')
        @yield('contenido')
    </div>

    @yield('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
