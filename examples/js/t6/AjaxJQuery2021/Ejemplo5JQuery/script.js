"use strict"

$(() => {
    $("#cursos").on("change", mostrarCurso);
})

let mostrarCurso = () => {
    $.ajax({
            url: "Ejemplo5.xml",
            type: "GET"
        })
        .done(function (response, textStatus, jqXHRs) {

            //borrar las opciones de modulos, excepto la primera
            $("#modulos option:gt(0)").remove()
            $(response).find("curso").each((ind, elemento) => {
                if (ind == $("#cursos").prop("selectedIndex") - 1) {
                    $(elemento).find("asig").each((index, mod) => {
                        $("#modulos").append("<option>" + $(mod).text() + "</option>")
                    })
                }
            })

        })
        .fail(function (response, textStatus, errorThrown) {
            Swal.fire({
                position:'top-end',
                icon:'error',
                timer:1000,
                showConfirmButton: false,
                title: textStatus,
                text: errorThrown
            });
            
        });
        
}