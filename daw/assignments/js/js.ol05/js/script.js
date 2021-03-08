"use strict";

// Módulos
import { Carta } from "./carta.mjs";

// Variables
let usuario, edad;
let comenzar;
let tablero, tableroPuntos, cartaBaraja;
let botonCarta, botonMePlanto;
let baraja = [];
let puntuacion = 0;
let ganadas = 0;
let perdidas = 0;
let plantadas = 0;

window.addEventListener('load', ()=>{
    // elementos
    usuario = document.getElementById("usuario");
    edad = document.getElementById("edad");
    comenzar = document.getElementById("comenzar");
    tablero = document.getElementById("tablero");
    tableroPuntos = document.getElementById("tableroPuntos");
    cartaBaraja = document.getElementsByClassName("baraja")[0];
    botonCarta = document.getElementById("botonCarta");
    botonMePlanto = document.getElementById("botonMePlanto");
    // eventos
    comenzar.addEventListener('click', mostrarTablero);
    botonCarta.addEventListener('click', sacarCarta);
    botonMePlanto.addEventListener('click', plantarse);
});

// Funciones
let mostrarTablero = () => {
    if (comprobarCamposVacios()) {
        
        tablero.classList.add("visible");
        tableroPuntos.appendChild(crearElemento("e", "h2"));
        tableroPuntos.getElementsByTagName("h2")[0].innerText = "Puntuación";
        tableroPuntos.appendChild(crearElemento("e", "input", {"type":"text", "readonly": true, "value":0}));
        cartaBaraja.appendChild(crearElemento("e", "img", {"src":"./imagenes/cartaVuelta.jpg", "alt":"cartaVuelta"}));
        botonCarta.appendChild(crearElemento("e", "button"));
        botonCarta.getElementsByTagName("button")[0].className = "btn btn-primary";
        botonCarta.getElementsByTagName("button")[0].innerText = "Carta";
        botonMePlanto.appendChild(crearElemento("e", "button"));
        botonMePlanto.getElementsByTagName("button")[0].className = "btn btn-danger";
        botonMePlanto.getElementsByTagName("button")[0].innerText = "Me planto";
        // generamos una baraja y la barajamos
        baraja = barajar(generarBaraja());
        // deshabilitamos el botón comenzar
        comenzar.disabled = true;
    }
}

let comprobarCamposVacios = () => {
    // mensaje de error
    let error = "Este campo no puede estar vacío";
    let errorEdad = "Debes tener más de 18 años";
    let salida;

    if (usuario.value.length <= 0){
        document.getElementById("errorUser").innerText = error;
        document.getElementById("errorUser").classList.add("requerido");
        salida = false;
    } else {
        salida = true;
    }

    if (edad.value.length <= 0){
        document.getElementById("errorEdad").innerText = error;
        document.getElementById("errorEdad").classList.add("requerido");
        salida = false;
    } else if (parseInt(edad.value) < 18) {
        document.getElementById("errorEdad").innerText = errorEdad;
        document.getElementById("errorEdad").classList.add("requerido");
        salida = false;
    } else {
        salida = true;
    }

    return salida;
}
     
// Añade las cartas a un array en un orden aleatorio 
// cada vez que se invoca
let barajar = (baraja) => {
    let indice = baraja.length;
    let valorTemporal, indiceAleatorio;

    // Recorre el array hacia atrás mientras queden cartas por mezclar
    while (indice !== 0) {
        // seleccionar carta aleatoria
        indiceAleatorio = Math.floor(Math.random() * indice);
        indice--;

        // la intercambia con la actual
        // Primero guardamos el valor de la carta en una variable
        valorTemporal = baraja[indice];
        // Igualamos la carta con otra aleatoria
        baraja[indice] = baraja[indiceAleatorio];
        // Igualamos la carta aleatoria con la primera seleccionada,
        // usando el valorTemporal (si usara el índice ya no valdría,
        // porque lo acabo de cambiar)
        baraja[indiceAleatorio] = valorTemporal;
    }

    return baraja;
}

