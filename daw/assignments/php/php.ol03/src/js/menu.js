"use strict"
// abre y cierra el menú en pantallas pequeñas
let menu = document.getElementById("hamburger");
let navegacion = document.getElementById("menu");
menu.addEventListener('click', function(e){
    // no puedo usar 'toggle' porque tienen más de una clase
    // en su lugar: add("open") y remove("open")
    navegacion.classList.toggle('open');
    e.stopPropagation();
})
