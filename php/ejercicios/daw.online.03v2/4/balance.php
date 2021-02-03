<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
session_start();
// Dependencias
require_once("./conexion.php");// bbdd
require_once("./validacion.php"); // funciones propias
require_once("../vendor/autoload.php"); // librería mpdf

// Procesar datos 
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST"):

    //variable de control
    $fallo = false;
    // mensajes
    $enlace= "Volver"; //texto del enlace (volver, comenzar...)

    if (isset($_POST['descripcion'])) {
        $descripcion = filter_var($_POST['descripcion'], FILTER_SANITIZE_STRING);
    }
    if (isset($_POST['fecha'])) {
        $fecha = validarFecha($_POST['fecha']);
    }
    if (isset($_POST['cantidad'])) {
        $cantidad = validarNumero($_POST['cantidad']);
    }
    $tipo = $_POST['tipo'];

    // Si hay errores al validar muestro mensaje
    if (hayErrores()):
        // mensaje de error
        $fallo = true;
        $mensaje = "Alguno de los datos no tenía el formato correcto";
    // Si no los hay, gestionamos duplicados
    else:
        switch ($tipo) {
            case "ingreso":
                $sql = 'SELECT * from ingresos WHERE usuario=? AND cantidad=? AND descripcion=? AND fecha=?';
                break;
            case "gasto":
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
            // mensaje de error
            $fallo = true;
            $mensaje = "Ya has introducido estos datos antes";
            
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
            $sql = 'SELECT DISTINCT * from ingresos WHERE usuario=? ORDER BY fecha';
            $sth = $dbh->prepare($sql);
            $sth->execute(array($_SESSION['usuario']));
            // Recuperamos los datos 
            $ingresos = $sth->fetchAll();
            
            // Gastos
            $sql = 'SELECT DISTINCT * from gastos WHERE usuario=? ORDER BY fecha';
            $sth = $dbh->prepare($sql);
            $sth->execute(array($_SESSION['usuario']));
            // Recuperamos los datos 
            $gastos = $sth->fetchAll();
            
            // variables para calcular total y balance
            $total_ingresos = 0;
            $total_gastos = 0;
            $balance = 0;

            // Creamos una instancia de la clase
            /* $mpdf = new \Mpdf\Mpdf(); */
            // inicio un búfer para capturar la página
            /* ob_start(); */
        endif;
    endif;
// mensaje de error si el formulario está vacío o 
// se ha accedido directamente
else:
    $fallo = true;
    $mensaje = "El formulario no puede estar vacío (¿cómo has llegado aquí?)";
endif;
?>

<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <link rel="icon" href="../../../../favicon.ico">
        <title>PHP Online 3</title>
        <!-- Bootstrap core CSS -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
            />
        <!-- custom css -->
        <link rel="stylesheet" href="../src/css/main.css" type="text/css"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="d-flex" id="wrapper">

            <!-- Sidebar -->
            <div class="d-flex flex-column justify-content-between bg-dark1 text-dark inter-400" id="sidebar-wrapper">
                <!-- sidebar top content -->
                <div class="sidebar-top">
                    <div class="sidebar-heading text-center">
                        <i class="fab fa-slack-hash fa-5x"></i>
                        <p class="lead courgette">D.W.E.S</p>
                    </div>
                    <div class="sidebar-menu list-group list-group-flush">
                        <a href="../inicio.html" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-home"></span>
                            Inicio
                        </a>
                        <a href="../1/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-unlock"></span>
                            Auth Basic
                        </a>
                        <a href="../2/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-lock"></span>
                            Auth Digest
                        </a>
                        <a href="../3/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-shopping-basket"></span>
                            Cesta
                        </a>
                        <a href="../4/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-receipt"></span>
                            Balance
                        </a>
                        <a href="../5/index.php" class="list-group-item list-group-item-action bg-dark1 text-dark">
                            <span class="fas fa-pizza-slice"></span>
                            Pizzeria
                        </a>
                    </div>
                </div>

                <!-- sidebar bottom content -->
                <div class="sidebar-footer">
                    <p class="text-center"><span class="fas fa-copyright"></span> 2021 - Jaime Ranchal Beato</p>
                </div>

            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">

                <!-- Navegación -->
                <nav class="navbar navbar-expand-lg navbar-light bg-transparent inter-400">
                    <!-- hide sidebar -->
                    <button class="btn btn-transparent" id="menu-toggle">
                        <span class="fas fa-arrow-left"></span>
                    </button>

                    <div class="app-title ml-2 mb-n1">
                        <h2>3.4 Mis finanzas</h2>
                    </div>
                </nav>

                <!-- Contenido -->
                <div class="container inter-200">
                <?php if ($fallo): ?>
                    <h1 class="display-3 mt-4 inter-700">Ups</h1>
                    <p class="lead"><?= $mensaje ?></p>
                <?php else: ?>
                    <h1 class="display-3 mt-4 inter-700">Balance</h1>
                <!-- Muestra los datos en una tabla -->
                <div class="card-deck">
                    <div class="card border-0">
                        <table class="table table-hover w-auto">
                            <thead>
                                <tr>
                                    <td class="text-center" colspan="3"><h2 class="display-4">Ingresos</h2></td>
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
                                    <td class="text-left"><?=$ingreso['descripcion']?></td>
                                    <td class="text-right"><?=$ingreso['cantidad']?> €</td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td class="text-right" colspan="2"><span class="font-weight-bold inter-700">Total de ingresos</span></td>
                                    <td class="text-right"><?=$total_ingresos?> €</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="card border-0">
                        <table class="table table-hover w-auto">
                            <thead>
                                <tr>
                                    <td class="text-center" colspan="3"><h2 class="display-4">Gastos</h2></td>
                                </tr>
                                <tr>
                                    <th>Fecha</th>
                                    <th>Concepto</th>
                                    <th>Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($gastos as $gasto) { 
                                $total_gastos += $gasto['cantidad']; ?>
                                <tr>
                                    <td><?=$gasto['fecha']?></td>
                                    <td class="text-left"><?=$gasto['descripcion']?></td>
                                    <td class="text-right"><?=$gasto['cantidad']?> €</td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <td class="text-right" colspan="2"><span class="font-weight-bold inter-700">Total de gastos</span></td>
                                    <td class="text-right"><?=$total_gastos?> €</td>
                                </tr>
                                    <td class="text-right" colspan="2"><span class="font-weight-bold inter-700">Balance</span></td>
                                    <td class="text-right"><?=$total_ingresos - $total_gastos?> €</td>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
                    <a class="btn btn-lg mt-3 bg-light1 text-white" href="./index.php" title="volver a inicio">
                        <?=$enlace?>
                    </a>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- Font Awesome JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/js/all.min.js" integrity="sha512-UwcC/iaz5ziHX7V6LjSKaXgCuRRqbTp1QHpbOJ4l1nw2/boCfZ2KlFIqBUA/uRVF0onbREnY9do8rM/uT/ilqw==" crossorigin="anonymous"></script>
        <!-- Bootstrap core JS libraries 
        =============================================================== -->
        <!-- JQuery -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <!-- Popper -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <!-- BootStrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- Menu Toggle Script -->
        <script src="../src/js/menu.js" charset="utf-8"></script>
<?php
// Si no hay fallos hay que cerrar el búfer e imprimir
/* if (!$fallo): */
/*     $html = ob_get_contents(); */
/*     ob_end_clean(); */
/*     $mpdf->WriteHTML($html); // Escribe el búfer capturado en el pdf */
/*     $mpdf->Output(); // Muestra el pdf */
/* endif; */
?>
    </body>
</html>

