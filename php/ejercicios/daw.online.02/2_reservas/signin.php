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

            </div>
        </nav>

        <!-- cuerpo de la página -->

<?php
// Filtrar y validar datos del formulario
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") {
    // mensajes de error
    $errorBD = "el usuario ya existe en la base de datos";
    $errorNombre = "el nombre está vacío.";
    $errorAlias = "formato de alias inválido. Sólo puede contener hasta 8 letras; ni números ni símbolos.";
    $errorPass = "formato de contraseña inválido.";
    $errorEmail = "formato de email inválido.";
    // array de errores
    $errores = [];

    // expr.regular con los requisitos
    $formatoAlias = "/^[a-zA-Z]{4,8}$/";
    $formatoPwd = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";

    // validar alias
    if (isset($_POST['id']) && preg_match($formatoAlias, filter_var($_POST['id'], FILTER_SANITIZE_STRING)) > 0) {

        $id = filter_var($_POST['id'], FILTER_SANITIZE_STRING);

        //recuperamos información de la base de datos para comprobar valores únicos
        $sql = 'SELECT * from usuarios where id=?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($id));
        $resultado = $sth->fetch();

        // error si encuentra que ya existe el usuario
        if (!empty($resultado)) $errores[] = "Error: ".$errorBD;

    } else {
        $errores[] = "Error: ".$errorAlias; 
    }

    /* Pensé en detener la ejecución si el alias ya existía, pero el resto de errores
     * es también información útil para el usuario
     */

    // validar nombre
    if (isset($_POST['nombre'])) {
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    } else {
        $errores[] = "Error: ".$errorNombre;
    }

    // validar password
    if (isset($_POST['pass']) && preg_match($formatoPwd, $_POST['pass']) > 0) {
        $pass = $_POST['pass'];
    } else {
        $errores[] = "Error: ".$errorPass; 
    }

    // validar email
    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) !== false) {
        $email = $_POST['email'];
    } else {
        $errores[] = "Error: ".$errorEmail; 
    }

// Si hay fallos, mensaje
    if (count($errores) <= 0) {
        // Todo correcto, insertamos datos con una sentencia preparada

        $sql = 'INSERT into usuarios(id, nombre, pass, email, rol) VALUES(?,?,?,?,?)';
        $sth = $dbh->prepare($sql);
        $exito = $sth->execute(array($id, $nombre, $pass, $email, 'a'));

?>
        <div class="jumbotron text-center m-4">
            <h2 class="display-3">Genial!</h2>
            <p class="lead">Tu usuario ha sido creado con éxito. Inicia sesión y empieza a reservar.<p>
            <button class="btn-lg btn-dark mt-3">
                <span class="fas fa-sign-in-alt"></span>
                <a class="text-light" href="./index.php"> Iniciar sesión</a>
            </button>
        </div>
<?php } else { ?>

        <div class="jumbotron text-center m-4">
            <h2 class="display-3">Ups!</h2>
            <p class="lead">Algo no ha ido bien. Revisa los errores al rellenar el formulario y vuelve a intentarlo:<p>
        <!-- lista de errores -->

            <ul class="list-group">
<?php foreach ($errores as $error) { ?>
            <li class="list-group-item"> <?=$error?></li>    
<?php } ?>
            </ul>
            <button class="btn-lg btn-dark mt-3">
                <span class="fas fa-undo"></span>
                <a class="text-light" href="./signin-form.html"> Volver al formulario</a>
            </button>
        </div>
<?php } } ?>

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



