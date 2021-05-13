"use strict";
let xmlHttp;
let beneficiario, asistente;

$(() => {
    
    xmlHttp = crearConexion();

    if (xmlHttp != undefined) {
        
        $("#fecha").on('blur', validarFecha);
        $("#benf").on('blur', cargarAsistentes);
        $("#ftarea button").on('click', buscarTareas);
        
    } else {
        swal.fire("El navegador no soporta AJAX"+
                " La página no tendrá funcionalidad");
    }

});

/* Carga de datos */
//--------------------------------------------------------------------------------
let cargarBeneficiarios = (valor) => {
    $.ajax({
        url: "./php/beneficiarios.php",
        type: "POST",
        async: true,
        data: {
            fecha: valor,
        },
        })
        .done(function(response, textStatus, iqXHRs){

            // limpia las opciones
            $("#fecha option:gt(0)").remove();

            // carga options en el select de beneficiarios
            $(response.data).each( (ind, ele) => {
               $("#benf").append(`<option value=${ele.codigoPostal}>${ele.apellidosNombre} - Prioridad ${ele.prioridad}</option>`); 
            });

        })
        .fail(function(response, textStatus, iqXHRs){

            swalMessage("error", "Error", "Fallo al conectar a la base de datos")

        });
}

let cargarAsistentes = () => {
    let datos = new FormData();

    console.log($("#benf option:selected").val());

    datos.append("codigoP", $("#benf option:selected").val());

    fetch("./php/asistentes.php",
        {
            method: 'POST',
            body: datos,
        })
        .then(response => response.json())
        .then((response) => {
            
            $(response.data).each((index, element) => {

                $(response.data).each( (ind, ele) => {
                   $("#asistentes").append(`<option value=${ele.idAsistente}>${ele.apellidosNombre}</option>`); 
                });

            })

        })
        .catch((err) => {

            swalMessage("error", "Error", "Fallo al conectar a la base de datos")

        });
}

let cargarTareas = () => {
    let fecha = $("#fecha").val();
    beneficiario = $("#benf option:selected").val();

    let datos = "fecha="+fecha+"&beneficiario="+beneficiario;
    let xmlHttp = crearConexion();

    xmlHttp.open("POST", "./php/tareas.php", true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.onreadystatechange = () => {

        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {

            let respuesta = JSON.parse(xmlHttp.responseText);

            if (respuesta.mensaje != "Error") {

                $(".beneficiario").append("<ul></ul>");



            } else {

                swalMessage("error", "Error", "Fallo al conectar a la base de datos")

            }
        }
    }

    xmlHttp.send(datos);
}
/* Botones */
//--------------------------------------------------------------------------------

let buscarTareas = () => {
    if ($("#benf option:selected").val() != "" && $("#asistentes option:selected").val() != "") {
        beneficiario = $("#benf option:selected").text();
        asistente = $("#asistentes option:selected").text();
        // Actualiza el título 'Tareas de' + beneficiario
        $(".headerbeneficiario").text("Tareas de "+beneficiario);
        // Actualiza el título 'Tareas asignadas a' + asistente
        $(".headertareasAsig").text("Tareas asignadas a "+asistente);
        // Muestra los datos

    }
    console.log("Has pulsado el botón buscar tareas");
}

/* Funciones auxiliares */
//--------------------------------------------------------------------------------

let swalMessage = (icono, titulo, texto) => {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        timer: 5000,
        showConfirmButton: false,
        title: titulo,
        text: texto
    })
}

let validar = () => {
    
    $(".frm").validate({
        // valida al perder el foto
        onsubmit: false,
        onfocusout: true,
        // aspecto de los mensajes
        errorElement: "em",
        errorPlacement: function (error, element) {
            error.addClass("invalido");
            error.insertAfter(element);
        },
        // aspecto del error
        highlight: function (element) {
            $(element).addClass("invalido");
        },
        // si es correcto la clase 'invalido'
        unhighlight: function (element) { 
            $(element).removeClass("invalido")
        },
        // reglas
        rules: {
            fecha: {
                required: true,
            },

            // ...

        },
        messages: {
            fecha: {
                required: "Campo obligatorio",
            },

            // ...

        },
        submitHandler: () => {

            //...

        }
    })
}

let validarFecha = () => {
    let seleccion = $("#fecha").val();

    if (seleccion != "") {
        let hoy = new Date();
        let fecha = new Date(seleccion);

        if (fecha.getDate() >= hoy.getDate() &&
            fecha.getMonth() >= hoy.getMonth() &&
            fecha.getFullYear() >= hoy.getFullYear()
        ) {
            console.log("las fechas son iguales");
            cargarBeneficiarios(seleccion);
        } else {
            swalMessage( "error", "Fallo", "La fecha no puede ser anterior a hoy" );
        }
    }
}
