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
                <?php } else { ?>
                <button class="btn btn-primary ml-3">
                    <span class="fas fa-address-card"></span>
                    <a class="text-light" href="./signin-form.html"> Nuevo usuario</a>
                </button>
                <?php } ?>
            </div>
        </nav>

        <!-- cuerpo de la página -->

        <!-- Si es un profesor: -->
        <?php if (isset($_SESSION['usuario']) === true && $_SESSION['rol'] === 'p') {  

        //recupero datos de alumnos de la base de datos
        $sql = "SELECT * FROM usuarios WHERE rol='a'";
        $sth = $dbh->prepare($sql);
        $sth->execute();
        $resultado = $sth->fetchAll();

        ?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">Portal del profesor</h2>
            <p class="lead">Aquí puedes consultar las notas de los alumnos, o generar un informe</p>
            <button class="btn btn-primary ml-3">
                <span class="fas fa-chart-bar"></span>
                <a class="text-light" href="./profesor_informe.php"> Informe</a>
            </button>
        </div>
        <!-- tabla con las notas de los alumnos -->
        <div class="container shadow p-4">
            <table class="table">
                <thead class="thead-dark">
                    <tr><th>Alumno</th><th>Nº de intentos</th><th>Nota más alta</th></tr>
                </thead>
                <?php foreach ($resultado as $fila) { ?>
                <!-- elemento de lista o fila con formato -->
                <tr>
                    <td><?= $fila['nombre'] ?></td>
                    <td><?= -($fila['intentos']-3) ?></td>
                    <td><?= max($fila['nota_1'], $fila['nota_2'], $fila['nota_3']) ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
        <!-- Si es un alumno o no ha iniciado sesión -->
        <?php } else { ?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">Acceso prohibido</h2>
            <p class="lead">Debes iniciar sesión como <b>profesor</b>para poder ver el contenido</p>
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


