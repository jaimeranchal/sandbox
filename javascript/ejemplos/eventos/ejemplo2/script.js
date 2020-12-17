"use strict"

/* Ejemplos del ratón */
// cuando el ratón entre en la capa cambia de color

window.addEventListener('load', ()=>{
    // para ahorrarnos la referencia tan larga a la capa
    let capa=document.getElementById("capa");

    // evento mouseon
    capa.addEventListener('mouseover', ()=>{
        capa.style.background="blue";
    })
    // evento mouseoff
    capa.addEventListener('mouseout', ()=>{
        capa.style.background="aquamarine";
    })
    // evento onclick
    capa.addEventListener('click', ()=>{
        capa.style.background="green";
    })
})
