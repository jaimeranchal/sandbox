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

    // sentencia preparada
    // Recogemos los datos relevantes
    $sth = $conn->prepare('SELECT * FROM libros');
    $sth->execute(array());
    $resultado = $sth->fetchAll();
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
            <h1 class="display-3">Biblioteca</h1>
            <p class="lead">Segunda Prueba presencial PHP</p>
          </div>
        </header>

        <div class="container">
            <!-- lista o tabla html -->
            <table class="table">
                <thead class="thead-dark">
                    <tr><th>ISBN</th><th>Título</th><th>Autor</th><th>Editorial</th><th>Edición</th><th>Fecha</th></tr>
                </thead>
                <?php foreach ($resultado as $fila) { ?>
                <!-- elemento de lista o fila con formato -->
                <tr>
                    <td><?= $fila['ISBN'] ?></td>
                    <td><?= $fila['titulo'] ?></td>
                    <td><?= $fila['autor'] ?></td>
                    <td><?= $fila['editorial'] ?></td>
                    <td><?= $fila['edicion'] ?></td>
                    <td><?= $fila['fecha'] ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>


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


