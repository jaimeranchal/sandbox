/* Ejercicio 5: transformar cadenas
 * Pide al usuario nombre y apellidos
 * Muestra:
 * 1: nombre + apellidos (sin espacios)
 * 2: cadena capitalizada
 * 3: En 3 líneas separadas: Nombre: XXX; Apellido1: XXXX; Apellido2: XXXX
 * 4: Propuesta de nombre de usuario (Inicial + apellido1 + inicial apellido2)
 * 5: Propuesta de nombre de usuario (3 primeras letras de nombre y apellidos)
 */
//! Lo que sigue es adaptado de un ejercicio: hay que adaptarlo a los requisitos exactos
//  tienen que aparecer los datos <b>La cadena tiene...</b>: resultado

"use strict";

// pide con prompt nombre y apellidos (en el mismo)
let cadena = prompt("Introduzca su nombre y apellidos");

// mostrar tamaño del nombre más los apellidos sin contar espacios
// Usamos replace con una expresión regular para elimitar también
// los espacios entre palabras
let size = cadena.replace(/\s+/g, '').length;
console.log("El nombre y los apellidos sin espacios ocupan " + size + " caracteres");

// Mostrar cadena todo en mayúsculas y todo en minúsculas
// Usamos toLocaleUpperCase() para respetar las convenciones
// tipográficas de la ubicación del usuario
let cadenaSinEspacios = cadena.replace(/\s+/g, '');

document.write("<h3>En mayúsculas</h3>");
document.write(cadenaSinEspacios.toLocaleUpperCase() + "<br>");
document.write("<h3>En minúsculas</h3>");
document.write(cadenaSinEspacios.toLocaleLowerCase() + "<br>");

// Dividir nombre y apellidos y mostrarlo en tres líneas
let arrayCadena = cadena.split(" ");

document.write("<h3>Separado en líneas</h3>")

for (var i = 0, len = arrayCadena.length; i < len; i++) {
    document.write(arrayCadena[i] + "<br>");
}

document.write("<h2>Nombres de usuario</h3>")
// 4: Propuesta de nombre de usuario (Inicial + apellido1 + inicial apellido2)
let usuario1 = arrayCadena[0].charAt(0);
usuario1 += arrayCadena[1];
usuario1 += arrayCadena[2].charAt(0);
document.write("<b>Nombre de usuario 1</b>: ");
document.write(usuario1.toLocaleLowerCase() + "<br>");

// 5: Propuesta de nombre de usuario (3 primeras letras de nombre y apellidos)
let usuario2 = arrayCadena[0].slice(0,3);
usuario2 += arrayCadena[1].slice(0,3);
usuario2 += arrayCadena[2].slice(0,3);
document.write("<b>Nombre de usuario 2</b>: ");
document.write(usuario2.toLocaleLowerCase() + "<br>");
