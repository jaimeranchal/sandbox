<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <body>

        <?php
        // Cabecera
        include("./componentes/head.php");
        session_start();
        // menú de navegación
        include("./componentes/navbar.php");
        ?>
        <div class="container">
        <?php
        // Cuerpo
        if (isset($_SESSION['usuario'])) {
            include("./componentes/tabla.php");
        } else {
            include("./componentes/form.login.php");
        }
        //librerias
        include("./componentes/librerias.php");
        ?>
        </div>

    </body>
</html>
