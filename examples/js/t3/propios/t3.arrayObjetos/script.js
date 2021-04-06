"use strict"

// declaraciones
let aGrupo = [];

// clase
class Alumno {
    constructor() {
        this.nombre = "";
        this.apellidos= "";
        this.edad= "";
    }

    mostrarDatos() {
        document.write(`<br> ${this.apellidos}, ${this.nombre} tiene ${this.edad} años`);
    }
}

// funciones
let entradaDatos = () =>{
    let nom = prompt("Introduzca nombre: [Cancelar => salir]");
    while(nom != null) {
        let objeto = new Alumno();
        objeto.nombre = nom;
        objeto.apellidos = prompt("Introduzca apellidos: ");
        objeto.edad = parseInt(prompt("Introduzca edad: "));
        // añadimos objeto al array
        aGrupo.push(objeto);
        nom = prompt("Introduzca nombre: [Cancelar => salir]");
    }
}

let ordenar = () => {
    // por apellidos de forma descentente
    aGrupo.sort(function(a,b){
        return b.apellidos.localeCompare(a.apellidos);

    })
}

let mostrar = () => {
    document.write("<h2>Datos de los alumnos</h2>");
    aGrupo.forEach(elemento => {
        elemento.mostrarDatos();
    })
}
// script principal

entradaDatos();
ordenar();
mostrar();
