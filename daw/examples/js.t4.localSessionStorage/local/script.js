"use strict"
let clave, valor, lista

window.addEventListener("load", () => {
    //crear dos objetos con las cajas de texto y otro para la capa.
    clave = document.getElementById("clave"),
    valor = document.getElementById("valor");
    lista = document.getElementById("listar")

    //asignar eventos
    document.getElementById("crearCookie").addEventListener("click", crear);
    document.getElementById("borrarCookie").addEventListener("click", borrar);
    document.getElementById("mostrarCookie").addEventListener("click", mostrar);
    document.getElementById("listarCookie").addEventListener("click", listar);
})
// crea una "variable" localStorage o SessionStorage
function crear() {
    localStorage.setItem(clave.value, valor.value);  
    //limpiar
    clave.value = "";
    valor.value = "";
}

function listar() {
    lista.innerHTML  = "";
    // imprime los pares clave - valor guardados
    for (let i = 0; i < localStorage.length; i++) {
        // localStorage.key(i) extrae nombre de la clave
        lista.innerHTML += localStorage.key(i)+ "=" + localStorage.getItem(localStorage.key(i))+ "<br>";
    }
}
function mostrar() {
    if (localStorage.getItem(clave.value) != undefined) {
        valor.value = localStorage.getItem(clave.value);
    } else {
        valor.value = "No existe la cookie";
    }
}  
function borrar(){
    if (localStorage.getItem(clave.value) != undefined) {
        localStorage.removeItem(clave.value); // elimina la cookie
        valor.value = "Cookie borrada"
    } else {
        valor.value = "No existe la cookie";
    }
    
}

