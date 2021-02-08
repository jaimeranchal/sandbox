<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Tarea Presencial PHP</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
    </head>
<?php
function filtrado($datos){
    $datos = trim($datos); // elimina espacios
    $datos = stripslashes($datos); // elimina \
    $datos = htmlspecialchars($datos); // traduce a entidades HTML caracteres especiales
    return $datos;
}

// Aplica el filtro a los datos del formulario
// Comprueba que se han enviado datos por el método POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = filtrado($_POST["name"]);
    $password = filtrado($_POST["password"]);
    $address = filtrado($_POST["address"]);
    $gender = filtrado($_POST["optradio"]);
    $age = filtrado($_POST["age"]);
    $game = filtrado($_POST["game"]);
    // etc.
}
?>
    <body>
        
        <!-- Navegación -->
        <nav class="navbar navbar-expand-lg navbar-dark flex-column flex-md-row bg-dark">
            <div class="navbar-nav-scroll">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="../inicio.html">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../1/formulario1.html">Ejercicio 1</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../2/formulario2.html">Ejercicio 2</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../3/formulario3.html">Ejercicio 3</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- Header title -->
        <header class="header">
            <div class="jumbotron text-center">
                <h1 class="display-3">Ejercicio 1</h1>
                <p class="lead">Generador de informes</p>
            </div>
        </header>
        <!-- Informe -->
        <div class="container align-self-center p-4 bg-light mt-5" style="max-width: 500px;">    
        <p><b>Nombre:</b> <?= $name; ?></p>
        <p><b>Edad:</b> <?= $age; ?></p>
        <p><b>Contraseña:</b> <?= $password; ?></p>
        <p><b>Género:</b> <?= $gender; ?></p>
        <p><b>Dirección:</b> <?= $address; ?></p>
        <p><b>Juego:</b> <?= $game; ?></p>
        </div> 
        <!-- BootStrap javascript libraries -->
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
