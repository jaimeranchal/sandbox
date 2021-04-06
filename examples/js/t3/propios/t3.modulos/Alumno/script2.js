"use strict"
// import {modulo.Alumno, validarNum} from "./modulo.mjs";
// para importarlo todo podemos hacer:
import * as modulo from "./modulo.mjs";

/*
 * Si se importa el módulo con un alias
 * hay que añadirlo cada vez que se invoque
 * algunas clase, método, etc, incluida en él
 * modulo.clase...
 */

// declaraciones
let aGrupo = [];

// funciones
let entradaDatos = () =>{
    let nom = prompt("Introduzca nombre: [Cancelar => salir]");
    while(nom != null) {
        let apellidos = prompt("Introduzca apellidos: ");
        let edad = modulo.validarNum(prompt("Introduzca edad: "));
        // let objeto = new modulo.Alumno(nombre, apellidos, edad);
        // añadimos objeto al array
        // aGrupo.push(objeto);
        aGrupo.push(new modulo.Alumno(nom, apellidos, edad));
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
    let titulo = document.createElement("p");
    /* Esto falla por ser invocado desde un script asíncrono */
    // document.write("<h2>Datos de los modulo.Alumnos</h2>");
    
    /* Esto funciona, aunque no reconoce las etiquetas */
    aGrupo.forEach(elemento => {
        let linea = document.createTextNode(elemento.mostrarDatos());
        titulo.appendChild(linea);
        let divActual = document.getElementById("capa");
        document.body.insertBefore(titulo, divActual);

        /* Esto falla por ser invocado desde un script asíncrono */
        // document.getElementById("capa").innerHTML=elemento.mostrarDatos();
    })
}
// script principal

entradaDatos();
ordenar();
mostrar();
