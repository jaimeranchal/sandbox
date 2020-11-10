<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Genera tu CV</title>
</head>

<?php
// Filtrado y validación de datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Elimina caracteres especiales y los sustituye por entidades HTML
	function filtrar($str) {
		return trim(htmlspecialchars($str));
	}

    // Función para validar fechas
    function validarFecha($fecha){
        // descomponemos en valores la cadena de fecha
        $valores = explode('-', $fecha);
        // Comprobamos que todos los campos estén rellenos
        if (count($valores) == 3 && checkdate($valores[1], $valores[2], $valores[0])) {
            return $fecha;
        } else {
            return "";
        } 
    }

    // Datos personales
    // nombre y apellidos
	if (empty($_POST['nombre'])) {
		$nameError = 'El nombre no puede estar vacío';
	} else {
		$name = filtrar($_POST['nombre']);
		if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
			$nameError = 'El nombre solo puede contener letras, números y espacios en blanco';
		}
    }

    // dirección
	if (empty($_POST['direccion'])) {
		$addressError = 'La dirección no puede estar vacía';
	} else {
		$address = filtrar($_POST['direccion']);
		if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
			$addressError = 'La dirección solo puede contener letras, números y espacios en blanco';
		}
	}

    // correo electrónico
	if (empty($_POST['email'])) {
		$emailError = 'Por favor introduce tu email';
	} else {
		$email = filtrar($_POST['email']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailError = 'Email inválido';
		}
	}

	$web = !empty($_POST['web']) ? (string) filter_var($_POST['web'], FILTER_VALIDATE_URL) : "";
    // Fecha de nacimiento
    $nacimiento = validarFecha($_POST['nacimiento']);
    // Formación
    // Experiencia profesional
    // Otras
    $otros = !empty($_POST['otros']) ? (string) filtrar($_POST['otros']) : "";
}

?>

<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark flex-column flex-md-row bg-dark">
        <a class="navbar-brand mr-0 mr-md-2" href="#">PHP</a>
        <div class="navbar-nav-scroll">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link" href="../../inicio.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../1/ejercicio1.html">Ejercicio 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../2/ejercicio2.html" >Ejercicio 2</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role?"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ejercicio 3</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item disabled" href="../a/usuario.html" aria-disabled="true" >Datos de usuario</a>
                        <a class="dropdown-item" href="../b/cv.html" >Genera CV</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role?"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ejercicio 4</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="../../4/a/piedra_papel.html" >Piedra, papel, tijeras, lagarto, Spock</a>
                        <a class="dropdown-item" href="../../4/b/circunferencia.html" >Circunferencia</a>
                        <a class="dropdown-item" href="../../4/c/informe_salud.html" >Informe de Salud</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../../5/git_github.html">Ejercicio 5</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--<div class="jumbotron d-sm-flex min-vh-100">-->
        <div class="container align-self-center p-4 bg-secondary mt-5" style="max-width: 500px;">    
            <form class="shadow p-4 bg-white" action="usuario.php" method="post">
                <h2>Tu curriculum</h2>
                <ul>
                    <li>Nombre y apellidos: <?=$name ?></li>
                    <li>Correo electrónico: <?=$email ?></li>
                    <li>Fecha de nacimiento: <?=$nacimiento?></li>
                </ul>
                <h3>Datos personales</h3>
                <h3>Formación</h3>
                <h3>Experiencia profesional</h3>
                <h3>Idiomas</h3>
                <h3>Otras habilidades</h3>
            </form>
        </div>
</body>

</html>