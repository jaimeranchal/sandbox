<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Aplicación 2: reserva tu coche</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
        <!-- custom css -->
        <link rel="stylesheet" href="./css/main.css" type="text/css" media="screen" charset="utf-8">
    </head>
<?php
require_once("./conexion.php");
session_start();
?>
    <body>
        <!-- Navegación con login (barra superior / necesita FontAWS)-->
        <nav class="navbar navbar-expand-lg navbar-light bg-warning">
            <div class="container-fluid">
                <div class="navbar-header">
                    <span class="favicon fas fa-shipping-fast"> </span>
                    <a class="navbar-brand" href="#">RentACarro</a>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="./index.php">Inicio</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="./reservas-form.php">Reservas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./admin.php">Administración</a>
                    </li>
                </ul>

                <!-- Formulario de login o bienvenida a usuario -->
                <?php if (isset($_SESSION['usuario'])) { ?>
                <span class="navbar-text"><span class="fas fa-user"></span> <?=$_SESSION['nombre']?></span>
                <button class="btn btn-danger ml-3">
                    <span class="fas fa-sign-out-alt"></span>
                    <a class="text-light" href="./logout.php"> Cerrar sesión</a>
                </button>
                <?php } else { ?>
                <button class="btn btn-dark ml-3">
                    <span class="fas fa-address-card"></span>
                    <a class="text-light" href="./signin-form.html"> Nuevo usuario</a>
                </button>
                <?php } ?>
            </div>
        </nav>

        <!-- cuerpo de la página -->

        <!-- Si es un cliente: -->
        <?php if (isset($_SESSION['usuario']) === true && $_SESSION['rol'] === 'c') { ?>
        <div class="jumbotron bg-dark text-light text-center">
            <h2 class="display-4 text-center">¡Hola!</h2>
            <p class="lead">Has iniciado sesión como <b><?=$_SESSION['nombre']?></b><br>
            Usa el enlace del menú superior para realizar una reserva.</p>
        </div>
        <!-- Si es un profesor: -->
        <?php } elseif (isset($_SESSION['usuario']) === true && $_SESSION['rol'] === 'e') {  ?>
        <div class="jumbotron bg-dark text-light text-center">
            <h2 class="display-4 text-center">Bienvenido</h2>
            <p class="lead opacity-5">Has iniciado sesión como <b><?=$_SESSION['nombre']?></b><br>
            Usa el enlace del menú superior para acceder al panel de administración.</p>
        </div>
        
        <!-- Formulario de login -->
        <?php } else { ?>
        <div class="container d-flex min-vh-100">
            <div class="container bg-warning align-self-center p-4 mt-n5 shadow text-center" style="max-width: 500px;">
                <h2 class="display-4">Inicia sesión</h2>
                <p class="lead">Introduce tus datos para continuar</p>
                <form action="login.php" method="POST">

                    <div class="form-group">
                        <div class="input-group mr-sm-2">
                            <label class="sr-only" for="usuario">Usuario</label>
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <span class="fas fa-at"></span>
                                </div>
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

                    <button type="submit" class="btn-lg btn-dark" name="submit"><span class="fas fa-sign-in-alt"></span> Login</button>
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


