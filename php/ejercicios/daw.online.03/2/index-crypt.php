<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP3: Autenticación digest</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
    </head>

<?php
/* variables necesarias */
$realm = "Acceso restringido";
// Usuarios y contraseñas (porque es un ejemplo)
// TODO: Creo las contraseñas con password_hash($pass, PASSWORD_BCRYPT)
$usuarios = array(
    'admin' => generate_hash('123oraora'),
    'invitado' => generate_hash('1234')
);

echo("USUARIOS:");
print_r($usuarios);
echo("<br>");
echo("PETICIÓN:");
print_r($_REQUEST);
echo("<br>");
echo("SERVER:");
print_r($_SERVER['PHP_AUTH_DIGEST']);
echo("<br>");

// Comprobamos la cabecera HTTP
if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    //Manda un mensaje con código de error a la cabecera
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
        '",qop="auth",nonce="'.uniqid().'",opaque="'.generate_hash($realm).'"');
    // Si error
    die("No puedes ver el contenido si no inicias sesión");
}

echo("SERVER después del login:");
print_r($_SERVER['PHP_AUTH_DIGEST']);

echo("<br>");
// Analiza la variable PHP_AUTH_DIGEST
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($usuarios[$data['username']])){
    print_r($_REQUEST);
    echo("Datos incorrectos");
} else {
    // analizamos la respuesta
    $qop = $data['qop'];
    $uri = $data['uri'];


    $A1 = md5($data['username'].':'.$realm.':'.$usuarios[$data['username']]);
    if($qop == 'auth-int'){
        $A2 = md5($_SERVER['REQUEST_METHOD'] . ":$uri:" . md5($respBody));
    } else {
        $A2 = md5($_SERVER['REQUEST_METHOD'] . ":$uri");
    }
    $respuesta_valida = md5($A1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$A2);

    var_dump($respuesta_valida);
    // Si el hash de responde coincide con el hash generado, OK
    if($data['response'] != $respuesta_valida){
        die("Datos incorrectos");
    } else {
        $usuario = $data['username'];
        var_dump($qop);
        echo("Esto debería verse");
    }
}


/* FUNCIONES */

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
    <body class="d-flex flex-column min-vh-100">

         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <div class="navbar-brand">
                    <a class= "btn btn-primary" title="volver al menú de aplicaciones" href="../inicio.html">
                        <span class="fas fa-chevron-circle-left"></span>
                         Menú
                    </a>
                    
                </div>
                <!-- <span class="navbar-text">Inicio de sesión correcto</span> -->
                <span class="navbar-text">
                    <span class="fas fa-user"></span> <?=$usuario;?>
                </span>
            </div>
        </nav>     

        <!-- Cuerpo de la página -->
        <div class="jumbotron text-center">
                    <img src="../src/icons/auth-key.svg" alt="website in a circle" width="100px;"/>
            <h2 class="display-3">Autenticación HTTP segura</i></h2>
            <p class="lead">Formas de autenticarse en PHP (2)</p> 
        </div>

        <div class="container">
            <div>
                <h2>Las funciones <i>hash</i></h2>
            </div>
            <div>
                <h2>¿Por qué es importante la seguridad informática?</h2>
            </div>
            <div>
                <h2>¿Cuál es el método más seguro?</h2>
            </div>
            
        </div>
        
        <footer class="footer mt-auto">
            <div class="container-fluid mt-3 mb-n1 py-3 bg-dark text-light text-center">
                <p><span class="fas fa-copyright"></span> Jaime Ranchal Beato &mdash; 
                Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from
                <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
                <p>
                </p>
            </div>
        </footer>
        <!-- Librerías JavaScript -->
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <!-- Librerías JS requeridas por BootStrap -->
        <script
          src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
          crossorigin="anonymous">
        </script>
        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
          crossorigin="anonymous">
        </script>
        <script
          src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
          crossorigin="anonymous">
        </script>
 
    </body>
</html>



