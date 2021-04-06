<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Ejemplo - Sesiones con usuarios</title>
	<style>body{font-family:'San Francisco','Segoe UI','Open Sans',sans-serif;margin:0 auto;max-width:210mm;padding:0 1em}</style>
  </head>

  <body>
    <h1>Sesiones con usuarios</h1>
	
    <p><a href='index.php'>Inicio</a> | <a href='registro_1.php'>Registrarse</a> | <a href='entrar_1.php'>Entrar</a> | <a href='hacer_cuestionario_1.php'>Cuestionario</a> | <a href='admin.php'>Administración</a> | Cerrar sesión</p>

	<?php
	
    session_start();
	$_SESSION = array();
	session_destroy();

  ?>
	 
    <p>¡Has cerrado sesión!</p>
	
	
	
	
	
	
	
	
  </body>
</html>