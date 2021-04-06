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
// conexión a bbdd
require_once("./conexion.php");

// Recuperamos datos de especialidades para mostrar
//sentencias preparadas
$sql = 'SELECT * FROM especialidades';
// Dejo preparada una sentencia para recuperar los datos
// de cada pizza
// SELECT DISTINCT * from especialidades AS e LEFT JOIN (ingredientes_esp as b, ingredientes as i) ON (e.id = b.especialidad AND b.ingrediente = i.id)
/* $sql2 = 'SELECT DISTINCT i.nombre from especialidades AS e LEFT JOIN (ingredientes_esp as b, ingredientes as i) ON (e.id = b.especialidad AND b.ingrediente = i.id) WHERE e.id=?'; */
$sql3 = 'SELECT * FROM ingredientes';

$sth = $dbh->prepare($sql);
$sth->execute();
// Recuperamos los datos 
$especialidades = $sth->fetchAll();

$sth3 = $dbh->prepare($sql3);
$sth3->execute();
$ingredientes = $sth3->fetchAll();
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
                        <h2>3.5 Pizzeria</h2>
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
                            Hola <span class="fg-dark1 font-weight-bold text-capitalize"><?=$_SESSION['nombre']?></span>
                        </span>
                        <span class="navbar-text mr-3">
                            <a class="nav-link inter-700" href="./logout.php">Salir </a>
                        </span>
                    </div>
                </nav>

                <!-- Contenido -->
                <div class="container inter-200">
                    <div class="mb-2">
                        <h1 class="display-3 mt-4 inter-700">El menú</h1>
                        <p class="lead">Escoge una de nuestras especialidades o crea la tuya propia</p>
                    </div>
                    <form action="carrito.php" method="POST">
                        <div class="card-deck">
                            <!-- Especialidades -->
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Especiales</h2>
                                        <?php foreach ($especialidades as $especialidad) { ?>
                                        <div class="input-group">
                                            <span class="input-group-text col-md-10 bg-white border-0">  <?=$especialidad['nombre']?> 
                                                <span class="input-group-text ml-auto bg-light font-weight-bold border-0">  <?=$especialidad['precio']?> €</span>
                                            </span>
                                            
                                            <input type="text" name="especialidad<?=$especialidad['id']?>" hidden 
                                                class="form-control-plaintext" id="especialidad" 
                                                value="<?=$especialidad['id']?>"> 
                                            <input type="number" name="cantidadEsp<?=$especialidad['id']?>" class="form-control border-top-0 border-bottom-0 border-right-0 text-center"
                                                id="cantidadEsp" min="0" max="10" placeholder="0">
                                        </div>
                                        <?php } ?>
                                </div>
                            </div>
                            <!-- Al gusto -->
                            <div class="card">
                                <div class="card-body">
                                    <h2 class="card-title">Al gusto</h2>
                                    <!-- Ingredientes (hasta 10) -->
                                        <?php for ($i = 0; $i < 10; $i++) { ?>
                                            <div class="input-group">
                                                <div class="input-group-prepend contador">
                                                    <label class="input-group-text bg-white border-top-0 border-left-0"><?=$i+1?>º</label> 
                                                </div>
                                                <select name= "ingrediente<?=$i+1?>" class="custom-select  border-top-0 border-right-0 border-left-0" size="1">
                                                    <option label="..." value="0"></option>
                                                <?php foreach ($ingredientes as $ingrediente) { ?>
                                                    <option label="<?=$ingrediente['nombre']?>" value="<?=$ingrediente['id']?>"></option>
                                                <?php } ?>
                                                </select>
                                            </div>
                                        <?php } ?>
                                </div>
                                <div class="card-footer text-right">
                                    <button class="btn btn-lg btn-outline-secondary" type="reset" 
                                    >Borrar</button>
                                    <button class="btn btn-lg bg-light1 text-white" type="submit" 
                                    name="submit" >Añadir</button>
                                </div>
                            </div>
                        </div>
                    </form>
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

