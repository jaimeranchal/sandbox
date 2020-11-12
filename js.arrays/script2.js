"use strict"

let array = new Array(4);
let array2 = new Array(1,2,3,4);
let array3 =[];
let array4 = ["lunes", true, 2, "martes"];

//recorrer arrays con for in
let mostrarForIn = function() {
    console.log("Recorrido for in");
    for (let key in array4) {
        console.log(array4[key]);
        // para imprimir la posición y el valor
        console.log(`${key} - ${array4[key]}`);
    }
}

//recorrer arrays con for of
let mostrarForOf = function() {
    console.log("Recorrido for of");
    // elemento apunta al contenido de la posición del array
    for (let elemento of array4) {
    //for (let [key,elemento] of array4.entries()) {
        console.log(elemento);
        //console.log(`${key} - ${elemento}`);
    }
}

//recorrer arrays con for each
let mostrarForOf = function() {
    console.log("Recorrido for each");
    // elemento apunta al contenido de la posición del array
    array4.forEach(element => {
        console.log(element)
    });
}

mostrarForIn();
