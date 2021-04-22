"use strict";
let xmlHttp;
$(()=>{
    // crear objeto xmlHttp
    xmlHttp = crearConexion();

    if (xmlHttp!=undefined) {
        // seguimos
        $("button").on('click', mostrarModulos);
    } else {
        swal.fire("El navegador no soporta AJAX"+
                " La página no tendrá funcionalidad");
    }
})

let mostrarModulos = () => {
    xmlHttp.open("GET", "Ejemplo4.xml", true);
    xmlHttp.onreadystatechange = () => {
        if (xmlHttp.readyState == 4 &&
            xmlHttp.status == 200) {

            // recojo la información del servidor y la muestro
            let datos = xmlHttp.responseXML;
            let mensaje = "";
            $(datos).find("curso").each((ind,ele) => {
                if (ind == 1) {
                    $(ele).find("asig").each((index,mod)=>{
                        mensaje+=$(mod).text()+ "<br>";
                    })
                }
            })
            $("#mensaje").html(mensaje);
        }
    }
    // enviar la petición
    xmlHttp.send();
}

