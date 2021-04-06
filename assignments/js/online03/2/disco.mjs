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
     * Recibe un disco como parámetro
     * Solicita por teclado 5 primeras propiedades
     * Por defecto, prestado = false
     */
    setDisco() {
        this.nombre  = prompt("Nombre del disco: ");
        this.autor   = prompt("Grupo de música o cantante: ");
        this.fecha   = validarNum(prompt("Año de publicación: "), 1900, 2020);
        let genero  = validarNum(prompt("Tipo de música:\n" +
            "1. Rock\n" +
            "2. Pop\n" +
            "3. Punk\n" +
            "4. Indie\n"), 1, 4);
        switch (parseInt(genero)) {
            case 1:
                this.genero = "Rock";
                break;
            case 2:
                this.genero = "Pop";
                break;
            case 3:
                this.genero = "Punk";
                break;
            case 4:
                this.genero = "Indie";
                break;
        }
        this.estante = validarNum(prompt("Ubicación del disco (nº de estantería)"));
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
        this.prestado ? this.prestado = false : this.prestado = true;
    }
    /**
     * Muestra todas las propiedades de un disco
     */
    mostrarDisco(){
        let estado;
        this.prestado ? estado = "prestado" : estado = "Disponible";
        return `<li>${this.nombre}, ${this.autor} (${this.fecha}), <i>${this.genero}</i>, guardado en la estantería ${this.estante} [${estado}]</li>`;
    }
}

/**
 * Comprueba que el dato es un número y (añadido por mí) está dentro de un rango
 * @param dato: número a validar
 * @vInicial: valor mínimo del rango de valores aceptados
 * @vFinal: valor máximo del rango de valores aceptados
 */
export let validarNum = (dato, vInicial = 0, vFinal = 9999) => {
    // comprobar que sea un número
    while(isNaN(dato)) {
        let error   = "ERROR: El dato introducido debe ser un número";
        let mensaje = "Introduzca de nuevo el dato: ";
        dato        = parseInt(prompt(`${error}\n${mensaje}`));
        // comprobar que esté dentro del rango
        while (dato > vFinal || dato < vInicial) {
            let error   = `ERROR: El número está fuera del rango permitido (${vInicial} - ${vFinal} )`;
            let mensaje = "Introduzca un valor correcto: ";
            dato        = parseInt(prompt(`${error}\n${mensaje}`));
        }
    }
    return dato;
}
