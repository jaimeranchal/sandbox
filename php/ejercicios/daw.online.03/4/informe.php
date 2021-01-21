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

// Procesamos los datos del formulario
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") { 
    /* Mensajes de error */
    // $errorNombre = "El nombre no tiene el formato correcto";

    // Array de errores
    $errores = [];

    /* lista de variables (opcional) */
    $patron = "/^[a-zA-Z]{4,8}$/"; // expr. regular con los requisitos

    /* funciones */
    function validarCadena($patron, $valor) {
        $cadena = filter_var($valor, FILTER_SANITIZE_STRING);
        if (isset($cadena) && preg_match($patron, $cadena) > 0) {
            return $cadena;
        } else {
            $errores[] = "Error: la descripción no tiene el formato correcto"; 
        }
    }

    function validarFecha($valor){
        $fecha = date_parse($valor);
        if (checkdate($fecha['month'], $fecha['day'], $fecha['year']) === false) {
            $errores[] = "Error: la fecha no es correcta"; 
        } else {
            return $valor;
        }
    }

    function validarNumero($valor){
        $numero   = filter_var($valor, FILTER_SANITIZE_NUMBER_INT);
        if (is_numeric($numero)){ 
            return $numero;
        } else {
            $errores[] = "Error: no es un número"; 
        }       
    }
    /* Validaciones */
}
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
            <!-- Resumen de gastos e ingresos -->
            <div class="container align-self-start w-80 p-4 mt-2 text-center">
                <form class="shadow p-4 bg-white" action="informe.php" method="post">
                    <h2>Ingresos</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Concepto</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-control" type="date" name="ing-fecha1" id="ing-fecha1" value=""></td>
                                <td><input class="form-control" type="text" name="ing-desc1" id="ing-desc1" value=""></td>
                                <td><input class="form-control" type="number" name="ing-cant1" id="ing-cant1" value=""></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="date" name="ing-fecha2" id="ing-fecha2" value=""></td>
                                <td><input class="form-control" type="text" name="ing-desc2" id="ing-desc2" value=""></td>
                                <td><input class="form-control" type="number" name="ing-cant2" id="ing-cant2" value=""></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="date" name="ing-fecha3" id="ing-fecha3" value=""></td>
                                <td><input class="form-control" type="text" name="ing-desc3" id="ing-desc3" value=""></td>
                                <td><input class="form-control" type="number" name="ing-cant3" id="ing-cant3" value=""></td>
                            </tr>
                        </tbody>
                    </table>
                    <h2>Gastos</h2>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Concepto</th>
                                <th>Cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-control" type="date" name="gas-fecha1" id="gas-fecha1" value=""></td>
                                <td><input class="form-control" type="text" name="gas-desc1" id="gas-desc1" value=""></td>
                                <td><input class="form-control" type="number" name="gas-cant1" id="gas-cant1" value=""></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="date" name="gas-fecha2" id="gas-fecha2" value=""></td>
                                <td><input class="form-control" type="text" name="gas-desc2" id="gas-desc2" value=""></td>
                                <td><input class="form-control" type="number" name="gas-cant2" id="gas-cant2" value=""></td>
                            </tr>
                            <tr>
                                <td><input class="form-control" type="date" name="gas-fecha3" id="gas-fecha3" value=""></td>
                                <td><input class="form-control" type="text" name="gas-desc3" id="gas-desc3" value=""></td>
                                <td><input class="form-control" type="number" name="gas-cant3" id="gas-cant3" value=""></td>
                            </tr>
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-success btn-block mb-3">Enviar</button>
                </form>
            </div>
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





