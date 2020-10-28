/* Ejercicio 4: imprime en bucle
 * Solicita una cadena mediante prompt()
 * Imprime cada 3 segundos mediante setInterval()
 * Finaliza a los 20 segundos
 */
"use strict";

// Variables
var intervalo, bucle;
let mensaje;

// Funciones
function iniciar(){
    // Obtenemos el mensaje
    mensaje = prompt("Introduce tu mensaje: ");
    // Llamamos a la función imprimir mensaje cada 3 segundos
    bucle = setInterval(imprimir, 3000);;
    // a los 20 segundos, invocamos a la función parar, que
    // detiene el bucle anterior
    intervalo = setTimeout(parar, 20000);
}

function imprimir(){
    console.log(mensaje);
}

function parar() {
    // Detiene un "bucle" referido mediante una variable
    clearInterval(bucle);
}
//
