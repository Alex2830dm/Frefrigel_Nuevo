<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Comprobante de Cotizacion</title>
    <style>
        .alert {
            padding: 20px;
            background-color: #E7E7E7;
            color: #212121;
            height: 75px;
            font-size: 12px;
            width: 84%;
        }

        .alert strong {
            color: #0479E0;
            font-size: 14px;
        }

        h4 {
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 12px;
        }

        .thead {
            background-color: #0479E0;
            color: #FFFFFF;
        }

    </style>
</head>

<body>
    @foreach ($ventas as $venta)
    <table>
        <tr >
            <td align="left">
                <img src="{{ asset('assets/imgs/logoFrefrigel.jpg') }}" height="60px" alt="">
            </td>
            <td bgcolor="#0479E0" align="right">
                <h3>Folio de Pedido <b> {{$venta->folio}} </b></h3>
            </td>
        </tr>
        <tr>
            <td>
                <div class="alert">
                    <strong>Receptor</strong> <br>
                    {{ $venta->nameClient }} <br>
                    <b>Contacto:</b> {{ $venta->contactClient }} - {{ $venta->jobcontactClient }} <br>
                    <b>Datos de Domicilio:</b> {{ $venta->addressStreet }}, {{ $venta->addressColony }}, {{ $venta->addressMunicipality }},
                        {{ $venta->addressState }}, {{ $venta->addressCP }}
                </div>
            </td>
            <td>
                <div class="alert">
                    <strong>Frefrigel S.A de C.V</strong> <br>
                    <b>Fecha/Hora de Pedido:</b> {{$venta->created_at}} <br>
                    
                </div>
            </td>
        </tr>
    </table>
    @endforeach
    <hr>
    <h4>Detalles del Pedido</h4>
    <table align="center">
        <thead>
            <tr class="thead">
                <th scope="col" width="50">Cód.</th>
                <th scope="col">Producto</th>
                <th scope="col">Cantidad Pedida</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalles_venta as $detalle)
            <tr align="center">
                <td>{{ $detalle->id_producto }}</td>
                <td>{{ $detalle->descripcion }}</td>
                <td>{{$detalle->cantidad_venta}} - {{$detalle->unitProduct}}</td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
