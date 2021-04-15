"use strict"

$(() => {
    $("#regiones").on("change", mostrarProv);
})

let mostrarProv = () => {
    $.ajax({
            url: "Ejemplo6.php",
            type: "POST",
            data: {
                ca: $('#regiones').val()
            }
        })
        .done(function (response, textStatus, jqXHRs) {
            let datos = "";
            $(response).find("capital").each((ind, elemento) => {
                datos += $(elemento).text() + "<br>"
            });
            $("#mostrar").html(datos);
        })
        .fail(function (response, textStatus, errorThrown) {
            Swal.fire({
                position:'top-end',
                icon:'error',
                timer:1000,
                showConfirmButton: false,
                title: textStatus,
                text: errorThrown
            });
            
        });


}
