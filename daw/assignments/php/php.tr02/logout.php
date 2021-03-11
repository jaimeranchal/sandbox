<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <body>

        <?php
        // Cabecera
        include("./componentes/head.php");
        // conexión a bbdd
        // require_once("./clases/conexion.php");
        session_start();
        $_SESSION = array();
        session_destroy();
        // menú de navegación
        include("./componentes/navbar.php");
        // Cuerpo
        include("./componentes/msg.logout.php");
        //librerias
        include("./componentes/librerias.php");
        ?>

    </body>
</html>

