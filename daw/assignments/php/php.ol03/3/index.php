<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
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
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>PHP3: Cesta de la compra</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
    </head>

    
    <body class="d-flex flex-column min-vh-100">

         <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
            <div class="container-fluid">
                <div class="navbar-brand">
                    <a class= "btn btn-primary" title="volver al menú de aplicaciones" href="../inicio.html">
                        <span class="fas fa-chevron-circle-left"></span>
                         Menú
                    </a>
                </div>
                <!-- <span class="navbar-text">Inicio de sesión correcto</span> -->
                <span class="navbar-text">
                En tu cesta 
                <span class="fas fa-shopping-basket"></span> (<?=$contador_productos?>)
                </span>
            </div>
        </nav>     

        <!-- Cuerpo de la página -->
        <div class="jumbotron text-center">
                    <img src="../src/icons/cesta.svg" alt="website in a circle" width="100px;"/>
            <h2 class="display-3">Cesta de la compra</h2>
            <p class="lead">Prueba de almacenamiento de información en <i>cookies</i></p> 
        </div>

        <div class="container">
            <div id="productos" class="container w-70 m-3 p-3 shadow">
                <form id="frutas" action="cesta.php" method="POST">
                    <!-- Frutas -->
                    <h2>Productos</h2>
                    <h3>Fruta</h3>
                    <fieldset>
                        <input type="checkbox" value="manzanas" name="fruta[]" id="manzanas"/>
                        <label for="manzanas">manzanas</label>
                        <input type="checkbox" value="peras" name="fruta[]" id="peras"/>
                        <label for="peras">peras</label>
                        <input type="checkbox" value="uvas" name="fruta[]" id="uvas"/>
                        <label for="uvas">uvas</label>
                        <input type="checkbox" value="naranjas" name="fruta[]" id="naranjas"/>
                        <label for="naranjas">naranjas</label>
                        <input type="checkbox" value="platanos" name="fruta[]" id="platanos"/>
                        <label for="platanos">platanos</label>
                    </fieldset>
                    <!-- Verduras -->
                    <h3>Verduras</h3>
                    <fieldset>
                        <input type="checkbox" value="patatas" name="verdura[]" id="patatas"/>
                        <label for="patatas">patatas</label>
                        <input type="checkbox" value="pimientos" name="verdura[]" id="pimientos"/>
                        <label for="pimientos">pimientos</label>
                        <input type="checkbox" value="tomates" name="verdura[]" id="tomates"/>
                        <label for="tomates">tomates</label>
                        <input type="checkbox" value="pepinos" name="verdura[]" id="pepinos"/>
                        <label for="pepinos">pepinos</label>
                        <input type="checkbox" value="cebollas" name="verdura[]" id="cebollas"/>
                        <label for="cebollas">cebollas</label>
                        <input type="checkbox" value="ajos" name="verdura[]" id="ajos"/>
                        <label for="ajos">ajos</label>
                    </fieldset>
                    <input type="submit" name="submit" id="submit" value="Añadir">
                </form>
            </div>

            <div class="container w-70 m-3 p-3 shadow" id="tucesta">
                <h2>Tu cesta</h2>
                <p class="lead"><?=$mensaje?></p>            
<?php if (!empty($cesta)){ ?>
                <ul>
<?php foreach ($cesta->frutas as $fruta) { ?>
                    <li><?=$fruta?></li> 
<?php } ?>
<?php foreach ($cesta->verduras as $verdura) { ?>
                    <li><?=$verdura?></li> 
<?php } ?>
                </ul>
<?php } ?>
            </div>
        </div>
            
        <footer class="footer mt-auto">
            <div class="container-fluid mt-3 mb-n1 py-3 bg-dark text-light text-center">
                <p><span class="fas fa-copyright"></span> Jaime Ranchal Beato &mdash; 
                Icons made by <a href="https://www.flaticon.com/authors/smashicons" title="Smashicons">Smashicons</a> from
                <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a>
                <p>
                </p>
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




