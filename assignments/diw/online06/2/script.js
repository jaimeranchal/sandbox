"use strict";

/**
 * NOTAS:
 * Para este ejercicio utilizo un único botón que muestra y oculta el texto.
 * Al pulsar en "Ocultar" se aplica el efecto desvanecimiento
 * y se cambia el texto del botón a "Mostrar". 
 * Al pulsar de nuevo hará el efecto contrario, mostrando el texto.
 */

$(()=>{
    // vinculo la función ocultar() a un evento 'click' sobre el botón
    // usando su id
    $("#toggleVisible")
        .text("Ocultar")
        .on('click', toggle)
})

/**
 * Función que muestra u oculta el texto
 */
let toggle = () => {
    // variable donde almacenaré el texto del botón
    let mensaje;

    // aplico el efecto desvanecimiento o aparición progresiva utilizando
    // fadeToggle, que combina fadein y fadeout.
    // Le asigno un tiempo de 3 segundos a la animación (3000 milisegundos)
    $("#ej2 p").fadeToggle(3000);

    // Asigno el texto del botón según esté oculto o no el texto,
    mensaje = ($("#toggleVisible").text() == "Ocultar") ? "Mostrar" : "Ocultar";

    // Cambio el texto del botón usando el valor creado antes
    $("#toggleVisible").text(mensaje);
}
