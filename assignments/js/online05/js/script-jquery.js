"use strict";
// Módulos
import { Carta } from "./carta.mjs";

// Variables
let baraja = [];
let puntuacion = 0;
let ganadas = 0;
let perdidas = 0;
let plantadas = 0;

// Evento
//===============================================================================

$(()=>{
    // Mostrar el tablero
    $('#comenzar').on("click", mostrarTablero);
    // Funcionalidad botón "Carta"
    $('#botonCarta').on("click", sacarCarta);
    // Funcionalidad botón "Me Planto"
    $('#botonMePlanto').on("click", plantarse);
})

// Funciones
//===============================================================================

let mostrarTablero = () => {
    if (comprobarCamposVacios()) {
        // por alguna razón show() no me funciona
        $("#tablero").addClass("visible");
        $("#tableroPuntos").append(crearElemento("e", "h2"));
        $("#tableroPuntos h2:first").text("Puntuación");
        $("#tableroPuntos").append(crearElemento("e", "input", {"type":"text", "readonly": true, "value":0}));
        $(".baraja:first").append(crearElemento("e", "img", {
            "src":"./imagenes/cartaVuelta.jpg",
            "alt":"cartaVuelta"
        }));
        $("#botonCarta").append(crearElemento("e", "button"));
        $("#botonCarta button:first").addClass("btn btn-primary").text("Carta");
        $("#botonMePlanto").append(crearElemento("e", "button"));
        $("#botonMePlanto button:first").addClass("btn btn-danger").text("Me planto");
        
        $("#comenzar").prop("disabled", true);

        baraja = barajar(generarBaraja());
    }
}

let comprobarCamposVacios = () => {
    // mensaje de error
    let error = "Este campo no puede estar vacío";
    let errorEdad = "Debes tener más de 18 años";
    let salida;
    // limpiamos mensajes de error
    $("#errorUser").removeClass("requerido").empty();
    $("#errorEdad").removeClass("requerido").empty();

    if ($("#usuario").val().length <= 0){
        $("#errorUser").text(error).addClass("requerido");
        salida = false;
    } else {
        salida = true;
    }

    if ($("#edad").val().length <= 0){
        $("#errorEdad").text(error).addClass("requerido");
        salida = false;
    } else if ($("#edad").val() < 18) {
        $("#errorEdad").text(errorEdad).addClass("requerido");
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
    // también podría usarse replaceWith()
    $(".baraja:first").html(crearElemento("e", "img", {"src": rutaCarta}));

    // Sumar puntuación y mostrarla
    puntuacion += baraja[0].getPuntos();
    // $("#tableroPuntos input:first").attr("value", puntuacion);
    $("#tableroPuntos input:first").val(puntuacion);
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
    puntuacion = 0;
    $(".baraja:first img").attr("src", "./imagenes/cartaVuelta.jpg");
    $("#tableroPuntos input:first").val(puntuacion);
    // $("#tableroPuntos input:first").attr("value", puntuacion);
}

let finalizar = () => {
    // guarda los datos en una cookie
    guardarDatos();
    // limpiar tablero y datos
    reiniciar();
}

// Auxiliares
//===============================================================================

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

let guardarDatos = () => {
    
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
    $("#tablero").hide(); // esconde el tablero
    $(".main-section:first input").val("");
    // $("#comenzar").prop("disabled", false);
}
