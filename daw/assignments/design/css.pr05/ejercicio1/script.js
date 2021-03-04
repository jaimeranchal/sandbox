"use strict";

window.addEventListener('load', ()=>{
    let lienzo = document.getElementById("rejilla");
    let ctx = lienzo.getContext("2d");
    let degradado = ctx.createLinearGradient(0,0,0,lienzo.height);
    degradado.addColorStop(0, '#000000');
    degradado.addColorStop(1, 'red');
    ctx.fillStyle = degradado;
    ctx.fillRect(0,0,lienzo.width,lienzo.height);
    ctx.stroke();
    // rejilla
    // líneas horizontales
    for (let i = 0; i < lienzo.width; i+=25) {
        ctx.strokeStyle = "#ffffff";
        ctx.beginPath();
        ctx.moveTo(i+25,0);
        ctx.lineTo(i+25,lienzo.height);
        ctx.closePath();
        ctx.stroke();
    }
    // líneas verticales
    for (let j = 0; j < lienzo.height; j+=25) {
        ctx.strokeStyle = "#ffffff";
        ctx.beginPath();
        ctx.moveTo(0, j+25);
        ctx.lineTo(lienzo.width,j+25);
        ctx.closePath();
        ctx.stroke();
    }
})
