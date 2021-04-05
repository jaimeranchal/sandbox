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
            $title = "Clasificación";
            $subtitle = "Información sobre las partidas";
            $mensaje = "Aquí puedes consultar tus datos y el <b>ranking</b> global";
            include("./componentes/titulo.php");
            require_once("./clases/conexion.php");
            // recuperar datos del usuario que ha iniciado sesión
            // - por cada usuario con el que haya jugado al menos una vez, guardo la partida

            $conn = new Conexion();
            $partidas_usuario = [];

            $datos_partidas = $conn->leerDatos(
                'partidas',
                null,
                $param = [
                    'where' => 'WHERE usuario=?'
                ],
                array($_SESSION['id']),
                0
            );
            foreach ($datos_partidas as $partida) {
                $rival = $conn->leerDatos(
                    'usuarios',
                    ['nombre'],
                    $param = [
                        'where' => 'WHERE id=?'
                    ],
                    array($partida['rival']),
                    1
                );

                if (array_key_exists($rival['nombre'], $partidas_usuario)) {

                    if ($partida['victoria'] != 0) {
                        $partidas_usuario[$rival['nombre']]['victorias'] += 1;
                    } else {
                        $partidas_usuario[$rival['nombre']]['derrotas'] += 1;
                    }
                } else {

                    if ($partida['victoria'] != 0) {
                        $partidas_usuario[$rival['nombre']] = array('victorias' => 1, 'derrotas' => 0);
                    } else {
                        $partidas_usuario[$rival['nombre']] = array('victorias' => 0, 'derrotas' => 1);
                    }

                }
                
            }

            // recuperar datos generales de partidas
            $datos_totales = $conn->leerTodo('partidas');
            $datos_finales = []; // nombre, num_partidas, porcentaje_victorias, porcentaje_derrotas

            foreach ($datos_totales as $partida) {
                // recupero el nombre de usuario
                $jugador = $conn->leerDatos(
                    'usuarios',
                    ['nombre', 'alias'],
                    $param = [
                        'where' => 'WHERE id=?'
                    ],
                    array($partida['usuario']),
                    1
                );

                $nombre = $jugador['alias'];
;
                if (!array_key_exists($nombre, $datos_finales)) {
                    // victorias y derrotas
                    $datos_finales[$nombre] = array(
                        'nombre' => $jugador['nombre'],
                        'partidas' => 0,
                        'victorias' => 0,
                        'derrotas' => 0
                    );
                    if ($partida['victoria'] != 0) {
                        $datos_finales[$nombre]['victorias'] += 1;
                    } else {
                        $datos_finales[$nombre]['derrotas'] += 1;
                    }   
                    // partidas
                    $datos_finales[$nombre]['partidas'] += 1;
                } else {
                    // victorias y derrotas
                    if ($partida['victoria'] != 0) {
                        $datos_finales[$nombre]['victorias'] += 1;
                    } else {
                        $datos_finales[$nombre]['derrotas'] += 1;
                    }   
                    // partidas
                    $datos_finales[$nombre]['partidas'] += 1;
                }
            }

            foreach ($datos_finales as &$jugador) {
                $jugador['perc_victorias'] = round($jugador['victorias']/$jugador['partidas']*100, 2);
                $jugador['perc_derrotas'] = round($jugador['derrotas']/$jugador['partidas']*100, 2);
            }
            // porcentaje: ganadas / total * 100
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
