<?php
/* Clase para validar entradas */
class Validacion {
    /* Variable estática.
    * array con mensajes de error
    */
    static $errores = [];

    // Comprueba si los campos están vacíos
    static function comprobarVacios($arr, $on = false) {
        if ($on === false) {
            $on = $_REQUEST;
        }
        foreach ($arr as $value) {  
            if (!isset($on[$value])) {
                self::$errores['campos'] = 'Faltan datos';
            }
        }
    }
    static function validarCadena($patron, $valor) {
        if (preg_match($patron, $valor) > 0) {
            $cadena = filter_var($valor, FILTER_SANITIZE_STRING);
            return $cadena;
        } else {
            self::$errores['cadena'] = "Formato incorrecto"; 
        }
    }

    static function validarFecha($valor){
        $fecha = date_parse($valor);
        if (checkdate($fecha['month'], $fecha['day'], $fecha['year']) === false) {
            self::$errores['fecha'] = "Fecha inválida"; 
        } else {
            return $valor;
        }
    }

    static function validarNumero($valor){
        if (!is_numeric($valor)){ 
            self::$errores['entero'] = "Error: no es un número"; 
        } else {
            $numero = filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
            return $numero;
        }       
    }

    static function validarBool($val) {
        $val = filter_var($val, FILTER_VALIDATE_BOOLEAN);
        return $val;
    }

    static function validarEmail($val) {
        $val = filter_var($val, FILTER_VALIDATE_EMAIL);
        if ($val === false) {
            self::$errores['email'] ='Email inválido'; 
        }
        return $val;
    }

    static function validarUrl($val) {
        $val = filter_var($val, FILTER_VALIDATE_URL);
        if ($val === false) {
            self::$errores['url'] ='URL inválida'; 
        }
        return $val;
    }

    /* Comprueba si hay errores
    * @return `true` si los hay, `false` si no 
    */
    static function hayErrores() {
        return empty(self::$errores) ? false : true;
    }

}
?>
