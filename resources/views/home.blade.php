<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,200;1,200&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/estilos.css')}}">

    <title>Hello, world!</title>
</head>

<body>
    <div class="d-flex">
        <div id="sidebar-container" class="bg-primary">
            <div class="logo">
                <h4 class="text-light font-weight-bold">Frefrigel</h4>
            </div>
            <div class="menu">
                <a href="" class="d-block p-3 text-light"><i class="icon ion-md-apps mr-2 lead"></i> Tablero</a>
                <a href="" class="d-block p-3 text-light"><i class="icon ion-md-person mr-2 lead"></i> Productos</a>
                <a href="" class="d-block p-3 text-light"><i class="icon ion-md-person mr-2 lead"></i> Clientes</a>
                <a href="" class="d-block p-3 text-light"><i class="icon ion-md-person mr-2 lead"></i> Ventas</a>
                <a href="" class="d-block p-3 text-light"><i class="icon ion-md-person mr-2 lead"></i> Usuarios</a>
            </div>
        </div>
        <div class="w-100">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <form class="form-inline position-relative my-2 d-inline-block">
                        <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Buscar">
                        <button class="btn btn-search position-absolute " type="submit"><i
                                class="icon ion-md-search"></i></button>
                    </form>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                                    aria-expanded="false">
                                    <img src="http://pm1.narvii.com/7920/23d0dc13cd9c52954d4cbb6daa3149de1f117f5fr1-554-554v2_00.jpg"
                                        class="img-fluid rounded-circle avatar mr-2">
                                    {{auth()->user()->name}}
                                </a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Mi Perfil</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" type="submit">Cerrar Sesion</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div id="content">
                <section class="py-3">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9">
                                <h1 class="font-weight-bold mb-0">Bienvenido {{auth()->user()->name}}</h1>
                                <p class="lead text-muted">Revisa la última información</p>
                            </div>
                            <div class="col-lg-3 d-flex">
                                <button class="btn btn-primary w-100 align-self-center">Descargar Reporte</button>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-mix">
                    <div class="container">
                        <div class="card rounded-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-muted">Ingresos Mensuales</h6>
                                            <h3 class="font-weight-bold">$50,000</h3>
                                            <h6 class="text-success"><i
                                                    class="icon ion-md-arrow-dropup-circle"></i>50.50%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-muted">Ingresos Mensuales</h6>
                                            <h3 class="font-weight-bold">$50,000</h3>
                                            <h6 class="text-success"><i
                                                    class="icon ion-md-arrow-dropup-circle"></i>50.50%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex stat my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-muted">Ingresos Mensuales</h6>
                                            <h3 class="font-weight-bold">$50,000</h3>
                                            <h6 class="text-success"><i
                                                    class="icon ion-md-arrow-dropup-circle"></i>50.50%</h6>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6 d-flex my-3">
                                        <div class="mx-auto">
                                            <h6 class="text-muted">Ingresos Mensuales</h6>
                                            <h3 class="font-weight-bold">$50,000</h3>
                                            <h6 class="text-success"><i
                                                    class="icon ion-md-arrow-dropup-circle"></i>50.50%</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section class="bg-grey">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 my-3">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light">
                                        <h5 class="font-weight-bold">Número de Usuarios de Paga</h5>
                                    </div>
                                    <div class="card-body">
                                        <div>
                                            <canvas id="myChart"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 my-3">
                                <div class="card rounded-0">
                                    <div class="card-header bg-light">
                                        <h6 class="font-weight-bold mb-0">Ventas Recientes</h6>
                                    </div>
                                    <div class="card-body pt-2">
                                        <div class="d-flex border-bottom py-2">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$ 250 </h6> 
                                                <span class="badge badge-success ml-2">10% descuento</span>
                                                <small class="d-block text-muted">Curso diseño Web</small>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom py-2">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$ 250 </h6> 
                                                <span class="badge badge-success ml-2">10% descuento</span>
                                                <small class="d-block text-muted">Curso diseño Web</small>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom py-2">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$ 250 </h6> 
                                                <span class="badge badge-success ml-2">10% descuento</span>
                                                <small class="d-block text-muted">Curso diseño Web</small>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom py-2">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$ 250 </h6> 
                                                <span class="badge badge-success ml-2">10% descuento</span>
                                                <small class="d-block text-muted">Curso diseño Web</small>
                                            </div>
                                        </div>
                                        <div class="d-flex border-bottom py-2 mb-3">
                                            <div class="d-flex mr-3">
                                                <h2 class="align-self-center mb-0"><i class="icon ion-md-pricetag"></i></h2>
                                            </div>
                                            <div class="align-self-center">
                                                <h6 class="d-inline-block mb-0">$ 250 </h6> 
                                                <span class="badge badge-success ml-2">10% descuento</span>
                                                <small class="d-block text-muted">Curso diseño Web</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="btn btn-primary w-100">Ver Todas</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Oct 2023', 'Nov 2023', 'Dic 2023', 'Ene 2024'],
                datasets: [{
                    label: 'Nuevos Usuarios',
                    backgroundColor: [
                        '#12C9E5',
                        '#12C9E5',
                        '#12C9E5',
                        '#111B54'
                    ],
                    maxBarThickness: 30,
                    borderColor: 'rgb(255, 99, 132)',
                    data: [50, 100, 150, 200],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });

    </script>
</body>

</html>
