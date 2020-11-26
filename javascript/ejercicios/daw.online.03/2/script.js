"use strict"

import * as modulo from "./modules/disco.mjs";

// Declaraciones
let arrDiscos = []; // para guardar los datos que se introduzcan

// funciones

/**
 * Añade un disco al array.
 * Pregunta al usuario si lo hace al inicio o al final 
 */
let addDisco = () =>{
    let continuar = confirm("Introduzca los datos del disco:");
    while (continuar){
        let disco = new Disco();
        disco = modulo.Disco.setDisco();
        let pos = prompt("¿Desea añadir el disco al comienzo o al final? [ (c)omienzo / (f)inal ]");
        // control de entrada
        while (pos !== "c" || pos !== "f") {
            pos = prompt("Error: escriba la opción deseada <br> c - comienzo de la lista <br>f - final de la lista");
        }
        // añadimos el disco al principio (push) o al final (unshift)
        if (pos === "c") {
            arrDiscos.unshift(disco);
        } else if (pos === "f") {
            arrDiscos.push(disco);
        } 
        // control de repetición
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
 */

/* Muestra los discos en orden:
 * 1. ascendente por nombre
 */
let listaDiscosNombre = () =>{
    document.getElementById("opcion").innerHTML= "Tus discos";
    // ordenamos el array
    arrDiscos.sort(function(a,b){
        return a.nombre.localeCompare(b.nombre); // incompleto (qué es a?)
    })
    arrDiscos.forEach(elemento => {
        document.getElementById("discos").innerHTML=elemento.mostrarDisco();
    })
}

/* Muestra los discos en orden:
 * 2. descendente por año
 */
let listaDiscosFecha = () =>{
    document.getElementById("opcion").innerHTML= "Tus discos";
    // ordenamos el array
    arrDiscos.sort(function(a,b){
        return a.fecha < b.fecha; // incompleto (cómo funciona sort?)
    })
    arrDiscos.forEach(elemento => {
        document.getElementById("discos").innerHTML=elemento.mostrarDisco();
    })
}


/* Muestra los discos en orden:
 * 3. intervalo inicio-fin, intro. por usuario
 */
let listaDiscosInvervalo = () =>{
    // solicitamos inicio y fin al usuario
    let inicio = modulo.Disco.validarNum(prompt("Primer disco de la lista: "));
    let fin = modulo.Disco.validarNum(prompt("Último disco de la lista: "));
    document.getElementById("opcion").innerHTML= "Tus discos";

    // usamos los valores anteriores para fijar los límites de un bucle for
    for (let i = inicio; i < fin; i++) {
        // imprimimos los datos de cada disco
        document.getElementById("discos").innerHTML=arrDiscos[i].mostrarDisco();
    }
}

/**
 * Muestra discos por género
 * Valida que el género exista?
 */
let listaDiscosGenero = () =>{
    document.getElementById("opcion").innerHTML= "Tus discos";
    arrDiscos.forEach(elemento => {
        document.getElementById("discos").innerHTML=elemento.mostrarDisco();
    })
}

let borrarDisco = () =>{}
let prestarDisco = () =>{}
let moverDisco = () =>{}

/**
 * Invoca a varias funciones según la opcion elegida
 */
let menu = (opcion) => {
    switch (parseInt(opcion)) {
        case 1:
            // añadir disco (principio o final)
            addDisco();
            break;
        case 2:
            // mostrar cantidad de discos guardados
            mostrarDiscos();
            break;
        case 3:
            // lista de discos ascendente por nombre
            listaDiscosNombre();
            break;
        case 4:
            // lista de discos descendente por año 
            listaDiscosFecha();
            break;
        case 5:
            // intervalo de discos. Mensaje:
            // "Mostrar listado de discos por intervalo, formato de entrada[inicio-fin]"
            listaDiscosInvervalo();
            break;
        case 6:
            // lista de discos por género
            listaDiscosGenero();
            break;
        case 7:
            // Borrar disco (principio o final)
            borrarDisco();
            break;
        case 8:
            // prestar un libro
            prestarDisco();
            break;
        case 9:
            // cambiar un libro de estantería
            moverDisco();
            break;
    }
}

/**
 * Muestra un mensaje al usuario con las opciones disponibles
 * y llama a la opción correspondiente mediante la función menu()
 */

/* TODO: control de opción inexistente/inválida con bucle */
let mostrarMenu = () => {
    // Mensajes
    let mensaje1 = "1. Añadir disco";
    let mensaje2 = "2. Mostrar nº de discos";
    let mensaje3 = "3. Lista de discos (por nombre)";
    let mensaje4 = "4. Lista de discos (por año)";
    let mensaje5 = "5. Lista de discos por intervalo (inicio-fin)";
    let mensaje6 = "6. Lista de discos (por género)";
    let mensaje7 = "7. Borrar un disco";
    let mensaje8 = "8. Prestar un disco";
    let mensaje9 = "9. Cambiar un disco de estantería";
    let error = "El valor introducido no se corresponde con ninguna entrada del menú.";

    let opcion = prompt("Selecciona una opción [1-9]:\n"
        + mensaje1 + "\n"
        + mensaje2 + "\n"
        + mensaje3 + "\n"
        + mensaje4 + "\n"
        + mensaje5 + "\n"
        + mensaje6 + "\n"
        + mensaje7 + "\n"
        + mensaje8 + "\n"
        + mensaje9 + "\n"
    ); 

    menu(opcion);
}

mostrarMenu();
