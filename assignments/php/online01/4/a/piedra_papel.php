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
      href="../../css/main.css"
      type="text/css"
      media="screen"
      title="no title"
      charset="utf-8"
    />
    <title>Piedra, papel...</title>
  </head>

<?php
// Recogida de datos
if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
    $eleccionUsuario = $_POST["mano"];
} else {
    $eleccionUsuario = "Error";
}
$opciones = array("Piedra", "Papel", "Tijera", "Lagarto", "Spock");
// Validación de datos
// Procesamiento
// 1. Elegir una opción al azar
$opcionAleatoria = rand(0,4);
$eleccionRival = $opciones[$opcionAleatoria];

// 2. Decide el ganador
// Dos posibles resultados: usuario gana o pierde
// REGLAS:
// piedra gana a tijeras y a lagarto
// papel gana a piedra y a Spock
// tijeras gana a papel y a lagarto
// lagarto gana a papel y a Spock
// Spock gana a piedra y a tijeras
if ($eleccionUsuario == "Piedra" && $eleccionRival == "Tijera"
    || $eleccionUsuario == "Piedra" && $eleccionRival == "Lagarto"
    || $eleccionUsuario == "Papel" && $eleccionRival == "Piedra"
    || $eleccionUsuario == "Papel" && $eleccionRival == "Spock"
    || $eleccionUsuario == "Tijera" && $eleccionRival == "Papel"
    || $eleccionUsuario == "Tijera" && $eleccionRival == "Lagarto"
    || $eleccionUsuario == "Lagarto" && $eleccionRival == "Papel"
    || $eleccionUsuario == "Lagarto" && $eleccionRival == "Spock"
    || $eleccionUsuario == "Spock" && $eleccionRival == "Piedra"
    || $eleccionUsuario == "Spock" && $eleccionRival == "Tijeras"
) {
    $resultado = "¡Has ganado!";
    //! añadir opción de empate
} else {
    $resultado = "Lo siento, has perdido...";
}
// Salida
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
        <h1 class="display-3">Ejercicio 4-a</h1>
        <p class="lead">Piedra, Papel, Tijera, Lagarto, Spock</p>
      </div>
    </header>

    <div class="container align-self-center p-4 bg-light mt-5" style="max-width: 500px;">    
        <!-- Has perdido!! / Has ganado!! -->
        <p>Tu opción: <b><?php echo $eleccionUsuario;  ?></b></p>
        <p>La opción de tu rival: <b><?= $eleccionRival ?></b> </p>
        <h2><?= $resultado ?></h2>
        <button class="btn btn-block btn-outline-primary" onclick="document.location='piedra_papel.html'">Volver a intentarlo</button>
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
