"use strict";

$(()=>{
    crearTabla();
})

let crearTabla = () => {
    // genera dos filas
    for (let i  = 0; i < 2; i++) {
        $("#ej1 table").append(`<tr></tr`); 
        // en cada fila genera dos celdas
        for (let j  = 0; j < 2; j++) {
            // añade un elemento tr a la fila
            $("#ej1 table tr:last")
                .append(`<td>Celda ${i}-${j}</td>`)
                .on('click', 'td', function(event){
                    console.log($(this).text());
                    $(this).toggleClass("red");
                });
        }
    }
    
}

let cambiarColor = function() {
    $(this).toggleClass("red");
}
