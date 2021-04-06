<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Ejemplo - Sesiones con usuarios</title>
	<style>body{font-family:'San Francisco','Segoe UI','Open Sans',sans-serif;margin:0 auto;max-width:210mm;padding:0 1em}</style>
  </head>

  <body>
    <h1>Sesiones con usuarios</h1>
	
    <p><a href='index.php'>Inicio</a> | <a href='registro_1.php'>Registrarse</a> | Entrar | <a href='hacer_cuestionario_1.php'>Cuestionario</a> | <a href='admin.php'>Administración</a> | <a href='cerrar_sesion.php'>Cerrar sesión</a></p>

	<?php
	
	require_once('conex_bd.php');
	
	$nombre = $_POST['nombre'];
	$password = $_POST['contrasena'];
	
    $sth = $dbh->prepare('SELECT * FROM usuario WHERE
	username=? AND password=?');
    $sth->execute(array($nombre, $password)) or die(print_r("Hay un error en la base de datos.", true));
	$resultado = $sth->fetchAll(); // Recogo todas las filas del resultado de la consulta SELECT en un solo Array denominado 'resultado'.
	
	// print_r($resultado); Si queremos ver el Array

	if (empty($resultado)) { 
	  echo 'Tu usuario o contraseña es incorrecta. Inténtalo de nuevo.';
	}
	else {
	    session_start();
		$_SESSION['id'] = $resultado[0]['id'];
		$_SESSION['usuario'] = $resultado[0]['username'];
		$_SESSION['tipo'] = $resultado[0]['tipo'];
		echo '¡Enhorabuena, has iniciado sesión!';
	}
  ?>
	 
    
	
	
	
	
	
	
	
	
  </body>
</html>