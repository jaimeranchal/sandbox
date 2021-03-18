"use strict"

let param = [];
// funciones con un único parámetro: una colección

// los ... indican que 'datos' es una colección
let mostrar=function(...datos){
    for (let element of datos) {
        console.log(element);
    }
    console.log("Nombre " + datos[0]);
}

// funciones con parámetros spread
let mostrar2 = function(nombre, apellidos, edad, localidad){
    console.log("Parámetros spread");
    console.log(nombre + " " + apellidos + " " + edad + " " + localidad);
}

// funciones flecha (Arrow)
/*
 * Se sustituye la palabra function por '=>' DESPUÉS de los parámetros
 */
let suma = () => {
    return 5 + 7;
}

// más breve aún
let suma3 = (a,b) => a + b;

let suma2 = (a,b) => {
    return a + b;
}


// Script principal
mostrar("Pepe", "Álvarez Cano", 27, "Córdoba");

param.push("Pepe");
param.push("Álvarez Cano");
param.push(27);
param.push("Cordoba");

mostrar2(...param);

console.log(suma2(4,2));

