"use strict"

// variables
// forma clásica de declarar
let array = new Array(4);
let array2 = new Array(1,2,3,4);

// nueva forma de declarar más compacta
let array3 =[];
let array4 = ["lunes", true, 2, "martes"];
// Funciones

// Cuerpo
console.log(array);
console.log(array2);
array3[3]="hola";
console.log(array3);
console.log(array4);

// recorrer array4
let mostrar1 = function() {
    console.log("Recorrer un array con un for normal");
    for (var i = 0; i < array4.length ; i++) {
        console.log(array4[i]);
    }
}
mostrar1();
