<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aplicación 1: test PHP</title>
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
                    <a class="navbar-brand" href="#">Academia PHP</a>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="./index.php">Inicio</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="./test.php">Test</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./profesor.php">Profesores</a>
                    </li>
                </ul>

                <!-- Formulario de login o bienvenida a usuario -->
                <?php if (isset($_SESSION['usuario'])) { ?>
                <span class="navbar-text"><span class="fas fa-user"></span> <?=$_SESSION['nombre']?></span>
                <button class="btn btn-primary ml-3">
                    <span class="fas fa-sign-out-alt"></span>
                    <a class="text-light" href="./logout.php"> Cerrar sesión</a>
                </button>
                <?php } ?>
            </div>
        </nav>

        <!-- cuerpo de la página -->

        <!-- Si es un alumno: -->
<?php 

if (isset($_SESSION['usuario']) === true && $_SESSION['rol'] === 'a') { 

    /* Procesamiento de los datos */

    /*
     * - Asigno las respuestas a variables (11)
     * - Calculo el porcentaje de aciertos contra la base de datos
     * - Convierto esa nota a base 10
     * - Reduzco el número de intentos en 1
     */

    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === 'POST'){

        // Buscamos el número de intentos disponibles
        $sql = 'SELECT intentos FROM usuarios WHERE id=?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($_SESSION['usuario']));
        $intentos = $sth->fetch();

        $_SESSION['intentos'] = $intentos['intentos'] - 1;

        // actualizamos la información de los intentos en la base de datos
        $sql = 'UPDATE usuarios SET intentos=? WHERE id=?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($_SESSION['intentos'], $_SESSION['usuario']));

        $aciertos = 0;
        $respuestas = [];

        $respuestas[] = $_POST['1'];
        $respuestas[] = $_POST['2'];
        $respuestas[] = $_POST['3'];
        $respuestas[] = $_POST['4'];
        $respuestas[] = $_POST['5'];
        $respuestas[] = $_POST['6'];
        $respuestas[] = $_POST['7'];
        $respuestas[] = $_POST['8'];
        $respuestas[] = $_POST['9'];
        $respuestas[] = $_POST['10'];
        $respuestas[] = $_POST['11'];

        // sentencia preparada: busca respuesta correcta
        $sql = 'SELECT id FROM opciones WHERE pregunta=? and correcta=1';
        $sth = $dbh->prepare($sql);

        for ($i = 0; $i < 11; $i++) {
            $sth->execute(array($i+1));
            $respuesta_correcta = $sth->fetch();
            $respuestas[$i] == $respuesta_correcta['id'] ? $aciertos++ : $aciertos += 0;
        }
        // convertimos los aciertos en una nota sobre 10
        $nota = round($aciertos * 10 / 11, 2);
        // actualizamos la nota en la base de datos
        switch ($intentos['intentos']){
            case 3:
                $sql2 = 'UPDATE usuarios SET nota_3=? WHERE id=?';
                break;
            case 2:
                $sql2 = 'UPDATE usuarios SET nota_2=? WHERE id=?';
                break;
            case 1:
                $sql2 = 'UPDATE usuarios SET nota_1=? WHERE id=?';
                break;
        }
        $sth = $dbh->prepare($sql2);
        $sth->execute(array($nota, $_SESSION['usuario']));
?>
        <!-- Hero -->
        <div class="jumbotron text-center">
            <h2 class="display-4">Test PHP</h2>
            <p class="lead">Respuesta enviada, te quedan <b><?=$_SESSION['intentos']?> intentos</b></p>
        </div>
        <!-- Resultados del Test -->
        <div class="container align-self-center p-4 shadow text-center">
            <p class="lead">
                Has acertado <b><?=$aciertos?></b> de <?=count($respuestas)?> preguntas<br>
                <b>Tu nota en este intento es <?=$nota?></b>
            </p>
            <button class="btn btn-primary ml-3">
                <span class="fas fa-undo"></span>
                <a class="text-light" href="./test.php"> Volver a intentarlo</a>
            </button>
        </div>
        
        <!-- Mensaje de advertencia -->
        <?php } } else { ?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">Acceso prohibido</h2>
            <p class="lead">Debes iniciar sesión para poder ver el contenido</p>
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



