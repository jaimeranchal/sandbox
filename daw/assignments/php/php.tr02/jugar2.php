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
            $tuMano = $_POST["mano"];
        } else {
            $tuMano = "Error";
        }
        $manoRival = $_SESSION['manoRival'];
        $opciones = array("p", "f", "t", "l", "s");
        $victoria = 0;

        // 2. Decide el ganador
        // Dos posibles resultados: usuario gana o pierde
        // REGLAS:
        // piedra gana a tijeras y a lagarto
        // papel gana a piedra y a Spock
        // tijeras gana a papel y a lagarto
        // lagarto gana a papel y a Spock
        // Spock gana a piedra y a tijeras
        if ($tuMano == "p" && $manoRival == "t"
            || $tuMano == "p" && $manoRival == "l"
            || $tuMano == "f" && $manoRival == "p"
            || $tuMano == "f" && $manoRival == "s"
            || $tuMano == "t" && $manoRival == "f"
            || $tuMano == "t" && $manoRival == "l"
            || $tuMano == "l" && $manoRival == "f"
            || $tuMano == "l" && $manoRival == "s"
            || $tuMano == "s" && $manoRival == "p"
            || $tuMano == "s" && $manoRival == "t"
        ) {
            $victoria = 1;
        }

        // subir los resultados a la bbdd (partidas)
        require_once("./clases/conexion.php");
        $conn = new Conexion();
        $conn->insertar(
            'partidas',
            array('usuario', 'victoria'),
            array($_SESSION['id'], $victoria)
        );
        // eliminar el reto
        $conn->borrarDatos('retos', $_SESSION['idReto']);
        ?>
        <div class="container">
        <?php
        // Cuerpo
        if ($victoria) {
            include("./componentes/msg.win.php");
        } else {
            include("./componentes/msg.loss.php");
        }
        //librerias
        include("./componentes/librerias.php");
        ?>
        </div>

    </body>
</html>
