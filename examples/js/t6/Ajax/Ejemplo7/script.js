"use strict";
let xmlHttp;
$(()=>{
    // crear objeto xmlHttp
    xmlHttp = crearConexion();

    if (xmlHttp != undefined) {
        // seguimos
        $("#regiones").on("change", mostrarProvincias);
    } else {
        swal.fire("El navegador no soporta AJAX"+
                " La página no tendrá funcionalidad");
    }
})

let mostrarProvincias = () => {
    xmlHttp.open("POST", "Ejemplo7.php", true);
    // establecer las cabeceras
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

            let mensaje = "";

            $(datos).each((ind,ele) => {
                mensaje += ele +"<br>";
            })

            $("#mostrar").html(mensaje);
        }
    }
    // enviar la petición
    xmlHttp.send("ca="+$("#regiones").val());
}

