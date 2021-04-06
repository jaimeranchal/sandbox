<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Mis libros</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
    </head>

<?php
// conexión a la bd
require_once('conexion.php');

// Array de errores
$errores = [];

// Comprobar si se ha definido el campo del formulario
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['id'])) {
    // filtrar y validar id
    if (!filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
        $errores[] = "Error: el id proporcionado no es un entero";
    } else {
        $id  = $_POST['id'];
        //sentencia preparada
        $sql = 'SELECT * from libros WHERE id=?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($id));
        // Recuperamos los datos del objeto a editar para usarlos como 
        // valores por defecto si no se han introducido cambios
        $resultado = $sth->fetch();

        // si no encuentra nada, guardamos el error
        if ($resultado == null) {

            $errores[] ="No hay items con ese id"; 

        } else {

            $titulo  = (empty($_POST["titulo"])) ? $resultado['titulo'] : filter_var($_POST["titulo"], FILTER_SANITIZE_STRING);
            $autor   = (empty($_POST["autor"])) ? $resultado['autor'] : filter_var($_POST["autor"], FILTER_SANITIZE_STRING);
            $idioma  = (!isset($_POST["idioma"])) ? $resultado['idioma'] : filter_var($_POST["idioma"], FILTER_SANITIZE_STRING);
            $genero  = (!isset($_POST['genero'])) ? $resultado['genero'] : filter_var((implode(", ", $_POST["genero"])), FILTER_SANITIZE_STRING);
            $formato = (!isset($_POST['formato'])) ? $resultado['formato'] : filter_var((implode(", ", $_POST["formato"])), FILTER_SANITIZE_STRING);
            $fecha   = filter_var($_POST["fecha"], FILTER_SANITIZE_NUMBER_INT);
            if (empty($fecha)) { 
                $fecha = $resultado['fecha']; 
            } elseif ($fecha < 1450 || $fecha > $current_year = date("Y")) {
                $errores[] = `ERROR: formato inválido` .
                    `La fecha debe ser un número entre 1450 y ${current_year}`;
            } 
            // campos no implementados
            $usuario = 1;
            $prestado = false;
        } 
    }
}
?>

    <body>
        <!-- Navegación -->
        <nav class="navbar navbar-expand-lg navbar-dark flex-column flex-md-row justify-content-center bg-dark">
            <a class="navbar-brand" href="index.html">Inicio</a>
            <div class="navbar-nav-scroll">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="read.php">Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-form.html">Añadir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update-form.html">Editar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delete-form.html">Quitar</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- cabecera -->
        <header class="header">
          <div class="jumbotron text-center">
            <h2 class="display-3">Editar</h2>
            <p class="lead">Revisa los cambios introducidos</p>
          </div>
        </header>

        <div class="container align-self-center p-4">
            <!-- si el id es válido y devuelve un elemento de la bd, lo borra
            muestra un mensaje; si no, retry -->
            <?php if (count($errores) > 0) {?>
            <div class="jumbotron text-center">
                <h2 class="display-5">Error</h2>
                <p><?=implode(", ", $errores)?></p>
                <a class="btn btn-primary" href="./update-form.html">Volver al formulario</a>
            </div>
            <?php } else {  
                
            // sentencia preparada
            /* También se podría dividir en 3 strings concatenados:
             * 1. UPDATE into tabla 
             * 2. SET campo1=:campo1... 
             * 3. WHERE id=:id
             * */
            $sql = "UPDATE libros SET titulo=?, autor=?, fecha=?, genero=?, idioma=?, formato=? WHERE id=?";

            $sth = $dbh->prepare($sql);
            // vinculamos parámetros con valores
            /* $sth->bindParam(':usuario', $usuario); */
            // ejecutamos la sentencia
            $sth->execute(array($titulo, $autor, $fecha, $genero, $idioma, $formato, $id));
            ?>
            <div class="jumbotron text-center">
                <h2 class="display-5">¡Listo!</h2>
                <p class="lead">Libro modificado con éxito.</p>
                <a class="btn btn-primary" href="./update-form.html">Editar otro libro</a>
            </div>
           <?php } ?>
        </div>

        <?php

        ?>
        <!-- javascript libraries -->
        <!-- JQuery -->
        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous">
        </script>
        <!-- Popper -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">
        </script>
        <!-- BootStrap -->
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
        </script>
    </body>
</html>
