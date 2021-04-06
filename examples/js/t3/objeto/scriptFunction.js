"use strict"
//declaraciones
let objeto, objetoII, oProfesor
function Persona(nom,ape,edad){
    //establecer propiedad
    this.nombre=nom;
    this.apellidos=ape;
    this.edad=edad;

    //métodos
    this.mostrar=function(){
        document.write(`El nombre es ${this.nombre} apellido es ${this.apellidos} y tiene ${this.edad} años`)
    }
}
//añadir
Persona.prototype.mostrarMasInfo=function(){
    document.write("<h2>Mostrar más información</h2>")
}
//herencia
function Profesor(nom, ape, edad, espec, fechaIncorp){
    //establecer las propiedad de la clase base
    Persona.call(this, nom, ape, edad);
    this.especialidad=espec;
    this.fechaIn=fechaIncorp;
    //método
    this.mostrarInforProf=function(){
        document.write("<h2>Información del profesor</h2>");
        document.write(`La especialidad ${this.especialidad} y la fecha de incorporación ${this.fechaIn}`);
    }
}
//script

objeto=new Persona("pepe", "López", 23);
objeto.mostrar();
objetoII=new Persona("ana", "Morales", 75);
objetoII.mostrar();
objetoII.mostrarMasInfo();
//instanciar objeto a clase Profesor
oProfesor=new Profesor("María", "Cano", 34, "Lengua", "12/12/1989");
oProfesor.mostrar();
//oProfesor.mostrarMasInfo();
oProfesor.mostrarInforProf();
