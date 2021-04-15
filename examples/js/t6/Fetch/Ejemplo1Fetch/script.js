"use strict"

$(() => {
    $("#boton").on("click", mostrarTexto)
})

let mostrarTexto = () => {
   
    fetch('Mensaje.txt')
    .then((response)=> {
        return(response.text());
    })  
    .then((data)=> {
        $("#mensaje").html(data)
    })
    .catch((err)=> {
        console.error(err);
    });
}