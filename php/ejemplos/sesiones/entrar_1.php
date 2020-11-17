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

	<form action='entrar_2.php' method='post'>
      Nombre:<br />
      <input type="text" name="nombre"><br />
      Contraseña:<br />
      <input type="password" name="contrasena"><br />
	  <input type="submit" />	  
    </form>
	
  </body>
</html>







