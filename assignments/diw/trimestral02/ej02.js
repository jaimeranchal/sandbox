"use strict"

// Variables
let canvas = document.querySelector("#lienzo");
let ctx = canvas.getContext("2d");
let canvasWidth = canvas.width;
let canvasHeight = canvas.height;
// imagen
let fondo = new Image();
let anchoImagen = 540;
let altoImagen = 351;
fondo.src ='./src/mezquita-de-cordoba.jpg';

// valores para la rotación
let rotacion = 0;
let posicionx = canvasWidth / 2;
let posiciony = canvasHeight / 2;

let rotar = () => {
    rotacion += 0.01;
    posicionx += 0.1;
}

let mostrarAnimacion = () => {
// Fondo con relleno

// Incrementamos el ángulo y corregimos la posición
rotar();
ctx.save();

// movemos la figura al centro del canvas
/* Esta es la parte que no consigo hacer bien...no sé bien cómo
 * calcular la posición donde empieza a dibujar la imagen
 */
ctx.translate(canvasWidth/2, canvasHeight/ 2);

// rotamos usando el valor actualizado
ctx.rotate(rotacion);

// dibujamos la figura
ctx.clearRect(0,0,canvasWidth,canvasHeight);
ctx.drawImage(
    fondo,
    posicionx-(anchoImagen/2),
    posiciony-(altoImagen/2),
    anchoImagen,
    altoImagen
)

// restauramos para volver a empezar
ctx.restore();
window.requestAnimationFrame(mostrarAnimacion);
}

window.requestAnimationFrame(mostrarAnimacion);
