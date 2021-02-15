"use strict"

// Variables
let curso;
let nombreApe;
let edad;
let enviar;

window.addEventListener('load', ()=>{
    //elementos
    curso = document.getElementById("curso");
    nombreApe = document.getElementsByTagName("input")[1];
    edad = document.getElementById("edad");
    enviar = document.getElementsByClassName("submit")[0];
    //eventos
    curso.addEventListener('change', validarCurso);
    nombreApe.addEventListener('change', validarNomApe);
    edad.addEventListener('keypress', soloNumeros);
    edad.addEventListener('change', validarEdad);
    enviar.addEventListener('click', comprobarRequeridos);
})

// Funciones

let validarCurso = () =>{
    let patron = /^[1-2]\sDA[M|W].[1-2]$/;
    validarFormato(patron, curso, "errorCur");
}

let validarNomApe = () =>{
    let patron = /^[a-zñ\sá-ú]+$/i;
    validarFormato(patron, nombreApe, "errorNomApe");
}
let validarEdad = () =>{
    let patron = /^1[8-9]|[2-9][0-9]$/;
    validarFormato(patron, edad, "errorEdad");
}

let soloNumeros = (e) =>{
    let evento = e || event; // por retrocompatibilidad

    if(evento.which < 48 || evento.which > 57){
        evento.preventDefault(); //anula la pulsación
    }
}

let comprobarRequeridos = (e) => {
    let evento = e || event; // por retrocompatibilidad
    let mensajeError = "Campo requerido";
    evento.preventDefault();

    // comprobar curso
    if (curso.value.length == 0) {
        document.getElementById("errorCur").innerHTML = mensajeError;
        curso.classList.add("requerido");
    } else {
        document.getElementById("errorCur").innerHTML = "";
        curso.classList.remove("requerido");
    }
    // comprobar nombre y apellidos
    if (nombreApe.value.length == 0) {
        document.getElementById("errorNomApe").innerHTML = mensajeError;
        nombreApe.classList.add("requerido");
    } else {
        document.getElementById("errorNomApe").innerHTML = "";
        nombreApe.classList.remove("requerido");
    }
    
    // comprobar edad
    if (edad.value.length == 0) {
        document.getElementById("errorEdad").innerHTML = mensajeError;
        edad.classList.add("requerido");
    } else {
        document.getElementById("errorEdad").innerHTML = "";
        edad.classList.remove("requerido");
    }
}

// función general para validar el formato
let validarFormato = (patron, elemento, idError) => {
    let mensaje = "";
    if (!patron.test(elemento.value)) {
        mensaje += "Formato incorrecto";   
        elemento.focus();
    } else {
        elemento.blur();
    }
    document.getElementById(idError).innerHTML = mensaje;
}

