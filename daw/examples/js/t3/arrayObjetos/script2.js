"use strict"
//declaraciones
let aGrupo=[];

//crear la clase
class Alumno{
    constructor(nom, ape,edad){
        this.nombre=nom;
        this.apellidos=ape;
        this.edad=edad;
    }
    mostrarDatos(){
        document.write (`<br> ${this.apellidos}, ${this.nombre} tiene ${this.edad} años<br>`);
    }
}

//funciones
let entradaDatos=()=>{
    let nom=prompt("Introduzca nombre [Cancelar->salir]");
    while (nom!=null){
        let apellidos=prompt("Introduzca apellidos");
        let edad=validarNum(prompt("Introduzca edad"));
        //añadir el objeto al array
       
        aGrupo.push(new Alumno(nom, apellidos,edad))
        nom=prompt("Introduzca nombre [Cancelar->salir]");
    }
}
let validarNum=(dato)=>{
    while (isNaN(dato)||dato<1 || dato>120){
        dato=prompt("Error, vuelva a introducir dato")
    }
    return parseInt(dato)
}
let ordenar=()=>{
    aGrupo.sort(function(a,b){
        return b.apellidos.localeCompare(a.apellidos)
        
    })
}
let mostrar=()=>{
    document.write("<h2>Listado de alumnos")
    aGrupo.forEach(elemento =>{
        elemento.mostrarDatos();
    })
}
//script principal

entradaDatos();
ordenar();
mostrar();
