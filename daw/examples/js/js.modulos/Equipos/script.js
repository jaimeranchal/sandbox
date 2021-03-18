"use strict";
import { Equipos, validarNum} from "./modulo.mjs"
//declaración de variables y clases
let aEquipos = [];

function entradaDatosEquipo() {
    let nom, num;
    nom = prompt("Introduzca nombre Equipo (Cancelar->Fin)");
    while (nom != null) {
        num = validarNum("Introduzca número de jugadores");
        //Añadir al array aEquipos con la estructura de la clase Equipos
        aEquipos.push(new Equipos(nom, num, entradaJugadores(num)));

        nom = prompt("Introduzca nombre Equipo (Cancelar->Fin)");
   
    }

}

function entradaJugadores(num) {
    //función que permite la introducción de los jugadores
    let aJugadores = []
    for (let i = 0; i < num; i++) { //realizar un bucle según el nº de jugadores introducidos
        aJugadores.push(prompt("Introduzca Apellidos y nombre del jugador " + (i + 1)));
    }
    return aJugadores;
}


function mostrarDatosEquipo() {
    //mostrar los datos de cada equipo
    //Antes de mostrar ordenamos los equipos por el número de jugadores en orden descendente. 
    aEquipos.sort((a,b)=>{ 
        return b.numJug-a.numJug;
    })
    aEquipos.forEach(element => {
        element.ordenAlfAscEquipo() //llamar al método para ordenar los jugadores del equipo
        document.getElementById("capa").innerHTML+=element.mostrarEquipo(); //mostrar los datos del equipo
        
    });
   
}

//parte principal
entradaDatosEquipo();
mostrarDatosEquipo();