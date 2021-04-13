"use strict"

$(() => {
    $("#boton").on("click", mostrarTexto)
})

let mostrarTexto = () => {
    $.get("ejemploPHP.php", function (response, statusTxt, xhr) {
        if (statusTxt == "success") {
           $("#mensaje").html(response)
            Swal.fire({
                icon: 'success',
                title: 'Oops...',
                text: 'La carga ha sido satisfactoria'
            });
        } else if (statusTxt == "error") {
            Swal.fire("Error: " + xhr.status + ": " + xhr.statusText);
        }
   });
}