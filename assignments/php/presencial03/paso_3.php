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
                No deberías estar aquí
            </span>
            <span class="navbar-text mr-3">
                <a class="nav-link" href="./signin.php">Registrarse </a>
            </span>
                <?php endif; ?>
         </nav>

         <!-- Contenido -->
        <div class="container">
        <?php
        // procesamos los datos del paso anterior y los guardamos en Sesión
        if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") :
        // funciones de validación
        require("./validacion.php");
        // tfno
        $_SESSION['tfno'] = validarNumero($_POST['tfno']);
        // email
        $_SESSION['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

        if (hayErrores()): 
        ?>
            <div>
                <div class="error">
                    <h2 class="display-5">Error</h2>
                    <p class="lead">Alguno de los datos no está bien</p> 
                </div>
                <div class="text-left pl-4">
                    <p class="lead">
                        <span class="fas fa-chevron-right"></span>  
                        Revisa los datos y vuelve a intentarlo</p>
                </div>
                <button class="btn-lg btn-dark ml-3">
                    <a class="text-light" href="./paso_1.php">Volver</a>
                </button>
            </div>
        <?php
        else:
        ?>
            <div class="mb-3">
                <h2 class="display-4">Paso 3</h2>
                <p class="lead">¿Dónde ver tu trabajo?</p>
            </div>
            <form action="./tarjeta.php" method="POST">
                <div class="form-group">
                    <label for="personal">Web personal</label>
                    <input type="text" name="personal" value="" id="personal">
                </div>
                <div class="form-group">
                    <label for="portfolio">Web portfolio</label>
                    <input type="text" name="portfolio" value="" id="portfolio">
                </div>
                <div class="form-group">
                <input type="submit" name="submit" id="submit" value="Generar">
            </form>
        <?php endif; ?>
        <?php else: ?>
            <div>
                <div class="error">
                    <h2 class="display-5">Error</h2>
                    <p class="lead">El formulario está vacío</p> 
                </div>
                <div class="text-left pl-4">
                    <p class="lead">
                        <span class="fas fa-chevron-right"></span>  
                        Vuelve a intentarlo</p>
                </div>
                <button class="btn-lg btn-dark ml-3">
                    <a class="text-light" href="./paso_1.php">Volver</a>
                </button>
            </div>
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





