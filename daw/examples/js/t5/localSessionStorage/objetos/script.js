"use strict"
let nombre, edad, localidad, lista;
window.addEventListener("click", () => {
    nombre = document.getElementById("nombre");
    edad = document.getElementById("edad");
    localidad = document.getElementById("localidad");
    lista = document.getElementById("listar");

    //asignar eventos
    document.getElementById("crearCookie").addEventListener("click", crear);
    document.getElementById("listarCookie").addEventListener("click", listar);
})


function crear() {
    let objeto = {
        nom: nombre.value,
        anios: edad.value,
        local: localidad.value
    }
    //convertir json a cadena
    objeto = JSON.stringify(objeto);
    localStorage.setItem("persona" 
    + (localStorage.length + 1), objeto)
    //limpiar objetos text
    for (let ele of document.getElementsByTagName("input")) {
        ele.value = "";
    }

}

function listar() {
    lista.innerHTML = "";
    for (let i=1; i<=localStorage.length; i++){
        let objeto=localStorage.getItem("persona"+ i);
        //cadena a JSON
        objeto=JSON.parse(objeto)

        lista.innerHTML+="persona"+ i+" => Nombre="+objeto.nom+ " edad="+ objeto.anios+ " localidad="+ objeto.local+ "<br>"
    }

}