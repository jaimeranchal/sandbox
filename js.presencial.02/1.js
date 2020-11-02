/* Ejercicio 1: 
 * Pedir al usuario que introduza * o +
 *  - otro carácter es inválido (mensaje error)
 *  - bucle hasta que sea correcto
 *  Pedir al usuario que introduzca número de caracteres por ancho y alto.
 *  - Debe ser entre 1 y 10 (mensaje error)
 *  - bucle hasta que sea correcto
 *  Dibujar la figura con los datos anteriores
 */
"use strict";

// Variables
let signo, ancho, alto;
let error = "El formato no es válido\n";
let mensajeSigno = "Introduzca un asterisco (*) o un signo de suma (+)";
let mensajeAlto = "Introduzca un número de filas entre 1 y 10";
let mensajeAncho = "Introduzca un número de columnas entre 1 y 10";
let continuar = true;

// Lógica
signo = prompt(mensajeSigno);
while (signo != null && continuar) {
    /*
    while (signo != "*" || signo != "+") {
        signo = prompt(error + mensajeSigno);
    }
    */
    if (signo == "*" || signo == "+") {
        // pedimos el número de filas y columnas
        alto = prompt(mensajeAlto);
        while (isNaN(alto) || alto < 1 || alto > 10) {
            alto = prompt(error + mensajeAlto);
        }
        ancho = prompt(mensajeAncho);
        while (isNaN(ancho) || ancho < 1 || ancho > 10) {
            ancho = prompt(error + mensajeAncho);
        }

        // Resultado
        document.write("<h2>La figura se dibuja con " + signo + ". Tiene filas: " + alto + ", columnas: " + ancho + "</h2><br>");

        for (var i = 0; i < alto; i++) {
            for (var j = 0; j < ancho; j++) {
                document.write(signo + " ");
            }
            document.write("<br>");
        }
        continuar = confirm("¿Desea volver a empezar?");
    } else {
        signo = prompt(error + mensajeSigno);
    }

}
