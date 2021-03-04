"use strict";

// Elementos
let comenzar, entrada;
let arrNumeros;
let capaBotones;

$(function(){
    $('#ejecutar').click(function(){
        let elementos = parseInt($('.dato:first').val());
        if (elementos >= 5 && 
            elementos <= 15) {
            arrNumeros = generarArray(elementos);
            console.log(arrNumeros);
        } else {
            // mensaje de error
            mensajeSwal("Número de botones no permitido");
        }
        generarBotones(arrNumeros);
        $('.btn-success').click(function(){
            // aquí iría la funcionalidad:
            // ordenaría el array de mayor a menor y comprobaría el
            // valor del botón pulsado con el del array
        })
    })
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
        $('.capaBotones:first').append('<button class="btn btn-success mr-2"/>')
        $('.capaBotones:last button:last').text(arr[clave]);
    }
}

let mensajeSwal = (texto) => {
    Swal.fire({
        title: texto,
        showCancelButton: false,
        confirmButtonColor: '#3085d6',
        confirmButtonText: 'Corregir',
    })
}
