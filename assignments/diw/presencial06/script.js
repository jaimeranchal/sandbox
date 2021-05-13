"use strict";

$(function () {
    // hago que todas las fotos de los Simpsons se puedan mover
    $(".foto").draggable();

    // Devuelvo a su sitio las imágenes cuando las suelto en la cerveza
    $("#amosar").droppable({
        drop: function( event, ui ) {
            console.log(ui);
            $(ui.draggable).draggable({ revert:true })
        }
    });

    // Escondo las imágenes al soltarlas sobre el coche
    $("#ocultar").droppable({
        drop: function( event, ui ) {
            $(ui.draggable).addClass("hidden");
        }
    });

    // Destruyo las imágenes cuando las suelto en el donut
    $("#eliminar").droppable({
        drop: function( event, ui ) {
            $(ui.draggable).remove();
        }
    });

    // Muestro todos los personajes que estaban ocultos
    $("#amosar").on('click', () => {
       $(".foto.hidden").removeClass("hidden"); 
    });
});

