"use strict"

// declaraciones
let aGrupo = [];

// clase
class Alumno {
    constructor(nom, ape, edad) {
        this.nombre = nom; 
        this.apellidos= ape;
        this.edad= parseInt(edad);
    }

    mostrarDatos() {
        document.write(`<br> ${this.apellidos}, ${this.nombre} tiene ${this.edad} años`);
    }
}

// funciones
let entradaDatos = () =>{
    let nom = prompt("Introduzca nombre: [Cancelar => salir]");
    while(nom != null) {
        let apellidos = prompt("Introduzca apellidos: ");
        let edad = validar(prompt("Introduzca edad: "));
        // let objeto = new Alumno(nombre, apellidos, edad);
        // añadimos objeto al array
        // aGrupo.push(objeto);
        aGrupo.push(new Alumno(nom, apellidos, edad));
        nom = prompt("Introduzca nombre: [Cancelar => salir]");
    }
}

let validar = (dato) => {
    while(isNaN(dato) || dato < 1 || dato > 120) {
        dato = prompt("Error: vuelva a introducir dato");
    }
    return parseInt(dato);
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
