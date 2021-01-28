"use strict"

/* FUNCIONES AUXILIARES */
/* TODO: 
 * 1. agrupar las llamadas a eventos en una sola
 *
 * window.addEventListener('load', ()=>{
 *  // variables que recojan los elementos
 *  let input1=document.getElementById("usuario");
 *  let input2...
 *
 *  // establecer eventos
 *  input1.addEventListener('tipo_evento', funcion);
 *  ...
 * })
 */

let validaFormatoFecha = (id) => {
    let mensaje = "";
    let patron = /\d{2}\/\d{2}\/\d{4}/;
    let cadena = document.getElementById(id).value;
    !patron.test(cadena) ? mensaje += "Formato incorrecto" : mensaje += "Correcto!";
    document.getElementById(`error${id}`).innerHTML = mensaje;
}

let bloqueaTeclas = (teclas) => {}

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
    let nomApe = document.getElementsByTagName('input')[0]; 
    document.getElementsByTagName('input')[0].value = nomApe.value.toUpperCase();
}

/* 5.Valida el email (regex) */
// Si error: mensaje en span#errorEmail + no pierde foco
/* 
 * NOTE: blur() quita foco y focus() da el foco 
 *  SOLUCIÓN: si hay error, devuelve el foco al campo 
 */
let validarEmail = () => {
    let mensaje = "";
    let patron = /^[0-9a-zA-Z-\.]*@[0-9a-zA-Z]*\.(com|es|org|net)$/;
    let cadena = document.getElementById('email').value;
    !patron.test(cadena) ? mensaje += "Formato incorrecto" : mensaje += "Correcto!";
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


/* EVENTOS */
document.getElementsByTagName("input")[0].addEventListener('change', convertirMayusculas);
document.getElementById("email").addEventListener('change', validarEmail);
document.getElementById("tlfno").addEventListener('keypress', function(event){
    validarTfno(event);
});
document.getElementById("fechaReserva").addEventListener('change', validarFechaReserva);
document.getElementById("fechaSalida").addEventListener('keypress', function(event){
    validarFechaSalida(event)
});
document.getElementById("fechaSalida").addEventListener("change", validaFormatoFecha("fechaSalida"));
