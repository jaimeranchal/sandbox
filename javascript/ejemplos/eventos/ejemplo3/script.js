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
    usuario.addEventListener('keypress', validarEdad);
})