let generarBaraja = () => {
    // array de objetos: palo, numero, puntos, imagen
    let carta, puntos, imagen;
    let palos = ["bastos", "copas", "espadas", "oros"];

    // crea un objeto carta
    for (let palo of palos) {
        // genera 10 cartas
        for (let i = 1; i < 13; i++) {
            // excluimos los números 8 y 9
            if (i < 8 || i > 9) {
                puntos = (i < 10) ? 1:0.5;
                // cadena con el nombre de la imagen
                imagen = palo + "_" + i + ".jpg";
                // generamos la imagen
                carta = new Carta(palo,i,puntos, imagen);
                // lo añade
                baraja.push(carta);
            }
        }
    }

    // generar baraja
    return baraja;
}

let sacarCarta = () => {
    let rutaCarta = "./imagenes/baraja/"+baraja[0].getImagen();
    // Mostrar primera carta de la baraja y la elimina
    cartaBaraja.replaceChild(
        crearElemento("e", "img", {"src": rutaCarta}),
        cartaBaraja.getElementsByTagName("img")[0]
    );
    // Sumar puntuación y mostrarla
    puntuacion += baraja[0].getPuntos();
    tableroPuntos.getElementsByTagName("input")[0].value = puntuacion;
    // Elimina esa primera carta
    baraja.shift();
    // Mensaje de victoria o derrota
    if (puntuacion > 7) {
        if (puntuacion == 7.5) {
            mensajeSwal('¡¡Ha ganado!!');
            ganadas++;
        } else {
            mensajeSwal('¡¡Ha perdido!!');
            perdidas++;
        }
    }
}

let plantarse = () => {
    mensajeSwal('¡¡Se ha plantado!!');
    plantadas++;
}

// reinicia la puntuacion a 0 y muestra la carta boca abajo
let seguirJugando = () => {
    let rutaCarta = "./imagenes/cartaVuelta.jpg";
    puntuacion = 0;
    cartaBaraja.replaceChild(
        crearElemento("e", "img", {"src": rutaCarta}),
        cartaBaraja.getElementsByTagName("img")[0]
    );
    tableroPuntos.getElementsByTagName("input")[0].value = puntuacion;
}

let finalizar = () => {
    let clave, valor;
    // Deshabilita botones Carta y mePlanto
    botonCarta.getElementsByTagName("button")[0].disabled = true;
    botonMePlanto.getElementsByTagName("button")[0].disabled = true;
    
    // guarda los datos en una cookie
    // fecha actual
    let ahora = new Date();
    let objeto = {
        edad: edad.value,
        fecha:ahora.toLocaleDateString()+" "+ahora.toLocaleTimeString(),
        ganadas: ganadas,
        jugadas: ganadas+perdidas+plantadas,
        perdidas:perdidas,
        plantadas:plantadas
    };
    //convertir json a cadena
    objeto = JSON.stringify(objeto);
    localStorage.setItem("usuario" 
    + (localStorage.length + 1), objeto)

}

// Auxiliares
let mensajeSwal = (texto) => {
    Swal.fire({
        title: texto,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Seguir jugando',
        cancelButtonText: 'Fin del juego'
    }).then((result) => {
        if (result.isConfirmed) {
            seguirJugando();
        } else if (result.dismiss) {
            finalizar();
            reiniciar();
        } else {
            reiniciar();
        }
    })
}

// versión que usa un array de atributos (más flexible)
let crearElemento = (elem, tag, attributes) => {
    let elemento;
    
    if (elem == "e") {
        elemento = document.createElement(tag);
        for (let attr in attributes) {
            if (attributes[attr] != null) {
                elemento.setAttribute(attr, attributes[attr]);
            }
            attributes[attr]
        }
    } else {
        elemento = document.createTextNode(tag);
    }
    return elemento;
}

let reiniciar = () => {
    // reiniciamos las variables
    puntuacion = 0;
    ganadas = 0;
    perdidas = 0;
    plantadas = 0;
    baraja = [];

}
