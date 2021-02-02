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

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST"):
    
    // comprobamos que exista una cookie
    if (isset($_COOKIE['cesta'])){
        
        // leemos los datos
        $cookie[] = json_decode($_COOKIE['cesta']);
        $cesta = $cookie[0];
        $contador_productos = $cesta -> cantidad;
        $frutas = $cesta->frutas;
        $verduras = $cesta->verduras;
    } else {
        // Creo dos arrays vacíos que se irán llenando (o no)
        $contador_productos = 0;
        $frutas = [];
        $verduras = [];
    }
    
    // Si no existe la cookie creamos los datos desde cero
    // guarda en un array los checkbox seleccionados
    if (isset($_POST['fruta'])) {
        foreach($_POST['fruta'] as $item){
            $frutas[] = $item;
            $contador_productos++;
        }
        //guardamos las frutas en un array para la cookie
        /* $productos[] = $frutas; */
    }
    if (isset($_POST['verdura'])) {
        foreach($_POST['verdura'] as $item2){
            $verduras[] = $item2;
            $contador_productos++;
        }
        //guardamos las verduras en un array para la cookie
        /* $productos[] = $verduras; */
    }

    // Añadimos las frutas y verduras que corresponda a un array general
    $productos = ['frutas' => $frutas, 'verduras' => $verduras];
    // añadimos el número de productos
    $productos['cantidad'] = $contador_productos;

    // convertimos el array en json
    $json = json_encode($productos);
    // guardamos el número de productos y los productos en la cookie
    setcookie('cesta', $json, strtotime('+1 hour'));
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
                    <h2 class="inter-700">Productos</h2>
                    <p class="lead">Esta es tu lista hasta ahora: </p>
                    <div class="card-deck mb-3 pb-3">
                        <!-- Frutas -->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Frutas</h3>
                                <?php if (!empty($frutas)): ?>
                                <ul class="unstyled">
                                <?php foreach ($frutas as $fruta) { ?>
                                    <li><?=$fruta?></li>
                                <?php } ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                        <!-- Verduras -->
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Verduras</h3>
                                <?php if (!empty($verduras)): ?>
                                <ul class="unstyled">
                                <?php foreach ($verduras as $verdura) { ?>
                                    <li><?=$verdura?></li>
                                <?php } ?>
                                </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
<?php endif; ?>
                    <a class="btn fg-light1 font-weight-bold inter-700" href="./index.php"> Volver</a>
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

