"use strict"

let boton = "<button type='button' class='editar btn btn-primary mr-2'><i class='fas fa-edit'></i></button><button type='button' class='del btn btn-danger'><i class='fas fa-trash-alt'></i></button>";
let formDialog; // guardamos estructura y dimensiones del modal

$(()=>{
    // establecer evento click a añadir
    $("#add").on('click', nuevoPerro);
    // deshabilitar dias posteriores a fecha actual
    $("#fechaN").datepicker({
        maxDate: 0,
        dateFormat: "yy-mm-dd"
    }); 
    configFormDialog();
    configFormValidate();

    mostrarPerros();
})

let nuevoPerro = () => {
    // abrir modal
    formDialog.dialog("option", "title", "Nueva mascota");
    formDialog.dialog("open");
}

let mostrarPerros = () => {
    fetch('php/mostrarPaginador.php')
    .then( response => response.json()) // o response.text
    .then( function(response) {
        $(response.data).each((ind, ele) => {
            $("tbody").append(
                `<tr>
                <td>${ele.chip}</td>
                <td>${ele.nombre}</td>
                <td>${ele.raza}</td>
                <td>${ele.fechaNac}</td>
                <td>${boton}</td>
                </tr>`)
        })
        // asignar eventos a los botones
        $(".editar").on('click', editarPerro);
        $(".del").on('click', borrarPerro);
    })
    .catch( function(err) {
        Swal.fire("Error: " + err);
    })
}

let editarPerro = () => {
    alert("editar");
}; 

let borrarPerro = function() {
    let fila = $(this).parents("tr");
    console.log(fila);
    Swal.fire({
        title: '¿Desea eliminar el registro?',
        text: "Chip->" + $(fila).find("td:first").text(), // recupero el texto del primer td (el chip)
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'Mejor no',
        focusCancel: true, // el foco en la opción menos mala
    }).then((result) => {
        if (result.isConfirmed) {
            // Swal.fire(
            //     '¡Eliminado!',
            //     'Your file has been deleted.',
            //     'success'
            // )

            eliminar(fila);
        }
    })
}; 

let eliminar = (fila) => {

    $.ajax({
        url: "php/eliminar.php",
        type: "POST",
        data: {
            chip: $(fila).find("td:first").text()
        }
    })
    .done(function (response, textStatus, jqXHRs) {
        // borrar fila de la tabla
        $(fila).remove();
        swalError("error", "Perro eliminado", "");
    })
    .fail(function (response, textStatus, errorThrown) {
        swalError("error", textStatus, errorThrown);
    });
}

// Configura el aspecto del diálogo modal
let configFormDialog = () => {
    formDialog = $( ".container-fluid" ).dialog({
        autoOpen: false,
        width: 500,
        modal: true,
    });   
}

let configFormValidate = () => {

    // establecer nueva regla patrón
    $.validator.addMethod("regExpNom", function(value, element, expresion){
        let reg= new RegExp(expresion);
        return this.optional(element) || reg.test(value)
    });

    $(".form-horizontal").validate({
        // aspecto de los mensajes
        errorElement: "em",
        errorPlacement: function(error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        },
        // añadir borde al elemento erróneo
        highlight: function(element) {
            $(element).addClass("is-invalid");
        },
        // si es correcto, destacarlo también
        unhighlight: function(element) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        },
        rules: {
            chip:{
                required:true,
                minlength:4,
                maxlength:14
            },
            // nombre: "required",
            nombre: {
                required: true,
                regExpNom: /^[a-zá-ú\sñ]+$/i
            },
            raza: {
                required:true,
                minlength:3,
                maxlength:20
            },
            fechaN:{
                required:true,
                date:true
            }
        },
        messages:{
            chip:{
                required: "El chip de la mascota es obligatorio",
                minlength: "Mínimo de caracteres es 4"
            }
        },
        submitHandler:() => {
            // swalError("Grabar");
            if ($(":submit").text() == "Añadir") {
                addRegistro();
            } else {
                updateRegistro();
            }
        }
    })
}

let addRegistro = () => {
    let datos = $(".form-horizontal").serialize();    
    console.log(datos);

    // con xmlHttp
    // crear objeto xmlHttp diferente para cada consulta
    let xmlHttp = crearConexion();
    xmlHttp.open("POST", "php/insertar.php", true);
    // pasar cabecera
    xmlHttp.setRequestHeader(
        "Content-Type",
        "application/x-www-form-urlencoded"
    );
    xmlHttp.onreadystatechange = () => {
        if (xmlHttp.readyState == 4 &&
            xmlHttp.status == 200) {

            // recojo la información del servidor y la muestro
            let respuesta = JSON.parse(xmlHttp.responseText); 
            console.log(respuesta);

            if (respuesta.mensaje != "Error") {
                swalError("success", "Mascota insertada", true);
                // insertar en la tabla el perro desde los datos del formulario
                $("tbody").append(
                    `<tr>
                    <td>${$("#chip").val()}</td>
                    <td>${$("#nombre").val()}</td>
                    <td>${$("#raza").val()}</td>
                    <td>${$("#fechaN").val()}</td>
                    <td>${boton}</td>
                    </tr>`
                )
                // asignar eventos a los botones
                $(".editar").on('click', editarPerro);
                $(".del").on('click', borrarPerro);

                // borrar datos del modal
                cerrarModal();
            } else {
                swalError("error", "Fallo! Mascota no insertada");
            }


        }
    }
    // enviar la petición
    xmlHttp.send("ca="+$("#regiones").val());
}

let cerrarModal = () => {
    formDialog.dialog("close");
    // limpia los datos y las clases de validación
    $(".form-control").val("");
    $(".form-control").removeClass("is-valid").removeClass("is-invalid");
}

let swalError = (icono, titulo, texto) => {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        timer: 1000,
        showConfirmButton: false,
        title:titulo,
        text:texto
    })
}
