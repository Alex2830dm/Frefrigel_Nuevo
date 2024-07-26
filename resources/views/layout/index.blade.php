<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frefrigel</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/vendors/iconly/bold.css') }}">

    <link rel="stylesheet" href="{{ asset('dist/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/vendors/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/imgs/frefrigel.ico') }}" />
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="{{ asset('assets/imgs/letras.png') }}" width="200px" alt=""
                                    class="text-center"></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item active ">
                            <a href="{{ route('productos.index') }}" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Productos</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('clientes.index') }}" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Clientes</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('pedidos.index') }}" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Pedidos</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="{{ route('produccion.dia') }}" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Producción</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>FREFRIGEL</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>@yield('titulo')</h4>
                                    </div>
                                    <div class="card-body">
                                        @yield('contenido')
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2021 &copy; Mazer</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a
                                href="http://ahmadsaugi.com">A. Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="{{ asset('dist/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>

    <script src="{{ asset('dist/vendors/apexcharts/apexcharts.js') }}"></script>
    <script src="{{ asset('dist/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('dist/js/main.js') }}"></script>
</body>

</html>
