<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <body>

        <?php
        // Cabecera
        include("./componentes/head.php");
        // Procesar formulario
        if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") {
            require_once("./clases/validacion.php");
            // Comprobar campos vacíos
            $campos = ['alias', 'password']; // campos del formulario
            Validacion::comprobarVacios($campos, $_POST);
            if (Validacion::hayErrores()) {
                // menú de navegación
                include("./componentes/navbar.php");
                // Cuerpo
                // muestra los errores
                $link = "index.php"; // dirección del formulario
                include("./componentes/msg.error.php");
            } else {
                // expr.regular con los requisitos
                $patronAlias = "/^[a-zA-Z]{4,8}$/";
                $patronPassw = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";

                $alias = Validacion::validarCadena($patronAlias, $_POST['alias']);
                $password = Validacion::validarCadena($patronPassw, $_POST['password']);
                /* var_dump(Validacion::$errores); */
                /* var_dump(Validacion::hayErrores()); */

            }
        }

        if (!Validacion::hayErrores()) {
            require_once("./clases/conexion.php");
            $conn = new Conexion();
            // comprobar que el usuario existe en la base de datos
            $usuario = $conn->leerDatos(
                'usuarios',
                null,
                $param = ['where' => 'WHERE alias=?'],
                array($alias),
                1
            );
            /* var_dump($usuario); */
            $hash = empty($usuario) ? "" : $usuario['password'];
            if (empty($usuario)) {
                // menú de navegación
                include("./componentes/navbar.php");
                // Cuerpo
                // no hay usuarios con ese alias
                $mensajeError = "No se han encontrado usuarios con ese alias";
                $link = "index.php"; // dirección del formulario
                include("./componentes/msg.error.php");
            } elseif(!password_verify($password, $hash)) {
                // menú de navegación
                include("./componentes/navbar.php");
                // Cuerpo
                // contraseña incorrecta
                $mensajeError = "La contraseña no es correcta";
                $link = "index.php"; // dirección del formulario
                include("./componentes/msg.error.php");
            } else {
                // todo correcto, iniciamos variables de sesion
                session_start();
                $_SESSION['usuario'] = $usuario['nombre'];
                $_SESSION['id'] = $usuario['id'];
                // menú de navegación
                include("./componentes/navbar.php");
                // Cuerpo
                // mensaje de bienvenida
                include("./componentes/msg.login.php");
            }
        } else {
            // menú de navegación
            include("./componentes/navbar.php");
            // Cuerpo
            $link = "index.php"; // dirección del formulario
            include("./componentes/msg.error.php");
        }
        //librerias
        include("./componentes/librerias.php");
        ?>

    </body>
</html>

