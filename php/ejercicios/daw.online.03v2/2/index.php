<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="icon" href="../../../../favicon.ico">
        <title>PHP Online 3</title>
        <!-- Bootstrap core CSS -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
            />
        <!-- custom css -->
        <link rel="stylesheet" href="../src/css/main.css" type="text/css"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
        <!-- Highlight.js -->
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/styles/default.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/10.5.0/highlight.min.js"></script>       
    </head>

<?php

/* Funciones */
// NOTE: ahora mismo no se usa ninguna función de este script
require_once("./funciones.php");

/* variables necesarias */
$realm = "Acceso restringido";
// Usuarios y contraseñas (porque es un ejemplo)
$pass_1 = password_hash('123oraora', PASSWORD_BCRYPT);
$pass_2 = password_hash('1234', PASSWORD_BCRYPT);
$usuarios = array('admin' => $pass_1, 'invitado' => $pass_2);


/* Código */
// cabecera HTTP
if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="'.$realm.
        '",qop="auth",nonce="'.uniqid().'",opaque="'.md5($realm).'"');
    // Si error
    die("No puedes ver el contenido si no inicias sesión");
    // borramos la variable global para que vuelva a pedir login
    // al recargar la página
    unset($_SERVER['PHP_AUTH_DIGEST']);
}

// Analiza la variable PHP_AUTH_DIGEST
$datos = http_digest_parse($_SERVER['PHP_AUTH_DIGEST']);
if (!$datos ||
    !isset($usuarios[$datos['username']])){
    die("Datos incorrectos");
}

/* NOTE: no creo que la response coincida nunca si uso password_hash() porque
 * cuando el cliente envía la contraseña usa md5 y por lo tanto el response
 * generado será diferente
 */

// Generamos una respuesta válida
$A1 = md5($datos['username'] . ':' . $realm . ':' . $usuarios[$datos['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'].':'.$datos['uri']);
$respuesta_valida = md5($A1.':'.$datos['nonce'].':'.$datos['nc'].':'.$datos['cnonce'].':'.$datos['qop'].':'.$A2);

if($datos['response'] != $respuesta_valida){
    die("Credenciales incorrectas");
} else {
    // Si el usuario es válido
    $usuario = $data['username'];
}

?>
    <body>
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="d-flex flex-column justify-content-between bg-dark1 text-dark inter-400" id="sidebar-wrapper">
                <!-- sidebar top content -->
                <div class="sidebar-top">
                    <div class="sidebar-heading text-center">
                        <i class="fab fa-slack-hash fa-5x"></i>
                        <p class="lead courgette">D.W.E.S</p>
                    </div>
                    <div class="sidebar-menu list-group list-group-flush">
                        <a href="../inicio.html" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-home"></span>
                            Inicio
                        </a>
                        <a href="../1/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-unlock"></span>
                            Auth Basic
                        </a>
                        <a href="../2/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-lock"></span>
                            Auth Digest
                        </a>
                        <a href="../3/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-shopping-basket"></span>
                            Cesta
                        </a>
                        <a href="../4/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-receipt"></span>
                            Balance
                        </a>
                        <a href="../5/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-pizza-slice"></span>
                            Pizzeria
                        </a>
                    </div>
                </div>

                <!-- sidebar bottom content -->
                <div class="sidebar-footer">
                    <p class="text-center"><span class="fas fa-copyright"></span> 2021 - Jaime Ranchal Beato</p>
                </div>

            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <!-- Navegación -->
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent inter-400">
                    <!-- hide sidebar -->
                    <button class="btn btn-transparent" id="menu-toggle">
                        <span class="fas fa-arrow-left"></span>
                    </button>

                    <div class="app-title ml-2 mb-n1">
                        <h2>3.2</h2>
                    </div>

                    <!-- show top menu items on smaller screens -->
                    <button class="navbar-toggler" type="button" 
                        data-toggle="collapse" data-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" 
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <span class="navbar-text ml-auto mr-3">
                            Hola <span class="fg-dark1 font-weight-bold text-capitalize"><?=$usuario?></span>,
                        </span>
                    </div>
                </nav>

                <!-- Contenido -->
                <div class="container inter-200">
                    <div class="mb-2">
                        <h1 class="display-3 mt-4 inter-700">Seguridad (2)</h1>
                        <p class="lead">Autenticación segura de usuario con el método <i>Digest</i></p>
                    </div>
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
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Font Awesome JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
        <!-- Bootstrap core JS libraries 
        =============================================================== -->
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!-- Popper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <!-- BootStrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Menu Toggle Script -->
        <script src="../src/js/menu.js" charset="utf-8"></script>
    </body>
</html>

