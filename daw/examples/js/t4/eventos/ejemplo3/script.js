"use strict"

/* Eventos del teclado */

// rechazamos entradas del teclado antes de que lleguen al búfer
// del teclado (que no se muestren)
/*
 * Hay tres eventos:
 * 1. keydown (pulsas)
 * 2. keypress (empiezas a levantar: único sitio donde podemos cancelar la entrada)
 * 3. keyup (sueltas -> el valor pasa al búfer)
 */

window.addEventListener('load', ()=>{
    let usuario=document.getElementById("usuario");
    let edad=document.getElementById("edad");

    // establecer eventos
    usuario.addEventListener('keypress', validarUser);
    edad.addEventListener('keypress', validarEdad);
})

/**
 * Impide que se escriban números
 */
let validarUser = (e) => {
    // la palabra clave "event" está en desuso
    // pero se incluye para navegadores antiguos
    let evento=e || event;

    if(evento.which >= 48 && evento.which <= 57){
        //anular la pulsación
        evento.preventDefault();
    }
}

/**
 * Impide que se escriban letras, sólo números
 */
let validarEdad = (e) => {

    let evento=e || event;

    if(evento.which < 48 || evento.which > 57){
        //anular la pulsación
        evento.preventDefault();
    }
}
