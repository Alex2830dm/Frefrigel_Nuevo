<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Comprobante de Pedido</title>
</head>

<body>
    @foreach ($ventas as $venta)
    <table>
        <tr align="rigth">
            <td>
                <div class="alert alert-success" role="alert" style="width: 80%">
                    <h4 class="alert-heading"> {{ $venta->rsCliente }} </h4>
                    <p>
                        <h5 class="card-title">{{ $venta->contactClient }} - {{ $venta->jobcontactClient }}</h5>
                    </p>
                    <hr>
                    <p class="mb-0">
                        Dirección de Entrega: {{ $venta->addressStreet }}, {{ $venta->addressColony }}, {{ $venta->addressMunicipality }},
                        {{ $venta->addressState }}, {{ $venta->addressCP }}
                    </p>
                </div>
            </td>
            <td>
                <div class="alert alert-success" role="alert" style="width: 80%">
                    <h4 class="alert-heading"> Frefrigel S.A de C.V </h4>
                    <hr>
                    <p class="mb-0">
                        Juan Escutia, San Miguel Totoltepec, Toluca, México, 520200
                    </p>
                </div>
            </td>
        </tr>
    </table>
    @endforeach
    <hr>
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="table-responsive">
                <table class="table text-center align-middle table-bordered table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad Vendida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles_venta as $detalle)
                        <tr>
                            <td>
                                {{$detalle->descripcion}} </td>
                            <td>
                                {{$detalle->cantidad_venta}} - {{$detalle->unitProduct}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
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
</body>

</html>
