"use strict";

let dibujarFigura = () => {
    let lienzo = document.getElementById("a");
    let c = lienzo.getContext("2d");
    // c.fillRect(25,25,100,100)
    c.beginPath();
    c.moveTo(75,25);
    c.lineTo(125,125);
    c.lineTo(25,125);
    c.closePath();
    c.stroke();

}

let dibujarPatron = () => {

    let lienzo = document.getElementById("b");
    let c = lienzo.getContext("2d");

    // usamos el objeto creado anteriormente como patrón
    let figura = document.getElementById("a");
    let patron = c.createPattern(figura, "repeat");
    c.fillStyle = patron;
    c.fillRect(0,0,500,500);
}

window.addEventListener('load', () => {
    dibujarFigura();
    dibujarPatron();
});

