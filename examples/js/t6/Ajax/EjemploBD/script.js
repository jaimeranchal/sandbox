"use strict";
let xmlHttp;
$(()=>{
    // crear objeto xmlHttp
    xmlHttp = crearConexion();

    if (xmlHttp != undefined) {
        $("#first, #all").on("click", mostrarCan);
    } else {
        swal.fire("El navegador no soporta AJAX"+
                " La página no tendrá funcionalidad");
    }
})

let mostrarCan = function() {
    xmlHttp.open("POST", "./php/mostrar.php", true);

    xmlHttp.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
    );

    xmlHttp.onreadystatechange = () => {
        if (xmlHttp.readyState == 4 &&
            xmlHttp.status == 200) {

            // recojo la información del servidor y la muestro
            // como es devuelve un string hay que "reconvertirlo" a JSON
            let datos = JSON.parse(xmlHttp.responseText);
            console.log(datos);

        }
    }
    // enviar la petición
    //
    // según el botón pulsado hacemos una cosa u otra
    if ($(this).attr("id") == "first") {
        xmlHttp.send("perro=111A");
    } else {
        xmlHttp.send("perro=");
    }
}
