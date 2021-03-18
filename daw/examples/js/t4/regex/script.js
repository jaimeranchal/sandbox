"use strict"
window.addEventListener("load", () => {
    document.getElementById("boton").addEventListener("click", validar)
})

function validar() {
    let expresion;
    let texto = document.getElementById("field");
    // válida si contiene perro en cualquier posición
    // expresion = /perro/;
    // expresion = /perro/i; //da igual mayúsculas
    // expresion = /^perro/; //solo empieza por
    // expresion = /^perro$/;//exactamente
    // expresion = /^(perro|gato)$/i;//exactamente
    
    //solo letras (may. o min.)
    //  Usar el + te permite validar que el campo no esté vacío

    /* NÚMEROS */

    // expresion = /^\d{3,6}$/; // de 3 a 6 números
    // expresion = /^[0-46-9]{3,6}$/; // de 3 a 6 números
    // expresion = /^[a-zñª\s.á-ú]+$/i;

    /* PRACTICA */
    
    // expresion = /^[A-Z]{3}[0-9]{1}[a-zA-Z]{3}$/; // XXX3xXx
    // expresion = new RegExp("^[A-Z]{3}[0-9]{1}[a-zA-Z]{3}$"); //alternativa
    // expresion = /^([0-9]|1[0-9]|2[0-3])$/; // del 0 al 23

    //00:00 - 23:59
    expresion = /^([01][0-9]|2[0-3]):([0-5][0-9])$/;
    if(expresion.test(texto.value)){
        alert("Correcto");
    } else {
        alert("Incorrecto");
    }
    texto.focus(); //pasar foco al objeto texto
}
