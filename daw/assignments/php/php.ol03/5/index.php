<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <title>PHP3: Pizzeria</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
        <!-- Ajustes de estilo solo para esta aplicación -->
        <link rel="stylesheet" href="./css/styles.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    </head>

<?php
// conexión a bbdd
require_once("./conexion.php");
session_start();

// Recuperamos datos de especialidades para mostrar
//sentencia preparada
$sql = 'SELECT * FROM especialidades';
$sth = $dbh->prepare($sql);
$sth->execute();
// Recuperamos los datos 
$especialidades = $sth->fetchAll();

// Dejo preparada una sentencia para recuperar los datos
// de cada pizza
// SELECT DISTINCT * from especialidades AS e LEFT JOIN (ingredientes_esp as b, ingredientes as i) ON (e.id = b.especialidad AND b.ingrediente = i.id)
$sql2 = 'SELECT DISTINCT i.nombre from especialidades AS e LEFT JOIN (ingredientes_esp as b, ingredientes as i) ON (e.id = b.especialidad AND b.ingrediente = i.id) WHERE e.id=?';
$sth2 = $dbh->prepare($sql2);
?>
    <body class="d-flex flex-column min-vh-100 my-auto">
        <!-- Navegación -->
         <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container-fluid mq-xxl">

                <div class="navbar-brand">
                    <a class= "text-dark" title="volver al menú de aplicaciones" href="../inicio.html">Menú</a>
                </div>
                <!-- <span class="navbar-text site-title">Gulami's Pizza</span> -->
                <span class="navbar-text">
                    <?php if(isset($_SESSION['usuario'])): ?>
                    Hola <b><?=$_SESSION['nombre']?></b> <span class="fas fa-user-circle"></span>
                    <?php if ($_SESSION['tipo'] == 'c'): ?>
                    <a class="font-weight-bold m-2" href="./cesta.php" title="Revisa tu pedido"> Cesta <span class="fas fa-circle-notch"></span></a>
                    <?php else: ?>
                    <a class="font-weight-bold m-2" href="./admin.php" title="Panel de administración"> Administración <span class="fas fa-cog"></span></a>
                    <?php endif; ?>
                    <a class="font-weight-bold m-2" href="./logout.php" title="Cierra sesión"> Salir</a>
                    <?php else: ?>
                    <a class="text-dark m-2" href="./login-form.php" title="Inicia sesión"> Área de Usuarios</a>
                    <button class="btn bg-bermejo">
                        <a class="text-light m-2" href="./signin-form.html" title="¿No tienes cuenta? Crea una"> Regístrate</a>
                    </button>
                    <?php endif; ?>
                </span>
            </div>
        </nav>     
        <!-- Cuerpo -->
        <div class="d-flex flex-row justify-content-center mt-auto">
            <div class="figure p-4 mt-5 ml-5 mb-5"id="hero">
                <img src="./img/repartidor-hero.svg" alt="Repartidor en moto sobre un planeta"/>
            </div>
            <div class="dialog p-4 mt-5 mr-5 mb-5 bg-white">
                <h2 class="display-4 site-title">Gulami's Pizza</h2>
                <p class="lead site-subtitle">¿Te apetece comer algo?</p>
                <?php if(isset($_SESSION['usuario'])): ?>
                <div class="text-right">
                    <a class="m-2 font-weight-bold bermejo site-subtitle" href="./pedido.php" title="Empieza a pedir"> Haz un pedido</a>
                </div>
                <?php else: ?>
                <div class="text-right">
                    <a class="m-2 font-weight-bold huevo site-subtitle" href="./login-form.php" title="Inicia sesión y empieza a pedir"> Inicia sesión</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <!-- Productos -->
        <div class="d-flex bg-dark text-light">
            <div class="container-fluid mq-xxl my-5">
                <h2 class="display-4 site-title text-center">Nuestras especialidades</h2>
                <div class="d-flex flex-row flex-wrap justify-content-center mx-4">
                <?php foreach ($especialidades as $especialidad) { 
                    $sth2->execute(array($especialidad['id']));
                    $ingredientes = $sth2->fetchAll();
                ?>
                    <!-- producto -->
                    <div class="producto d-flex flex-row bg-dark m-3 px-4 py-2 rounded-lg">
                        <div class="producto-img m-2 p-2">
                            <img class="figure rounded-circle h-100" src="./img/pizza<?=$especialidad['id']?>.png" alt="item">
                        </div>
                        <div class="m-2 p-2 text-right">
                            <h3 class="font-weight-bold"><?=$especialidad['nombre']?></h3>
                            <div class="pt-4 mt-4">
                                <?php foreach ($ingredientes as $ingrediente) { ?>
                                <p class="mt-n3"><?=$ingrediente['nombre']?></p>
                                <?php } ?>
                            </div>
                            <h2 class="display-4"><?=$especialidad['precio']?>€</h2>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="container-fluid mt-3 mb-n1 py-3 bg-white text-dark text-center">
                <p><span class="fas fa-copyright"></span> Jaime Ranchal Beato</p>
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
