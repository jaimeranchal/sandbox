"use strict";
let xmlHttp;
$(()=>{
    // crear objeto xmlHttp
    xmlHttp = crearConexion();

    if (xmlHttp != undefined) {
        // seguimos
        $("#cursos").on("change", mostrarModulos);
    } else {
        swal.fire("El navegador no soporta AJAX"+
                " La página no tendrá funcionalidad");
    }
})

let mostrarModulos = () => {
    xmlHttp.open("GET", "Ejemplo5.xml", true);
    xmlHttp.onreadystatechange = () => {
        if (xmlHttp.readyState == 4 &&
            xmlHttp.status == 200) {

            // recojo la información del servidor y la muestro
            let datos = xmlHttp.responseXML;

            // limpiar modulos
            $("#asignaturas option:gt(0)").remove();

            $(datos).find("curso").each((ind,ele) => {
                if (ind == $("#cursos").prop("selectedIndex")-1) {
                    $(ele).find("asig").each((index,mod)=>{
                        $("#asignaturas").append("<option>"+$(mod).text()+ "</option>");
                    })
                }
            })
        }
    }
    // enviar la petición
    xmlHttp.send();
}

