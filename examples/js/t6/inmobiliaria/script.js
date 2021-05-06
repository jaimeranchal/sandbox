"use strict"

let xmlHttp;

$(() => {
    // cargar datos
    
    xmlHttp = crearConexion(); // crear objeto xmlHttp

    if (xmlHttp != undefined) {
        cargarZonas();
    } else {
        swal.fire("El navegador no soporta AJAX"+
                " La página no tendrá funcionalidad");
    }
    // botones
    $("button:contains(Buscar)").on('click', validar);

});

let cargarZonas = () => {
    xmlHttp.open("GET", "./php/zonas.php", true);
    // xmlHttp.setRequestHeader(
    //     "Content-Type",
    //     "application/x-www-form-urlencoded"
    // );
    xmlHttp.onreadystatechange = () => {
        if (xmlHttp.readyState == 4 &&
            xmlHttp.status == 200) {

            let datos = JSON.parse(xmlHttp.responseText);

            $(datos.data).each((index,elem) => {
                $("#zona").append(`<option value="${elem.idzona}">${elem.descripcion}</option>`);
            })
        }
    }
    // enviar la petición
    xmlHttp.send();
}

let cargarInmuebles = () => {
    // recuperar datos del formulario
    let zona = $("#zona option:selected").val();
    let numhab = $("input[type='radio']:checked").val();
    let precio = $("#precio option:selected").val();

    $.ajax({
        url: "./php/inmuebles.php",
        type: "POST",
        async: true,
        data: {
            zona: zona,
            numhab: numhab,
            precio : precio,
        }
    })
    .done(function (responseText, textStatus, jqXHRs) {
       
        // mostrar datos
        configTable();
        $(".table").DataTable();
    })
    .fail(function (response, textStatus, errorThrown) {
        Swal.fire("Error: " + errorThrown);
    })
}

let validar = () => {

    $(".formInmo").validate({
        errorElement: "em",
        errorPlacement: function (error, element) {
            error.addClass('error');
            if ($(element).attr('type') == "radio") {
                error.insertAfter(element.parents(".check:last-child"));
            } else {
                error.insertAfter(element);
            }
        },
        //establecer borde al objeto del error
        highlight: function (element) {
            $(element).addClass("invalido");
        },
        unhighlight: function (element) { //validación correcta
            $(element).removeClass("invalido")
        },
        rules: {
            dni: {
                required:true,
            },
            zona: {
                required: true,
            },
            numhab: { 
                required:true, 
            },
            precio: {
                required: true,
            },
        },
        messages: {
            dni: "Debe introducir su dni",
            zona: "Debe elegir una zona",
            numhab: "Elija un número de habitaciones",
            precio: "Elija un rango de precios"
        },
        submitHandler: () => {
            cargarInmuebles();
        },
    })

}

let configTable = () => {
    
    dtTable = $(".table").DataTable({
        "ajax":{
            url: "php/inmuebles.php",
            type: "GET",
            dataType:"json"
        },
        "columns":[
            {
                "data":"domicilio"
            },
            { 
                "data":"precio" 
            }, 
        ],
        "sPaginationType": "full_numbers",
        "language" :  {
            url: "./lib/datatables/Spanish.json"
        }

    })

}
