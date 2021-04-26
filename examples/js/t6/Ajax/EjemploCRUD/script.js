"use strict"
let boton = "<button type='button' class='editar btn btn-primary mr-2'><i class='fas fa-edit'></i></button><button type='button' class='del btn btn-danger'><i class='fas fa-trash-alt'></i></button>"
let frmDialog;
let fila;
$(() => {
    //establecer el evento click al botón add
    $("#add").on("click", anadir);
    //deshabilitar días posteriores a la fecha actual
    $("#fechaN").datepicker({
        maxDate: 0,
        dateFormat: "yy-mm-dd"
    })
    confFrmDialog();
    confFormValidacion();
    mostrarPerros();

})
let anadir = () => {
    //abrir la ventana modal
    frmDialog.dialog("option", "title", "Añadir mascota")
    frmDialog.dialog("open");
    $(":submit").text("Añadir");
}
let mostrarPerros = () => {
    fetch("php/mostrarPaginador.php")
        .then(response => response.json())
        .then((response) => {
            $(response.data).each((ind, ele) => {
                $("tbody").append(`<tr><td>${ele.chip}</td><td>${ele.nombre}</td><td>${ele.raza}</td><td>${ele.fechaNac}</td><td>${boton}</td></tr>`)
            })
            //asignar eventos a botones del y editar
            $(".editar").on("click", editarCan);
            $(".del").on("click", delCan)
        })
        .catch((err) => {
            Swal.fire("Error: " + err);

        });
}
let editarCan = function () {
    fila = $(this).parents("tr")
    frmDialog.dialog("option", "title", "Modificar mascota")
    $(":submit").text("Modificar");
    //pasar los datos de la fila al formulario
    $("#chip").val($(fila).find("td:nth-child(1)").text());
    $("#nombre").val($(fila).find("td:nth-child(2)").text());
    $("#raza").val($(fila).find("td:nth-child(3)").text());
    $("#fechaN").val($(fila).find("td:nth-child(4)").text())
    frmDialog.dialog("open");
}
let delCan = function () {
    let fila = $(this).parents("tr")
    console.log($(fila).find("td:first").text());
    Swal.fire({
        title: '¿Desea eliminar el registro',
        text: "Chip->" + $(fila).find("td:first").text(),
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Eliminar',
        cancelButtonText: 'No eliminar',
        focusCancel: true, // foco a la opción menos mala (botón cancelar)
    }).then((result) => {
        if (result.isConfirmed) {
            EliminarCan(fila);
        }
    })
}
let EliminarCan = (fila) => {
    $.ajax({
            url: "php/eliminar.php",
            type: "POST",
            data: {
                chip: $(fila).find("td:first").text()
            }
        })
        .done(function (response, textStatus, jqXHRs) {
            //borrar fila tabla
            $(fila).remove();
            swalError("error", "Perro eliminado", "")
        })
        .fail(function (response, textStatus, errorThrown) {
            swalError("error", textStatus, errorThrown)

        });
}
let confFrmDialog = () => {
    frmDialog = $(".container-fluid").dialog({
        autoOpen: false,
        width: 500,
        modal: true

    });
};
let confFormValidacion = () => {
    //establecer nueva regla
    $.validator.addMethod("regExpNom", function (value, element, expresion) {
        let reg = new RegExp(expresion);
        return this.optional(element) || reg.test(value)
    })
    $(".form-horizontal").validate({
        //aspecto de los mensajes
        errorElement: "em",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            error.insertAfter(element);
        },
        //establecer borde al objeto del error
        highlight: function (element) {
            $(element).addClass("is-invalid").removeClass("is-valid")
        },
        unhighlight: function (element) { //validación correcta
            $(element).addClass("is-valid").removeClass("is-invalid")
        },
        rules: {
            chip: {
                required: true,
                minlength: 4,
                maxlength: 14
            },
            nombre: {
                required: true,
                regExpNom: /^[a-zá-ú\sñ]+$/i,
            },
            raza: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            fechaN: {
                required: true,
                date: true
            }
        },
        messages: {
            chip: {
                required: "El chip de la mascota es obligatorio.",
                minlength: "Mínimo de caracteres es 4"
            },
            nombre: {
                regExpNom: "El formato no es correcto. Permite solo letras"
            }

        },
        submitHandler: () => {
            if ($(":submit").text() == "Añadir") {
                addReg();
            } else {
                uptdateReg();
            }

        }
    })
};
let addReg = () => {
    //recoger datos del formulario
    let datos = $(".form-horizontal").serialize();

    let xmlHttp = crearConexion();
    xmlHttp.open("POST", "php/insertar.php", true);
    xmlHttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xmlHttp.onreadystatechange = () => {
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
            let respuesta = JSON.parse(xmlHttp.responseText);
            if (respuesta.mensaje != "Error") {
                swalError("success", "Mascota insertada", "");
                //insertar a la tabla
                $("tbody").append(`<tr><td>${$("#chip").val()}</td><td>${$("#nombre").val()}</td><td>${$("#raza").val()}</td><td>${$("#fechaN").val()}</td><td>${boton}</td></tr>`)
                //estableciendo los métodos a los botones editar y eliminar
                $(".editar").on("click", editarCan)
                $(".del").on("click", delCan)
                cerrarVentana();
            } else {
                swalError("error", "¡Error! Mascota no insertada", "");
            }
        }
    }
    xmlHttp.send(datos);


}
let uptdateReg = () => {
    let datos = new FormData();
    datos.append("chip", $("#chip").val());
    datos.append("nombre", $("#nombre").val())
    datos.append("raza", $("#raza").val())
    datos.append("fechaN", $("#fechaN").val())
    fetch("php/editar.php", {
            method: 'POST',
            body: datos,
        })
        .then(response => response.json())
        .then((response) => {

            if (response.mensaje != "Error") {
                swalError("success", "Se ha actualizado la mascota");
                //pasar los datos del formulario a la fila 
                $(fila).find("td:nth-child(1)").text($("#chip").val());
                $(fila).find("td:nth-child(2)").text($("#nombre").val());
                $(fila).find("td:nth-child(3)").text($("#raza").val());
                $(fila).find("td:nth-child(4)").text($("#fechaN").val());

                cerrarVentana();
            } else {
                swalError("error", "¡Error! Mascota no modificada", "");
            }

        })
        .catch((err) => {
            Swal.fire("Error: " + err);

        });
};
let swalError = (icono, titulo, texto) => {
    Swal.fire({
        position: 'top-end',
        icon: icono,
        timer: 1000,
        showConfirmButton: false,
        title: titulo,
        text: texto
    })
}
let cerrarVentana = () => {
    frmDialog.dialog("close");
    $(".form-control").val(""); //limpiar las cajas de texto
    $(".form-control").removeClass("is-valid").removeClass("is-invalid");
}