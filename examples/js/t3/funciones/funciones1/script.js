"use strict"

//Funciones

function saluda(){
    console.log("Hola. Soy una funcion.");
}

function multiplica(tabla, hasta){
    console.log("Tabla de multiplicar con dos parametros");
    
    for(let index=1; index<=hasta; index++){
        console.log(tabla + " * " + index +  " = " + tabla*index);
    }
}

//Funciones con parametros opcionales

function multiplicaBis(tabla, hasta=10){
    console.log("Tabla de multiplicar con dos parametros");
   
    for(let index=1; index<=hasta; index++){
        console.log(tabla + " * " + index +  " = " + tabla*index);
    }
}

function suma(a,b){
     return(a+b)
}


//Funcion Anonima
let entradaNombre = function(){
    return prompt("Introduzca el nombre")
  }

//Cuerpo Script

saluda()
multiplica(2,7);
multiplica(2);
console.log("La suma es: " + suma(5,7));
console.log("El nombre introducido es: " + entradaNombre());