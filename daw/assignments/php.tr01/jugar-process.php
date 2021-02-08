<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pares o nones</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
    </head>
<?php
require_once("./conexion.php");
session_start();
?>
    <body>
        <!-- Navegación con login (barra superior / necesita FontAWS)-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Pares o Nones</a>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="./index.php">Inicio</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="./jugar.php">Jugar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./clasificacion.php">Clasificación</a>
                    </li>
                </ul>

                <!-- Botón de cierra de sesión o registro de nuevo usuario -->
                <?php if (isset($_SESSION['usuario'])) { ?>
                <span class="navbar-text"><span class="fas fa-user"></span> <?=$_SESSION['nombre']?></span>
                <button class="btn btn-primary ml-3">
                    <span class="fas fa-sign-out-alt"></span>
                    <a class="text-light" href="./logout.php"> Cerrar sesión</a>
                </button>
                <?php } else { ?>
                <button class="btn btn-primary ml-3">
                    <span class="fas fa-address-card"></span>
                    <a class="text-light" href="./registro-form.html"> Nuevo usuario</a>
                </button>
                <?php } ?>
            </div>
        </nav>

        <!-- cuerpo de la página -->
<?php
if (isset($_SESSION['usuario']) === true) {
// Recogida de datos
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $opcionUsuario = $_POST["mano"];

    // Procesamiento
    // 1. Elegir un número al azar entre 1 y 10
    $numero = rand(1,10);

    // 2. Decide el ganador
    // Dos posibles resultados: usuario gana o pierde
    // REGLAS:
    if ($numero % 2 === 0 && $opcionUsuario === "Pares" ||
        $numero % 2 !== 0 && $opcionUsuario === "Nones") {
        // el usuario ha ganado
        // actualiza la información de la base de datos
        $sql = "INSERT INTO partidas(usuario, victoria) VALUES(?,?)";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($_SESSION['usuario'], 1));
?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">¡Acertaste!</h2>
            <p class="lead">Los dados han dicho: <b><?=$numero?></b> y elegiste <?=$opcionUsuario?>, genial!<p>
            <button class="btn btn-primary ml-3">
                <span class="fas fa-undo"></span>
                <a class="text-light" href="./jugar.php"> Volver a intentarlo</a>
            </button>
        </div>
<?php

    } else {
        // el usuario ha perdido
        // actualiza la información de la base de datos
        $sql = "INSERT INTO partidas(usuario, victoria) VALUES(?,?)";
        $sth = $dbh->prepare($sql);
        $sth->execute(array($_SESSION['usuario'], 0));
?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">Has fallado...</h2>
            <p class="lead">Los dados han dicho: <b><?=$numero?></b> y elegiste <?=$opcionUsuario?>, mala suerte.<p>
            <button class="btn btn-primary ml-3">
                <span class="fas fa-undo"></span>
                <a class="text-light" href="./jugar.php"> Volver a intentarlo</a>
            </button>
        </div>
<?php } } else { ?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">No deberías estar aquí</h2>
            <p class="lead">Se supone que no puedes llegar aquí sin elegir una opción...<p>
            <button class="btn btn-primary ml-3">
                <span class="fas fa-undo"></span>
                <a class="text-light" href="./jugar.php"> Hazlo bien esta vez, anda</a>
            </button>
        </div>
<?php } ?>
 
        <!-- Mensaje de error: acceso prohibido -->
        <?php } else { ?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">Acceso prohibido</h2>
            <p class="lead">Debes iniciar sesión para poder jugar</p>
        </div>
        <?php } ?>

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




