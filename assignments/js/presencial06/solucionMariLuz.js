"use strict"
let horas = 0;
$(() => {

    validarFrm() //Para validar el formulario

    $("#fecha").on("change", cargarBen);
    $("#benf").on("change", cargarAsistentes);

    $(".buscar").on("click", cargarTareas)
    $("#cancelar").on("click", limpiarCampos)
})


function cargarBen() {
    limpiarCampos();
    let fecha = new Date($("#fecha").val())
    //comprobar fecha
    if (fecha.getTime() < new Date().getTime()) {
        swalError("warning", "La fecha no puede ser anterior a la fecha actual")

        $(this).val("");
        $(this).focus();

    } else {
        $.ajax({
                url: "php/beneficiarios.php",
                type: "POST",
                dataType: "json",
                data: {
                    fecha: $("#fecha").val()

                }
            })
            .done(function (response) {

                $("#benef option:gt(0)").remove(); //limpiar el select
                //ordenar
                response.data.sort((a, b) => {
                    return b.prioridad - a.prioridad
                })
                $(response.data).each((ind, ele) => {
                    $("#benf").append("<option id=" + ele.idBenef + " data_cp=" + ele.codigoPostal + ">" + ele.apellidosNombre + " - " + ele.prioridad + "</option>");
                })


            })
            .fail(function () {
                Swal.fire("Error al cargar asistentes", "Error", "error")

            })
    }


}

function limpiarCampos() {

    $("#benf option:gt(0)").remove();
    $("#asistentes option:gt(0)").remove();
    $(".card-body").empty();
}

function cargarAsistentes() {
    //limpiar
    $("#asistentes option:gt(0)").remove();
    $(".card-body").empty();

    $.ajax({
            url: "php/asistentes.php",
            type: "POST",
            dataType: "json",
            data: {
                codigoP: $("#benf option:selected").attr("data_cp")
            }
        })
        .done(function (respuesta) {

            $("#asistentes option:gt(0)").remove();
            $(respuesta.data).each((ind, ele) => {
                $("#asistentes").append("<option id=" + ele.idAsistente + ">" + ele.apellidosNombre + "</option>");
            })


        })
        .fail(function () {
            Swal.fire("Error al cargar asistentes", "Error", "error")

        })
}

function cargarTareas() {
    //limpiar campos
    $(".card-body").empty();
    //
    if ($("#fecha").val() != "" && $("#benf").val() != "" && $("#asistentes").val() != "") {
        let xmlHttp = crearConexion();
        xmlHttp.open("POST", "php/tareas.php", true);
        //establecer las cabeceras
        xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xmlHttp.onreadystatechange = function () {
            if (xmlHttp.readyState == 4) {
                if (xmlHttp.status == 200) {
                    let datos = JSON.parse(xmlHttp.responseText);

                    horas = 0; //inicializar las horas

                    $(".headerbeneficiario").text("Tareas de " + $("#benf").val());
                    $(".headertareasAsig").text("Tareas asignadas a " + $("#asistentes").val());
                    $(".beneficiario").empty();

                    $(datos.data).each((ind, ele) => {
                        $(".beneficiario").append(`<li id=${ele.idTarea} data_horas=${ele.tiempo}>${ele.descripcion} - ${ele.tiempo} horas</li>`)
                    })
                    $(".beneficiario li").on("click", selTareas)
                } else {
                    swalError("error", "Fichero no encontrado")

                }
            }
        };
        xmlHttp.send(`fecha=${$("#fecha").val()}&beneficiario=${$("#benf option:selected").attr("id")}`); //comienzo petición al servidor  
    } else {
        swalError("warning", "Debe seleccionar fecha, beneficiario y asistente")

    }
}


function selTareas() {
    console.log(horas)
    if ((horas + parseInt($(this).attr("data_horas"))) <= 8) {
        //comprobar que tarea no esté ya cargada
        if ($(".tareasAsig").find("li:contains(" + $(this).text() + ")").length == 0) {
            $(".tareasAsig").append("<li id=" + $(this).attr("id") + " data_horas=" + $(this).attr("data_horas") + ">" + $(this).text() + "</li>");

            horas += parseInt($(this).attr("data_horas")); //sumar las horas
            $(".tareasAsig li:last").on("dblclick", eliminar) //establecer la funcionalidad para eliminar
        } else {
            swalError("error", "Tarea ya asignada")
        }
    } else {
        swalError("error", "El asistente solo puede trabajar 8 horas diarias")

    }
}

function eliminar() {
    //eliminar tarea
    horas -= parseInt($(this).attr("data_horas")); //restar las horas
    $(this).remove(); //eliminar


}

function validarFrm() {
    $(".frm").validate({
        //estilo
        errorElement: "em",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback"),
                error.insertAfter(element)
        },
        //border un error
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        //reglas
        rules: {

            fecha: "required",
            beneficiario: "required",
            asistentes: "required",

        },

        submitHandler: function (form) { //evento al enviar el formulario
            if ($(".tareasAsig li").length > 0) {
                grabarTarea()
            } else {
                swalError("warning", "Debes seleccionar como mínimo una tarea")

            }
        }


    })
}

function grabarTarea() {
    $(".tareasAsig li").each((ind, ele) => {
        let datos = new FormData();
        datos.append("codigo", $("#cdg").val())
        datos.append("fecha", $("#fecha").val())
        datos.append("benef", $("#benf option:selected").attr("id"))
        datos.append("asist", $("#asistentes option:selected").attr("id"));
        datos.append("tarea", $(ele).attr("id"));


        fetch("php/grabarTareas.php", {
                method: 'POST',
                body: datos
            })
            .then((response) => {
                if (response.ok) {
                    //decodificar como texto la respuesta
                    return response.json()

                } else {
                    //provocar un error para que salte el catch
                    throw response
                }
            })
            .then((datos) => {
                swalError("success", "Tareas grabadas")

                limpiarCampos();


            })
            .catch((error) => {
                swalError("error", "Error " + error.status, )

            })
    })


}

let swalError = (icono, titulo, texto) => {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        timer: 1000,
        showConfirmButton: false,
        title: titulo,
        text: texto
    });
}