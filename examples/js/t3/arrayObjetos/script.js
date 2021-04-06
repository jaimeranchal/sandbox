"use strict"
//declaraciones
let aGrupo=[];

//crear la clase
class Alumno{
    constructor(){
        this.nombre="";
        this.apellidos="";
        this.edad=0;
    }
    mostrarDatos(){
        document.write (`<br> ${this.apellidos}, ${this.nombre} tiene ${this.edad} años<br>`);
    }
}

//funciones
let entradaDatos=()=>{
    let nom=prompt("Introduzca nombre [Cancelar->salir]");
    while (nom!=null){
        let objeto=new Alumno();
        objeto.nombre=nom;
        objeto.apellidos=prompt("Introduzca apellidos");
        objeto.edad=parseInt(prompt("Introduzca edad"));
        //añadir el objeto al array
        aGrupo.push(objeto)
        nom=prompt("Introduzca nombre [Cancelar->salir]");
    }
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
