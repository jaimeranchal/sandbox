"use strict"

$(() => {
    cargarOpciones('veterinarios', 'vet');
    cargarOpciones('clientes', 'cli');
    cargarTratamientos();

    $("#cli").on('change', mostrarPerros);

    $("#addCan").on('click', nuevoPerro);
})

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

let mostrarPerros = () => {
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

let nuevoPerro = () => {
    if ($("#cli").prop("selectedIndex") == 0) {
        return swalError("error", "Debe seleccionar un cliente");
    }

    $(".frmAddPerro").dialog({
        modal: true,
        title: 'Alta de perros',
    })

    validarForm(".frmAddPerro");

}

let validarForm = (querySelector) => {
    $(querySelector).validate({
        rules: {
            chip: "required",
            nomPer: "required",
            fechaN: "required",
            raza: "required",
        },
        submitHandler: function(form) {
            // enviar formulario
        },
        messages: {
            chip: "El chip debe tener 3 números y una letra",
            nomPer: "El campo no puede estar vacío",
            fechaN: "La fecha no puede ser posterior a hoy",
            raza: "No se puede dejar en blanco"
        }
    })
}

let swalError = (icono, texto) => {
    Swal.fire({
        position: 'center',
        icon: icono,
        showConfirmButton: true,
        confirmButtonText: "Ok",
        text:texto
    })
}
