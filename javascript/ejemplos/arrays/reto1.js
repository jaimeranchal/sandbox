"use strict"

/**
 * Muestra y valida arrays con los números introducidos por el usuario
 * 1. funcion validar número 1-100
 * 2. funcion mostrar por pantalla
 * 3. Cancelar > termina entrada de números y muestra por pantalla
 */

// variables
let numeros = [];
let numero;

// función validar
function validar(numero){
    if (numero > 0 && numero < 101) {
        return numero;
    } else {
        return -1;
    }
}
// función mostrar
function mostrar(arr) {
    if (arr == undefined || arr.length > 0) {
        //recorre los elementos del array y los imprime
        document.write("<ul>");

        for (let i = 0; i < arr.length; i++) {
            document.write(`<li>${arr[i]}</li>`);
        }

        document.write("</ul>");
    } else {
        document.write("<p>No se ha introducido ningún número</p>");
    }
}

numero = prompt("Introduzca un número entre 0 y 100");
while (numero != null) {
    if (validar(numero) != -1) {
        numeros.push(numero);
        numero = prompt("Introduzca un número entre 0 y 100");
    } else {
        numero = prompt("Número inválido\nVuelva a introducir un número entre 0 y 100");
    }
}

mostrar(numeros);
