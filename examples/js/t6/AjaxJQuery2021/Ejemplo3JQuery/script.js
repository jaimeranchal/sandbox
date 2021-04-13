"use strict"
;
$(()=>{
   
        $("#GET").on ("click", mostrarTextoGet)
        $("#POST").on ("click", mostrarTextoPost)
   
})

let mostrarTextoGet=()=>{
    
    $.get("Ejemplo3.php", { valor: 'GET', nombre: 'María' }, function (responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            $("#mensaje").html(responseTxt);
            Swal.fire({
                position:'top-end',
                icon:'success',
                timer:1000,
                showConfirmButton: false,
                title: 'Oops...',
                text: 'La carga ha sido satisfactoria'
            });
        } else if (statusTxt == "error") {
            Swal.fire("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });
}
let mostrarTextoPost=()=>{
    $.post("Ejemplo3.php", { valor: 'POST', nombre: 'Luis' }, function (responseTxt, statusTxt, xhr) {
        if (statusTxt == "success") {
            $("#mensaje").html(responseTxt);
            Swal.fire({
                position:'top-end',
                icon:'success',
                timer:1000,
                showConfirmButton: false,
                title: 'Oops...',
                text: 'La carga ha sido satisfactoria'
            });
        } else if (statusTxt == "error") {
            Swal.fire("Error: " + xhr.status + ": " + xhr.statusText);
        }
    });
}