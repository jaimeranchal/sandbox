"use strict";

let dibujarRombo = () => {
    let lienzo = document.getElementById("a");
    let dibujo = lienzo.getContext("2d");
    // Grosor de línea
    dibujo.lineWidth = 5;
    // Color de línea
    dibujo.strokeStyle = "#212121";
    // Color de relleno
    dibujo.fillStyle = "#C2185B";
    // Comenzamos la ruta de dibujo, o path
    dibujo.beginPath();
    // Nos movemos a la "punta" superior
    dibujo.moveTo(55, 5);
    // Dibujamos la línea que va hacia la derecha
    dibujo.lineTo(105, 55);
    // Ahora la que va hacia abajo
    dibujo.lineTo(55, 105);
    // Ahora la que va hacia la izquierda
    dibujo.lineTo(5, 55);
    // Y dejamos que la última línea la dibuje JS
    dibujo.closePath();
    // Hacemos que se dibuje
    dibujo.stroke();
    // Lo rellenamos
    dibujo.fill(); 
}

let dibujarPatron = () => {

    let lienzo = document.getElementById("b");
    let dibujo = lienzo.getContext("2d");

    // usamos el objeto creado anteriormente como patrón
    let figura = document.getElementById("a");
    let patron = dibujo.createPattern(figura, "repeat");
    dibujo.rect(0,0,150,100);
    dibujo.fillStyle = pat;
    dibujo.fill();
}

window.addEventListener('load', dibujarRombo);

