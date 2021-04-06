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
            $title = "Retar";
            $subtitle = "Lanza un desafío a otros usuarios";
            $mensaje = "Escoge un rival, tu mano y pulsa <b>Retar</b>";
            include("./componentes/titulo.php");
            // recupera los usuarios que haya
            require_once("./clases/conexion.php");
            $conn = new Conexion();
            $jugadores = $conn->leerDatos(
                'usuarios',
                null,
                $param = ['where' => 'WHERE id<>?'],
                array($_SESSION['id']),
                0
            );
            include("./componentes/form.retar.php");
        } else {
            include("./componentes/form.login.php");
        }
        //librerias
        include("./componentes/librerias.php");
        ?>
        </div>

    </body>
</html>
