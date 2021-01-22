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
session_start();

?>
    <body class="d-flex flex-column min-vh-100">

         <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid">

                <div class="navbar-brand">
                    <a class= "btn btn-primary" title="volver al menú de aplicaciones" href="../inicio.html">
                        <span class="fas fa-chevron-circle-left"></span>
                         Menú
                    </a>
                    
                </div>
                <!-- <span class="navbar-text">Inicio de sesión correcto</span> -->
                <span class="navbar-text">
                    <?php if(isset($_SESSION['usuario'])){ ?>
                    <span class="fas fa-user"></span> <?=$_SESSION['nombre']?>
                    <button class="btn btn-dark ml-3">
                        <span class="fas fa-sign-out-alt"></span>
                        <a class="text-light" href="./logout.php"> Cerrar sesión</a>
                    </button>
                    <?php } ?>
                </span>
            </div>
        </nav>     

        <!-- Cuerpo de la página -->
        <div class="jumbotron text-center">
                    <img src="../src/icons/factura.svg" alt="website in a circle" width="100px;"/>
            <h2 class="display-3">MisCuentas</i></h2>
            <p class="lead">Aplicación simple para controlar tus gastos e ingresos</p> 
        </div>

        <div class="container d-flex">
<?php
// Procesamos los datos del formulario
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") : 
    /* VALIDACIONES */
    require("./validacion.php");
    $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
    $fecha = validarFecha($_POST['fecha']);
    $cantidad = validarNumero($_POST['cantidad']);
    $tipo = $_POST['tipo'];

    // Si hay errores al validar muestro mensaje
    if (hayErrores()):
?>
            <div class="container align-self-start bg-light w-80 p-4 mt-2 text-center">
                <h2>Ups</h2>
                <p class="lead">Alguno de los campos contiene errores</p>
                <p>Revísalo y vuelve a intentarlo</p>
                <?php foreach ($errores as $error) { ?>
                <p class="lead">
                    <span class="fas fa-chevron-right"></span>  
                    <?=$error?>
                </p>
                <?php } ?>
                <button class="btn btn-dark ml-3">
                    <span class="fas fa-chevron-circle-left"></span>
                    <a class="text-light" href="./index.php"> Volver</a>
                </button>
            </div>
<?php
    // Si no los hay, gestionamos duplicados
    else:
        switch ($tipo) {
            case 'ingresos':
                $sql = 'SELECT * from ingresos WHERE usuario=? AND cantidad=? AND descripcion=? AND fecha=?';
                break;
            case 'gastos':
                $sql = 'SELECT * from gastos WHERE usuario=? AND cantidad=? AND descripcion=? AND fecha=?';
                break;
        }
        $sth = $dbh->prepare($sql);
        $sth->execute(array($_SESSION['usuario'], $cantidad, $descripcion, $fecha));
        $registros = $sth->fetchAll();

        $coincidencias = 0;
        foreach ($registros as $registro) {
            $coincidencias += $registro['cantidad'] == $cantidad ? 1 : 0;
            $coincidencias += $registro['descripcion'] == $descripcion ? 1 : 0;
            $coincidencias += $registro['fecha'] == $fecha ? 1 : 0;
        }

        // Si hay duplicados, error
        if ($coincidencias > 0):
?>
            <div class="container align-self-start bg-light w-80 p-4 mt-2 text-center">
                <h2>Ups</h2>
                <p class="lead">Los datos introducidos ya estaban guardados</p>
                <p>Revísalo y vuelve a intentarlo</p>
                <?php foreach ($errores as $error) { ?>
                <p class="lead">
                    <span class="fas fa-chevron-right"></span>  
                    <?=$error?>
                </p>
                <?php } ?>
                <button class="btn btn-dark ml-3">
                    <span class="fas fa-chevron-circle-left"></span>
                    <a class="text-light" href="./index.php"> Volver</a>
                </button>
            </div>
<?php
        // Si son datos nuevos, subimos a la bbdd
        else:
            // Subimos datos a la bbdd
            switch ($tipo) {
                case 'ingresos':
                    $sql = "INSERT INTO ingresos(fecha, descripcion, cantidad, usuario) VALUES(?, ?, ?, ?)";
                    break;
                case 'gastos':
                    $sql = "INSERT INTO gastos(fecha, descripcion, cantidad, usuario) VALUES(?, ?, ?, ?)";
                    break;
            }
            $sth = $dbh->prepare($sql);
            // ejecutamos la sentencia
            $sth->execute(array($fecha, $descripcion, $cantidad, $_SESSION['usuario']));

            // Recuperamos la información actualizada del ingresos y gastos
            // Ingresos
            $sql = 'SELECT * from ingresos WHERE usuario=? ORDER BY fecha';
            $sth = $dbh->prepare($sql);
            $sth->execute(array($_SESSION['usuario']));
            // Recuperamos los datos 
            $ingresos = $sth->fetchAll();
            
            // Gastos
            $sql = 'SELECT * from gastos WHERE usuario=?';
            $sth = $dbh->prepare($sql);
            $sth->execute(array($_SESSION['usuario']));
            // Recuperamos los datos 
            $gastos = $sth->fetchAll();
            
            // variables para calcular total y balance
            $total_ingresos = 0;
            $total_gastos = 0;
            $balance = 0;

            // la mostramos en una tabla
?>
            <!-- Resumen de gastos e ingresos -->
            <div class="container align-self-start w-80 p-4 mt-2 bg-light text-center">
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="3">INGRESOS</td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <th>Concepto</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ingresos as $ingreso) { 
                        $total_ingresos += $ingreso['cantidad']; ?>
                        <tr>
                            <td><?=$ingreso['fecha']?></td>
                            <td><?=$ingreso['descripcion']?></td>
                            <td><?=$ingreso['cantidad']?></td>
                        </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2"><b>Total de ingresos</b></td>
                            <td><?=$total_ingresos?> €</td>
                        </tr>
                    </tbody>
                </table>
                <button class="btn btn-dark ml-3">
                    <span class="fas fa-chevron-circle-left"></span>
                    <a class="text-light" href="./index.php"> Añadir más</a>
                </button>
            </div>
<?php
        endif;
    endif;
?>
<?php
// mensaje de error si el formulario está vacío o 
// se ha accedido directamente
else:
?>
            <div class="container align-self-start bg-light w-80 p-4 mt-2 text-center">
                <h2>Ups</h2>
                <p class="lead">El formulario no puede estar vacío</p>
                <button class="btn btn-dark ml-3">
                    <span class="fas fa-chevron-circle-left"></span>
                    <a class="text-light" href="./index.php"> Volver</a>
                </button>
            </div>
<?php
endif;
?>
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





