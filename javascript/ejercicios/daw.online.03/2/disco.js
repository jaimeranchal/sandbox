"use strict"

// declaración de clase
export class Disco {

    //constructor
    constructor(){
        //propiedades
        this.nombre   = "";
        this.autor    = "";
        this.fecha    = "";
        this.genero   = "";
        this.estante  = 0;
        this.prestado = false;
    }

    // Métodos
    
    /**
     * Crea un nuevo disco:
     * Solicita por teclado 5 primeras propiedades
     * Por defecto, prestado = false
     */
    nuevoDisco() {
        let disco = new Disco();
        disco.nombre  = prompt("Nombre del disco: ");
        disco.autor   = prompt("Autor del disco: ");
        disco.fecha   = prompt("Fecha del disco: ");
        disco.genero  = prompt("Género del disco: ");
        disco.estante = validarNum(prompt("Ubicación del disco (nº de estantería)"));
    }

    /**
     * Cambia el número de estantería donde se guarda un disco
     */
    cambiarLoc(){
        this.estante = validarNum(prompt("Nueva ubicación del disco (nº de estantería)")); 
    }

    /**
     * Cambia el estado de un disco a "Prestado" o viceversa
     */
    cambiarEstado(){
        this.prestado ? false : true;
    }
    /**
     * Muestra todas las propiedades de un disco
     */
    mostrarDisco(){
        let estado;
        this.prestado ? estado = "prestado" : estado = "disponible";
        return `${this.nombre}, ${this.nombre}, ${this.nombre}, ${this.nombre}, ${this.nombre}, ${estado}`;
    }
}

/**
 * Comprueba que el dato es un número
 */
let validarNum = (dato) => {
    while(isNaN(dato)) {
        let error   = "ERROR: El dato introducido debe ser un número";
        let mensaje = "Introduzca de nuevo el dato: ";
        dato        = prompt(`${error}<br>${mensaje}`);
    }
    return parseInt(dato);
}
