"use strict"

let botonSidebar = document.getElementById("menu-toggle");
let mq = window.matchMedia("(min-width: 768px)");

window.addEventListener('load', () => {
    buttonIconStart(mq);
    botonSidebar.addEventListener("click", toggleSidebar);
    botonSidebar.addEventListener("click", buttonIconToggle);
    // Invierte los iconos del menú lateral según esté escondido
    // por defecto o no (regulado con media-queries)
    mq.addEventListener('change', buttonIconToggle);
});

/* ------- Funciones -------- */

//Muestra o esconde el menú izquierdo
let toggleSidebar = (e) => {
    let evento = e || event;
    let wrapper = document.getElementById("wrapper");
    evento.preventDefault();
    wrapper.classList.toggle("toggled");

}
// cambia el icono del botón para el menú lateral
let buttonIconToggle = () => {
    let buttonIcon = document.getElementById("menu-toggle").firstChild;
    let arrowLeft = 'fa-arrow-left';
    let arrowRight = 'fa-arrow-right';
    if (buttonIcon.classList.contains(arrowLeft)) {
        buttonIcon.classList.replace(arrowLeft, arrowRight);
    } else {
        buttonIcon.classList.replace(arrowRight, arrowLeft);
    }
}

//Carga los iconos del botón del menú lateral
let buttonIconStart = (mq) => {
    let arrowLeft = '<span class="fas fa-arrow-left"></span>';
    let arrowRight = '<span class="fas fa-arrow-right"></span>';
    botonSidebar.innerHTML = mq.matches ? arrowLeft : arrowRight;
}


