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
    if($_SESSION['intentos'] > 0){
?>
        <!-- Hero -->
        <div class="jumbotron text-center">
            <h2 class="display-4">Test PHP</h2>
            <p class="lead">Contesta a las preguntas lo mejor que puedas, tienes <b><?=$_SESSION['intentos']?> intentos</b></p>
        </div>
        <!-- Test -->
        <div class="container align-self-center p-4 shadow">
            <form action="test_result.php" method="POST">
            <!-- por cada pregunta imprime su texto -->
<?php

    // recuperamos los datos de la base de datos
    $sql = "SELECT * FROM preguntas";
    $sth = $dbh->prepare($sql);
    $sth->execute();
    $preguntas = $sth->fetchAll();

    // dejo preparada una sentencia para ejecutarla en bucle con cada pregunta
    $sql2 = "SELECT * FROM opciones WHERE pregunta=?";
    $sth2 = $dbh->prepare($sql2);

    // Imprime en bucle el texto de las preguntas
    foreach ($preguntas as $pregunta) {    

?>
            <div class="form-group">
            <legend class="form-label">Pregunta <?=$pregunta['id']?></legend>
            <p class="lead"><?=$pregunta['texto']?></p>

<?php 

        $id_pregunta = $pregunta['id'];

        $sth2->execute(array($id_pregunta));
        $opciones = $sth2->fetchAll();

        /* bucle foreach que imprime todas las opciones con FK = pregunta */
        foreach ($opciones as $opcion) {
?>
                <div class="form-check">
                    <input type="radio" class="form-check-input" name="<?=$id_pregunta?>" value="<?=$opcion['id']?>"></input> 
                    <label for="<?=$id_pregunta?>" class="form-check-label"><?=$opcion['texto']?></label>
                </div>
<?php } ?>
            </div>
            <hr>
<?php } ?>

            <button type="submit" name="submit" class="btn btn-primary btn-block mb-3 text-center">Enviar respuestas</button>
            </form>
        </div>

        <!-- Si es un profesor: -->
<?php 
    } else {
?>
        <!-- Hero -->
        <div class="jumbotron text-center">
            <h2 class="display-4">Test PHP</h2>
            <p class="lead">Has agotados todos tus intentos</p>
        </div>

<?php
    } 
} elseif (isset($_SESSION['usuario']) === true && $_SESSION['rol'] === 'p') {  ?>

        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">Test PHP (vista del profesor)</h2>
            <p class="lead">Este es el test para <b>alumnos</b></p>
            <p class="lead">Usa el enlace del menú superior para acceder al portal del profesor.</p>
        </div>
        
        <!-- Mensaje de advertencia -->
        <?php } else { ?>
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


