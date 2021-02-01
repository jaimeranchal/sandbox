"use strict"

/* EVENTOS */
// Llama a las funciones de validación nada más cargar
// para cada campo del formulario

// variables que recojan los elementos
let nombreApe=document.getElementsByTagName("input")[0];
let correo=document.getElementById("email");
let tfno=document.getElementById("tlfno");
let fecha1=document.getElementById("fechaReserva");
let fecha2=document.getElementById("fechaSalida");
let enviar;

window.addEventListener('load', ()=>{

    // Control de cookies
    actualizaIntentos();
    // establecer acciones para eventos
    nombreApe.addEventListener('change', convertirMayusculas);
    correo.addEventListener('change', validarEmail);
    tfno.addEventListener('keypress', function(event){
        validarTfno(event);
    });
    fecha1.addEventListener('change', validarFechaReserva);
    fecha2.addEventListener('keypress', function(event){
        validarFechaSalida(event)
    });
})


/* FUNCIONES */

/* 2.Inserta una reCaptcha */

/* 3.Cookies */

let recuperaIntentos = () => {
    let intentos = 0;
    // decodifica los datos guardados en la cookie
    let cookieDecodificada = decodeURIComponent(document.cookie);
    // separa la cadena en líneas
    let arrCookieDecod = cookieDecodificada.split(';');

    // lee los datos línea a línea buscando coindicencias
    for(let i = 0; i<arrCookieDecod.length;i++){
        let cadena = "intentos=";
        let linea = arrCookieDecod[i];
        while(linea.charAt(0) == ' ') {
            linea = linea.substring(1);
        }
        if(linea.indexOf(cadena) == 0) {
            intentos += parseInt(linea.substring(cadena.length, linea.length));
        }
    }
    return intentos;
}
// guarda número de intentos y
// los muestra en el div#intentos
let actualizaIntentos = () => {
    let intentos = 0;
    // busca una cookie existente
    // si existe, recupera el número de intentos
    if(document.cookie !== undefined){
        intentos = recuperaIntentos();
        // actualiza la cookie
        document.cookie = `intentos=${intentos}`;
    } else {
        // si no existe, crea una cookie
        // suma un intento y guarda la cookie
        intentos = 1;
        document.cookie = "intentos=1";
    }
    // Muestra el número de intentos
    document.getElementById("intentos").innerHTML = `<p>Nº de intentos en el envío de datos: ${intentos}`;
}

/* 4.Convierte Nombre y Apellidos a mayúsculas */
let convertirMayusculas = () => {
    document.getElementsByTagName('input')[0].value = nombreApe.value.toUpperCase();
}

/* 5.Valida el email (regex) */
// Si error: mensaje en span#errorEmail + no pierde foco
let validarEmail = () => {
    let mensaje = "";
    let patron = /^[0-9a-zA-Z-\.]*@[0-9a-zA-Z]*\.(com|es|org|net)$/;
    let cadena = document.getElementById('email').value;
    if (!patron.test(cadena)) {
        mensaje += "Formato incorrecto";   

    } else {
        mensaje += "Correcto!";
    }
    document.getElementById("errorEmail").innerHTML = mensaje;
}

/* 6.Valida el teléfono (keypress) */
// sólo muestra números y espacios
let validarTfno = (e) => {
    let tecla = e.charCode;
    if (tecla != 32 && (tecla < 48 || tecla > 57)){
        e.preventDefault();
    }
}

/* 7.Valida fecha llegada (regex) */
// formato 'dd/mm/aaaa': regex explicado en comentarios
// Bloquear el foco hasta que sea una fecha correcta
// Si error: mensaje en span#errorfechaReserva
let validarFechaReserva = () => {
    validaFormatoFecha("fechaReserva");
}

/* 8.Valida fechaSalida (keypress) */
// sólo muestra números y `/`
// formato 'dd/mm/aaaa'
// Bloquear el foco hasta que sea una fecha correcta
// Si error: mensaje en span#errorfechaSalida
let validarFechaSalida = (e) => {
    // Controla números y `/`
    let tecla = e.charCode;
    console.log(tecla);
    if (tecla < 47 || tecla > 57){
        e.preventDefault();
    }
}

/* 9.Comprobar datos requeridos no están vacíos (exc. observaciones) */
// bucle elements[]
// Si error: mensaje en span#error[Email| NomApe ...]
let comprobarRequeridos = () => {}

/* 10. Muestra mensaje de confirmación de envío de formulario */


let validaFormatoFecha = (id) => {
    let mensaje = "";
    let patron = /\d{2}\/\d{2}\/\d{4}/;
    let cadena = document.getElementById(id).value;
    !patron.test(cadena) ? mensaje += "Formato incorrecto" : mensaje += "Correcto!";
    document.getElementById(`error${id}`).innerHTML = mensaje;
}
