<?php
/* Si existe una cookie con el nombre especificado devuelve su valor
 * si no, devuelve 'false'
 */
function leerCookie($nombre){
    if (isset($_COOKIE[$nombre])) {
        // la opcion true de json_decode devuelve un array asoc.; si no, devuelve un objeto
        $cookie[] = json_decode($_COOKIE['pedido'], true);
        $resultado = $cookie[0];
    } else {
        $resultado = false;
    }
    return $resultado;
}

/* Crea una cookie
 * @param nombre: {string} nombre de la cookie
 * @param tiempo: {string} '+1 hour', '-1 second'
 */
function crearCookie($nombre, $contenido, $tiempo){
    $json = json_encode($contenido);
    // guardamos el número de productos y los productos en la cookie
    setcookie($nombre, $json, strtotime($tiempo));
}

function borrarCookie($nombre){
    setcookie($nombre, "", time() - 3600);
}
?>
