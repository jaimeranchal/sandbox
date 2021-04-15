"use strict"

$(() => {
    $("#cursos").on("change", mostrarCurso);
})

let mostrarCurso = () => {
    fetch('Ejemplo5.xml')
        .then((response) => {
            //decodificar el dato
            return (response.text());
        })
        .then((data) => {
             //borrar las opciones de modulos, excepto la primera
             $("#modulos option:gt(0)").remove()
             $(data).find("curso").each((ind, elemento) => {
                 if (ind == $("#cursos").prop("selectedIndex") - 1) {
                     $(elemento).find("asig").each((index, mod) => {
                         $("#modulos").append("<option>" + $(mod).text() + "</option>")
                     })
                 }
             })
        })
        .catch((err) => {
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