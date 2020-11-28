"use strict"

import * as modulo from "./disco.mjs";

// Declaraciones
let arrDiscos = [];     // para guardar los datos que se introduzcan

// funciones

/**
 * Añade un disco al array.
 * Pregunta al usuario si lo hace al inicio o al final 
 */
let addDisco = () =>{
    let continuar = confirm("Introduzca los datos del disco:");
    while (continuar){
        let disco = new modulo.Disco();
        disco.setDisco();
        let pos = prompt("¿Desea añadir el disco al comienzo o al final?\n[ (c)omienzo / (f)inal ]");
        // control de entrada
        while (pos !== "c" && pos !== "f") {
            pos = prompt("Error: escriba la opción deseada \nc - comienzo de la lista \nf - final de la lista");
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
    // volver al menú o terminar programa
    mostrarMenu();
}

/**
 * Muestra el número de discos guardados
 */
let mostrarDiscos = () =>{
    document.getElementById("opcion").innerHTML= "Discos guardados";
        document.getElementById("discos").innerHTML=`Has guardado ${arrDiscos.length} discos.`
    // volver al menú o terminar programa
    mostrarMenu();
}

/* Muestra los discos en orden:
 * 1. ascendente por nombre
 */
let listaDiscosNombre = () =>{
    // cadena donde guardamos el resultado
    let lista = "";

    // Título informativo
    document.getElementById("opcion").innerHTML= "Discos ordenados por nombre";
    // ordenamos el array
    arrDiscos.sort(function(a,b){
        return a.nombre.localeCompare(b.nombre); 
    })
    arrDiscos.forEach(elemento => {
        lista += elemento.mostrarDisco();
        document.getElementById("discos").innerHTML = lista;
    })

    // volver al menú o terminar programa
    mostrarMenu();
}

/* Muestra los discos en orden:
 * 2. descendente por año
 */
let listaDiscosFecha = () =>{
    // cadena donde guardamos el resultado
    let lista = "";

    // Título informativo
    document.getElementById("opcion").innerHTML= "Discos ordenados por fecha";
    // ordenamos el array
    arrDiscos.sort(function(a,b){
        return b.fecha - a.fecha; 
    })
    arrDiscos.forEach(elemento => {
        lista += elemento.mostrarDisco();
        document.getElementById("discos").innerHTML = lista;
    })
    // volver al menú o terminar programa
    mostrarMenu();
}


/* Muestra los discos en orden:
 * 3. intervalo inicio-fin, intro. por usuario
 */
let listaDiscosInvervalo = () =>{
    // cadena donde guardamos el resultado
    let lista = "";

    // solicitamos inicio y fin al usuario
    let inicio = modulo.validarNum(prompt(`Primer disco de la lista (1-${arrDiscos.length}): `));
    let fin = modulo.validarNum(prompt(`Último disco de la lista (1-${arrDiscos.length}): `));

    // Título informativo
    document.getElementById("opcion").innerHTML= "Discos (intervalo personalizado)";

    // usamos los valores anteriores para fijar los límites de un bucle for
    for (let i = inicio - 1; i < fin; i++) {
        lista += arrDiscos[i].mostrarDisco();
        document.getElementById("discos").innerHTML = lista;
        // imprimimos los datos de cada disco
    }
    // volver al menú o terminar programa
    mostrarMenu();
}

/**
 * Muestra discos por género 
 * Valida que haya discos del género solicitado
 */
let listaDiscosGenero = () =>{
    let lista = ""; // cadena donde guardamos el resultado
    let contador = 0; // número de resultados; controla qué se imprime luego

    // solicitamos el género
    let genero  = modulo.validarNum(prompt("Tipo de música:\n" +
        "1. Rock\n" +
        "2. Pop\n" +
        "3. Punk\n" +
        "4. Indie\n"), 1, 4);
    switch (parseInt(genero)) {
        case 1:
            genero = "Rock";
            break;
        case 2:
            genero = "Pop";
            break;
        case 3:
            genero = "Punk";
            break;
        case 4:
            genero = "Indie";
            break;
    }
    
    // Buscamos y añadimos los datos
    arrDiscos.forEach(elemento => {
        if (elemento.genero === genero) {
            lista += elemento.mostrarDisco();
            contador++;
        }
    })

    // Imprimimos
    if (contador > 0) {
        document.getElementById("discos").innerHTML = lista;
    } else {
        document.getElementById("discos").innerHTML = "No hay discos de este género";
    }

    // volver al menú o terminar programa
    mostrarMenu();
}

let borrarDisco = () =>{
    let opcion = modulo.validarNum(prompt("Elige una opción: \n" + 
        "1. Elegir\n" +
        "2. Borrar del inicio\n" +
        "3. Borrar del final"),1,3);
    switch (parseInt(opcion)) {
        case 1:
            let disco = preguntaDisco("borrar");
            // borramos el disco con splice para no dejar huecos vacíos
            arrDiscos.splice(disco-1, 1);
            break;
        case 2:
            arrDiscos.shift();
        case 3:
            arrDiscos.pop();
    }

    // volver al menú o terminar programa
    mostrarMenu();
}

let prestarDisco = () =>{
    let disco = preguntaDisco("prestar");
    arrDiscos[disco-1].cambiarEstado();
    // volver al menú o terminar programa
    mostrarMenu();
}

let moverDisco = () =>{
    let disco = preguntaDisco("mover");
    arrDiscos[disco-1].cambiarLoc();
    // volver al menú o terminar programa
    mostrarMenu();
}

/**
 * Lista discos y solicita un dato mediante prompt
 */
let preguntaDisco = (accion) => {
    // Lista con todos los discos
    let lista = "";
    if (arrDiscos.length > 0) {
        for (let i = 0; i < arrDiscos.length; i++){
            lista += `${i+1}. ${arrDiscos[i].nombre}, ${arrDiscos[i].autor} (${arrDiscos[i].fecha})\n`;
        }
    }
    //  y pregunta el número del que quiere borrar
    let disco = prompt(`Introduzca el número del disco que quiere ${accion}:\n` + lista);
    return disco;
}
/**
 * Invoca a varias funciones según la opcion elegida
 */
let opcionMenu = (opcion) => {
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
        default:
            mostrarMenu();
    }
}

/**
 * Muestra un mensaje al usuario con las opciones disponibles
 * y llama a la opción correspondiente mediante la función menu()
 */

let menu = () => {
    // Mensajes
    let mensaje = "1. Añadir disco\n" +
        "2. Mostrar nº de discos\n" +
        "3. Lista de discos (por nombre)\n" +
        "4. Lista de discos (por año)\n" + 
        "5. Lista de discos por intervalo (inicio-fin)\n" +
        "6. Lista de discos (por género)\n" +
        "7. Borrar un disco\n" +
        "8. Prestar un disco\n" + 
        "9. Cambiar un disco de estantería\n";

    let opcion = modulo.validarNum(prompt("Selecciona una opción [1-9]:\n\n" + mensaje + "\n"), 1, 9); 
    opcionMenu(opcion);
}

// controla si vuelve a aparecer el menú
let mostrarMenu = () => {
    let mostrar = confirm("¿Volver al menú?");
    mostrar ? menu() : alert("Hasta luego");
}

// script
menu();
