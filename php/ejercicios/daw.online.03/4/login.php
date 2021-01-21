<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP3: Balance</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="../src/css/main.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
    </head>

<?php
// conexión a bbdd
require_once("./conexion.php");
?>
    <body class="d-flex flex-column min-vh-100">

        <!-- Navegación -->
         <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid">

                <div class="navbar-brand">
                    <a class= "btn btn-primary" title="volver al menú de aplicaciones" href="../inicio.html">
                        <span class="fas fa-chevron-circle-left"></span>
                         Menú
                    </a>
                    
                </div>
            </div>
        </nav>     

        <!-- Cuerpo de la página -->
        <div class="jumbotron text-center">
                    <img src="../src/icons/factura.svg" alt="website in a circle" width="100px;"/>
            <h2 class="display-3">MisCuentas</i></h2>
            <p class="lead">Aplicación simple para controlar tus gastos e ingresos</p> 
        </div>

<?php
//recuperamos datos del formulario, filtramos y validamos 
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") {
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
    if (empty($resultado)) { 
?>
        <div class="container d-flex min-vh-100">
            <div class="container bg-light align-self-start w-50 p-4 mt-2 shadow text-center">
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
                    <a class="text-light" href="./index.php"> Entrar</a>
                </button>
                <button class="btn-lg btn-dark ml-3">
                    <span class="fas fa-address-card"></span>
                    <a class="text-light" href="./signin-form.html"> Registrarse</a>
                </button>
            </div>
        </div>
        
<?php } elseif (!password_verify($password, $hash)) { ?>

        <div class="container d-flex min-vh-100">
            <div class="container bg-light align-self-start w-50 p-4 mt-2 shadow text-center">
                <div class="error">
                    <h2 class="display-5">Error</h2>
                    <p class="lead">La contraseña es incorrecta.</p> 
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
                    <a class="text-light" href="./index.php"> Entrar</a>
                </button>
                <button class="btn-lg btn-dark ml-3">
                    <span class="fas fa-address-card"></span>
                    <a class="text-light" href="./signin-form.html"> Registrarse</a>
                </button>
            </div>
        </div>
<?php } else { 
    session_start();
    $_SESSION['usuario'] = $resultado['id'];
    $_SESSION['nombre'] = $resultado['nombre'];
?>
        <div class="jumbotron bg-dark text-light text-center">
            <h2 class="display-4">¡Estás dentro!</h2>
            <p class="lead">Has iniciado sesión con éxito</p>
            <button class="btn-lg btn-light ml-3">
                <span class="fas fa-address-card"></span>
                <a class="text-dark" href="./index.php"> Empieza a usar la aplicación</a>
            </button>
        </div>
<?php } } ?>
        <footer class="footer mt-auto">
            <div class="container-fluid mt-3 mb-n1 py-3 bg-dark text-light text-center">
                <p><span class="fas fa-copyright"></span> Jaime Ranchal Beato &mdash; 
                Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from
                <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
                <p>
                </p>
            </div>
        </footer>
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





