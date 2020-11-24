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
// conexión a base de datos
require_once('conexion.php');

// ISBN del libro que se quiere editar
$isbn = filter_var($_POST['isbn'], FILTER_SANITIZE_STRING);

// sentencia preparada
// Recogemos los datos relevantes
$sth = $conn->prepare('SELECT * FROM libros WHERE ISBN=?');
$sth->execute(array($isbn));
$resultado = $sth->fetch();
?>
    <body>
        <!-- Navegación -->
        <nav class="navbar navbar-expand-lg navbar-dark flex-column flex-md-row justify-content-center bg-dark">
            <a class="navbar-brand" href="index.html">Inicio</a>
            <div class="navbar-nav-scroll">
                <ul class="navbar-nav flex-row">
                    <li class="nav-item">
                        <a class="nav-link" href="insertar.html">Insertar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="visualizar.php">Visualizar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="editar.html">Editar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="borrar.php">Borrar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobre_nosotros.html">Sobre nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contacto.html">Contacto</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- cabecera -->
        <header class="header">
          <div class="jumbotron text-center">
            <h1 class="display-4">Editar</h1>
            <p class="lead">Revisa los datos después de los cambios</p>
          </div>
        </header>

        <!-- Datos actuales del libro -->
        <div class="container align-self-center p-4">
        <p><?=$resultado['autor']?> <i><?=$resultado['titulo']?></i> (<?=$resultado['fecha']?>), <?=$resultado['editorial'] ?> <?=$resultado['edicion']?>. ISBN: <?=$resultado['ISBN']?></p>
        </div>

        <!-- formulario de entrada de datos -->

        <div class="container align-self-center p-4">
            <form class="shadow p-4" action="editar2.php" method="post">
                <h2>¿Qué quieres cambiar?</h2>
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control mb-3" name="titulo" id="titulo" />
                <label for="autor">Autor</label>
                <input type="text" class="form-control mb-3" name="autor" id="autor" />
                <label for="editorial">Editorial</label>
                <input type="text" class="form-control mb-3" name="editorial" id="editorial" />
                <label for="fecha">Fecha</label>
                <input type="text" class="form-control mb-3" name="fecha" id="fecha" />
                <label for="edicion">Año de edición</label>
                <input type="text" class="form-control mb-3" name="edicion" id="edicion" />
                <button type="submit" class="btn btn-primary btn-block mb-3">Aplicar cambios</button>
            </form>
        </div>

<?php
// asignamos las variables
if (isset($_POST['titulo'])) {
   // no me ha dado tiempo...si están definidas les asignaría un valor, si no, lo ajustaría al mismo que ya tuvieran 
}

// sentencia preparada
$sql = 'UPDATE students SET first_name=?, last_name=?, nickname=?, date_of_birth=?, mark=? WHERE id=?';
$sth = $dbh->prepare($sql);
$sth->execute(array($first_name, $last_name, $nickname, $date_of_birth, $mark, $isbn));

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


