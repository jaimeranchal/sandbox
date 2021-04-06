"use strict"
let micanvas, ctx;
let tiempo = 0;
let stop;
let fondo = new Image();
let anchoImagen = 540;
let altoImagen = 351;
fondo.src ='./src/mezquita-de-cordoba.jpg';

window.addEventListener('load',init);

function init(){
    micanvas = document.getElementById('lienzo');

    micanvas.width = 800;
    micanvas.height = 800;

    ctx =micanvas.getContext('2d');
    comenzar();
}

function comenzar(){
    clearTimeout(stop);
    stop = setTimeout(comenzar,1);
    dibujar(ctx);
}

function detener(){
    clearTimeout(stop);
}

function dibujar(ctx){
    // borra lo que hubiera dibujado
    ctx.clearRect(0,0,micanvas.width,micanvas.height);
    ctx.drawImage(
        fondo,
        micanvas.width/2-(anchoImagen/2),
        micanvas.height/2-(altoImagen/2),
        anchoImagen,
        altoImagen
    )
    // ctx.drawImage(fondo,tiempo,0);
    // ctx.drawImage(fondo,tiempo-800,0);

    tiempo--;
    if(tiempo<0){
        tiempo = tiempo + 800;	
    }
}
