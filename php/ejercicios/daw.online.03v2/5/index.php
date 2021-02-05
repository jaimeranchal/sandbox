<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
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

<?php
session_start();
?>

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
                        <h2>3.5</h2>
                    </div>

                    <!-- show top menu items on smaller screens -->
                    <button class="navbar-toggler" type="button" 
                        data-toggle="collapse" data-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" 
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <span class="navbar-text ml-auto">
                            <?php if(isset($_SESSION['usuario'])): ?>
                            Hola <span class="fg-dark1 font-weight-bold text-capitalize"><?=$_SESSION['nombre']?></span>
                        </span>
                            <?php switch($_SESSION['tipo']){ 
                                case 'c': ?>
                        <span class="navbar-text mr-3">
                            <a class="nav-link inter-700" href="./pedido.php">Pedir </a>
                        </span>
                            <?php break; ?>
                            <?php case 'a': ?>
                        <span class="navbar-text mr-3">
                            <a class="nav-link inter-700" href="./wip.php">Administracion </a>
                        </span>
                            <?php break; ?>
                            <?php } ?>
                        <span class="navbar-text mr-3">
                            <a class="nav-link inter-700" href="./logout.php">Salir </a>
                        </span>
                            <?php else: ?>
                        <span class="navbar-text mr-3">
                            <a class="nav-link inter-700" href="./signin-form.html">Registrarse </a>
                        </span>
                            <?php endif; ?>
                    </div>
                </nav>

                <!-- Contenido -->
                <div class="container inter-200">
                    <div class="mb-2">
                        <h1 class="display-3 mt-4 inter-700">Pizzería Golami</h1>
                        <p class="lead">La solución para los que tienen hambre ahora, en cualquier lugar</p>
                    </div>
                </div>

                <?php if(isset($_SESSION['usuario'])):?>
                    <?php switch($_SESSION['tipo']){ 
                        case 'c': ?>
                <div class="container inter-200">
                    <?php
                    // conexión a bbdd
                    require_once("./conexion.php");

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
                    <h2 class="inter-700">Nuestras especialidades</h1>
                    <p class="lead">Échale un ojo a las creaciones de nuestro chef o crea la tuya propia!</p>
                    <a class="btn btn-lg bg-light1 text-white" href="./pedido.php" title="Hacer un pedido">Empieza a pedir ya</a>
                </div>
                <div class="container-fluid">
                    <!-- cliente: catalogo -->
                    <div class="d-flex flex-wrap justify-content-center m-3 p-3">
                    <?php foreach ($especialidades as $especialidad) { 
                        $sth2->execute(array($especialidad['id']));
                        $ingredientes = $sth2->fetchAll();
                    ?>
                        <!-- producto -->
                        <div class="card text-center">
                            <div class="card-img-top bg-light2 p-3">
                                <img class="figure rounded-circle h-100" 
                                    src="./img/pizza<?=$especialidad['id']?>.png" alt="item">
                            </div>
                            <div class="card-footer bg-dark text-light">
                                <h3 class="card-title courgette"><?=$especialidad['nombre']?></h3>
                            <!--
                                <ul class="list-group list-group-flush">
                                    <?php foreach ($ingredientes as $ingrediente) { ?>
                                    <li class="list-group-item"> <?=$ingrediente['nombre']?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <div class="card-footer bg-light1">
                                <h2 class="display-4"><?=$especialidad['precio']?>€</h2>
                            -->
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                    <?php break; ?>
                    <?php case 'a': ?>
                <div class="container inter-200">
                    <h1 class="display-3 mt-4 inter-700">Pedidos recientes</h1>
                </div>
                <div class="container-fluid">
                    <!-- Empresario: Pedidos recientes -->
                </div>
                    <?php break; ?>
                    <?php } ?>
                <?php else: ?>
                <div class="container inter-200">
                    <!-- Formulario de login -->
                    <h2 class="display-4">Inicia sesión</h2>
                    <div>
                        <form class="login" action="login.php" method="POST">

                            <div class="form-group">
                                <label for="email">Email</label>
                                <div class="input-group mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-envelope"></span>
                                        </div>
                                    </div>
                                    <input type="email" name="email" class="form-control" id="email" placeholder="nacho@ejemplo.es / jaime@ejemplo.es" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="pass">Contraseña</label>
                                <div class="input-group mr-sm-2">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text">
                                            <span class="fas fa-key"></span>
                                        </div>
                                    </div>
                                    <input type="password" name="pass" class="form-control" id="pass" placeholder="*******" aria-describedby="passHelp" required>
                                </div>
                                <small id="passHelp" class="form-text text-muted">
                                    Usa <i>1234nacho</i> para acceso administrador, <i>1234jaime</i> para acceso cliente 
                                </small>
                            </div>
                            <button class="btn btn-lg bg-light1 text-white" type="submit" name="submit" id="submit">Entrar</button>
                        </form>
                    </div>
                <?php endif; ?>
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
    </body>
</html>

