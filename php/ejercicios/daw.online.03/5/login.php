<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <title>PHP3: Pizzeria</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
        <!-- Ajustes de estilo solo para esta aplicación -->
        <link rel="stylesheet" href="./css/styles.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    </head>

<?php
// conexión a bbdd
require_once("./conexion.php");
?>
    <body class="d-flex flex-column min-vh-100">
        <!-- Navegación -->
         <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container-fluid">

                <div class="navbar-brand">
                    <a class= "text-dark" title="Volver a la página principal" href="./index.php">Inicio</a>
                </div>
                <span class="navbar-text site-title brand">Gulami's Pizza</span> 
                <span class="navbar-text">
                    <button class="btn bg-bermejo">
                        <a class="text-light m-2" href="./signin-form.html" title="¿No tienes cuenta? Crea una"> Regístrate</a>
                    </button>
                </span>
            </div>
        </nav>     
        <!-- Cuerpo -->
        <div class="d-flex flex-row justify-content-center mt-auto">
<?php
//recuperamos datos del formulario, filtramos y validamos 
require_once("./validacion.php");

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST"):
    // compruebo que haya errores; si el campo no está definido, pongo a 0 
    $tfno =isset($_POST['tfno'])? validarNumero($_POST['tfno']) : 0;
    $password = isset($_POST['pass'])? filter_var($_POST['pass'], FILTER_SANITIZE_STRING) : 0;

    if (hayErrores() || $tfno == 0 || $password == 0):
?>
            <div class="dialog p-4 mt-5 ml-5 mb-5 bg-white">
                <h2 class="display-5">Ups</h2>
                <p class="lead">Ha habido algún error al rellenar el formulario</p> 
            </div>
<?php else: 
    //comprobamos que existe el usuario en la base de datos
    $sql = 'select * from usuarios where tfno=?';
    $sth = $dbh->prepare($sql);
    $sth->execute(array($tfno));
    $resultado = $sth->fetch();
    $hash = empty($resultado) ? "" : $resultado['password'];

    // Si no existe o los hash no coinciden
    if (empty($resultado)):  
?>
            <div class="figure p-4 mt-5 mr-5 mb-5">
                <img src="./img/repartidor-hero.svg" alt="Repartidor en moto sobre un planeta"/>
            </div>
            <!-- mensajes de éxito o fallo del login -->
            <div class="dialog p-4 mt-5 ml-5 mb-5 bg-white">
                <h2 class="display-5">Ups</h2>
                <p class="lead">Usuario no encontrado</p> 
            </div>
<?php elseif (!password_verify($password, $hash)): ?>
            <div class="figure p-4 mt-5 mr-5 mb-5">
                <img src="./img/repartidor-hero.svg" alt="Repartidor en moto sobre un planeta"/>
            </div>
            <!-- mensajes de éxito o fallo del login -->
            <div class="dialog p-4 mt-5 ml-5 mb-5 bg-white">
                <h2 class="display-5">Ups</h2>
                <p class="lead">Contraseña incorrecta</p> 
            </div>
<?php else: 
    session_start();
    $_SESSION['usuario'] = $resultado['id'];
    $_SESSION['nombre'] = $resultado['nombre'];
    $_SESSION['tipo'] = $resultado['tipo'];
?>
            <div class="figure p-4 mt-5 mr-5 mb-5">
                <img src="./img/repartidor-hero.svg" alt="Repartidor en moto sobre un planeta"/>
            </div>
            <!-- mensajes de éxito o fallo del login -->
            <div class="dialog p-4 mt-5 ml-5 mb-5 bg-white">
            <h2 class="display-5">¡Hola <?=$_SESSION['nombre']?>!</h2>
                <p class="lead">El genio del horno está esperando tus deseos</p> 
            </div>
<?php endif; ?>
<?php endif; ?>
<?php endif; ?>
        </div>
        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="container-fluid mt-3 mb-n1 py-3 bg-white text-dark text-center">
                <p><span class="fas fa-copyright"></span> Jaime Ranchal Beato</p>
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

