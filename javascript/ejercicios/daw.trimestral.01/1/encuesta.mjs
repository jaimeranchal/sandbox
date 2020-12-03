"use strict"

export class Encuesta {
    constructor(nombre, sexo, trabaja, sueldo) {
        this.nombre = nombre;
        this.sexo = sexo; // H o M
        this.trabaja = trabaja;
        this.sueldo = sueldo;
    }

    // Métodos

    /**
     * Devuelve una cadena con la información del objeto
     */
    mostrar() {
        // Aplicamos formato tabla a los datos
        return `<tr>
            <td>${this.nombre}</td>
            <td>${this.sexo}</td>
            <td>${this.trabaja}</td>
            <td>${this.sueldo}</td>
            </tr>`
    }
}
