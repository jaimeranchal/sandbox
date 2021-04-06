"use strict"
//declaraciones
let objeto, objetoII, oProfesor
class Persona {
    //establecer propiedad
    constructor(nom, ape, edad) {
        this.nombre = nom;
        this.apellidos = ape;
        this.edad = edad;
    }
    //métodos
    mostrar() {
        document.write(`El nombre es ${this.nombre} apellido es ${this.apellidos} y tiene ${this.edad} años<br>`)
    }
}

//herencia
class Profesor extends Persona{
    constructor(nom, ape, edad, espec, fechaIncorp) {
    //establecer las propiedad de la clase base
    super(nom, ape, edad);
    this.especialidad = espec;
    this.fechaIn = fechaIncorp;
    }
    //método
    mostrarInforProf() {
        document.write("<h2>Información del profesor</h2>");
        document.write(`La especialidad ${this.especialidad} y la fecha de incorporación ${this.fechaIn}<br>`);
    }
}
//script

objeto = new Persona("pepe", "López", 23);
objeto.mostrar();
objetoII = new Persona("ana", "Morales", 75);
objetoII.mostrar();

//instanciar objeto a clase Profesor
oProfesor = new Profesor("María", "Cano", 34, "Lengua", "12/12/1989");
oProfesor.mostrar();
//oProfesor.mostrarMasInfo();
oProfesor.mostrarInforProf();