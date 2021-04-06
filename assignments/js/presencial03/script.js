"use strict"

// import * as modulo from "./equipo.mjs";
import {Equipo, validarNum} from "./equipo.mjs";

let aEquipos = []; //array de equipos
/**
 * Solicita por teclado los datos de los equipos
 * Termina al pulsar cancelar en la opción "nombre"
 */
let guardarEquipo = () => {
    let nombre = prompt("Nombre del equipo: ");
    while (nombre != null){
        let numero = validarNum(parseInt(prompt("Número de jugadores del equipo (1-15): ")));

        let nombreJugadores = [];
        // bucle para introducir nombre de jugadores
        for (var i = 0; i < numero; i++) {
            nombreJugadores.push(prompt(`Nombre del jugador ${i+1}: `));
        }

        // creamos el equipo con los datos introducidos
        // let equipo = new modulo.Equipo(nombre, numero, nombreJugadores); 
        let equipo = new Equipo(nombre, numero, nombreJugadores); // quizá sólo "Equipo()"?

        // añadimos el equipo al arry de equipos
        aEquipos.push(equipo);

        // preguntamos por el siguiente equipo
        nombre = prompt("Nombre del equipo: ");
    }
}

/** 
 * Invoca sucesivamente al método mostrarEquipo de la clase
 * por cada equipo guardado
 */
let imprimirEquipos = () => {
    aEquipos.forEach(elemento => {
        document.getElementById("equipo").innerHTML = elemento.mostrarEquipo();
        elemento.mostrarEquipo();
    })
}

guardarEquipo();
imprimirEquipos();
