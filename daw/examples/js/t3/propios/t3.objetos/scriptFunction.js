"use strict"

// declaraciones
let objeto;
let objeto2;
let oProfesor;


// Clases como funciones (JavaScript clasicote)

function Persona(nom, ape, edad) {
    // establecer propiedades
    this.nombre=nom;
    this.apellidos=ape;
    this.edad=edad;

    // métodos
    this.mostrar = function() {
        document.write(`El nombre es ${this.nombre} ${this.apellidos} y tiene ${this.edad} años<br>`)
    }

}

// constructor vacío
/*
function Persona() {
    // establecer propiedades
    this.nombre="";
    this.apellido="";
    this.edad=0;

    // métodos
    this.mostrar = function() {
        document.write(`El nombre es ${this.nombre} ${this.apellidos} y tiene ${this.edad} años`)
    }

}
*/

// añadir funciones a Persona
Persona.prototype.mostrarMasInfo = function() {
    document.write("<h2>Mostrar más información</h2>");
}

// Herencia
function Profesor(nom, ape, edad, espec, fechaIncorp){
    // propiedades clase base
    Persona.call(this, nom, ape, edad);
    // propiedaes nuevas
    this.especialidad = espec;
    this.fechaIn = fechaIncorp;

    // método
    this.mostrarInfoProf = function() {
        document.write("<h2>Información del profesor</h2>");
        document.write(`Especialidad: ${this.especialidad}<br>Fecha de incorporación: ${this.fechaIn}<br>`);
    }
}

// script
objeto = new Persona("Pepe", "López", 23);
objeto.mostrar();

objeto2 = new Persona("Ana", "Morales", 75);
objeto2.mostrar();
objeto2.mostrarMasInfo();

oProfesor = new Profesor("María", "Cano", "34", "lengua", "12/12/1989");
oProfesor.mostrar();
// Como hemos añadido este método después, NO SE HEREDA
// oProfesor.mostrarMasInfo();
oProfesor.mostrarInfoProf();
