"use strict"

$(() => {
    $(":button").on("click", mostrarTexto);
})

let mostrarTexto = () => {
    fetch('Ejemplo4.xml')
        .then((response) => {
            //decodificar el dato
            return (response.text());
        })
        .then((data) => {
            let mensaje = "";
            $(data).find("curso").each((ind, elemento) => {
                if (ind == 1) {
                    mensaje = "Módulos de 2º DAW";
                    $(elemento).find("asig").each((index, mod) => {
                        mensaje += `<br>${$(mod).text()}`
                    })
                }
            })
            //mostrar los módulos a la capa
            $("#mensaje").html(mensaje);
        })
        .catch((err) => {
            Swal.fire("Error: " + xhr.status + ": " + xhr.statusText);
        });
   
}