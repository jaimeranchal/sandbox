<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Ejemplo - Sesiones con usuarios</title>
	<style>body{font-family:'San Francisco','Segoe UI','Open Sans',sans-serif;margin:0 auto;max-width:210mm;padding:0 1em}</style>
  </head>

  <body>
    <h1>Sesiones con usuarios</h1>
    <p><a href='index.php'>Inicio</a> | Registrarse | <a href='entrar_1.php'>Entrar</a> | <a href='hacer_cuestionario_1.php'>Cuestionario</a> | <a href='admin.php'>Administración</a> | <a href='cerrar_sesion.php'>Cerrar sesión</a></p>

	<?php
	
	require_once('conex_bd.php');
	
	$nombre = $_POST['nombre'];
	$password = $_POST['contrasena'];
	// $tipo = $_POST['tipo_usuario']; Si queremos coger por 'input type hidden'
	$tipo = 'e';
	
    $sth = $dbh->prepare('INSERT INTO usuario(username, password, tipo) VALUES (?,?,?)');
    $sth->execute(array($nombre, $password, $tipo)) or die(print_r("Hay un error en la base de datos.", true));

	?>
	
	<p>¡Enhorabuena, te has registrado en este ejemplo!</p>
  </body>
</html>