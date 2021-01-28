<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <title>PHP3: Pizzeria</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
        <!-- Ajustes de estilo solo para esta aplicación -->
        <link rel="stylesheet" href="./css/styles.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    </head>

<?php
// conexión a bbdd
require_once("./conexion.php");
?>
    <body class="d-flex flex-column min-vh-100 my-auto">
        <!-- Navegación -->
         <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container-fluid">

                <div class="navbar-brand">
                    <a class= "text-dark" title="volver al menú de aplicaciones" href="../inicio.html">Menú</a>
                </div>
                <span class="navbar-text site-title brand">Gulami's Pizza</span> 
                <span class="navbar-text">
                    <a class="text-dark m-2" href="./login-form.php" title="Inicia sesión"> Área de Usuarios</a>
                </span>
            </div>
        </nav>     

        <!-- Cuerpo -->
        <div class="d-flex flex-row justify-content-center mt-auto">
<?php
// Filtrar y validar datos del formulario
if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] === "POST") :
    // cargamos funciones de validación
    require_once("./validacion.php");

    // patrón para nombre
    $formatoNombre = "/^[a-zA-Z ]*$/";
    $formatoTfno = "/^\d{9}$/";

    $nombre = isset($_POST['nombre']) ? validarCadena($formatoNombre, $_POST['nombre']) : 0;
    $email = isset($_POST['email']) ? filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) : 0;
    $tfno = isset($_POST['tfno']) ? validarCadena($formatoTfno, $_POST['tfno']) : 0;
    $password = isset($_POST['pass']) ? filter_var($_POST['pass'], FILTER_SANITIZE_STRING) : 0;

    if ($nombre === 0 ||
        $email === 0 ||
        $tfno === 0 ||
        $password === 0 ||
        hayErrores()):
?>
            <div class="dialog p-4 mt-5 ml-5 mb-5 bg-white">
                <h2 class="display-5">Ups</h2>
                <p class="lead">Ha habido algún error al rellenar el formulario</p> 
                <ul>
                <?php foreach ($errores as $error) { ?>
                    <li><?=$error?></li>
                <?php } ?>
                </ul>
            </div>
    <?php else: 
        //comprobamos que existe el usuario en la base de datos
        $sql = 'select * from usuarios where tfno=?';
        $sth = $dbh->prepare($sql);
        $sth->execute(array($tfno));
        $resultado = $sth->fetch();
        $hash = empty($resultado) ? "" : $resultado['password'];
        
        // Si hay resultados (el usuario ya existe)
        if (!empty($resultado)):  
    ?>
            <div class="dialog p-4 mt-5 ml-5 mb-5 bg-white">
                <h2 class="display-5">Ups</h2>
                <p class="lead">Ya existe un usuario registrado con ese número de teléfono</p> 
            </div>
        <?php else: 
        // insertamos datos del nuevo usuario en la bbdd
        $sql = "INSERT into usuarios(nombre, tfno, email, password, tipo) VALUES(?,?,?,?,?)";
        $sth = $dbh->prepare($sql);
        $exito = $sth->execute(array($nombre, $tfno, $email, password_hash($password, PASSWORD_BCRYPT), 'c'));
        ?>
            <div class="dialog p-4 mt-5 ml-5 mb-5 bg-white">
                <h2 class="display-5">¡Listo!</h2>
                <p class="lead">Ya eres uno de los nuestros. Inicia sesión y empieza a pedir!</p> 
                <a class="text-dark m-2" href="./login-form.php" title="Inicia sesión"> Entrar</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>
<?php else: ?>
<?php endif; ?>

        </div>
        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="container-fluid mt-3 mb-n1 py-3 bg-white text-dark text-center">
                <p><span class="fas fa-copyright"></span> Jaime Ranchal Beato</p>
            </div>
        </footer>
        <!-- Librerías JavaScript -->
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <!-- Librerías JS requeridas por BootStrap -->
        <script
          src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
          crossorigin="anonymous">
        </script>
        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
          crossorigin="anonymous">
        </script>
        <script
          src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
          crossorigin="anonymous">
        </script>
    </body>
</html>

