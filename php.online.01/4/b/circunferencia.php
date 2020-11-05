<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width" />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="../css/main.css"
      type="text/css"
      media="screen"
      title="no title"
      charset="utf-8"
    />
    <title>Tarea Online 01</title>
  </head>

<?php
// Calcular área y longitud de una circunferencia:
// Recogida de datos
$diametro = $_POST["diametro"];
// Validación
// Procesamiento
$longitud = $diametro * M_PI;
$area = (($diametro/2) ** 2) * M_PI;
?>
  <body>

    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark flex-column flex-md-row bg-dark">
        <a class="navbar-brand mr-0 mr-md-2" href="#">PHP</a>
        <div class="navbar-nav-scroll">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link" href="../../inicio.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../1/ejercicio1.html">Ejercicio 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../2/ejercicio2.html">Ejercicio 2</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role?"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ejercicio 3</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="../../3/a/usuario.html" >Datos de usuario</a>
                        <a class="dropdown-item" href="../../3/b/cv.html" >Genera CV</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role?"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ejercicio 4</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="../a/piedra_papel.html" >Piedra, papel, tijeras, lagarto, Spock</a>
                        <a class="dropdown-item" href="../b/circunferencia.html" >Circunferencia</a>
                        <a class="dropdown-item" href="../c/informe_salud.html" >Informe de Salud</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../5/git_github.html">Ejercicio 5</a>
                </li>
            </ul>
        </div>
    </nav>
    
    <!-- Título e imagen de portada -->
    <header class="header">
      <div class="jumbotron text-center">
        <h1 class="display-3">Ejercicio 4-b</h1>
        <p class="lead">Diámetro de una circunferencia</p>
      </div>
    </header>

    <div class="container align-self-center p-4 bg-light mt-5" style="max-width: 500px;">    
        <ul>
            <li><b>Área:</b> <?php echo round($area, 2)?></li>
            <li><b>Longitud:</b> <?php echo round($longitud, 2)?></li>
        </ul>
        <button class="btn btn-block btn-outline-primary" onclick="document.location='circunferencia.html'">Volver a calcular</button>
    </div>
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