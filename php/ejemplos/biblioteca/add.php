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

    <?php
    // conexión a la bd
    require_once('conexion.php');

    /* asignar y filtrar variables del formulario */
    
    if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
        echo("Se ha enviado el formulario");

        // Array de errores
        $errores = [];

        /* Validar autor (vacío => "anónimo") */
        $autor = (empty($_POST["autor"])) ? "Anónimo" : filter_var($_POST["autor"], FILTER_SANITIZE_STRING);

        /* Validar fecha (año 1450-hoy) */
        $fecha   = filter_var($_POST["fecha"], FILTER_SANITIZE_NUMBER_INT);
        $current_year = date("Y");
        if ($fecha < 1450 || $fecha > $current_year) {
            $errores["fecha"] = `ERROR: formato inválido` .
                `La fecha debe ser un número entre 1450 y ${current_year}`;
        }

        /* Filtramos y asignamos los que no necesiten validación */

        $titulo  = filter_var($_POST["titulo"], FILTER_SANITIZE_STRING);
        // tipo radio
        $idioma = (isset($_POST["idioma"])) ? filter_var($_POST["idioma"], FILTER_SANITIZE_STRING) : "No especificado";

        // tipo checkbox (array)
        if (isset($_POST["genero"])) {
            $genero  = filter_var((implode(", ", $_POST["genero"])), FILTER_SANITIZE_STRING);
        }
        if (isset($_POST["formato"])) {
            $formato  = filter_var((implode(", ", $_POST["formato"])), FILTER_SANITIZE_STRING);
        }
    } 

    ?>

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
                <h2 class="display-3">Añadir libros</h2>
                <p class="lead">Revisa los datos introducidos</p>
            </div>
        </header>
        <body class="container">
            <div class="container align-self-center p-4">
                <ul>
                    <li><b>Título: </b><?=$titulo ?></li>
                    <li><b>Autor: </b><?=$autor ?></li>
                    <li><b>Año: </b><?php echo( (isset($errores["fecha"]))? $errores["fecha"] : $fecha ); ?></li>
                    <li><b>Género: </b><?php echo( (isset($errores["genero"]))? $errores["genero"] : $genero ); ?></li>
                    <li><b>Idioma: </b><?php echo( (isset($errores["idioma"]))? $errores["idioma"] : $idioma ); ?></li>
                    <li><b>Formato: </b><?php echo( (isset($errores["formato"]))? $errores["formato"] : $formato ); ?></li>
                </ul>
            </div>
            <!-- Si hay errores, muestra un botón para volver al formulario -->
            <?php if (count($errores) > 0) {?>
            <a class="btn btn-primary" href="./add-form.html">Volver al formulario</a>
            <?php } else {
            /* Si todo está correcto insertamos datos en la base de datos */

            // sentencia preparada
            $sql = 'INSERT INTO libros values (null, 1, :titulo, :autor, :fecha, :genero, :idioma, false, :formato)';

            $sth = $dbh->prepare($sql);
            // vinculamos parámetros con valores
            /* $sth->bindParam(':usuario', $usuario); */
            $sth->bindParam(':titulo', $titulo);
            $sth->bindParam(':autor', $autor);
            $sth->bindParam(':fecha', $fecha);
            $sth->bindParam(':genero', $genero);
            $sth->bindParam(':idioma', $idioma);
            $sth->bindParam(':formato', $formato);
            // ejecutamos la sentencia
            $sth->execute();
            } ?>

        </body>

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
