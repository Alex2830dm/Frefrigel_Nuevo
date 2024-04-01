<DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Frefrigel</title>
        <link rel="shortcut icon" href="{{ asset('assets/imgs/frefrigel.ico') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/estilos.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/fondo.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/media.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}" />
        <link rel="stylesheet" href="{{ asset('assets/css/fonts.css') }}" />
    </head>

    <body>
        <section class="seccion1">
            <div class="fondo"><span class="ir-arriba icon-circle-up"></span>
                <header class="colores"><img class="imagen" src="{{ asset('assets/imgs/logo.png') }}" alt="logo-empresa" width="150" />
                    <h1 class="titulo">FREFRIGEL S.A. DE C.V.</h1>
                </header>
                <nav>
                    <ul class="menu">
                        <li><a href="#seccion1">Inicio</a></li>
                        <li><a href="#seccion2">Nosotros</a></li>
                        <li><a href="#">Productos</a></li>
                        <li><a href="{{ route('login') }}">Sistema</a></li>
                        <li><a href="galeria.html">Galeria</a></li>
                        <li><a href="#seccion4">Contacto</a></li>
                    </ul>
                </nav>
                <div class="slider">
                    <ul class="anuncios">
                        <li><img class="imagen" src="{{ asset('assets/imgs/slider/s1.png') }}" alt="" /></li>
                        <li><img class="imagen" src="{{ asset('assets/imgs/slider/s2.png') }}" alt="" /></li>
                        <li><img class="imagen" src="{{ asset('assets/imgs/slider/s3.png') }}" alt="" /></li>
                        <li><img class="imagen" src="{{ asset('assets/imgs/slider/s4.png') }}" alt="" /></li>
                    </ul>
                </div>
                <marquee>
                    <figure> <img src="{{ asset('assets/imgs/logo1.png') }}" width="75" /><span>-----Tel. Oficina 722 2734227 Cel. 722
                            2549416-----</span><img src="{{ asset('assets/imgs/logo1.png') }}" width="75" /><img src="{{ asset('assets/imgs/letras.png') }}"
                            width="200" /><span>-----COMPROMETIDOS CON EL CLIENTE-----</span></figure>
                </marquee>
                <h2 class="subtitulo shadow">PRODUCTOS FREFRIGEL </h2>
                <div class="contenido">
                    <div class="caja">
                        <figure><img class="imagen" src="{{ asset('assets/imgs/imagenes/gel.jpg') }}" width="350" />
                            <figcaption>
                                <h3>CONGELADAS Y GELATINAS</h3>
                            </figcaption>
                        </figure>
                        <p class="boton">más..</p>
                    </div>
                    <div class="caja">
                        <figure> <img class="imagen" src="{{ asset('assets/imgs/imagenes/gomas.jpg') }}" width="350" />
                            <figcaption>
                                <h3>GOMAS Y MALVAVISCOS</h3>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="caja">
                        <figure> <img class="imagen" src="{{ asset('assets/imgs/imagenes/tamarindos.jpg') }}" width="350" />
                            <figcaption>
                                <h3>TAMARINDOS</h3>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <div class="logo">
                    <figure> <img src="{{ asset('assets/imgs/logo1.png') }}" width="100" />
                        <h2 class="subtitulo shadow">DISTRIBUCIÓN DULCES</h2>
                    </figure>
                </div>
                <div class="contenido">
                    <div class="caja">
                        <figure> <img class="imagen" src="{{ asset('assets/imgs/imagenes/dulces.jpg') }}" width="350" />
                            <figcaption>
                                <h3>DULCES</h3>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="caja">
                        <figure> <img class="imagen" src="{{ asset('assets/imgs/imagenes/cocadas.jpg') }}" width="350" />
                            <figcaption>
                                <h3>COCADAS Y COCOS</h3>
                            </figcaption>
                        </figure>
                    </div>
                    <div class="caja">
                        <figure> <img class="imagen" src="{{ asset('assets/imgs/imagenes/estuches.jpg') }}" width="350" />
                            <figcaption>
                                <h3>ESTUCHES</h3>
                            </figcaption>
                        </figure>
                    </div>
                </div>
                <section class="seccion2">
                    <div class="logo">
                        <figure>
                            <h2 class="subtitulo shadow">NUESTRA MISIÓN </h2>
                        </figure>
                    </div>
                    <div class="contenido">
                        <div class="caja1">
                            <div class="texto">
                                <h2>Nuestra misión es ofrecerles lineas de productos que le generen amplio margen de
                                    utilidad, así mismo, constantemente estamos ofreciendo nuevas novedades y dulces con
                                    precios competitivos </h2>
                            </div>
                            <figure> <img class="imagen" src="{{ asset('assets/imgs/imagenes/gorda.png') }}" width="250" /></figure>
                        </div>
                        <div class="caja1">
                            <figure> <img class="imagen" src="{{ asset('assets/imgs/imagenes/cocodrilos.png') }}" width="250" />
                                <figcaption>
                                    <p>Gomitas cocodrilo</p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                    <div class="logo">
                        <figure>
                            <h2 class="subtitulo shadow">SERVICIOS </h2>
                        </figure>
                    </div>
                    <div class="contenido">
                        <div class="caja1">
                            <div class="texto">
                                <h2>Entregamos las mercancias en diferentes municipios del Estado de Mexico, se hace
                                    devoluciones por productos sin rotacion, dano u otra situacion, segun lo amerite
                                </h2>
                                <h2>Contáctanos al Tel. 722 273 4227 estamos a sus órdenes de Lunes a Sábado 10:00 hrs a
                                    17:00 hrs.</h2>
                            </div>
                            <figure> <img class="imagen" src="{{ asset('assets/imgs/imagenes/cajas.png') }}" width="250" /></figure>
                        </div>
                        <div class="caja1">
                            <div class="texto">
                                <h2>Venta a Dulcerias, mayoristas, medio mayoreo, comercios diversos</h2>
                            </div>
                            <figure> <img class="imagen" src="{{ asset('assets/imgs/imagenes/mavi.jpg') }}" width="350" />
                                <figcaption>
                                    <p>Dulcerias</p>
                                </figcaption>
                            </figure>
                        </div>
                    </div>
                </section>
            </div>
        </section>
        <script src="{{ asset('assets/js/jquery-3.1.0.js') }}"></script>
        <script src="{{ asset('assets/js/codigos.js') }}"></script>
    </body>

    </html>
