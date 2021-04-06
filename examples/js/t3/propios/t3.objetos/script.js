"use strict"

// Declaraciones

// objeto JSON
let persona = {
    //Propiedades
    nombre: " ",
    apellidos: " ",
    edad:0,

    //Métodos
    /* Cuidado que las funciones flecha: NO SOPORTAN el operador 'this' */
    mostrar: function() {
        document.write(`El nombre es ${this.nombre} ${this.apellidos} y tiene ${this.edad} años<br>`)
    }
};

// script
persona.nombre = prompt("Introduzca el nombre: ");
persona.apellidos = prompt("Introduzca sus apellidos: ");
persona.edad = prompt("Introduzca su edad: ");

persona.mostrar();
