"use strict"

$(() => {
    mostrarProv();
    $("#provincias").on("change", mostrarProv);

})

let mostrarProv = () => {

    $.ajax({
        url: "https://raw.githubusercontent.com/IagoLast/pselect/master/data/provincias.json",
        type: "GET",
        dataType:"json"

        })
        .done(function (responseText, textStatus, jqXHRs) {
           
            //ordenar por descripción
            responseText.sort((a, b) => {
                return a.nm.localeCompare(b.nm)
            })
           
            $(responseText).each((ind, elemento) => {
                $("#provincias").append("<option cp=" + elemento.id + ">" + elemento.nm + "</option>")
            });

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
        })
}