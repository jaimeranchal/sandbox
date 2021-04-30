"use strict";

$(()=>{
    // ...
    $("#toggleVisible")
        .text("Ocultar")
        .on('click', ocultar)
})

let ocultar = () => {
    let mensaje;
    $("#ej2 p").fadeToggle(3000);
    mensaje = ($("#toggleVisible").text() == "Ocultar") ? "Mostrar" : "Ocultar";
    $("#toggleVisible").text(mensaje);
}
