<?php
class Validate {
    /* Control de salida
     * True = muestra mensajes de error
     * False = desactiva los mensajes de error.
     */
    static $errors = true;

    /* Control de campos vacíos
     * @param $arr: array de campos a comprobar
     * @param $inputMethod: p.e. $_POST o $_GET
     *    si no se proporciona se ajusta a $_REQUEST
     * @return false si algún campo está vacío; true el resto de casos
     */
    static function checkEmpty($arr, $inputMethod = false){
        if ($inputMethod == false) {
            $inputMethod = $_REQUEST;
        }
        foreach ($arr as $field) {
            if (!isset($inputMethod[$field])) {
                self::throwError('Campo vacío; introduzca datos', 900);
                return false;
            } else {
                return true;
            }
        }
    }

    /* Filtrado general
     * Elimina espacios en blanco, backslashes (\) y 
     * sustituye caracteres especiales por entidades HTML
     */
    static function filtrar($datos){
        $datos = trim($datos);
        $datos = stripslashes($datos);
        $datos = htmlspecialchars($datos);
    }

    // Valida strings
    static function str($value) {
        // si no es una cadena lanza un error
        if (!is_string($value)) {
            self::throwError('La cadena no es válida', 901);
        } else {
            // filtra la cadena y la devuelve
            $value = filtrar($value);
            return $value;
        }
    }

    // Valida enteros
    static function int($value) {
        $value = filter_var($value, FILTER_VALIDATE_INT);
        if ($value === false) {
            self::throwError('El campo no es un entero', 902);
        } else {
            return $value;
        }
    }

    // Valida email
    static function email($value) {
        $value = filter_var($value, FILTER_VALIDATE_EMAIL);
        if ($value === false) {
            self::throwError('El formato de email no es válido', 903);
        } else {
            return $value;
        }
    }

    // Valida url
    static function url($value) {
        $value = filter_var($value, FILTER_VALIDATE_URL);
        if ($value === false) {
            self::throwError('El formato de la URL no es válido', 904);
        } else {
            return $value;
        }
    }

    // Valida fechas
    static function date($value) {
        // Convertimos la cadena de fecha a un array asociativo
        $date = date_parse($value);
        // Comprobamos el formato
        if (checkdate($date['month'],$date['day'],$date['year']) === false) {
            //imprime un error
            self::throwError('La fecha no es válida', 904);
        } else {
            return $value;
        }

    }

    // Imprime errores
    static function throwError($error = 'Error al procesar', $errorCode = 0) {
        if (self::$errors === true) {
            throw new Exception($error, $errorCode);
        }
    }
}
?>

        }
