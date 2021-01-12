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
$usuarios = array('admin' => '123oraora', 'invitado' => '1234');

/* Funciones */
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

/* Código */
// cabecera HTTP
if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
        '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');
    // Si error
    die("No puedes ver el contenido si no inicias sesión");
}

// Analiza la variable PHP_AUTH_DIGEST
if (!($data = http_digest_parse($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($usuarios[$data['username']])){
    die("Datos incorrectos");
}

// Si el usuario es válido
$usuario = $data['username'];

?>
<?php
?>
    <body class="d-flex flex-column min-vh-100">

         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <div class="navbar-brand">
                    <a title="volver al menú de aplicaciones" href="../inicio.html">
                        <span class="fas fa-chevron-circle-left"></span>
                    </a>
                </div>
                <!-- <span class="navbar-text">Inicio de sesión correcto</span> -->
                <span class="navbar-text">
                    <span class="fas fa-user"></span> <?=$usuario?>
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



