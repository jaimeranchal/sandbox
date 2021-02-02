"use strict";

/* Elementos del formulario */

let nombreApe=document.getElementsByTagName("input")[0];
let correo=document.getElementById("email");
let tfno=document.getElementById("tlfno");
let fecha1=document.getElementById("fechaReserva");
let fecha2=document.getElementById("fechaSalida");
let enviar=document.getElementsByClassName("submit")[0];

/* Eventos */

window.addEventListener('load', ()=>{
    muestraIntentos();
    nombreApe.addEventListener('change', mayusculas);
    correo.addEventListener('change', validarEmail);
    tfno.addEventListener('keypress', validarTfno);
    fecha1.addEventListener('change', validarFechaReserva);
    fecha2.addEventListener('keypress', validarFechaSalida);
    fecha2.addEventListener('change', validarFechaSalidaFormato);
    enviar.addEventListener('click', comprobarRequeridos);
    enviar.addEventListener('click', actualizaIntentos);
});

/* Funciones */
// 2.Recaptcha


// 3.Cookies
let muestraIntentos = () => {
    
};
let actualizaIntentos = () => {
    let intentos = 0;
    if (document.cookie !=""){
        arrCookies = document.cookie.split(";");

    } else {
        creaCookie();
    }
};

let creaCookie = () => {
    
}
// 4.Mayúsculas
let mayusculas = () => {
    nombreApe.value = nombreApe.value.toUpperCase();
}

// 5.Validar email
let validarEmail = () => {
    let patron = /^[0-9a-zA-Z-\.]*@[0-9a-zA-Z]*\.(com|es|org|net)$/;
    validarFormato(patron, correo, "errorEmail");
}

// 6.Validar teléfono
let validarTfno = (e) => {
    // referencia a event por compatibilidad
    let evento = e || event;

    if(evento.which < 48 || evento.which > 57){
        evento.preventDefault(); //anula la pulsación
    }
}

// 7.Validar fecha llegada
let validarFechaReserva = () => {
    let patron = /^\d{2}\/\d{2}\/\d{4}$/;
    validarFormato(patron, fecha1, "errorfechaReserva");
}
// 8.Validar fecha salida
let validarFechaSalida = (e) => {
    let evento = e || event;
    if(evento.which < 47 || evento.which > 57){
        evento.preventDefault(); //anula la pulsación
    } 
}
// funcion aparte porque la comprobación se hace al final
// y no en cada pulsación
let validarFechaSalidaFormato = () => {
    let patron = /^\d{2}\/\d{2}\/\d{4}$/;
    validarFormato(patron, fecha2, "errorfechaSalida");
}

// 9.Comprobar campos vacíos
let comprobarRequeridos = (e) => {
    let evento = e || event;
    evento.preventDefault();
    let mensajeError = "Este campo no puede estar vacío";
    let mensajeError2 = "Debe escoger una opción";
    let errores = false;

    // NOTA: me hubiera gustado hacer un foreach con los inputs tipo texto,
    // pero las ids de los errores no son consistentes 
    // para poder asignar la id del error automáticamente (poniendo la primera letra
    // del id a mayúscula: genero > errorGenero ...)
    // (errorfechaSalida y errorfechaReserva deberían ser errorFechaSalida y
    // errorFechaReserva)

    // nombre
    if (nombreApe.value.length == 0) {
        document.getElementById("errorNomApe").innerHTML = mensajeError;
        nombreApe.classList.add("requerido");
        errores = true;
    } else {
        document.getElementById("errorNomApe").innerHTML = "";
        nombreApe.classList.remove("requerido");
    }
    // email
    if (correo.value.length == 0) {
        document.getElementById("errorEmail").innerHTML = mensajeError;
        correo.classList.add("requerido");
        errores = true;
    }else {
        document.getElementById("errorEmail").innerHTML = "";
        email.classList.remove("requerido");
    }
    // tfno
    if (tfno.value.length == 0) {
        document.getElementById("errorTelefono").innerHTML = mensajeError;
        tfno.classList.add("requerido");
        errores = true;
    }else {
        document.getElementById("errorTelefono").innerHTML = "";
        tfno.classList.remove("requerido");
    }
    // fecha reserva
    if (fecha1.value.length == 0) {
        document.getElementById("errorfechaReserva").innerHTML = mensajeError;
        fecha1.classList.add("requerido");
        errores = true;
    }else {
        document.getElementById("errorfechaReserva").innerHTML = "";
        fecha1.classList.remove("requerido");
    }
    // fecha salida
    if (fecha2.value.length == 0) {
        document.getElementById("errorfechaSalida").innerHTML = mensajeError;
        fecha2.classList.add("requerido");
        errores = true;
    }else {
        document.getElementById("errorfechaSalida").innerHTML = "";
        fecha2.classList.remove("requerido");
    }
    // género
    let genero = document.getElementsByName("genero");
    if (genero[0].checked || genero[1].checked) {
        document.getElementById("errorGenero").innerHTML = "";
    } else {
        document.getElementById("errorGenero").innerHTML=mensajeError2;
        errores = true;
    }
    // provincia
    let provincia = document.getElementById("provincia");
    let provinciaElegida = provincia.getElementsByTagName("option");
    if (provincia.value == provinciaElegida[0].value) {
        document.getElementById("errorProvincia").innerHTML=mensajeError2;
        errores = true;
    } else {
        document.getElementById("errorProvincia").innerHTML = "";
    }

    // 10.Confirmar envío
    if (!errores) {
        confirm("¿Desea enviar el formulario?");
    }
}

/* -------------------- Funciones Auxiliares ----------------------------- */
/* Valida un valor con un patron y escribe mensaje de error
 * @param {regex}   patron  una expresión regular
 * @param {string}  valor   una cadena
 * @param {string}  idError cadena con la id del elemento HTML que contendrá el mensaje
 */
let validarFormato = (patron, elemento, idError) => {
    let mensaje = "";
    if (!patron.test(elemento.value)) {
        mensaje += "Formato incorrecto";   
        elemento.focus();
    } else {
        elemento.classList.add("valido");
        elemento.blur();
    }
    document.getElementById(idError).innerHTML = mensaje;
}
// Limitar rango de teclas? (keypress)

