"use strict"
//crear la clase
export class Alumno{
    constructor(nom, ape,edad){
        this.nombre=nom;
        this.apellidos=ape;
        this.edad=edad;
    }
    mostrarDatos(){
        return (`<br> ${this.apellidos}, ${this.nombre} tiene ${this.edad} años<br>`);
    }
}

export let validarNum=(dato)=>{
    while (isNaN(dato)||dato<1 || dato>120){
        dato=prompt("Error, vuelva a introducir dato")
    }
    return parseInt(dato)
}