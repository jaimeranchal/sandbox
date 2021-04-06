<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <body>

        <?php
        // Cabecera
        include("./componentes/head.php");
        // menú de navegación
        include("./componentes/navbar.php");
        // Procesar datos del formulario
        if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") {
            require_once("./clases/validacion.php");

            // Comprobar campos vacíos
            $campos = ['nombre', 'alias', 'password', 'email']; // campos del formulario
            Validacion::comprobarVacios($campos, $_POST);
            if (Validacion::hayErrores()) {
                // muestra los errores
                $link = "signin.php"; // dirección del formulario
                include("./componentes/msg.error.php");
            } else {
                // expr.regular con los requisitos
                $patronAlias = "/^[a-zA-Z]{4,8}$/";
                $patronPassw = "/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,12}$/";
                $patronNombre = "/^[a-zñª\s.á-ú]+$/i";

                $nombre = Validacion::validarCadena($patronNombre, $_POST['nombre']);
                $alias = Validacion::validarCadena($patronAlias, $_POST['alias']);
                $password = Validacion::validarCadena($patronPassw, $_POST['password']);
                $email = Validacion::validarEmail($_POST['email']);

            }
        }

        // Cuerpo
        // Si hay fallos, mensaje
        if (!Validacion::hayErrores()) {
            // Todo correcto, insertamos datos con una sentencia preparada
            require_once("./clases/conexion.php");
            $conn = new Conexion();
            $conn->insertar('usuarios', $campos, array(
                $nombre, 
                $alias,
                password_hash($password, PASSWORD_BCRYPT),
                $email));

            include("./componentes/msg.signin.php");
        } else {
            $link = "signin.php"; // dirección del formulario
            include("./componentes/msg.error.php");
        }
        //librerias
        include("./componentes/librerias.php");
        ?>

    </body>
</html>



