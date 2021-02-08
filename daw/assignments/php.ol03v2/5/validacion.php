<?php
/* lista de variables (opcional) */
$errores = []; // Array de errores

/* funciones */
function validarCadena($patron, $valor) {
    $cadena = filter_var($valor, FILTER_SANITIZE_STRING);
    if (preg_match($patron, $cadena) > 0) {
        return $cadena;
    } else {
        $errores[] = "Error: la descripción no tiene el formato correcto"; 
    }
}

function validarFecha($valor){
    $fecha = date_parse($valor);
    if (checkdate($fecha['month'], $fecha['day'], $fecha['year']) === false) {
        $errores[] = "Error: la fecha no es correcta"; 
    } else {
        return $valor;
    }
}

function validarNumero($valor){
    $numero   = filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
    if (is_numeric($numero)){ 
        return $numero;
    } else {
        $errores[] = "Error: no es un número"; 
    }       
}

function hayErrores() {
    return empty($errores) ? false : true;
}
?>
