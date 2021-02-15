/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
window.onload = () => {

    document.forms[0].nomApe.addEventListener("blur", validarNomApe);
    document.getElementById("curso").addEventListener("blur", validarCurso);
    document.getElementById("edad").addEventListener("blur", validarExprEdad)
    document.getElementById("edad").addEventListener("keypress", validarEdad)
    document.getElementsByTagName("button")[0].addEventListener("click", validarEnviar)
    document.forms[0].cancelar.addEventListener("click", limpiarSpan)
}



let validarCurso = () => {

    let expreCur = /^[1-2]\sDA[M|W]$/;
    if (!expreCur.test(document.getElementById("curso").value)) {

        document.getElementById("errorCur").innerHTML = "Formato incorrecto";
        document.getElementById("curso").focus();
    } else {
        document.getElementById("errorCur").innerHTML = "";
    }

}

let validarNomApe = (e) => {

    let expreNom = /^[a-zá-ú\s]*$/i;

    if (!expreNom.test(document.forms[0].nomApe.value)) {
        document.getElementById("errorNomApe").innerHTML = "Formato incorrecto, solo letras y espacios";
        document.forms[0].nomApe.focus();
    } else {
        document.getElementById("errorNomApe").innerHTML = "";
    }

}
let validarEdad = (e) => {
    let evento = e || evento.window;
    if (evento.which < 48 || evento.which > 57) {
        evento.preventDefault();
    }
}
let validarExprEdad = () => {
    let expreEdad = /^(1[8-9]|[2-9][0-9]|100)$/i;

    if (!expreEdad.test(document.getElementById("edad").value)) {
        document.getElementById("errorEdad").innerHTML = "Formato incorrecto, (18 a 100 años)";
        document.getElementById("edad").focus();
    } else {
        document.getElementById("errorEdad").innerHTML = "";
    }
}
let validarEnviar = (e) => {
    let evento = e || window.event;
    let arrayErr=[];
    arrayErr.push(requerido(document.getElementById("curso"), "errorCur"));
    arrayErr.push(requerido(document.forms[0].nomApe, "errorNomApe"));
    arrayErr.push(requerido(document.getElementById("edad"), "errorEdad"));
    let errores = false

    arrayErr.forEach((ele) => {
        if (ele) {
            errores = true
        }
    })
    if (errores) {
        e.preventDefault();
    } else {
        if (confirm("¿Esta seguro de enviar los datos?")) {
            alert("Datos enviados")
        } else{
            e.preventDefault(); 
        }
    }
}

function requerido(objeto, spamError) {
    let error = true;
    if (objeto.value.length == 0) {
        document.getElementById(spamError).innerHTML = "Dato requerido"
    } else {
        document.getElementById(spamError).innerHTML = ""
        error = false;
    }
    return error;
}

function limpiarSpan() {
    //limpiar
    let arraySpan = document.getElementsByTagName("span");

    for (let ele of arraySpan) {
        ele.innerHTML = "";
    }
    document.getElementById("curso").value = "";
    document.getElementById("edad").value = "";
    document.forms[0].nomApe.value = "";
}