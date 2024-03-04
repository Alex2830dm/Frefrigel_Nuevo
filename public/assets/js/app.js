//Variable que mantiene el estado visivle del carrito
var carritoVisible = false;

//Esperamos que todos los elementos de la página se carguen para continuar con el script
if(document.readyState=='loading') {
    document.addEventListener('DOMContentLoaded', ready)
} else {

    ready();
}

function ready(){
    //Agregamos funcionalidad a los botones de eliminar del carrito
    var botonesEliminarItem = document.getElementsByClassName("btn-eliminar")
    for(var i =0; i< botonesEliminarItem.length;i++) {
        var button = botonesEliminarItem[i];
        button.addEventListener('click', eliminarItemCarrito);
    }

    //Se agrega la funcion de sumar cantidad
    var botonesSumarCantidad = document.getElementsByClassName("sumar-cantidad");
    for(var i=0; i<botonesSumarCantidad.length;i++) {
        var button = botonesSumarCantidad[i];
        button.addEventListener('click', sumarCantidad);
    }

    //Se agrega la funcion de restar cantidad
    var botonesRestarCantidad = document.getElementsByClassName("restar-cantidad");
    for(var i=0; i<botonesRestarCantidad.length;i++) {
        var button = botonesRestarCantidad[i];
        button.addEventListener('click', restarCantidad);
    }

    //Se agrega la funcion a los botones "Agregar al Carrito"
    var botonesAgregarAlCarrito = document.getElementsByClassName("boton-item");
    for(var i=0; i<botonesAgregarAlCarrito.length;i++) {
        var button = botonesAgregarAlCarrito[i];
        button.addEventListener('click', agregarAlCarritoClicked);
    }

    //SE agrega la funcionalidad al boton pagar
    document.getElementsByClassName("btn-pagar")[0].addEventListener('click', pagarClicked);
}

//Elimina el item seleccionado del carrito
function eliminarItemCarrito(event) {
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();

    //Actualiamos el total del carrito cuando se haya eliminado un item
    actualizarTotalCarrito();

    //La siguiente funcion controla si hay elementos en el carrito una vez que se elimino si no hay que ocultar el carrito
    ocultarCarrito();
}

//Actualiza el total del carrito
function actualizarTotalCarrito(){
    //Seleccionamos el contenedor carrito
    var carrtioContenedor = document.getElementsByClassName("carrito")[0];
    var carritoItems = carrtioContenedor.getElementsByClassName("carrito-item");
    var total = 0;

    //recorremos cada elementos del carrito para actualizar el total 
    for(var i=0; i<carritoItems.length;i++){
        var item = carritoItems[i];
        var precioElemento = item.getElementsByClassName("carrito-item-precio")[0];
        console.log(precioElemento);
        //quitamos el simbolo de pesos 
        var precio = parseFloat(precioElemento.innerText.replace('$', '').replace('.',''));
        console.log(precio)
        var cantidadItem = item.getElementsByClassName("carrito-item-cantidad")[0];
        var cantidad = cantidadItem.value;
        console.log(cantidad);
        total = total + (precio * cantidad)
    }
    total = Math.round(total*100)/100;
    document.getElementsByClassName('carrtio-precio-total')[0].innerText = '$'+total.toLocaleString("es") + ",00";
}

//Funciòn que controla si hay elementos en el carrito. Si no hay oculto el carrito.
function ocultarCarrito(){
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    if(carritoItems.childElementCount==0){
        var carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.marginRight = '-100%';
        carrito.style.opacity = '0';
        carritoVisible = false;
        
        var items =document.getElementsByClassName('contenedor-items')[0];
        items.style.width = '100%';
    }
}

//Se aumenta en uno la cantidad del elemento seleccionado 
function sumarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;

    cantidadActual++;
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    //Actualizamos el total
    actualizarTotalCarrito();
}

function restarCantidad(event) {
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;

    cantidadActual--;
    //Se controla que no sea menor que 1
    if(cantidadActual>=1) {
        selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
        //Actualizamos el total
        actualizarTotalCarrito();
    }
}

function agregarAlCarritoClicked(event) {
    var button = event.target;
    var item = button.parentElement;
    var titulo = item.getElementsByClassName("titulo-item")[0].innerText;
    console.log(titulo)
    var precio = item.getElementsByClassName("precio-item")[0].innerText;
    var imagenSrc = item.getElementsByClassName("img-item")[0].src;
    console.log(imagenSrc);

    //Función para agregar el elemento al carrito
    agregarItemAlCarrito(titulo, precio, imagenSrc);

    //Se hcae visible el carrito cuando se agregre por primera vez
    hacerVisibleCarrito();
}

function agregarItemAlCarrito(titulo, precio, imagenSrc) {
    var item = document.createElement('div');
    item.classList.add = 'item';
    var itemsCarrito = document.getElementsByClassName("carrito-items")[0];

    //
    var nombresItemsCarrito = itemsCarrito.getElementsByClassName("carrito-item-titulo");
    for(var i=0; i < nombresItemsCarrito.length; i++) {
        if(nombresItemsCarrito[i].innerText == titulo) {
            alert('El Producto ya se encuentra en el carrito');
            return
        }
    }

    var itemCarritoContenido = `
        <div class="carrito-item">
            <img src="${imagenSrc}" alt="" width="80px">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">
                    ${titulo}
                </span>
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="2" class="carrito-item-cantidad" name="" id="" disabled>
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
            <span class="btn-eliminar"><i class="fa-solid fa-trash"></i></span>
        </div>
    `
    item.innerHTML = itemCarritoContenido;
    itemsCarrito.append(item);

    //Se agrega la funcionalidad de eliminar  del nuevo item
    item.getElementsByClassName("btn-eliminar")[0].addEventListener('click', eliminarItemCarrito);

    //Se agrega la funcionalidad de sumar del nuevo item
    var botonSumarCantidad = item.getElementsByClassName("sumar-cantidad")[0];
    botonSumarCantidad.addEventListener('click', sumarCantidad);

    //Se agrega la funcionalidad de restar
    var botonRestarCantidad = item.getElementsByClassName("restar-cantidad")[0];
    botonRestarCantidad.addEventListener("click", restarCantidad);
}

function pagarClicked(event) {
    alert("Gracias por su pedido");
    //Se elimina todos los elementos del carrito
    var carritoItems = document.getElementsByClassName("carrito-items")[0];
    while(carritoItems.hasChildNodes()) {
        carritoItems.removeChild(carritoItems.firstChild);
    }
    actualizarTotalCarrito();

    //Funcion para ocultar el carrito
    ocultarCarrito;
}

function hacerVisibleCarrito() {

    carritoVisible = true;
    var carrito = document.getElementsByClassName("carrito")[0];
    carrito.style.marginRight = "0";
    carrito.style.opacity = "1";

    var items = document.getElementsByClassName("contenedor-items")[0];
    items.style.width = "60%";
}