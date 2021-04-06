<!-- plantilla de menú de navegación con Bootstrap -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Academia (borrador)</title>
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
?>
    <body>
        <!-- Navegación con login (barra superior / necesita FontAWS)-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Academia</a>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="./index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="./portal-alumnos.php">Usuarios</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="./portal-profesores.php">Administrador</a>
                    </li>
                </ul>

                <!-- Formulario de login o bienvenida a usuario -->
        <?php if (isset($_SESSION["usuario"])) { ?>
                <span class="navbar-text">Bienvenid@, <?=$_SESSION["usuario"]?></span>
                <button class="btn btn-primary ml-3">
                    <span class="fas fa-sign-out-alt"></span>
                    <a class="text-light" href="./logout.php"> Cerrar sesión</a>
                </button>
        <?php } else { ?>
                <span class="navbar-text">Inicio de sesión</span>
        <?php } ?>
            </div>
        </nav>

        <!-- cuerpo de la página -->
<?php
//recuperamos datos del formulario, filtramos y validamos 
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    if (isset($_POST['usuario'])) {
        // validación aquí
        $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['pass'])) {
        // validación aquí
        $password = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    }

    //comprobamos que existe el usuario en la base de datos
    $sql = 'select * from usuarios where nombre=? and pass=?';
    $sth = $dbh->prepare($sql);
    $sth->execute(array($usuario, $password));
    $resultado = $sth->fetch();

    if (empty($resultado)) { 
?>
        <div class="jumbotron m-4 text-center">
            <h2 class="display-5">Error</h2>
            <p class="lead">El usuario no existe o la contraseña no es correcta. 
            Revisa los datos y vuelve a intentarlo</p>
        </div>
        
<?php } else { 
    session_start();
    $_SESSION["usuario"] = $resultado["nombre"];
    $_SESSION["tipo"] = $resultado["tipo"];
?>
        <div class="jumbotron m-4">
            <h2 class="display-5">¡Estás dentro!</h2>
            <p class="lead">Has iniciado sesión con éxito</p>
        </div>
<?php } } ?>
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

