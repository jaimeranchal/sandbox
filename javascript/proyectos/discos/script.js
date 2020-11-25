"use strict"

import * as modulo from "./modules/disco.mjs";

// Declaraciones
let arrDiscos = []; // para guardar los datos que se introduzcan

// funciones
let addDisco = () =>{
    let continuar = confirm("Introduzca los datos del disco:");
    while (continuar){
        let disco = modulo.Disco.nuevoDisco();
        arrDiscos.push(disco); 
        continuar = confirm("¿Añadir otro disco?");
    }
}

let mostrarDiscos = () =>{
    document.getElementById("opcion").innerHTML= "Tus discos";
    arrDiscos.forEach(elemento => {
        document.getElementById("discos").innerHTML=elemento.mostrarDisco();
    })
}

/* TODO: mostrar:
 * 1. ascendente por nombre
 * 2. descendente por año
 * 3. intervalo inicio-fin, intro. por usuario
 * 4. por género
 */

let borrarDisco = () =>{}
let prestarDisco = () =>{}
let moverDisco = () =>{}

/* 
 * Asignamos funciones a eventos 'click' en botones 
 * porque onclick() no funciona si se usan módulos
 */

// añadir disco
let boton1 = document.getElementById("add");
boton1.addEventListener('click', addDisco);
// mostrar disco
let boton2 = document.getElementById("mostrar");
boton2.addEventListener('click', mostrarDiscos);
// borrar disco
let boton2 = document.getElementById("borrar");
boton2.addEventListener('click', borrarDisco);
//prestar disco
let boton2 = document.getElementById("prestar");
boton2.addEventListener('click', prestarDisco);
//cambiar ubicación
let boton2 = document.getElementById("mover");
boton2.addEventListener('click', moverDisco);
