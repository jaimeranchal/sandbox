"use strict"

import * as modulo from "./encuesta.mjs";

// Métodos 

/**
 * Ordena las encuestas descendentemente por sexo
 */
// NOTE: Debería haber usado localecompare

let ordenar = () => {
    arrEncuestas.sort(function(a,b){ return b.sexo - a.sexo });
}

/**
 * Solicita sexo por teclado;
 * Valida que la entrada sea 'H' o 'M' (ignora capitalización)
 * Devuelve 'H' o 'M' en mayúscula
 */
let validarSexo = (mensaje) => {
    let sexo = prompt(mensaje);
    // Comprobamos que no sea un valor numérico
    while (!isNaN(sexo)) {
        let error = "Error: debe introducir 'H' o 'M'\n"
        sexo = prompt(error + mensaje);
        // Controlamos que sea H o M
        while (sexo.charAt(0).toUpperCase() !== 'H' &&
            sexo.charAt(0).toUpperCase() !== 'M') {
            sexo = prompt(error + mensaje);
        } 
    }
    return sexo.toUpperCase();
}

/**
 * Solicita estado laboral;
 * Valida que la entrada sea 'S' o 'N' (ignora capitalización)
 * Devuelve 'S' o 'N'
 */
let validarTrabaja = (mensaje) => {
    let trabaja = prompt(mensaje);
    // Comprobamos que no sea un valor numérico
    while (!isNaN(trabaja)) {
        let error = "Error: debe introducir 'S' o 'N'\n";
        trabaja = prompt(error + mensaje);
        // Controlamos que sea H o M
        while (trabaja.charAt(0).toUpperCase() !== 'S' &&
            trabaja.charAt(0).toUpperCase() !== 'N') {
            trabaja = prompt(error + mensaje);
        } 
    }
    return trabaja.toUpperCase();
}

/**
 * Solicita sueldo por teclado;
 * valida que sea un valor numérico.
 * Devuelve el número
 */
let validarSueldo = (mensaje) => {
    let sueldo = parseInt(prompt(mensaje));
    while (isNaN(sueldo)) {
        let error = "Error: el sueldo debe ser un valor numérico\n";
        sueldo = parseInt(prompt(error + mensaje));
        while (sueldo < 0) {
            let error = "Error: el sueldo no puede ser negativo\n";
            sueldo = parseInt(prompt(error + mensaje));
        }
    }
    return sueldo;
}

/**
 * Imprime una tabla con los datos de los encuestados
 */
let imprimirTabla = () => {
    document.getElementById("titulo").innerHTML = "Relación de Encuestados";
    let datos = "";
    arrEncuestas.forEach(elemento => {
        datos += elemento.mostrar();
    });
    document.getElementById("lista").innerHTML = datos;
}

/**
 * Imprime una tabla con:
 * Porcentaje de hombres
 * Porcentaje de mujeres
 * Sueldo medio de hombres que trabajan
 * Sueldo medio de mujeres que trabajan
 */
let imprimirDatos = () => {
    document.getElementById("titulo2").innerHTML = "Resultados Encuesta";
    let datos = "";
    arrEncuestas.forEach(elemento => {
        datos += elemento.mostrar();
    });
    document.getElementById("datos").innerHTML = datos;
}

// Script
// Crea encuestados
let arrEncuestas = []; // array de encuestados
let nombre = prompt("Nombre del encuestado (F o f para salir): ");
while (nombre.toLowerCase() != 'f') {
    let sexo = validarSexo("Sexo (H / M): ");
    let trabaja = validarTrabaja("¿Trabaja? (S / N): ");
    let sueldo = validarSueldo("Sueldo: ");
    // Creamos un encuestado con los datos
    let encuestado = new modulo.Encuesta(nombre, sexo, trabaja, sueldo);
    //Añadimos el encuestado a la lista
    arrEncuestas.push(encuestado);
    // Preguntamos el siguiente nombre
    nombre = prompt("Nombre del encuestado (F o f para salir): ");
}

imprimirTabla();
ordenar();
imprimirDatos();
