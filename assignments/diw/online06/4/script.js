"use strict";

$(()=>{
    // Asigno la función cambiaColor() a todos los divs hijos del
    // elemento con clase .colores, mediante un evento 'click'
    $(".colores").on('click', 'div', cambiaColor);
})

/**
 * Cambia el color del recuadro principal
 */
let cambiaColor = function() {
    // guarda el valor de la propiedad css 'color de fondo'
    // del cuadro que he pinchado en una variable
    let color = $(this).css('background-color');

    // asigno ese color como valor a la propiedad color de fondo
    // del recuadro principal, usando su id para seleccionarlo
    $('#muestra').css('background-color', color);
}
