"use strict";
let xmlHttp;
$(()=>{
    // crear objeto xmlHttp
    xmlHttp = crearConexion();

    if (xmlHttp != undefined) {
        mostrarProvincias();
        $("#provincias").on("change", mostrarCP);
    } else {
        swal.fire("El navegador no soporta AJAX"+
                " La página no tendrá funcionalidad");
    }
})

let mostrarProvincias = () => {
    xmlHttp.open("GET", "https://raw.githubusercontent.com/IagoLast/pselect/master/data/provincias.json", true);
    xmlHttp.onreadystatechange = () => {
        if (xmlHttp.readyState == 4 &&
            xmlHttp.status == 200) {

            // recojo la información del servidor y la muestro
            // como es devuelve un string hay que "reconvertirlo" a JSON
            let datos = JSON.parse(xmlHttp.responseText);

            // ordenamos los datos por el nombre
            datos.sort((a,b) => {
                return a.nm.localeCompare(b.nm);
            })
            $(datos).each((ind,ele) => {
                $("#provincias").append("<option data_cp="+ ele.id +">" + ele.nm + "</option>");
            })

        }
    }
    // enviar la petición
    xmlHttp.send();
}

// extraemos el código postal
let mostrarCP = () => {
    $("#mostrar").text($("#provincias option:selected").attr("data_cp"))
}
