"use strict"

$(() => {
    cargarOpciones('veterinarios', 'vet');
    cargarOpciones('clientes', 'cli');
    $("#cli").on('change', cargarPerros);
    cargarTratamientos();

    // botones
    $("#addCan").on('click', nuevoPerro);
    $("#verHis").on('click', verHistorial);
    $("button.btn-primary").on('click', guardar);

    // alterna tratamientos entre consulta y generales
    $(".consulta").append('<ul></ul>');
    $(".tratamientos").on('dblclick', 'li', addConsulta);
    $(".consulta").on('dblclick', 'li', removeConsulta);

})

/* Cargar datos */
// -------------------------------------------------------------------------

let cargarOpciones = (origen, id) => {
    fetch("./php/"+origen+".php")
    .then(response => response.json())
    .then((datos) => {
        // limpiar modulos
        $("#"+id+" option:gt(0)").remove();

        console.log(datos.datos);

        // añadir options al select#vet
        $(datos.datos).each((ind,ele) => {
            $("#"+id).append(`<option value="${ele['dni']}"> ${ele['nomApe']}</option>`);
        })
    })
    .catch((err) => {
        Swal.fire("Error: " + err);

    });
}

let cargarTratamientos = () => {
    fetch("./php/tratamientos.php")
    .then(response => response.json())
    .then((datos) => {
        // limpiar lista
        $(".tratamientos").empty();

        // añadir la lista
        let lista = $("<ul></ul>");
        $(".tratamientos").append(lista);

        $(datos.datos).each((ind,ele) => {
            $(".tratamientos ul").append(`<li>${ele['descripcion']}</li>`);
        })

    })
    .catch((err) => {
        Swal.fire("Error: " + err);
    });
}

let cargarPerros = () => {
    // recuperar cliente seleccionado
    let id = $("#cli option:selected").val(); 
    // let info = { cliente: id };
    console.log(id);

    // recuperar perros de ese cliente
    $.ajax({
        url: "./php/perros.php",
        type: "POST",
        async: true,
        data: {
            cliente: id,
        }
    })
    .done(function (responseText, textStatus, jqXHRs) {
       
        //limpiar
        $("#can option:gt(0)").remove();

        // añadimos una opción por cada perro
        $(responseText.datos).each((ind,ele) => {
            $("#can").append(`<option value="${ele['chip']}"> ${ele['nombre']}</option>`);
        })
    })
    .fail(function (response, textStatus, errorThrown) {
        Swal.fire("Error: " + err);
    })
}

let cargarHistorial = () => {
    //
    //limpiar
    $(".historial").empty();

    $(".historial").append("<table></table>");
    let tabla = $(".historial table");
    $(tabla).addClass("table");
    $(tabla).append("<thead></thead>", "<tbody></tbody>");
    $(".historial table thead").append(
        "<tr><td>Fecha</td><td>Hora</td><td>Observaciones</td></tr>"
    )

    // recuperar perros de ese cliente
    $.ajax({
        url: "./php/historial.php",
        type: "POST",
        async: true,
        data: {
            chip: $("#can option:selected").val(),
        }
    })
    .done(function (responseText, textStatus, jqXHRs) {
       

        // añadimos una opción por cada perro
        $(responseText.datos).each((ind,ele) => {
            $("tbody").append(
                `<tr>
                    <td>${ele['fecha']}</td>
                    <td>${ele['hora']}</td>
                    <td>${ele['observaciones']}</td>
                </tr>`)
        })
    })
    .fail(function (response, textStatus, errorThrown) {
        Swal.fire("Error: " + err);
    })
}


/* Botones/Acciones */
// -------------------------------------------------------------------------

let nuevoPerro = () => {

    if ($("#cli").prop("selectedIndex") == 0) {
        return swalError("error", "Debe seleccionar un cliente");
    }

    $(".frmAddPerro").dialog({
        modal: true,
        title: 'Alta de perros',
        width: 500,
    })

    validarForm(".frmAddPerro");

}

let verHistorial = () => {

    if ($("#cli").prop("selectedIndex") == 0) {
        return swalError("error", "Debe seleccionar un cliente");
    }

    if ($("#can").prop("selectedIndex") == 0) {
        return nuevoPerro();
    }

    // abrir dialogo modal
    $(".historial").dialog({
        modal: true,
        title: 'Historial de ' + $("#can option:selected").text(),
        width: 1000,
        maxwidth: 1600,
    });

    // crer la tabla en el modal
    cargarHistorial();

}

