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

        <div class="container d-flex min-vh-100">
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

    // validar nombre
    if (isset($_POST['nombre'])) {
        $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    } else {
        $errores[] = "Error: ".$errorNombre;
    }

    // validar password
    if (isset($_POST['pass']) && preg_match($formatoPwd, $_POST['pass']) > 0) {
        // codifico la contraseña con el algoritmo blowfish
        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
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

        $sql = 'INSERT into usuarios(email, id, nombre, password) VALUES(?,?,?,?)';
        $sth = $dbh->prepare($sql);
        $exito = $sth->execute(array($email, $id, $nombre, $pass));

?>
        <div class="container bg-light align-self-start w-50 p-4 mt-2 shadow text-center">
            <h2 class="display-3">Genial!</h2>
            <p class="lead">Tu usuario ha sido creado con éxito. Inicia sesión y empieza a reservar.<p>
            <button class="btn-lg btn-dark mt-3">
                <span class="fas fa-sign-in-alt"></span>
                <a class="text-light" href="./index.php"> Iniciar sesión</a>
            </button>
        </div>
<?php } else { ?>

        <div class="container bg-light align-self-start w-50 p-4 mt-2 shadow text-center">
            <div class="error">
                <h2 class="display-3">Ups!</h2>
                <p class="lead">Algo no ha ido bien. Revisa los errores al rellenar el formulario y vuelve a intentarlo:<p>
            </div>
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
        </div>
        
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

