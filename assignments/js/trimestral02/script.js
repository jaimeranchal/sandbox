"use strict"

let usuario, edad;

window.addEventListener('load', () => {
    document.getElementById("comenzar").addEventListener('click', comenzar);
})

let comenzar = (e) => {
    let evento = e || event;
    // no sé bien combinar una condición negativa (^AEIOU)
    // con otra positiva (solo letras)
    let patronNombre = /^[BCDFGHJKMNLRPQRSTVWXZ]{4}[2468]{2}$/;
    let patronEdad = /^[3-9]|[1][0-4]$/i;
    // controlar campos vacíos y validaciones
    if (!camposVacios() 
        && !validar("usuario", patronNombre, "errorUser")
        && !validar("edad", patronEdad, "errorEdad")
    ) {
        usuario = document.getElementById("usuario").value;
        edad = document.getElementById("edad").value;
        
        // mostrar tablero
        mostrarTablero();
        // activar paleta de colores
        activarPaleta();
        // añadir botón guardar cookies
        mostrarGuardar();
    } else {
        evento.preventDefault();
    }
}

let validar = (id, patron, error) => {
    let fallo = false;
    let objeto = document.getElementById(id);
    let spanError = document.getElementById(error);
    // limpio de errores anteriores
    spanError.innerText = "";
    if (!patron.test(objeto.value)) {
        objeto.focus();
        spanError.innerText = "Formato inválido";
        fallo = true;
    }
    return fallo;
}

let camposVacios = () => {
    let arrayErrores = [];
    let error = false
    // limpia los mensajes de comprobaciones anteriores
    
    // inserta los valores de los campos del formulario
    arrayErrores.push(document.getElementById("usuario").value);
    arrayErrores.push(document.getElementById("edad").value);

    for (let ele of arrayErrores) {
        if (ele == "") {
            error = true;
            document.getElementById("errorUser").innerText = "El campo no puede estar vacío"; document.getElementById("errorEdad").innerText = "El campo no puede estar vacío";
        }
    }
    return error;
}

let mostrarTablero = () => {
    let tabla, fila;

    document.getElementById("tablero").style.visibility = 'visible';
    // crear la tabla
    document.getElementById("zonadibujo").appendChild(crearElemento("table", "tabla"));
    tabla = document.getElementById("tabla");
    // appendChild(tr) al elemento.id("zonadibujo")
    for (let i = 1; i <= 15; i++) {
        tabla.appendChild(crearElemento("tr", i));
        fila = document.getElementById(i);
        for (let j = 1; j <= 15; j++) {
        // appendChild(td) por cada fila
            fila.appendChild(crearElemento("td"));
            fila.getElementsByTagName("td")[j-1].addEventListener('mouseover', pintar);
        }
    }
}

let crearElemento = (tag, id) => {
    let objeto;
    objeto = document.createElement(tag);
    // añade un id
    if (id != null){
        objeto.setAttribute("id", id);
    }
    return objeto;
}

let pintar = () => {

}

let activarPaleta = () => {
    //añade un evento click en cada celda que contiene los colores
    $("#paleta tr:nth-child(2) td").click(mostrarColor);
}

function mostrarColor() {
    // cambia el color de fondo de la celda color del pincel
    let color = this.style.backgroundColor;
    document.getElementById("color").style.backgroundColor = color;
}

let mostrarGuardar = () => {
    $(".modal-content-tablero").append("<div id='guardar'></div>");
    $("#guardar").append("<button class='btn btn-primary'>Guardar cookies</button>");
    $("#guardar > button").click(guardar);
}

let guardar = () => {
    let fecha = new Date();
    fecha.setTime(fecha.getTime() + (50000));
    document.cookie = "usuario="+usuario+";edad="+edad+";expires="+fecha;
}

