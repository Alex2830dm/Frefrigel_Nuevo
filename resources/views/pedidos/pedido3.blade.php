<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/estilo.css')}}">
    <script src="{{asset('assets/js/app.js')}}" async></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Frefrigel</title>
</head>
<body>
    <header>
        <h1>Realizar Pedido</h1>
    </header>
    <section class="contenedor">
        <div class="contenedor-items">
            @foreach ($productos as $producto)
            <div class="item">
                <span class="titulo-item">{{$producto->descriptionProduct}}</span>
                <img src="{{ asset('assets/imgs/products/'.$producto->foto)}}" alt="" class="img-item">
                <span class="precio-item">${{$producto->priceProduct}}</span>
                <button class="boton-item">Agregar al Pedido</button>
            </div>
            @endforeach
        </div>

        {{-- carrito de pedido --}}
        <div class="carrito">
            <div class="header-carrito">
                <h2>Tu Pedido</h2>
            </div>
            <div class="carrito-items">
                {{-- <div class="carrito-item">
                    <img src="{{asset('assets/imgs/products/fotoProducto.jpg')}}" alt="" width="80px">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">
                            Box Engase
                        </span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="1" class="carrito-item-cantidad" name="" id="" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$15.00</span>
                    </div>
                    <span class="btn-eliminar"><i class="fa-solid fa-trash"></i></span>
                </div>
                <div class="carrito-item">
                    <img src="{{asset('assets/imgs/products/fotoProducto.jpg')}}" alt="" width="80px">
                    <div class="carrito-item-detalles">
                        <span class="carrito-item-titulo">
                            Box Engase
                        </span>
                        <div class="selector-cantidad">
                            <i class="fa-solid fa-minus restar-cantidad"></i>
                            <input type="text" value="2" class="carrito-item-cantidad" name="" id="" disabled>
                            <i class="fa-solid fa-plus sumar-cantidad"></i>
                        </div>
                        <span class="carrito-item-precio">$45.00</span>
                    </div>
                    <span class="btn-eliminar"><i class="fa-solid fa-trash"></i></span>
                </div> --}}
            </div>
            <div class="carrito-total">
                <div class="fila">
                    <strong>Tu Total</strong>
                    <span class="carrtio-precio-total"></span>
                </div>
                <button class="btn-pagar">Pagar <i class="fa-solid fa-bag-shopping"></i></button>
            </div>
        </div>
    </section>
</body>
</html>