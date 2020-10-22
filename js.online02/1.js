/* Ejercicio 1:
 *  - Crear 10 ventanas desde la ventana principal, indicando "Ventana Secundaria 1, 2, ..."
 *  - El tamaño de la ventana será 300pxX300px
 *  - En la ventana secundaria tendrá un botón Cerrar que permitirá cerrar esa ventana
 */
"use strict";

// declarar variables

//! Añade al texto a la MISMA ventana
function abrir(){
    // ventana = window.open("https://iestrassierra.com", "ventana");
    for (var i = 0; i < 10; i++) {
        let ventana;
        ventana = open("", "ventana", "width=300, height=300");
        //ventana = open("", "ventana" + i, "width=500, height=600");
        ventana.document.write("<h1>Ventana secundaria" + (i+1) + "</h1>");
        ventana.document.write("<button>Cerrar ventana</button>");
    } 
}

//! no sé invocar esta función desde CADA ventana
function cerrSec(){
    ventana.close();
    ventana=undefined;
}