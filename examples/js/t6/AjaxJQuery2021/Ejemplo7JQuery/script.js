"use strict"

$(() => {
    $("#regiones").on("change", mostrarProv);
})

let mostrarProv = () => {
    if ($("#regiones").prop("selectedIndex") != 0) {
        $.getJSON("Ejemplo7.php", {ca: $('#regiones').val()}, function (response, textStatus) {
            if (textStatus == "success") {
                let datos = "";
                $(response).each((ind, elemento) => {
                    datos += elemento + "<br>"
                });
                $("#mostrar").html(datos);
            }
        })
    } else {
        $("#mostrar").html("");
    }

}