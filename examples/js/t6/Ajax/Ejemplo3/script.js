"use strict";
let xmlHttp;
$(()=>{
    // crear objeto xmlHttp
    xmlHttp = crearConexion();

    if (xmlHttp!=undefined) {
        // seguimos
        $("#POST").on('click', mostrarMensajePost);
        $("#GET").on('click', mostrarMensajeGet);
    } else {
        swal.fire("El navegador no soporta AJAX"+
                " La página no tendrá funcionalidad");
    }
})

let mostrarMensajeGet = () => {
    // parámetros de conexión
    xmlHttp.open("GET", "Ejemplo3.php?valor=GET&nombre=Jaime", true);
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

let mostrarMensajePost = () => {
    // parámetros de conexión
    xmlHttp.open("POST", "Ejemplo3.php", true);
    // enviamos la cabecera explícitamente
    xmlHttp.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
    );
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
    // enviar la petición con los parámetros
    xmlHttp.send("valor=POST&nombre=Amparo");
}
