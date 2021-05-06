"use strict"

let xmlHttp;
let dtTable;

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
                // también se puede insertar idzona 
                // en un atributo custom, tipo idzona=...
                $("#zona").append(`<option value="${elem.idzona}">${elem.descripcion}</option>`);
            })
        }
    }
    // enviar la petición
    xmlHttp.send();
}

let cargarInmuebles = () => {
    // recuperar datos del formulario
    if (dtTable) {
        dtTable.destroy();
        $(".botonGrabar").remove();
    };

    let datos = {
        zona: $("#zona option:selected").val(),
        habitaciones: $(".form-check-input:checked").val(),
        precio: $("#precio option:selected").val()
    };
    configTable(datos);
}

let validar = () => {

    $(".formInmo").validate({
        errorElement: "em",
        errorPlacement: function (error, element) {
            error.addClass('error');
            if ($(element).attr('type') == "radio") {
                // error.insertAfter(element.parents(".check:last-child"));
                error.appendTo(".check");
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
            // mostrar datos
            cargarInmuebles();
        },
    })

}

let configTable = (data) => {
    
    dtTable = $(".table").DataTable({
        "ajax":{
            url: "php/inmuebles.php",
            type: "POST",
            data: data,
            dataType:"json",
            // dataSrc: "",
        },
        // "processing": true,
        "columns":[
            {
                data:"idinmuebles"
            },
            {
                data:"domicilio"
            },
            { 
                data:"precio" 
            }, 
        ],
        "sPaginationType": "full_numbers",
        "language" :  {
            url: "./lib/datatables/Spanish.json"
        },
        "initComplete": function(json) {
            if (json.json.data.length > 0) {
                $(".capaGrabar").append("<button class='botonGrabar btn btn-primary'>Grabar</button>");
                $(".botonGrabar").on('click', reservar);

                $(".table tbody tr").on('click', function() {
                    $(this).toggleClass("selected");
                });

            }
        }

    })

}

let reservar = () => {
    // lo de table no funciona
    $(dtTable.rows('.selected').data()).each(function(ind, datos) {
        let param = new FormData();

        // append data to datos...
        param.append("dni", $("#dni").val());
        param.append("inmueble", datos.idinmuebles);

        fetch("php/reservas.php", {
                method: 'POST',
                body: param,
            })
            .then(response => response.json())
            .then((response) => {
                console.log(response);

                if (response.mensaje != "Error") {
                    // send message...
                    Swal.fire("Reserva guardada", "", "success");
                } else {
                    // send message...
                    console.log(response);
                    Swal.fire("Algo ha ido mal");
                }

            })
            .catch((err) => {
                Swal.fire("Error: " + err);
            });
    })
}
