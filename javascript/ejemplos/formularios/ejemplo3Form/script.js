"use strict";

/*
 * TODO: terminar de buscar cómo hacerlo en:
 * https://developers.google.com/recaptcha/docs/v3
 */
grecaptcha.ready(function() {
    grecaptcha.execute('6Le4XDYaAAAAACd-_dW-fxfPtvrw5DNIqH5CufEk', {action: 'submit'}).then(function(token) {
    // Add your logic to submit to your backend server here.
    });
});

// Eventos
window.addEventListener("load", ()=>{
    document.getElementsByTagName("button")[0].addEventListener('click', validar);    
 })

let validar = (e) => {
    let arrayErr = [];
    arrayErr.push(comprobarInputText(document.getElementsByName("nombre")[0], "errNom"));
    arrayErr.push(comprobarInputText(document.getElementById("edad"), "errEdad"));
    arrayErr.push(comprobarInputText(document.getElementById("fecha"), "errFecha"));
    arrayErr.push(comprobarInputCheck());
    arrayErr.push(comprobarInputSelect());
    // comprobar si hay errores; si no hay, manda los datos
    // si los hay, evita que se haga submit
    arrayErr.forEach( (ele) => {
        if (ele) {
            e.preventDefault();
        }
    })
    // esto es el invento último de Mariluz; no funciona bien del todo
    Swal.fire('Datos enviado');
}

/**
 * Comprueba si el campo de texto está vacío 
 * asigna las clases de error y un mensaje
 */
let comprobarInputText = (objeto, mensaje) => {
    let error = false;
    if (objeto.value==""){
        document.getElementById(mensaje).innerText = "Dato requerido";
        // añadimos al input una clase css especial para los errores
        objeto.classList.add("errorTexto");
        mensaje = true;
    } else {
        // reseteamos el texto del span para que al recargar siga vacío
        document.getElementById(mensaje).innerText = "";
        objeto.classList.remove("errorTexto");
    }
    return error;
}

/**
 * Comprueba si el campo de texto está vacío 
 * asigna las clases de error y un mensaje
 */
let comprobarInputCheck = () => {
    let error = false;
    let check = false;
    for (let ele of document.getElementsByName("genero")){
        if(ele.checked) {
            check = true;
        }
        if (check == false) {
            document.getElementById("errGenero").innerText = "Dato requerido";
            error = true;
        } else {
            document.getElementById("errGenero").innerText = "";
        }
    }
    return error;
}

/**
 * Comprueba que no se ha seleccionado nada
 * del menú desplegable
 */
let comprobarInputSelect = () => {
    let error = false;
    if (document.getElementById("provincia").selectedIndex == 0) {
        document.getElementById("errProv").innerText = "Dato requerido";
        document.getElementById("provincia").classList.add("errorTexto");
        error = true;
    } else {
        document.getElementById("errProv").innerText = "";
        document.getElementById("provincia").classList.remove("errorTexto");
    }
    return error;
}
