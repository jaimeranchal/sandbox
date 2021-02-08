<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php

/* TODO: 
 * 1.Evitar duplicados
 * 2.Botón borrar datos (+ borrar cookie)
 * 3.(opcional) añadir botones para sumar kilos, o
 *  - Cada vez que mandamos el formulario añadimos 1kg del mismo producto
 */

if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST"){
    
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
            <!-- Lista de tus productos -->
            <div id="tucesta" class="container w-70 m-3 p-3 shadow">
                <h2>Tu cesta
                <span class="fas fa-shopping-basket"></span> (<?=$contador_productos?>)
                </h2>
                <p>Estos son los productos que has seleccionado</p>
                <ul>
<?php
    if (!empty($frutas)) {
        foreach ($frutas as $fruta) {
?>
                <li><?=$fruta?></li>
<?php
    }}
    if (!empty($verduras)){
        foreach ($verduras as $verdura) {
?>
                <li><?=$verdura?></li>
<?php
    }}
?>
            </ul>
            <a class="btn btn-primary" title="Añadir más" href="./index.php">Añadir más</a>
<?php
} else {
?>
            <p>Todavía no has añadido ningún producto</p>
<?php 
} 
?>
            </div>
        </div>
        <pre>
<?php
    var_dump($productos);
    echo("<br>");
    var_dump($_COOKIE['cesta']);
?>
        </pre>    
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

