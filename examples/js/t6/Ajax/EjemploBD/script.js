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
    xmlHttp.open("POST", "php/mostrar.php", true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.onreadystatechange = () => {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            //vamos parsear
            let datos = JSON.parse(xmlHttp.responseText);
            $("tbody tr").remove(); //vaciar tbody
           $(datos.data).each((ind,ele)=>{
               $("tbody").append("<tr><td>"+ele.chip+"</td><td>"+ ele.nombre+ "</td><td>"+ele.raza+ "</td><td>"+ ele.fechaNac+"</td></tr>");
           })
           
        }
    }
   // enviar la petición
   //
   // según el botón pulsado hacemos una cosa u otra
    if ($(this).attr("id")=="first"){
       xmlHttp.send("perro=111A");
    }else{
        xmlHttp.send("perro=")
    }

}
