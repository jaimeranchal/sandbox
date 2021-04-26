"use strict"

$(() => {
    $("#regiones").on("change", mostrarProv);
})

let mostrarProv = () => {
    if ($('#regiones').prop("selectedIndex") != 0) {
        fetch('Ejemplo6.php', {
                method: 'POST',
                // ojo que es diferente de jQuery
                body: `ca=${$('#regiones').val()}`, 
                // Si se le pasa un body, hay que pasar un header
                headers: new Headers({
                    'Content-Type': 'application/x-www-form-urlencoded'
                })
            })
            .then((response) => {
                //decodificar el dato
                return (response.text());
            })
            .then((data) => {
                let datos = "";
                $(data).find("capital").each((ind, elemento) => {
                    datos += $(elemento).text() + "<br>"
                });
                $("#mostrar").html(datos);
            })
            .catch((err) => {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    timer: 1000,
                    showConfirmButton: false,
                    title: textStatus,
                    text: errorThrown
                });
            });
    }
}