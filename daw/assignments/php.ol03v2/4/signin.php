<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
// Conectamos a la bbdd
require_once("./conexion.php");
// funciones propias de validación
require_once("./validacion.php");

// Procesar datos de login
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    
    // Array de errores
    $errores = [];
    // mensajes 
    $errorBD = "el usuario ya existe en la base de datos";
    $errorNombre = "el nombre está vacío.";
    $errorAlias = "formato de alias inválido. Sólo puede contener hasta 8 letras; ni números ni símbolos.";
    $errorPass = "formato de contraseña inválido.";
    $errorEmail = "formato de email inválido.";

    // expr.regular con los requisitos
    $formatoAlias = "/^[a-zA-Z]{4,8}$/";
    $formatoPwd = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";

    // validar alias
    if (isset($_POST['id'])){
        if (preg_match($formatoAlias, filter_var($_POST['id'], FILTER_SANITIZE_STRING)) > 0){

            $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

            //recuperamos información de la base de datos para comprobar valores únicos
            $sql = 'SELECT * from usuarios where id=?';
            $sth = $dbh->prepare($sql);
            $sth->execute(array($id));
            $resultado = $sth->fetch();

            // error si encuentra que ya existe el usuario
            if (!empty($resultado)) $errores[] = "Error: ".$errorBD;

        } else {
            $errores[] = "Error: ".$errorAlias; 
        }
    } 

    // validar nombre
    if (isset($_POST['nombre'])) {
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    } else {
        $errores[] = "Error: ".$errorNombre;
    }

    // validar password
    if (isset($_POST['pass']) && preg_match($formatoPwd, $_POST['pass']) > 0) {
        // codifico la contraseña con el algoritmo blowfish
        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
    } else {
        $errores[] = "Error: ".$errorPass; 
    }

    // validar email
    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false) {
        $email = $_POST['email'];
    } else {
        $errores[] = "Error: ".$errorEmail; 
    }

    /* ------ Si hay errores ------- */
    $fallo = count($errores) > 0 ? true : false;
    $enlace= $fallo? "Volver": "Inicia sesión"; //texto del enlace (volver, comenzar...)

    if(!$fallo){
        //insertamos en la base de datos
        $sql = 'INSERT into usuarios(email, id, nombre, password) VALUES(?,?,?,?)';
        $sth = $dbh->prepare($sql);
        $exito = $sth->execute(array($email, $id, $nombre, $pass));
    }
}
?>

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
    </head>

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
                        <h2>3.4</h2>
                    </div>

                    <!-- show top menu items on smaller screens -->
                    <button class="navbar-toggler" type="button" 
                        data-toggle="collapse" data-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" 
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <span class="navbar-text mr-3">
                            <a class="nav-link inter-700" href="./signin-form.html">Registrarse </a>
                        </span>
                    </div>
                </nav>

                <!-- Contenido -->
                <div class="container inter-200">
                <?php if ($fallo): ?>
                    <h1 class="display-3 mt-4 inter-700">Ups</h1>
                    <p class="lead"><?= $mensaje ?></p>
                <?php else: ?>
                    <h1 class="display-3 mt-4 inter-700">Todo listo</h1>
                    <p class="lead">Tu usuario ha sido creado con éxito</p>
                <?php endif; ?>
                    <a class="fg-dark1 font-weight-bold" href="./index.php" title="volver a inicio">
                        <?=$enlace?>
                    </a>
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

