let canvas = document.querySelector("#a");
let ctx = canvas.getContext("2d");
let canvasWidth = canvas.width = window.innerWidth;
let canvasHeight = canvas.height = window.innerHeight;

class Triangulo {
  constructor() {
    this.rotacion = 0;
    this.posicionx = canvasWidth / 2;
    this.posiciony = canvasHeight / 2;
  }
}

let triangulo = new Triangulo();

let rotacion = (figura) => {
  figura.rotacion += 0.01;
  figura.posicionx += 0.1;
}

let mostrarAnimacion = () => {
  // Fondo con relleno
  ctx.fillStyle = "lightgrey";
  ctx.fillRect(0, 0, canvasWidth, canvasHeight);
  
  // Incrementamos el ángulo y corregimos la posición
  rotacion(triangulo);

  ctx.save();
  ctx.fillStyle = "blue";
  // movemos la figura al centro del canvas
  ctx.translate(canvasWidth /2, canvasHeight / 2);

  // rotamos usando el valor actualizado
  ctx.rotate(triangulo.rotacion);

  // dibujamos la figura
    ctx.beginPath();
    ctx.moveTo(50,0);
    ctx.lineTo(100,100);
    ctx.lineTo(0,100);
    ctx.closePath();
    ctx.fill();

  // restauramos para volver a empezar
  ctx.restore();
  window.requestAnimationFrame(mostrarAnimacion);
}

window.requestAnimationFrame(mostrarAnimacion);
