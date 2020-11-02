/* Ejercicio 3: lotería
 * - pide al usuario 6 enteros entre 1-49 inclusive (todo lo demás incorrecto)
 * - Bucle para controlar datos
 *   No se puede repetir números
 *   Mostrar números elegidos + combinación ganadora
 *   La combinación ganadora = [1-49]{6} elegidos al azar.
 *   Indicar número de aciertos
 *   El juego se repetirá hasta que el usario desee acabar.
 */
"use strict";
// Variables
let numeroUsuario;
let numeroGanador = ""; 
let acertados = 0;
let aNumeroUsuario, aNumeroGanador;
let seguir = true;
let error = "Error: revise que los números introducidos están dentro del rango [1-49]\n y que no ha introducido ningún carácter extra";
let mensaje = "Introduzca una combinación de 6 números [1-49], separados por comas";

// Lógica
// Pedimos números al usuario
numeroUsuario = prompt(mensaje);
while (seguir && numeroUsuario != null) {
    // Guardamos cada número en una posición de un array
    aNumeroUsuario = numeroUsuario.split(" ");

    // Comprobamos que los números introducidos son
    // a) números
    // b) dentro del rango (1-49)
    for (var i = 0; i < 6; i++) {
        if (isNaN(aNumeroUsuario[i]) ||
            aNumeroUsuario[i] > 49 ||
            aNumeroUsuario[i] < 1) {
            alert(error);            
            numeroUsuario = prompt(mensaje);
        }
    }
    //Creamos una combinación ganadora al azar
    for (var i = 0; i < 6; i++) {
        numeroGanador += Math.floor(Math.random() * (49 - 1)) + 1 + " ";
    }
    // Guardamos cada número en una posición de un array
    aNumeroGanador = numeroGanador.split(" ");
    //Comprobamos las coincidencias con un bucle for
    for (var i = 0; i < 6; i++) {
        if (aNumeroUsuario[i] == aNumeroGanador[i]) {
            acertados++;
        }
    }
    // Imprimir resultados
    document.write("<h2>LOTERÍA PRIMITIVA</h2>");
    document.write("<p>Números Elegidos: " + numeroUsuario + "</p>");
    document.write("<p>Combinación ganadora: " + numeroGanador + "</p>");
    document.write("<p>Has acertado: " + acertados + "</p>");

    seguir = confirm("¿Probar suerte de nuevo?");
    
}
