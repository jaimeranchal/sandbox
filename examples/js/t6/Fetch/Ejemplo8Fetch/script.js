"use strict"

$(() => {
    mostrarProv();
    $("#provincias").on("change", mostrarProv);

})

let mostrarProv = () => {
    fetch("https://raw.githubusercontent.com/IagoLast/pselect/master/data/provincias.json")
        // sintaxis abreviada
        .then(response => response.json())
        .then((data) => {
            //ordenar por descripción
            data.sort((a, b) => {
                return a.nm.localeCompare(b.nm)
            })
            $(data).each((ind, elemento) => {
                $("#provincias").append("<option cp=" + elemento.id + ">" + elemento.nm + "</option>")
            });
        })
        .catch((err) => {
            Swal.fire("Error: " + err);

        });
}
