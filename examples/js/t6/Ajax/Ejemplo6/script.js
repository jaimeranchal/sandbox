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
    xmlHttp.open("POST", "Ejemplo6.php", true);
    // establecer las cabeceras
    xmlHttp.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
    );
    xmlHttp.onreadystatechange = () => {
        if (xmlHttp.readyState == 4 &&
            xmlHttp.status == 200) {

            // recojo la información del servidor y la muestro
            let datos = xmlHttp.responseXML;

            let mensaje = "";

            $(datos).find("capital").each((ind,ele) => {
                mensaje += $(ele).text()+"<br>";
            })

            $("#mostrar").html(mensaje);
        }
    }
    // enviar la petición
    xmlHttp.send("ca="+$("#regiones").val());
}

