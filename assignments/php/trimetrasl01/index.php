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

        <!-- Si es un alumno: -->
        <?php if (isset($_SESSION['usuario']) === true) { ?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">¡Hola!</h2>
            <p class="lead">Has iniciado sesión como <b><?=$_SESSION['nombre']?></b></p>
            <p class="lead">Usa el enlace del menú para jugar.</p>
        </div>
        
        <!-- Formulario de login -->
        <?php } else { ?>
        <div class="container d-flex min-vh-100">
            <div class="container align-self-center p-4 mt-n5 shadow" style="max-width: 500px;">
                <h2 class="display-4 text-center">Inicia sesión</h2>
                <p class="lead text-center">Introduce tus datos para continuar</p>
                <form action="login.php" method="POST">

                    <div class="form-group">
                        <div class="input-group mr-sm-2">
                            <label class="sr-only" for="usuario">Usuario</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" name="usuario" class="form-control" id="usuario" placeholder="usuario" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="sr-only" for="pass">Contraseña</label>
                        <div class="input-group mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-key"></span>
                                </div>
                            </div>
                            <input type="password" name="pass" class="form-control" id="pass" placeholder="*******" required>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary" name="submit"><span class="fas fa-sign-in-alt"></span> Login</button>
                </form>
            </div>
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


