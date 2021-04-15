"use strict"

$(() => {
    $("#boton").on("click", mostrarTexto)
})

let mostrarTexto = () => {
    fetch('ejemploPHP.php')
        .then((response) => {
            //decodificar el dato
            return (response.text());
        })
        .then((data) => {
            $("#mensaje").html(data);
            Swal.fire({
                icon: 'success',
                title: 'Oops...',
                text: 'La carga ha sido satisfactoria'
            });
        })
        .catch((err) => {
            Swal.fire("Error: " + xhr.status + ": " + xhr.statusText);
        });

}