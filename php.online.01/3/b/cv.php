<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Genera tu CV</title>
</head>

<?php

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
                    <a class="nav-link" href="../../2/ejercicio2.html" >Ejercicio 2</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role?"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ejercicio 3</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item disabled" href="../a/usuario.html" aria-disabled="true" >Datos de usuario</a>
                        <a class="dropdown-item" href="../b/cv.html" >Genera CV</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role?"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ejercicio 4</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="../../4/a/piedra_papel.html" >Piedra, papel, tijeras, lagarto, Spock</a>
                        <a class="dropdown-item" href="../../4/b/circunferencia.html" >Circunferencia</a>
                        <a class="dropdown-item" href="../../4/c/informe_salud.html" >Informe de Salud</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../5/git_github.html">Ejercicio 5</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--<div class="jumbotron d-sm-flex min-vh-100">-->
        <div class="container align-self-center p-4 bg-success mt-5" style="max-width: 500px;">    
            <form class="shadow p-4 bg-white" action="usuario.php" method="post">
                <h2>Generador de CV</h2>
                <p>Rellene los datos y pulse enviar </p>
                <input type="text" class="form-control mb-3" name="nombre" placeholder="Nombre y apellidos" id="nombre" required>
                <input type="email" class="form-control mb-3" name="email" placeholder="Correo electrónico" id="email" required>
                <input type="text" class="form-control mb-3" name="tfno" placeholder="Teléfono (opcional)" id="tfno">
                <input type="text" class="form-control mb-3" name="web" placeholder="Sitio web personal (opcional)" id="web">
                <textarea class="form-control mb-5" name="comentarios" placeholder="Escriba su consulta aquí" id="comentarios"></textarea>
                <button type="submit" class="btn btn-success btn-block mb-3">Enviar</button>
            </form>
        </div>
</body>

</html>
