"use strict"
let param=[];
//funciones con un único parámetro, siendo una colección

let mostrar=function(...datos){
    for (let element of datos) {
        console.log(element)
    }
    console.log("Apellidos y Nombre="+ datos[1]+ ", "+datos[0])
}

//funciones con parámetros spread
let mostrarII= function(nombre, apellidos, edad, localidad){
    console.log("Parámetros spread");
    console.log(nombre+ " "+ apellidos+ " "+edad +" "+ localidad)
}

//funciones arrows o flecha
let suma=(a,b)=>a+b;

// script principal

mostrar("Pepe", "Álvarez Cano", 27, "Córdoba");

param.push("Pepe")
param.push("Alvarez Cano")
param.push(27)
param.push("Cordoba");

mostrarII(...param);
console.log("La suma es "+ suma(5,7))
