<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
    
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" >
    <link rel="shortcut icon" href="{{ asset('assets/imgs/frefrigel.ico') }}" />
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <script src="{{asset('assets/js/jquery-3.6.0.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Frefrigel</title>
</head>

<body id="body-pd" background="#808B96">
    @if(session('message'))
    <script>
        Swal.fire({icon:"success", title:"Proceso Realizado Correctamente"});
    </script>
    @endif
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        @yield('opciones')
        {{auth()->user()->name}}
        <div class="header_img"><img src="{{ asset('assets/imgs/users/'.auth()->user()->foto ) }}"
                alt="" width="100px"> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="{{-- {{route('inicio')}} --}}" class="nav_logo"> 
                <i class='bx bx-layer nav_logo-icon'></i> 
                <span class="nav_logo-name">Frefrigel</span> </a>
                
                <div class="nav_list">
                    <a href="{{route('products.index')}}" class="nav_link"> 
                        <i class='bx bxl-product-hunt' ></i>
                        <span class="nav_name">Productos</span>
                    </a> 
                    <a href="{{url('entradas/')}}" class="nav_link">
                        <i class='bx bx-cart-add' ></i>
                        <span class="nav_name">Entradas de Productos</span> 
                    </a>
                    <a href="{{url('clientes/')}}" class="nav_link">
                        <i class='bx bxs-user-account' ></i>
                        <span class="nav_name">Clientes</span> 
                    </a>
                    {{-- <a href="{{url('ventas/')}}" class="nav_link">
                        <i class='bx bx-list-plus'></i>
                        <span class="nav_name">Preventas</span> 
                    </a> --}}
                    <a href="{{url('ventas/')}}" class="nav_link">
                        <i class='bx bx-money-withdraw' ></i>
                        <span class="nav_name">Ventas</span> 
                    </a>
                    <a href="{{url('users/')}}" class="nav_link"> 
                        <i class='bx bx-user' ></i> 
                        <span class="nav_name">Usuarios</span> 
                    </a>
                    <a href="{{route('roles.index')}}" class="nav_link"> 
                        <i class='bx bx-lock-alt' ></i>
                        <span class="nav_name">Roles</span> 
                    </a>
                        {{-- @if (auth()->user()->name = 1)
                        <a href="{{url('usuarios/')}}" class="nav_link"> 
                            <i class='bx bx-user' ></i> 
                            <span class="nav_name">Usuarios</span> 
                        </a>
                        <a href="{{url('clientes/enviar_comprobante')}}" class="nav_link"> 
                            <i class='bx bx-mail-send'></i>
                            <span class="nav_name">Enviar Comprobante Ventas</span> 
                        </a>
                    @endif --}}
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
        <h4>FREFRIGEL - @yield('titulo')</h4><hr>
        @yield('contenido')
    </div>
    <!--Container Main end-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/functions.js')}}"></script>
</body>

</html>