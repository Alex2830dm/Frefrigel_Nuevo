<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}

    {{-- <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet"> --}}
    <link rel="shortcut icon" href="{{ asset('assets/imgs/frefrigel.ico') }}" />
    {{-- Estilos de DataTables --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <style>
        .nav_logout {
            position: relative;
            color: var(--first-color-light);
            margin-bottom: 1.5rem;
            transition: .3s;
            border: none;
            background: none;
            cursor: pointer;
            outline: none;
            display: grid;
            grid-template-columns: max-content max-content;
            align-items: center;
            column-gap: 1rem;
            padding: .5rem 0 .5rem 1.5rem
        }

        .nav_logout:hover {
            color: var(--white-color)
        }
    </style>
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    {{-- Scripts de DataTables --}}
    {{-- <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}
    <script defer src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <title>Frefrigel</title>
</head>

<body id="body-pd" background="#808B96">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        @yield('opciones')
        {{auth()->user()->name}}
        <div class="header_img"><img
                src="http://pm1.narvii.com/7920/23d0dc13cd9c52954d4cbb6daa3149de1f117f5fr1-554-554v2_00.jpg" alt=""
                width="100px"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> 
                <a href="{{-- {{route('inicio')}} --}}" class="nav_logo">
                    <i class='bx bx-layer nav_logo-icon'></i>
                    <span class="nav_logo-name">Frefrigel</span>
                </a>
                <div class="nav_list">
                    @can('productos.index')
                    <a href="{{ route('productos.index') }}" class="nav_link">
                        <i class='bx bxl-product-hunt'></i>
                        <span class="nav_name">Productos</span>
                    </a>
                    @endcan
                    @can('clientes.index')
                    <a href="{{ route('clientes.index')}}" class="nav_link">
                        <i class='bx bxs-user-account'></i>
                        <span class="nav_name">Clientes</span>
                    </a>
                    @endcan
                    @can('entradas.index')
                    <a href="{{ route('entradas.index') }}" class="nav_link">
                        <i class='bx bx-horizontal-right'></i>
                        <span class="nav_name">Entradas de Productos</span>
                    </a>
                    @endcan
                    @can('pedidos.index')
                    <a href="{{ route('pedidos.index') }}" class="nav_link">
                        <i class='bx bx-cart-add'></i>
                        <span class="nav_name">Realizar Pedido</span>
                    </a>
                    @endcan
                    @can('ventas.index')
                    <a href="{{ route('ventas.index') }}" class="nav_link">
                        <i class='bx bx-money-withdraw'></i>
                        <span class="nav_name">Ventas</span>
                    </a>
                    @endcan
                    @can('users.index')
                    <a href="{{ route('empleados.index')}}" class="nav_link">
                        <i class='bx bx-user'></i>
                        <span class="nav_name">Empleados</span>
                    </a>
                    @endcan
                    @can('users.index')
                    <a href="{{ route('users.index')}}" class="nav_link">
                        <i class='bx bx-user'></i>
                        <span class="nav_name">Usuarios</span>
                    </a>
                    @endcan
                    {{-- @can('')
                    <a href="{{url('clientes/enviar_comprobante')}}" class="nav_link">
                        <i class='bx bx-mail-send'></i>
                        <span class="nav_name">Enviar Comprobante Ventas</span>
                    </a>
                    @endcan --}}
                </div>
            </div>
            <form action="{{ route('logout') }}" method="post" id="logout-form">
                @csrf
                <button type="submit" class="nav_logout">
                    <i class='bx bx-left-arrow-alt'></i>
                    <span class="nav_name">Logout</span>
                </button>
            </form>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>FREFRIGEL - Bienvenido</h4>
        <hr>
    </div>
    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
    <script language="JavaScript" type="text/javascript" charset="utf8">
        $(document).ready(function(){
            var jq = jQuery.noConflict(true);
            new DataTable('#example');
            /* $("#tabla_id").DataTable({
                "pageLength": 3,
                lengthMenu:[
                    [3, 10, 25, 50],
                    [3, 10, 25, 50]
                ],
                "language":{
                    "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                }
            }); */
        });
    </script>
</body>

</html>
