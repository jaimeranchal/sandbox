"use strict";

$(()=>{
    // Asigno una función al segundo recuadro usando su clase
    // y un selector especial de jQuery
    $('.cuadro:last').on('click', desplazarse)
})

/**
 * Aplica una animación al elemento seleccionado
 */
let desplazarse = function() {
    // Utilizo el selector especial 'this' para aplicar
    // una animación sobre el cuadro en el que he pinchado
    // Opciones:
    // - Desplazate hasta un punto 500px a la derecha del borde izquierdo
    // de la pantalla
    // - Tarda 9 segundos en animarlo (9000 milisegundos)
    $(this).animate({ left: '500px' }, 9000)
}

