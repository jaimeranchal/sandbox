"use strict"
export class Equipos {
    constructor(nom, num, jug) {
        this.nomEquipo = nom;
        this.numJug = num;
        this.aNomJug = jug;
    }

    mostrarEquipo() {
        //Desde un módulo no se puede utilizar document.write para mostrar información
        //por lo que utilizaremos una variable para ir acumulando la información que queremos mostrar
        let cadena = ""
        cadena += "<center><h2>Equipo: " + this.nomEquipo + "</h2><br>";
        for (let index in this.aNomJug) {
            cadena += "<b>Jugador/a " + (parseInt(index) + 1) + ": </b>" + this.aNomJug[index] + "<br>";
        }
        cadena += "<hr/>"
        return cadena;
    }
    ordenAlfAscEquipo() {
        this.aNomJug.sort(); //ordenar alfabeticamente de A-Z los jugadores
    }
}
//funciones de usuario
//función que comprueba que el dato solo debe ser un número
export let validarNum = (texto) => {
    let num = prompt(texto);
    while (isNaN(num) || num == "" || num == null || num < 1 || num > 15) {
        num = prompt("¡¡ERROR!!. El dato no es correcto\n" + texto)
    }
    return parseInt(num);
}