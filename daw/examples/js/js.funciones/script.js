"use strict"

// Declarar variables y funciones

function saluda() {
    console.log("Hola, soy una función");
}

function multiplica(tabla, hasta){
    console.log("Tabla multiplicar con 2 parámetros: ");
    for (var i = 1; i <= hasta ; i++) {
        console.log(tabla + " * " + i + " = " + tabla*i);
    }
}

// Funciones con parámetros opcionales
function multiplicaBis(tabla, hasta=10){
    console.log("Tabla multiplicar con 2 parámetros: ");
    for (var i = 1; i <= hasta ; i++) {
        console.log(tabla + " * " + i + " = " + tabla*i);
    }
}

// Funciones como variables (funciones anónimas)
let entradaNombre = function(){
    return prompt("¿Cómo te llamas?");
}

function suma(a,b){
    return (a+b);
}

// cuerpo script
saluda();
multiplica(2,5);
multiplicaBis(2);
console.log("la suma es :" + suma(5,7));
console.log("El nombre introducido es: " + entradaNombre());
