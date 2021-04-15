"use strict"

let boton = "<button type='button' class='editar btn btn-primary mr-2'><i class='fas fa-edit'></i></button><button type='button' class='del btn btn-danger'><i class='fas fa-trash-alt'></i></button>";

$(()=>{
    mostrarPerros();
})

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
