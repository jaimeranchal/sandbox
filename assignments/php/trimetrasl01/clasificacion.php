<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pares o nones</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
    </head>
<?php
require_once("./conexion.php");
session_start();
?>
    <body>
        <!-- Navegación con login (barra superior / necesita FontAWS)-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="#">Pares o Nones</a>
                </div>
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active"><a class="nav-link" href="./index.php">Inicio</a></li>
                    <li class="nav-item">
                        <a class="nav-link" href="./jugar.php">Jugar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./clasificacion.php">Clasificación</a>
                    </li>
                </ul>

                <!-- Botón de cierra de sesión o registro de nuevo usuario -->
                <?php if (isset($_SESSION['usuario'])) { ?>
                <span class="navbar-text"><span class="fas fa-user"></span> <?=$_SESSION['nombre']?></span>
                <button class="btn btn-primary ml-3">
                    <span class="fas fa-sign-out-alt"></span>
                    <a class="text-light" href="./logout.php"> Cerrar sesión</a>
                </button>
                <?php } else { ?>
                <button class="btn btn-primary ml-3">
                    <span class="fas fa-address-card"></span>
                    <a class="text-light" href="./registro-form.html"> Nuevo usuario</a>
                </button>
                <?php } ?>
            </div>
        </nav>

        <!-- cuerpo de la página -->

        <!-- Si es un usuario: -->
        <?php if (isset($_SESSION['usuario']) === true) { ?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">Clasificación</h2>
            <p class="lead">Aquí puedes consultar tus estadísticas y el ranking de los mejores (y los peores) jugadores.</p>
        </div>

        <!-- Ranking -->
        <div class="container shadow p-4 text-center">
            <!-- partidas del usuario -->
<?php 
// recupero los datos de las partidas del usuario

    // recupero todos los datos para no limitar el número de consultas a la base de datos
    $sql = "SELECT * FROM partidas";
    $sth = $dbh->prepare($sql);
    $sth->execute(array());
    $resultado = $sth->fetchAll();

    // Datos del usuario
    $partidas = count($resultado);
    $victorias = 0;
    $derrotas = 0;
    foreach ($resultado as $partida) {
       /* $partida['victoria'] == 1 ? $victorias += 1 : $derrotas += 1; */
        $partida['victoria'] == 1 && $partida['usuario'] == $_SESSION['usuario'] ? 
            $victorias += 1 : $derrotas += 1;
    }
?>
            <h1>Tus estadísticas</h1>
            <table class="table" style="margin: auto; max-width:150px;">
                <tr><th>Victorias</th><td><?=$victorias?></td></tr>
                <tr><th>Derrotas</th><td><?=$derrotas?></td></tr>
                <tr><th>Total de partidas</th><td><?=$partidas?></td></tr>
            </table>

<?php 
    $sql = "SELECT DISTINCT nombre FROM usuarios AS u, partidas AS p WHERE u.id=p.usuario 
        AND p.victorias = 1 ORDER BY COUNT(victorias);"
        // no me ha dado tiempo a terminarlo pero haría un foreach dentro de la lista
        // para imprimir los ganadores (y lo mismo para los perdedores)
?>
            <!-- Mejores jugadores (global) -->
            <h1 class="mt-5">¿Suertudos, adivinos, dioses?</h1>
            <p class="lead">Jugadores con más victorias<p>
            <ul>
            </ul>
            <!-- Peores jugadores (global) -->
            <h1 class="mt-5">Gafes supremos</h1>
            <p class="lead">Ni con trucos...<p>
            <ul>
            </ul>
        </div>
        
        <!-- Mensaje de error: acceso prohibido -->
        <?php } else { ?>
        <div class="jumbotron text-center">
            <h2 class="display-4 text-center">Acceso prohibido</h2>
            <p class="lead">Debes iniciar sesión para poder jugar</p>
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




