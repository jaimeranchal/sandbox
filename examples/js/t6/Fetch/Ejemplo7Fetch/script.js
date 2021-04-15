"use strict"

$(() => {
    $("#regiones").on("change", mostrarProv);
})

let mostrarProv = () => {
    if ($('#regiones').prop("selectedIndex") != 0) {
        // si pasamos los datos como formData no hace falta
        // establecer las cabeceras
        let datos = new FormData();
        datos.append("ca", $('#regiones').val())
       
        fetch("Ejemplo7.php", {
                method: 'POST',
                body: datos,
            })
            .then(response => response.json())
            .then((data) => {
                let cadena = "";

                //borrar el contenido de la capa
                $("#mostrar").empty();

                $(data).each((ind, ele) => {
                    cadena += ele + "<br>";

                });
                $("#mostrar").html(cadena);
            })
            .catch((err) => {
                Swal.fire("Error: " + err);

            });
    }
    

}
