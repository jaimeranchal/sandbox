<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Ejemplo - Sesiones con usuarios</title>
	<style>body{font-family:'San Francisco','Segoe UI','Open Sans',sans-serif;margin:0 auto;max-width:210mm;padding:0 1em}</style>
  </head>

  <body>
    <h1>Sesiones con usuarios</h1>
	
    <p><a href='index.php'>Inicio</a> | <a href='registro_1.php'>Registrarse</a> | <a href='entrar_1.php'>Entrar</a> | <a href='hacer_cuestionario_1.php'>Cuestionario</a> | Administración | <a href='cerrar_sesion.php'>Cerrar sesión</a></p>

    <?php 
	session_start();

	if (isset($_SESSION['usuario']) === true &&
	    $_SESSION['tipo'] === 'a') { ?>

	<p>Aquí haría los SELECT, cálculos necesarios para 
	las estadísticas y se lo mostraría al administrador.</p>

    <?php } else { ?>

	<p>No has iniciado sesión o no has iniciado como administrador.</p>

    <?php } ?>
	
  </body>
</html>







