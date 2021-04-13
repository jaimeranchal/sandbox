"use strict"

$(() => {
    $("#boton").on("click", mostrarTexto)
})

let mostrarTexto = () => {
    $("#mensaje").load("Mensaje.txt")
}