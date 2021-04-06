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
        // procesar formulario
        if (isset($_POST["submit"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
            $rival = $_POST["jugador"];
            $tuMano = $_POST["mano"];
            
            // subir el reto a la bbdd (retos)
            require_once("./clases/conexion.php");
            $conn = new Conexion();
            $conn->insertar(
                'retos',
                array('de_usuario', 'para_usuario', 'respuesta'),
                array($_SESSION['id'], intval($rival), $tuMano)
            );

        } else {
            $tuMano = "Error";
        }

        ?>
        <div class="container">
        <?php
        // Cuerpo
        if ($tuMano !== "Error") {
            include("./componentes/msg.reto_success.php");
        } else {
            include("./componentes/msg.error.php");
        }
        //librerias
        include("./componentes/librerias.php");
        ?>
        </div>

    </body>
</html>
