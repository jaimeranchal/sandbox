"use strict";

window.addEventListener("load", () => {
    document.getElementById("capa").addEventListener('click', modificarText);    
})

function modificarText() {
    // establecer clase rojo 
    // swith con el click para alternar rojo -> centrado -> normal -> rojo...
    this.setAttribute("class", "rojo");
         
}
