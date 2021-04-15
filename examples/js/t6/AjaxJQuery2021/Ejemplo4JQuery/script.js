"use strict"

$(() => {
    $(":button").on("click", mostrarTexto);
})

let mostrarTexto = () => {
    
    $.get("Ejemplo4.xml", function (responseTxt, statusTxt, xhr) {
            if (statusTxt == "success") {
                let mensaje = "";
                $(responseTxt).find("curso").each((ind, elemento) => {
                    if (ind == 1) {
                        mensaje = "Módulos de 2º DAW";
                        $(elemento).find("asig").each((index, mod) => {
                            mensaje += `<br>${$(mod).text()}`
                        })
                    }
                })
                //mostrar los módulos a la capa
                $("#mensaje").html(mensaje);
            } else if (statusTxt == "error") {
                Swal.fire("Error: " + xhr.status + ": " + xhr.statusText);
            }
        
    })

}