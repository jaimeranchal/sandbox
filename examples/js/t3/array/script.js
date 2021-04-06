"use strict"

//Declaracion de variables
let array = new Array(4);
let array2 = new Array(1, 2, 3, 4);

console.log(array);
console.log(array2);

//Nueva declaracion
let array3 = [];
let array4 = ["lunes", true, 2, "martes"];
let array5 = [20, 10, 12, 23, 40, 100];
array3[3] = "Hola";
console.log(array3);

//Recorrer el array4

let mostrarI = function () {
    console.log("Recorrido for normal");
    for (let index = 0; index < array4.length; index++) {
        console.log(index + " -" + array4[index]);
    }
}

//recorrer for in
let mostrarForIn = function () {
    console.log("Recorrido for in");
    for (let key in array4) {
        console.log(`${key} - ${array4[key]}`)
    }
}
//recorrer for of
let mostrarForOf = function () {
    console.log("Recorrido for of");
    for (let [key, elemento] of array4.entries()) {
        console.log(`${key} - ${elemento}`)
    }

}
let mostrarForEach = function () {
    console.log("Recorrido forEach");
    array4.forEach((element, key) => {
        console.log(`${key} - ${element}`)
    });
}
let ordenarAsc=function(){
    array5.sort(function(a,b){
       // return a-b //ascendente
        return b-a; //descendente
    });
    array5.forEach(element => {
        console.log(element)
    });
}
//Script

mostrarI();
mostrarForIn();
mostrarForOf();
mostrarForEach();
ordenarAsc()