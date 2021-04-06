<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Prueba ud3</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
    </head>
<?php
// conexión a bbdd
require_once("./conexion.php");
session_start();
?>
    <body>
         <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <span class="navbar-text ml-auto">
                <?php if(isset($_SESSION['usuario'])): ?>
                Hola <span class="font-weight-bold"><?=$_SESSION['usuario']?></span>
            </span>
            <span class="navbar-text mr-3">
                <a class="nav-link" href="./logout.php">Salir </a>
            </span>
                <?php else: ?>
            <span class="navbar-text mr-3">
                <a class="nav-link" href="./signin.php">Registrarse </a>
            </span>
                <?php endif; ?>
         </nav>

         <!-- Contenido -->
        <div class="container">
            <?php if(isset($_SESSION['usuario'])): ?>
            <div>
                <h2 class="display-4">Bienvenido <?=$_SESSION['usuario']?></h2>
                <p class="lead">Has iniciado sesión con éxito</p>
                <button class="btn-lg btn-light ml-3">
                    <span class="fas fa-address-card"></span>
                    <a class="text-dark" href="./usuario.php"> Empieza a usar la aplicación</a>
                </button>
            </div>
            <?php else: ?>
            <!-- Formulario de login -->
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

                <button type="submit" class="btn-lg btn-dark" name="submit">
                    <span class="fas fa-sign-in-alt"></span> Login
                </button>
            </form>
            <?php endif; ?>
        </div>
        
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
