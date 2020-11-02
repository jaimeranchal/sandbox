<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	// Función de validación principal 
	function validate($str) {
		return trim(htmlspecialchars($str));
	}

	if (empty($_POST['nombre'])) {
		$nameError = 'El nombre no puede estar vacío';
	} else {
		$name = validate($_POST['nombre']);
		if (!preg_match('/^[a-zA-Z0-9\s]+$/', $name)) {
			$nameError = 'El nombre solo puede contener letras, números y espacios en blanco';
		}
	}

	if (empty($_POST['email'])) {
		$emailError = 'Por favor introduce tu email';
	} else {
		$email = validate($_POST['email']);
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$emailError = 'Email inválido';
		}
	}

	$web = !empty($_POST['web']) ? (string) filter_var($_POST['web'], FILTER_VALIDATE_URL) : "";
	//$description = !empty($_POST['description']) ? validate($_POST['description']) : "";

	if (empty($_POST['comentarios'])) {
		$commentError = 'El campo de comentarios no puede estar vacío';
	} else {
		$comment = $_POST['comentarios'];
	}

	$remember = !empty($_POST['remember']) ? filter_var($_POST['remember'], FILTER_VALIDATE_BOOLEAN) : ""; 

/*	if (empty($nameError) && empty($emailError) && empty($passwordError) && empty($commentError)) {
		// great form filling
		echo "Formulario relleno con éxito!";
		echo "<br>
			Name: $name <br>
			Email: $email <br>
			web: $web <br>
			Comment: $comment <br>
		";
 
		exit(); // terminates the script
	} 
*/
}

?>
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Formulario sencillo</title>
</head>

<body>
    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark flex-column flex-md-row bg-info">
        <a class="navbar-brand mr-0 mr-md-2" href="#">PHP</a>
        <div class="navbar-nav-scroll">
            <ul class="navbar-nav flex-row">
                <li class="nav-item">
                    <a class="nav-link" href="../inicio.html">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../1/ejercicio1.html">Ejercicio 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../2/ejercicio2.html" >Ejercicio 2</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role?"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ejercicio 3</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item disabled" href="../3/a/usuario.html" aria-disabled="true" >Datos de usuario</a>
                        <a class="dropdown-item" href="../3/b/cv.html" >Genera CV</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role?"button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ejercicio 4</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                        <a class="dropdown-item" href="../4/a/piedra_papel.html" >Piedra, papel, tijeras, lagarto, Spock</a>
                        <a class="dropdown-item" href="../4/b/circunferencia.html" >Circunferencia</a>
                        <a class="dropdown-item" href="../4/c/informe_salud.html" >Informe de Salud</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../5/git_github.html">Ejercicio 5</a>
                </li>
            </ul>
        </div>
    </nav>

    <!--<div class="jumbotron d-sm-flex min-vh-100">-->
        <div class="container align-self-center p-4 bg-success mt-5" style="max-width: 500px;">    
            <h2>Formulario sencillo</h2>
            <p>Revisa los datos introducidos </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nombre y apellidos: <?php echo $_POST["nombre"]; ?></li>
                <li class="list-group-item">Email: <?php echo $_POST["email"]; ?></li>
                <li class="list-group-item">Teléfono: <?php echo $_POST["tfno"]; ?></li>
                <li class="list-group-item">Web: <?php echo $_POST["web"]; ?></li>
                <li class="list-group-item">Consulta: <?php echo $_POST["comentarios"]; ?></li>
            </ul>
        </div>
</body>

</html>
