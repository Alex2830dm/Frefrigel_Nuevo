//alert("conectando js");
//boton ir arriba
/*IR ARRIBA-----------------------*/
$('.ir-arriba').click(function(){
    $('body, html').animate({
    scrollTop:'0px'
    }, 500);
})


$(window).scroll(function(){

   if( $(this).scrollTop() > 0 ){
       $('.ir-arriba').slideDown(300);

   } else {
       $('.ir-arriba').slideUp(300);
   }

})

//NAV 

// definimos a la variable stick
//igual a seleccionar la clase .menu
let stick = $('nav');
//creamos la variable stickTop 
//igual a la funcion de offet().top
//que se asigna a la variable sitck
//para obtener el valor top (tope) de scroll
     let stickTop = stick.offset().top;
     
//creamos la funcion fixer     
     let fixer = function(){
//definimos la variable scrollTop igual
//al valor del scroll de la ventana del view port 
         let scrollTop = $(window).scrollTop();
//creamos una condicional, si el scroll de la ventana
//del navegador es mayor igual al valor del scroll de stick
             if( scrollTop >= stickTop) {
//entonces agregar a la clase SELECCIONADA NAV, la clase
// FIXED O fijar menu que se declara en estilos.css
                 $('nav').addClass('fixed');
//entonces agregar a la clase .logo2 la clase .logo-stick
                 $('header').addClass('fixed2');
             } else {
//si el valor no es igual o cambia a menor
//entonces remover las clases antes adicionadas
                 $('nav').removeClass('fixed');
                 $('header').removeClass('fixed2');
         }
}
//aplicamos y ejecutamos la función
$(window).on('scroll',fixer);
