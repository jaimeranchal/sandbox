"use strict"

// Primera opción, separando evento y función
// window.addEventListener('load', cargar);
// let cargar = () => {}

// Todo junto con función anónima
window.addEventListener('load', ()=>{
    for (let boton of document.getElementsByTagName("button")) {
        boton.addEventListener('click', asignarEvent);
    }
}); 

// como vamos a usar 'this' no podemos usar función flecha
let asignarEvent = function() {
    // imprime el contenido de la etiqueta
    alert(this.innerText); 
    // Quitamos el evento
    this.removeEventListener('click', asignarEvent); 
}