/**
 * mueve un elemento de los tratamientos a las consultas
 */
let addConsulta = function() {
    $('.consulta ul').append(`<li>${$(this).text()}</li>`)
    $(this).remove();
}

/**
 * mueve un elemento de las consultas a los tratamientos
 */
let removeConsulta = function() {
    $('.tratamientos ul').append(`<li>${$(this).text()}</li>`)
    $(this).remove();
}

let guardar = () => {

    validarForm2(".form-horizontal");

}

/* Auxiliares */
// -------------------------------------------------------------------------

/**
 * Valida los campos del formulario "añadir Perro" y 
 * llama a guardarPerro
 */
let validarForm = (querySelector) => {
    $.validator.addMethod("regExpNom", function (value, element, expresion) {
        let reg = new RegExp(expresion);
        console.log(reg.test(value));
        return this.optional(element) || reg.test(value)
    });

    $(querySelector).validate({
        errorElement: "em",
        rules: {
            chip: {
                required:true,
                regExpNom: /^[0-9]{3}[a-z]$/i,
            },
            nomPer: {
                required: true,
            },
            fechaN: { 
                required:true, 
                date: true,
            },
            raza: {
                required: true,
            },
        },
        messages: {
            chip: "El chip debe tener 3 números y una letra",
            nomPer: "El campo no puede estar vacío",
            fechaN: "La fecha no puede ser posterior a hoy",
            raza: "No se puede dejar en blanco"
        },
        submitHandler: () => {
            guardarPerro();
            cerrarForm(querySelector);
        },
    })
}

/**
 * Valida los campos del formulario general de la página 
 * y llama a guardarConsulta
 */
let validarForm2 = (querySelector) => {

    $(querySelector).validate({
        errorElement: "em",
        rules: {
            fechaC: {
                required:true,
                date: true,
            },
            horaC: {
                required: true,
            },
            vet: { 
                required:true, 
            },
            can: {
                required: true,
            },
        },
        messages: {
            fechaC: "Debe seleccionar una fecha",
            horaC: "Debe seleccionar una hora",
            vet: "Debe seleccionar un veterinario",
            can: "Debe seleccionar un perro"
        },
        submitHandler: () => {
            guardarConsulta();
            cerrarForm(querySelector);
        },
    })
}

/**
 * Limpia el formulario
 */
let cerrarForm = (querySelector) => {

    $(".form-control").val(""); 
    $(querySelector).dialog("close");

}

let guardarPerro = () => {
    
    let datos = new FormData();
    datos.append("chip", $("#chip").val());
    datos.append("nombre", $("#nomPer").val())
    datos.append("raza", $("#raza").val())
    datos.append("fechaN", $("#fechaN").val())
    datos.append("cli", $("#cli option:selected").val())

    fetch("php/saveCan.php", {
            method: 'POST',
            body: datos,
        })
        .then(response => response.json())
        .then((response) => {

            if (response.mensaje != "Error") {
                swalError("success", "Se ha guardado la mascota");
            } else {
                swalError("error", "¡Error! Mascota no guardada", "");
            }

        })
        .catch((err) => {
            Swal.fire("Error: " + err);

        });
}

let guardarConsulta = () => {
    
    let datos = new FormData();
    datos.append("fec", $("#fechaC").val())
    datos.append("hora", $("#horaC").val())
    let observaciones = "";
    $(".consulta li").each( function() {
        observaciones += $(this).text() + ". ";
    });
    datos.append("observaciones", observaciones);
    datos.append("vet", $("#vet option:selected").val())
    datos.append("chip", $("#can option:selected").val())

    fetch("php/saveConsulta.php", {
            method: 'POST',
            body: datos,
        })
        .then(response => response.json())
        .then((response) => {

            if (response.mensaje != "Error") {
                swalError("success", "Se ha guardado la consulta");
            } else {
                swalError("error", "¡Error! Consulta no guardada", "");
            }

        })
        .catch((err) => {
            Swal.fire("Error: " + err);

        });
}

/**
 * Imprime mensajes de error
 */
let swalError = (icono, texto) => {
    Swal.fire({
        position: 'center',
        icon: icono,
        showConfirmButton: true,
        confirmButtonText: "Ok",
        text:texto
    })
}
