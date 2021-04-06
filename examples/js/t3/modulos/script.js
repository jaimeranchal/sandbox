"use strict"
//declaraciones
//import {Alumno, validarNum} from "./modulo.mjs";
import * as modulo from "./modulo.mjs";

let aGrupo=[];



//funciones
let entradaDatos=()=>{
    let nom=prompt("Introduzca nombre [Cancelar->salir]");
    while (nom!=null){
        let apellidos=prompt("Introduzca apellidos");
        let edad=modulo.validarNum(prompt("Introduzca edad"));
        //añadir el objeto al array
       
        aGrupo.push(new modulo.Alumno(nom, apellidos,edad))
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
        document.getElementById("capa").innerHTML=elemento.mostrarDatos();
    })
}
//script principal

entradaDatos();
ordenar();
mostrar();
