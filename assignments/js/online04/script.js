"use strict";
/* Variables */
// patrón del formato fecha
let patronFecha = /^([0-1][0-9]|2[0-9]|3[0-1])\/(0[1-9]|1[0-2])\/(202[0-9])$/;
// Explicación del patrón:
// día: ([0-1][1-9]|2[0-9]|3[0-1])
// tres opciones:
// bloque 1: días 01 a 19
//          [0-1]: un dígito entre 0 y 1 (decena)
//          [1-9]: un dígito entre 1 y 9, el 0 no sería ningún día (unidad)
// bloque 2: 20-29
//          2: decena
//          [0-9]: un dígito entre 0 y 9, cuento el 0 porque 20 sí es un día válido (unidad)
// bloque 3: 30-31
//          3: decena
//          [0-1]: o 0 o 1 (unidad)
//
// mes: (0[1-9]|1[0-2])
// dos opciones:
// bloque 1: enero a septiembre (01-09)
//          0: el primer dígito siempre es 0 en este bloque
//          [1-9]: unidad, sin incluir el 0 que no sería ningún mes
// bloque 1: octubre a diciembre (10-12)
//          1: el primer dígito siempre es 1 en este bloque
//          [0-2]: unidad, solo tres opciones: 0 (octubre), 1 (noviembre), 2 (diciembre)
//
// año: (202[0-9])
// He limitado el año a una fecha posterior a la actual, entre 2020 y 2029 
// (para reservas de hotel no tiene sentido alargarlo mucho más)
// Sólo un bloque de opciones:
//          202: parte fija, década de 2020
//          [0-9]: unidad, entre 202"0" y 202"9"
    

/* Elementos del formulario */

let nombreApe=document.getElementsByTagName("input")[0];
let correo=document.getElementById("email");
let tfno=document.getElementById("tlfno");
let fecha1=document.getElementById("fechaReserva");
let fecha2=document.getElementById("fechaSalida");
let enviar=document.getElementsByClassName("submit")[0];

/* Eventos */

window.addEventListener('load', ()=>{
    nombreApe.addEventListener('change', mayusculas);
    correo.addEventListener('change', validarEmail);
    tfno.addEventListener('keypress', validarTfno);
    fecha1.addEventListener('change', validarFechaReserva);
    fecha2.addEventListener('keypress', validarFechaSalida);
    fecha2.addEventListener('change', validarFechaSalidaFormato);
    enviar.addEventListener('click', comprobarRequeridos);
    enviar.addEventListener('click', muestraIntentos);
    enviar.addEventListener('click', grecaptcha);
});

/* Funciones */

// 3.Cookies
// Inserta el número de intentos en el formulario
let muestraIntentos = () => {
    let cajaIntentos = document.getElementById("intentos");
    let intentos = 0; // inicializo a 0 por si hay algún fallo
    intentos = leerCookie();
    cajaIntentos.innerHTML = `<p>Nº de intentos en el envío de datos: ${intentos}</p>`;
};

// actualiza la cookie
let actualizaIntentos = () => {
    // si leerCookie == 0 significa que no existe la cookie
    if (leerCookie() != 0){
        let intentos = parseInt(leerCookie()) +1;
        creaCookie(intentos);
    } else {
        creaCookie(1);
    }
};

// crea la cookie con el número de intentos que le pasamos por parámetro
let creaCookie = (intentos) => {
    let fecha = new Date();
    let clave = "intentos";
    fecha.setTime(fecha.getTime()+50000);
    document.cookie=clave+ "="+intentos+";expires="+fecha+" GMT";       
}

// lee la cookie y devuelve el número de intentos
let leerCookie = () => {
    let arrCookies, intentos = 0;
    // Si ya hay una cookie, busca la clave "intentos"
    if (document.cookie !=""){
        arrCookies = document.cookie.split(";");
        arrCookies.forEach(ele=>{
            // separamos cada fila del array resultante en 
            // clave [0] = valor [1]
            let claveArray=ele.split("=");
            if(claveArray[0].trim() == "intentos"){
                intentos=claveArray[1];
            }
        });
    } 
    return intentos;
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
    validarFormato(patronFecha, fecha1, "errorfechaReserva");
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
    validarFormato(patronFecha, fecha2, "errorfechaSalida");
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
        // Si todo está correcto pedimos confirmación y sumamos 1 al nº de intentos
        if(confirm("¿Desea enviar el formulario?")){
            actualizaIntentos();
        }
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

