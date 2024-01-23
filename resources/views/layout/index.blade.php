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
    @yield('estilos')
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
                    <a href="{{ route('products.index') }}" class="nav_link">
                        <i class='bx bxl-product-hunt'></i>
                        <span class="nav_name">Productos</span>
                    </a>
                    <a href="{{ route('clientes.index')}}" class="nav_link">
                        <i class='bx bxs-user-account'></i>
                        <span class="nav_name">Clientes</span>
                    </a>
                    <a href="{{ route('entradas.index') }}" class="nav_link">
                        <i class='bx bx-money-withdraw'></i>
                        <span class="nav_name">Entradas de Productos</span>
                    </a>
                    <a href="{{ route('ventas.index') }}" class="nav_link">
                        <i class='bx bx-money-withdraw'></i>
                        <span class="nav_name">Ventas</span>
                    </a>
                    <a href="{{ route('users.index')}}" class="nav_link">
                        <i class='bx bx-user'></i>
                        <span class="nav_name">Usuarios</span>
                    </a>
                    <a href="{{url('clientes/enviar_comprobante')}}" class="nav_link">
                        <i class='bx bx-mail-send'></i>
                        <span class="nav_name">Enviar Comprobante Ventas</span>
                    </a>
                </div>
            </div>
            <a href="{{ route('logout') }}" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i>
                <span class="nav_name">SignOut</span>
            </a>
        </nav>
    </div>
    <!--Container Main start-->
    <div class="height-100 bg-light">
        <h4>FREFRIGEL - @yield('titulo')</h4>
        <hr>
        @yield('contenido')
    </div>
    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
    @yield('scripts')
    <script language="JavaScript" type="text/javascript" charset="utf8">
        $(document).ready(function(){
            //new DataTable('#example');
            $("#tabla_id").DataTable({
                "pageLength": 3,
                lengthMenu:[
                    [3, 10, 25, 50],
                    [3, 10, 25, 50]
                ],
                "language":{
                    "url": "https://cdn.datatables.net/plug-ins/1.13.1/i18n/es-ES.json"
                }
            });
        });
    </script>
</body>

</html>
