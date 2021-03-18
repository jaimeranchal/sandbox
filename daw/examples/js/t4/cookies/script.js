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


let crear = () => {
    //recoge los datos del formulario en formato clave-valor
    let fecha = new Date();
    fecha.setTime(fecha.getTime()+50000);
    document.cookie=clave.value+ "="+valor.value+";expires="+fecha+" GMT";       
    //limpiar
    clave.value="";
    valor.value="";
}

let listar = () => {
    let arrCookies;
    if (document.cookie !=""){
        arrCookies = document.cookie.split(";");
        lista.innerHTML="";
        arrCookies.forEach(ele=>{
            lista.innerHTML+=ele+ "<br>";
        });
    } else {
        lista.innerHTML="No hay cookies registradas";
    }
}

let mostrar = () => {
    let arrCookies;
    let encontrado = "La cookie no existe";
    if (document.cookie !=""){
        arrCookies = document.cookie.split(";");
        arrCookies.forEach(ele=>{
            // separamos cada fila del array resultante en 
            // clave [0] = valor [0]
            let claveArray=ele.split("=");
            if(claveArray[0].trim() == clave.value){
                encontrado=claveArray[1];
            }
        })
        valor.value=encontrado;
    } else {
        valor.value="No hay cookies registradas";
    }
}


let buscarCookie = () => {
  
}

let borrar = () => {
   
    let arrCookies;
    let encontrado = "La cookie no existe";
    if (document.cookie !=""){
        arrCookies = document.cookie.split(";");
        arrCookies.forEach(ele=>{
            // separamos cada fila del array resultante en 
            // clave [0] = valor [0]
            let claveArray=ele.split("=");
            if(claveArray[0].trim() == clave.value){
                document.cookie=clave.value+ "="+valor.value+";expires=Thu, 01-Jan-70 00:00:01 GMT";       
                encontrado= "cookie borrada";
            }
        })
        valor.value=encontrado;
    } else {
        valor.value="No hay cookies registradas";
    }
}
