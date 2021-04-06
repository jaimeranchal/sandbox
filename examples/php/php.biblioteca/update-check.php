<?php
// conexión a la bd
require_once('conexion.php');

// Array de errores
$errores = [];

// Comprobar si se ha definido el campo del formulario
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['id'])) {
    // filtrar y validar id
    if (!filter_var($_POST['id'], FILTER_VALIDATE_INT)) {
        $errores[] = "Error: el id proporcionado no es un entero";
    } else {
        $id  = $_POST['id'];
        //sentencia preparada
        $sql = 'SELECT * from libros WHERE id=?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($id));
        // Recuperamos los datos del objeto a editar para mostrarlos
        $resultado = $sth->fetch();
        print_r($resultado);

        // si no encuentra nada, guardamos el error
        if ($resultado == null) { $errores[] ="No hay items con ese id"; } 
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Mis libros</title>
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
    </head>
    <body>
        <!-- Navegación -->
        <nav class="navbar navbar-expand-lg navbar-dark flex-column flex-md-row justify-content-center bg-dark">
            <a class="navbar-brand" href="index.html">Inicio</a>
            <div class="navbar-nav-scroll">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="read.php">Lista</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="add-form.html">Añadir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="update-form.html">Editar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="delete-form.html">Quitar</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- cabecera -->
        <header class="header">
          <div class="jumbotron text-center">
            <h2 class="display-3">Editar</h2>
            <p class="lead">Revisa los cambios introducidos</p>
          </div>
        </header>

        <div class="container align-self-center p-4">
            <!-- si el id es válido y devuelve un elemento de la bd, lo borra
            muestra un mensaje; si no, retry -->
            <?php if (count($errores) > 0) {?>
            <div class="jumbotron text-center">
                <h2 class="display-5">Error</h2>
                <p><?=implode(", ", $errores)?></p>
                <a class="btn btn-primary" href="./update-form.html">Volver al formulario</a>
            </div>
            <?php } else {  ?>
            <!-- Formulario con nuevos datos -->
            <form class="shadow p-4" action="update.php" method="post">
                <!-- Título -->
                <div class="form-group row">
                    <label for="titulo" class="col-sm-2 col-form-label">Titulo</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" name="titulo" id="titulo" placeholder="<?=$resultado['titulo']?>"/>
                    </div>
                </div>
                <!-- Autor -->
                <div class="form-group row">
                    <label for="autor" class="col-sm-2 col-form-label">Autor</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="autor" id="autor" placeholder="<?=$resultado['autor']?>" />
                    </div>
                </div>
                <!-- Fecha -->
                <div class="form-group row">
                    <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="fecha" id="fecha" placeholder="<?=$resultado['fecha']?>" />
                    </div>
                </div>
                <!-- Checkbox -->
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Género</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="genero[]" id="genero" value="novela" />
                                <label for="genero" class="form-check-label">novela</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="genero[]" id="genero" value="biografía"/>
                                <label for="genero" class="form-check-label">biografía</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="genero[]" id="genero" value="poesía"/>
                                <label for="genero" class="form-check-label">poesía</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Radio button -->
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Idioma</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="idioma" id="idioma" value="español" />
                                <label for="idioma" class="form-check-label">español</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="idioma" id="idioma" value="inglés" />
                                <label for="idioma" class="form-check-label">inglés</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="idioma" id="idioma" value="francés" />
                                <label for="idioma" class="form-check-label">francés</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <!-- Checkbox -->
                <fieldset class="form-group">
                    <div class="row">
                        <legend class="col-form-label col-sm-2 pt-0">Formato</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="formato[]" id="formato" value="Tapa dura"/>
                                <label for="formato" class="form-check-label">físico (tapa dura)</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="formato[]" id="formato" value="Tapa blanda"/>
                                <label for="formato" class="form-check-label">físico (tapa blanda)</label>
                            </div>
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="formato[]" id="formato" value="Digital"/>
                                <label for="formato" class="form-check-label">digital</label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" name="submit" class="btn btn-primary btn-block mb-3">Actualizar</button>
            </form>
            <?php } ?>
        </div>

        <?php
        // definir variables, asociar con campos del formulario y validar
        /* A diferencia de add, aquí incluimos el id para poder buscar el dato a editar */
        /* $id       = $_POST['id']; */
        /* $usuario  = $_POST['usuario']; */
        /* $titulo   = $_POST['titulo']; */
        /* $autor    = $_POST['autor']; */
        /* $fecha    = $_POST['fecha']; */
        /* $genero   = $_POST['genero']; */
        /* $idioma   = $_POST['idioma']; */
        /* $prestado = $_POST['prestado']; */
        /* $formato  = $_POST['formato']; */

        // sentencia preparada
        /* También se podría dividir en 3 strings concatenados:
         * 1. UPDATE into tabla 
         * 2. SET campo1=:campo1... 
         * 3. WHERE id=:id
         * */
        /* $sql = 'UPDATE INTO libros '. */
        /*     'SET id=?, usuario=?, titulo=?, autor=?, fecha=?, genero=?, idioma=?, prestado=?prestado, formato=?'. */
        /*     'WHERE id=:id'; */

        /* $sth = $conn->prepare($sql); */
        /* // ejecutamos la sentencia */
        /* $sth->execute(array($id, $titulo, $autor, $fecha, $genero, $idioma, $prestado, $formato)); */
        ?>
        <!-- javascript libraries -->
        <!-- JQuery -->
        <script
            src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous">
        </script>
        <!-- Popper -->
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous">
        </script>
        <!-- BootStrap -->
        <script
            src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous">
        </script>
    </body>
</html>
