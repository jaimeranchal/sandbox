"use strict"

// declaración de clase
export class Equipo {
    //constructor
    constructor(nombre, numero, aJugadores){
        //propiedades
        this.nomEquipo   = nombre; // cadena
        this.aNomJug    = aJugadores; // array
        this.numJug  = numero; // número
    }

    // Métodos
    /**
     * Ordena alfabéticamente por apellidos y nombre
     * todos los jugadores del equipo
     */
    ordenAlfAscEquipo() {
        this.aNomJug.sort(function(a,b){
            return b.nomJug.localeCompare(a.nomJug);
        })
    }    

    /**
     * Muestra el nombre del equipo y los nombres de
     * los jugadores
     */
    mostrarEquipo() {
        // document.write(`<h2>Equipo: ${this.nomEquipo}</h2>`);
        // this.aNomJug.forEach(elemento => {
        //     document.write(`<b>Jugador/a: ${elemento}`);
        //     document.write("<hr>");
        // })
        
        /* NOTA 1:
         * Esto no funciona porque se carga desde el módulo: 
         * "It isn't possible to write into a document from an asynchronously-loaded
         * external script..."
         * En su lugar, uso innerHTML
         */

        // document.getElementById("equipo").innerHTML= `<h2>Equipo: ${this.nomEquipo}</h2>`;
        // this.aNomJug.forEach(elemento => {
        //     document.getElementById("jugadores").innerHTML=`<li><b>Jugador/a: ${elemento}</li>`;
        // })

        /* NOTA 2: 
         * también falla "cannot set property 'innerHTML' of null"
         *  imagino que no puede acceder al documento desde el módulo...
         *  no sé cómo averiguarlo ahora mismo
         */

        let datosEquipo = `<h2>Equipo: ${this.nomEquipo}</h2>`;
        this.aNomJug.forEach(jugador => {
            datosEquipo += `<p><b>Jugador/a: ${jugador}</p>`;
        })
        return datosEquipo;
    }
}

/**
 * Comprueba que el dato es un número
 */
export let validarNum = (dato) => {
    let error = "ERROR: Número fuera de rango (1-15)";
    let mensaje = "Introduzca de nuevo el número de jugadores: ";
    while(isNaN(dato) && dato > 15 && dato < 1) {
        dato = prompt(`${error}\n${mensaje}`);
    }
    return dato;
}
