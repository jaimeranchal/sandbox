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
?>
    <body>
         <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <span class="navbar-text mr-3">
                <a class="nav-link" href="./index.php">Inicio </a>
            </span>
         </nav>

         <!-- Contenido -->
        <div class="container">
        <?php
        //recuperamos datos del formulario, filtramos y validamos 
        if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") :
            if (isset($_POST['usuario'])) {
                $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
            }
            if (isset($_POST['pass'])) {
                $password = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
            }

            //comprobamos que existe el usuario en la base de datos
            $sql = 'select * from usuarios where id=?';
            $sth = $dbh->prepare($sql);
            $sth->execute(array($usuario));
            $resultado = $sth->fetch();
            $hash = empty($resultado) ? "" : $resultado['password'];

            // Si no existe o los hash no coinciden
            if (empty($resultado)) : 
        ?>
        <div>
            <div class="error">
                <h2 class="display-5">Error</h2>
                <p class="lead">El usuario no existe o el nombre introducido es incorrecto.</p> 
            </div>
            <div class="text-left pl-4">
                <p class="lead">
                    <span class="fas fa-chevron-right"></span>  
                    Revisa los datos y vuelve a intentarlo</p>
                <p class="lead">
                    <span class="fas fa-chevron-right"></span>  
                    Si no te has registrado aún, usa el siguiente botón para crear tu usuario:</p>
            </div>
            <button class="btn-lg btn-dark ml-3">
                <span class="fas fa-sign-in-alt"></span>
                <a class="text-light" href="./index.php"> Reintentar</a>
            </button>
            <button class="btn-lg btn-dark ml-3">
                <span class="fas fa-address-card"></span>
                <a class="text-light" href="./signin-form.html"> Registrarse</a>
            </button>
        </div>
        <?php elseif (!password_verify($password, $hash)): ?>
        <div>
            <div class="error">
                <h2 class="display-5">Error</h2>
                <p class="lead">La contraseña es incorrecta</p> 
            </div>
            <div class="text-left pl-4">
                <p class="lead">
                    <span class="fas fa-chevron-right"></span>  
                    Revisa los datos y vuelve a intentarlo</p>
                <p class="lead">
                    <span class="fas fa-chevron-right"></span>  
                    Si no te has registrado aún, usa el siguiente botón para crear tu usuario:</p>
            </div>
            <button class="btn-lg btn-dark ml-3">
                <span class="fas fa-sign-in-alt"></span>
                <a class="text-light" href="./index.php"> Reintentar</a>
            </button>
            <button class="btn-lg btn-dark ml-3">
                <span class="fas fa-address-card"></span>
                <a class="text-light" href="./signin-form.html"> Registrarse</a>
            </button>
        </div>
        <?php else: 
        session_start();
        $_SESSION['usuario'] = $resultado['id'];
        ?>
        <div>
            <h2 class="display-4">¡Estás dentro!</h2>
            <p class="lead">Has iniciado sesión con éxito</p>
            <button class="btn-lg btn-light ml-3">
                <span class="fas fa-address-card"></span>
                <a class="text-dark" href="./usuario.php"> Empieza a usar la aplicación</a>
            </button>
        </div>
        <?php endif; ?>
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

