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

/* TODO: 
 * 1.Evitar duplicados
 * 2.Botón borrar datos (+ borrar cookie)
 * 3.(opcional) añadir botones para sumar kilos, o
 *  - Cada vez que mandamos el formulario añadimos 1kg del mismo producto
 */

// contador inicializado a 0
$contador_productos = 0;
$cesta = [];
$mensaje = "Todavía no has añadido ningún producto";
// Si existe una cookie con datos de la compra
if (isset($_COOKIE['cesta'])){
    // leemos los datos
    $cookie[] = json_decode($_COOKIE['cesta']);
    $cesta = $cookie[0];
    $contador_productos = $cesta -> cantidad;
    $mensaje = `Has guardado ${contador_productos} productos en tu cesta`;
} 
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
                        <h2>3.3</h2>
                    </div>

                    <!-- show top menu items on smaller screens -->
                    <button class="navbar-toggler" type="button" 
                        data-toggle="collapse" data-target="#navbarSupportedContent" 
                        aria-controls="navbarSupportedContent" aria-expanded="false" 
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <span class="navbar-text ml-auto mr-3">
                             En tu cesta: <?=$contador_productos?> <span class="fas fa-shopping-basket"></span>
                        </span>
                    </div>
                </nav>

                <!-- Contenido -->
                <div class="container mt-5 ml-5 inter-200">
                    <div class="mb-2">
                        <h1 class="display-3 mt-4 inter-700">Cesta</h1>
                        <p class="lead">Lista de la compra con persistencia de datos usando <i>cookies</i></p>
                    </div>
                    <form class="py-3" id="frutas" action="cesta.php" method="POST">
                        <!-- Frutas -->
                        <h2 class="inter-700">Productos</h2>
                        <div class="card-deck mb-3 pb-3">
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Fruta</h3>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="manzanas" name="fruta[]" id="manzanas"/>
                                        <label class="form-check-label" for="manzanas">manzanas</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="peras" name="fruta[]" id="peras"/>
                                        <label class="form-check-label" for="peras">peras</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="uvas" name="fruta[]" id="uvas"/>
                                        <label class="form-check-label" for="uvas">uvas</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="naranjas" name="fruta[]" id="naranjas"/>
                                        <label class="form-check-label" for="naranjas">naranjas</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="platanos" name="fruta[]" id="platanos"/>
                                        <label class="form-check-label" for="platanos">platanos</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Verduras -->
                            <div class="card">
                                <div class="card-body">
                                    <h3 class="card-title">Verduras</h3>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="patatas" name="verdura[]" id="patatas"/>
                                        <label class="form-check-label" for="patatas">patatas</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="pimientos" name="verdura[]" id="pimientos"/>
                                        <label class="form-check-label" for="pimientos">pimientos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="tomates" name="verdura[]" id="tomates"/>
                                        <label class="form-check-label" for="tomates">tomates</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="pepinos" name="verdura[]" id="pepinos"/>
                                        <label class="form-check-label" for="pepinos">pepinos</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="cebollas" name="verdura[]" id="cebollas"/>
                                        <label class="form-check-label" for="cebollas">cebollas</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="ajos" name="verdura[]" id="ajos"/>
                                        <label class="form-check-label" for="ajos">ajos</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-lg bg-light1 text-white" type="submit" name="submit" id="submit" value="Añadir">Añadir</button>
                    </form>

                    <div class="pt-3" id="tucesta">
                        <h2 class="inter-700">Adquirido</h2>
                        <p class="lead mb-n1"><?=$mensaje?></p>            
                        <?php if (!empty($cesta)): ?>
                        <ul>
                        <?php foreach ($cesta->frutas as $fruta) { ?>
                            <li><?=$fruta?></li> 
                        <?php } ?>
                        <?php foreach ($cesta->verduras as $verdura) { ?>
                            <li><?=$verdura?></li> 
                        <?php } ?>
                        </ul>
                        <?php else: ?>
                        <p class="small">Selecciona algún producto y pulsa <span class="fg-dark1 font-weight-bold">Añadir</span> para que aparezca aquí.
                        <?php endif; ?>
                    </div>
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

