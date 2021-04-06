"use strict";

// Elementos
let comenzar, entrada;
let arrNumeros;
let capaBotones;

window.addEventListener('load', () => {
    comenzar = document.getElementById("ejecutar");
    entrada = document.getElementsByClassName("dato")[0];
    capaBotones = document.getElementsByClassName("capaBotones")[0];

    //eventos
    comenzar.addEventListener('click', ()=>{
        let elementos = parseInt(entrada.value);
        if (elementos >= 5 && 
            elementos <= 15) {
            arrNumeros = generarArray(elementos);
            console.log(arrNumeros);
        } else {
            // mensaje de error
            mensajeSwal("Número de botones no permitido");
        }
        generarBotones(arrNumeros);
    });
})


// Funciones
let generarArray = (num) => {
    let arr = [];
    let numAleatorio;
    for (let i = 0; i < num; i++) {
        // genera un número aleatorio entre 1 y 50
        numAleatorio = Math.floor(Math.random() * 50) + 1;
        // comprueba que no existe antes en el array
        arr.push(numAleatorio);
        // arr = comprobarRepes(arr, numAleatorio);
    }
    return arr;
}

let generarBotones = (arr) => {
    for (let clave in arr) {
        capaBotones.innerHTML += '<button class="btn btn-success mr-2"/>';
        capaBotones.getElementsByTagName("button")[clave].innerText = arr[clave]; 
    }
}
// Intento de función recursiva que compruebe que no haya repetidos
// No consigo que funcione (hay un bucle infinito o algo así en alguna parte)
let comprobarRepes = (arr, numero) => {
    if (arr.length > 0) {
        for (let valor of arr) {
            if (numero == valor) {
                console.log("Se ha encontrado un número repetido");
                // vuelve a generar el número
                numero = Math.floor(Math.random() * 50) + 1;
                // vuelve a comprobarlo
                comprobarRepes(arr,numero);
            } else {
                // añádelo al array
                arr.push(numero);
                console.log("Todo ok, añadido al array");
            }
        } 
    } else {
        arr.push(numero);
    }
    return arr;
}

let mensajeSwal = (texto) => {
    Swal.fire({
        title: texto,
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Corregir',
    })
}
