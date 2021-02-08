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

        <!-- Si la sesión está iniciada: -->
<?php if (isset($_SESSION['usuario']) === true && $_SESSION['rol'] === 'c') { 
    // Si el formulario se ha enviado correctamente
    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST"){

        // Procesamos datos del formulario
        // Errores
        $errorfechaInicio = "la fecha de entrega no es correcta";
        $errorfechaFin = "la fecha de recogida no es correcta";
        $errores = [];

        // Variables
        $modelo = filter_var($_POST['modelo']);
        $fecha_fin;
        
        // fecha de inicio
        $fecha = date_parse($_POST['inicio']);
        if (checkdate($fecha['month'], $fecha['day'], $fecha['year']) === false) {
            $errores[] = "Error: ".$errorfechaInicio; 
        } else {
            $fecha_inicio = date("Y-m-d", strtotime($_POST['inicio']));
        }
        // fecha final
        $fecha2 = date_parse($_POST['fin']);
        if (checkdate($fecha2['month'], $fecha2['day'], $fecha2['year']) === false) {
            $errores[] = "Error: ".$errorfechaFin; 
        } else {
            $fecha_fin = date("Y-m-d", strtotime($_POST['fin']));
        }

        if (!empty($errores)) {
?>
        <!-- Si hay errores, los muestra y devuelve al formulario -->
        <div class="jumbotron bg-dark text-light text-center">
            <h2 class="display-3">Algo no ha ido bien...</h2>
            <p class="lead">Se han encontrado algunos errores en tu petición<br>Revísalos e vuelve a intentarlo: <p>
            <?php foreach ($errores as $error) { ?>
                <p class="lead">
                    <span class="fas fa-chevron-right"></span>  
                    <?=$error?>
                </p>
            <?php } ?>
            <button class="btn-lg btn-warning ml-3">
                <span class="fas fa-address-card"></span>
                <a class="text-dark" href="./reservas-form.php"> Volver</a>
            </button>
        </div>
<?php
        } else {
        // recuperamos los datos de los coches disponibles según las
        // fechas proporcionadas

        //sentencia preparada: ¿el modelo elegido está ocupado?
        $sql = 'SELECT inicio, fin from reservas WHERE modelo=:modelo AND '.
            'inicio BETWEEN :inicio AND :fin OR '.
            'fin BETWEEN :inicio AND :fin';
        
        $sth = $dbh->prepare($sql);
        // asociamos parámetros
        $sth->bindParam(':modelo', $modelo);
        $sth->bindParam(':inicio', $fecha_inicio);
        $sth->bindParam(':fin', $fecha_fin);
        // ejecutamos
        $sth->execute();
        // Recuperamos los datos 
        $ocupado = $sth->fetchAll();

        //sentencia preparada: otros modelos disponibles
        $sql2 = 'SELECT DISTINCT i.modelo from reservas as r, inventario as i WHERE '.
            'r.modelo = i.id AND '.
            'r.inicio NOT BETWEEN :inicio AND :fin AND '.
            'r.fin NOT BETWEEN :inicio AND :fin';

        $sth2 = $dbh->prepare($sql2);
        // asociamos parámetros
        $sth2->bindParam(':inicio', $fecha_inicio);
        $sth2->bindParam(':fin', $fecha_fin);
        // ejecutamos
        $sth2->execute();
        // Recuperamos los datos 
        $disponibles = $sth2->fetchAll();

        //Si hay resultados devolvemos al formulario
        if (!empty($ocupado)) {
?>
        <div class="jumbotron bg-dark text-light text-center">
            <h2 class="display-4 text-center">Lo sentimos</h2>
            <p class="lead opacity-5">El modelo que has pedido ya está reservado en las fechas indicadas.<br>Otros modelos disponibles para el periodo solicitado:</p>
            <?php foreach ($disponibles as $modelo) { ?>
                <p class="lead">
                    <span class="fas fa-check"></span>  
                    <?=$modelo['modelo']?>
                </p>
            <?php } ?>
            <button class="btn-lg btn-warning ml-3">
                <span class="fas fa-address-card"></span>
                <a class="text-dark" href="./reservas-form.php"> Volver</a>
            </button>
        </div>

<?php } else { 
        // insertamos datos de reserva en la base de datos
        //sentencia preparada
        $sql = "INSERT INTO reservas(usuario, modelo, inicio, fin) VALUES(?, ?, ?, ?)";
        $sth = $dbh->prepare($sql);
        // ejecutamos la sentencia
        $sth->execute(array($_SESSION['usuario'], $modelo, $fecha_inicio, $fecha_fin));

?>
        <!-- Si no los hay, mensaje de reserva confirmada: -->
        <div class="jumbotron bg-dark text-light text-center">
            <h2 class="display-4 text-center">Genial!</h2>
            <p class="lead opacity-5">Tu reserva ha sido realizada con éxito :)</p>
            <button class="btn-lg btn-warning ml-3">
                <span class="fas fa-address-card"></span>
                <a class="text-dark" href="./reservas-form.php"> Hacer otra reserva</a>
            </button>
        </div>
<?php  
        }
    }
}
?>
        
        <!-- Si no se ha iniciado sesión: mensaje de acceso prohibido -->
        <?php } else { ?>
        <div class="jumbotron bg-dark text-light text-center">
            <h2 class="display-4 text-center">Acceso prohibido</h2>
            <p class="lead opacity-5">Esta es zona es sólo para usuarios registrados y con una sesión activa.</p>
            <button class="btn-lg btn-warning ml-3">
                <span class="fas fa-address-card"></span>
                <a class="text-dark" href="./index.php"> Iniciar sesión</a>
            </button>
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




