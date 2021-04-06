"use strict"

// declaraciones
let objeto;
let objeto2;
let oProfesor;


// Clases de verdad

class Persona {
    // Constructor
    constructor(nom, ape, edad) {
        this.nombre=nom;
        this.apellidos=ape;
        this.edad=edad;
    }
    // métodos
    mostrar() {
        document.write(`El nombre es ${this.nombre} ${this.apellidos} y tiene ${this.edad} años<br>`)
    }
}

// Herencia
class Profesor extends Persona {
    constructor(nom, ape, edad, espec, fechaIncorp){
        // propiedades clase base
        super(nom, ape, edad);
        // propiedaes nuevas
        this.especialidad = espec;
        this.fechaIn = fechaIncorp;
    }

    // método
    mostrarInfoProf() {
        document.write("<h2>Información del profesor</h2>");
        document.write(`Especialidad: ${this.especialidad}<br>Fecha de incorporación: ${this.fechaIn}`);
    }
}

// script
objeto = new Persona("Pepe", "López", 23);
objeto.mostrar();

objeto2 = new Persona("Ana", "Morales", 75);
objeto2.mostrar();

oProfesor = new Profesor("María", "Cano", "34", "lengua", "12/12/1989");
oProfesor.mostrar();
oProfesor.mostrarInfoProf();
