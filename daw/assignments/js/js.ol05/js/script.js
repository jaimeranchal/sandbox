"use strict";

// Variables
let usuario, edad;
let comenzar;
let tablero, tableroPuntos, baraja;
let botonCarta, botonMePlanto;

window.addEventListener('load', ()=>{
    // elementos
    usuario = document.getElementById("usuario");
    edad = document.getElementById("edad");
    comenzar = document.getElementById("comenzar");
    tablero = document.getElementById("tablero");
    tableroPuntos = document.getElementById("tableroPuntos");
    baraja = document.getElementsByClassName("baraja")[0];
    botonCarta = document.getElementById("botonCarta");
    botonMePlanto = document.getElementById("botonMePlanto");
    // eventos
    comenzar.addEventListener('click', mostrarTablero);
});

// Funciones
let mostrarTablero = () => {
    if (comprobarCamposVacios()) {
        tablero.classList.add("visible");
        tableroPuntos.innerHTML = "<h2>Puntuación</h2>";
        tableroPuntos.innerHTML += "<input type=text readonly value='0'>";
        baraja.innerHTML = "<img src='./imagenes/cartaVuelta.jpg' alt='cartaVuelta'/>";
        botonCarta.innerHTML = "<button class='btn btn-primary'>Carta</button>"
        botonMePlanto.innerHTML = "<button class='btn btn-danger'>Me planto</button>"
    }
}
let comprobarCamposVacios = () => {
    // mensaje de error
    let error = "Este campo no puede estar vacío";
    let errorEdad = "Debes tener más de 18 años";
    let salida;

    if (usuario.value.length <= 0){
        document.getElementById("errorUser").innerHTML = error;
        document.getElementById("errorUser").classList.add("requerido");
        salida = false;
    } else {
        salida = true;
    }

    if (edad.value.length <= 0){
        document.getElementById("errorEdad").innerHTML = error;
        document.getElementById("errorEdad").classList.add("requerido");
        salida = false;
    } else if (parseInt(edad.value) < 18) {
        document.getElementById("errorEdad").innerHTML = errorEdad;
        document.getElementById("errorEdad").classList.add("requerido");
        salida = false;
    } else {
        salida = true;
    }

    return salida;
}
     
