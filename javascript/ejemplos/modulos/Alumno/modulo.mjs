"use strict"

// clase
// la palabra 'export' indica que se van a reutilizar donde se invoque el módulo
export class Alumno {
    constructor(nom, ape, edad) {
        this.nombre = nom; 
        this.apellidos= ape;
        this.edad= parseInt(edad);
    }

    mostrarDatos() {
        // no se puede usar document.write en un módulo
        // document.write(`<br> ${this.apellidos}, ${this.nombre} tiene ${this.edad} años`);
        return `<br> ${this.apellidos}, ${this.nombre} tiene ${this.edad} años`;
    }
}

export let validarNum = (dato) => {
    while(isNaN(dato) || dato < 1 || dato > 120) {
        dato = prompt("Error: vuelva a introducir dato");
    }
    return parseInt(dato);
}
