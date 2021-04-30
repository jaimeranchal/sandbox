"use strict";

/**
 * NOTA:
 * Este es una modificación del anterior, con la dificultad
 * de que la animación debía ser infinita para que tuviera sentido
 * pararla.
 * Para resolverlo, he optado por hacer recursiva la animación
 */

$(()=>{
    // asigno las funciones animar y parar a los botones respectivos
    // usando sus ids para seleccionarlos
    $("#animar").on('click', animar);    
    $("#parar").on('click', parar);    
})

/**
 * Aumenta progresivamente el tamaño del elemento
 * y lo desplaza a la derecha de forma indefinida
 */
let animar = () => {
    // Selecciono el elemento con clase cuadro y aplico una animación
    $('.cuadro').animate(
        {
            left: "+=50",   // en cada paso aumenta en 50px la posición del elemento con respecto al borde izquierdo
            width: "+=50",  // en cada paso aumenta en 50px el ancho del elemento
            height: "+=50", // en cada paso aumenta en 50px el ancho del elemento
        }, 
        5000, // la animación durará 5 segundos
        () => animar()); // para que sea infinita, vuelvo a llamar a la función animar
}

/**
 * Detiene la animación del elemento seleccionado
 */
let parar = () => {
    // Utilizao la función stop para detener la animación del cuadro
    // usando su clase para seleciconarla
    $('.cuadro').stop(true);
}
