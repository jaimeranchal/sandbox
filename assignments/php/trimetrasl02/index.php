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
        // Cuerpo
        $title = "Vulcanianos";
        $subtitle = "Para los que el piedra papel tijera se queda corto";
        include("./componentes/titulo.php");
        ?>
        <div class="container">
        <?php
        if (isset($_SESSION['usuario'])) {
            include("./componentes/opciones.php");
        } else {
            include("./componentes/form.login.php");
            /* include("./componentes/msg.error.php"); */
            /* include("./componentes/msg.signin.php"); */
        }
        //librerias
        include("./componentes/librerias.php");
        ?>
        </div>

    </body>
</html>
