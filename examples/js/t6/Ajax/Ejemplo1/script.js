"use strict";
let xmlHttp;
$(()=>{
    // crear objeto xmlHttp
    xmlHttp = crearConexion();

    if (xmlHttp!=undefined) {
        // seguimos
        $("#boton").on('click', mostrarMensaje);
    } else {
        swal.fire("El navegador no soporta AJAX"+
                " La página no tendrá funcionalidad");
    }
})

let mostrarMensaje = () => {
    // parámetros de conexión
    xmlHttp.open("GET", "Mensaje.txt", true);
    // gestionamos la comunicación
    xmlHttp.onreadystatechange = () => {
        // si el estado es "recibida" (creo) y
        // si el estado es OK
        if (xmlHttp.readyState == 4 &&
            xmlHttp.status == 200) {

            // recojo la información del servidor y la muestro
            $("#mensaje").text(xmlHttp.responseText);
            
        }
    }
    // enviar la petición
    xmlHttp.send();
}
