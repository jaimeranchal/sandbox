"use strict"

// Declarar variables y funciones

// Funciones con parámetros opcionales
function multiplicaBis(tabla, hasta=10){
    console.log("Tabla multiplicar con 2 parámetros: ");
    for (var i = 1; i <= hasta ; i++) {
        console.log(tabla + " * " + i + " = " + tabla*i);
        // version alternativa sin tener que cortar y abrir comillas
        console.log(`${tabla} * ${i} = ${tabla*i}`)
    }
}

// cuerpo script
multiplicaBis(2);
