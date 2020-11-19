"use strict"
import {Alumno, validarNum} from "./modulo.mjs";

// declaraciones
let aGrupo = [];

// funciones
let entradaDatos = () =>{
    let nom = prompt("Introduzca nombre: [Cancelar => salir]");
    while(nom != null) {
        let apellidos = prompt("Introduzca apellidos: ");
        let edad = validar(prompt("Introduzca edad: "));
        // let objeto = new Alumno(nombre, apellidos, edad);
        // añadimos objeto al array
        // aGrupo.push(objeto);
        aGrupo.push(new Alumno(nom, apellidos, edad));
        nom = prompt("Introduzca nombre: [Cancelar => salir]");
    }
}

let ordenar = () => {
    // por apellidos de forma descentente
    aGrupo.sort(function(a,b){
        return b.apellidos.localeCompare(a.apellidos);

    })
}

let mostrar = () => {
    document.write("<h2>Datos de los alumnos</h2>");
    aGrupo.forEach(elemento => {
        document.getElementById("capa").innerHTML=elemento.mostrarDatos();
        // elemento.mostrarDatos();
    })
}
// script principal

entradaDatos();
ordenar();
mostrar();
