// Funciones
let dibujarImagen = (id, ancho, alto) => {
    // cargar imagen y escalarla
    let c = document.getElementById(id).getContext('2d');
    let img = new Image();
    img.onload = () => {
        c.drawImage(img,0,0, ancho, alto);
    }
    img.src = './img/JuanChunguito.png'
}
let dibujarImagen2 = (id, ancho, alto) => {
    // cargar imagen y escalarla
    let c = document.getElementById(id).getContext('2d');
    // rotamos 90 grados
    c.rotate(90 * Math.PI / 180);
    // corregimos el desplazamiento 
    c.translate(0, -200);
    // creamos la imagen
    let img = new Image();
    img.onload = () => {
        c.drawImage(img,0,0, ancho, alto);
        // dibujamos una capa transparente a modo de "filtro"
        c.fillStyle = "rgba(255,42,71,0.2)"
        c.fillRect(0,0, ancho, alto);
    }
    img.src = './img/JuanChunguito.png'
}

let dibujarImagen3 = (id, ancho, alto) => {
    // cargar imagen y escalarla
    let canvas = document.getElementById(id);
    let c = canvas.getContext('2d');
    let img = new Image();
    img.onload = () => {
        c.drawImage(img,0,0, ancho, alto);
        // Invertimos el color
        let imgData = c.getImageData(0,0, c.canvas.width, c.canvas.height);
        let pixels = imgData.data;
        for (let i = 0; i < pixels.length; i += 4){
            let claridad = parseInt((pixels[i] + pixels[i+1] + pixels[i+2]) / 3);

            pixels[i] = claridad;
            pixels[i + 1] = claridad;
            pixels[i + 2] = claridad;
        }
        c.putImageData(imgData, 0,0);
    }
    img.src = './img/JuanChunguito.png'
}

// Eventos
window.addEventListener('load', function(){
    dibujarImagen("a", 200, 200);
    dibujarImagen2("b", 200, 200);
    dibujarImagen3("c", 400, 400);
})
