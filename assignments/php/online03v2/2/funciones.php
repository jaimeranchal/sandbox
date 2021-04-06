<?php
/*
 * Genera un hash seguro para una contraseña dada.
 * El coste se pasa al algoritmo blowfish
 * (Consulta el manual php de crypt para más info sobre el coste)
*/
function generate_hash($password, $cost=11){

        /* Para generar la salt, primero genera suficientes bytes aleatorios
         * En base64 se devuelve un caracter por cada 6 bits, de modo que
         * necesitamos al menos 22*6/8=16.5 bytes; generamos 17.
         * A continuación obtenemos los primeros 22 caracteres en base64
         */
        $salt=substr(base64_encode(openssl_random_pseudo_bytes(17)),0,22);

        /* Como blowfish usa una salt con los caracteres del alfabeto (./A-Za-z0-9)
         * hay que reemplazar todos los '+' en la cadena en base64 con '.'
         * Los signos '=' no se tocan
         */
        $salt=str_replace("+",".",$salt);

        /* Ahora creamos una cadena con las opciones para la función crypt
         * separadas por signos de dólar
         */
        $param='$'.implode('$',array(
                "2y", //selecciona la versión más segura de blowfish (>=PHP 5.3.7)
                str_pad($cost,2,"0",STR_PAD_LEFT), //añade el coste en dos dígitos
                $salt //añade la salt
        ));
      
        //codifica el hash
        return crypt($password,$param);
}

/*
 * Comprueba que la contraseña coincide con un hash generado por la función generate_hash
 * @param password: una contraseña encriptada con hash
 * @param entrada: la contraseña tal y como la introduce el usuario
*/
function validate_pw($password, $entrada){
        /* Recrear la contraseña con el hash disponible como parámetro de opciones
         * debería producir el mismo hash que la contraseña que se le pasa
         */
        //return crypt($password, $hash)==$hash;

        // Usar la función hash_equals() es más seguro
        return hash_equals($password, crypt($entrada, $password));
}

/**
 * Analiza y separa los datos contenidos en $_SERVER['PHP_AUTH_DIGEST']
 * guardándolos en un array
 */
function http_digest_parse($txt){
    // protección en caso de que falten datos
    $partes_necesarias = array('nonce'=>1, 
        'nc'=>1, 
        'cnonce'=>1, 
        'qop'=>1, 
        'username'=>1, 
        'uri'=>1, 
        'response'=>1, 
    );
    $data = array();
    $keys = implode('|', array_keys($partes_necesarias));

    preg_match_all('@('.$keys.')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $coincidencias, PREG_SET_ORDER);

    foreach ($coincidencias as $c) {
        $data[$c[1]] = $c[3] ? $c[3] : $c[4];
        unset($partes_necesarias[$c[1]]);
    }

    return $partes_necesarias ? false : $data;
}
?>
