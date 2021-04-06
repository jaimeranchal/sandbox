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
            $title = "Jugar";
            $subtitle = "Aquí puedes responder a otros jugadores que te hayan retado";
            // comprobar si hay retos pendientes
            require_once("./clases/conexion.php");
            $conn = new Conexion();
            $retos = $conn->leerDatos(
                'retos',
                null,
                $param = ['where' => 'WHERE para_usuario=?'],
                array($_SESSION['id']),
                0
            );

            if (!empty($retos)) {
                $mensaje = "Para cada desafío, escoge una respuesta y pulsa <b>Responder</b>";
                include("./componentes/titulo.php");
                include("./componentes/form.jugar.php");
            } else {
                // mensaje de que todavía nadie te ha retado
                $mensajeError = "Parece que nadie te ha retado todavía ¿Por qué no pruebas a retar a alguien?";
                include("./componentes/titulo.php");
            }

        } else {
            include("./componentes/form.login.php");
        }
        //librerias
        include("./componentes/librerias.php");
        ?>
        </div>

    </body>
</html>
