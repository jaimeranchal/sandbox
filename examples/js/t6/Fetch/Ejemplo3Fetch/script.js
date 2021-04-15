"use strict"
;
$(()=>{
   
        $("#GET").on ("click", mostrarTextoGet)
        $("#POST").on ("click", mostrarTextoPost)
   
})

let mostrarTextoGet=()=>{
    fetch('Ejemplo3.php?valor=GET&nombre=María')
        .then((response) => {
            //decodificar el dato
            return (response.text());
        })
        .then((data) => {
            $("#mensaje").html(data);
            Swal.fire({
                icon: 'success',
                title: 'Oops...',
                text: 'La carga ha sido satisfactoria'
            });
        })
        .catch((err) => {
            Swal.fire("Error: " + xhr.status + ": " + xhr.statusText);
        });
    
    
}
let mostrarTextoPost=()=>{
    fetch('Ejemplo3.php?valor=POST&nombre=Luis')
        .then((response) => {
            //decodificar el dato
            return (response.text());
        })
        .then((data) => {
            $("#mensaje").html(data);
            Swal.fire({
                icon: 'success',
                title: 'Oops...',
                text: 'La carga ha sido satisfactoria'
            });
        })
        .catch((err, xhr) => {
            Swal.fire("Error: " + xhr.status + ": " + xhr.statusText);
        });
}