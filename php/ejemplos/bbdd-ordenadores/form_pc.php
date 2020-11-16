<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Mis Ordenadores</title>
  </head>

  <body>
    <h1>Mis Ordenadores</h1>
	
	<h2>Añadir</h2>
	
	<p><a href='index.php'>Inicio</a> | <a href='lista_pc.php'>Listado</a> | Añadir | Editar | Borrar</p>
	
	<form method='post' action='add_pc.php'>
	  ID: <input type='number' name ='id' /> <br />
	  CPU: <input type='text' name ='cpu' /> <br />
	  RAM (GB): <input type='text' name ='ram' /> <br />
	  SSD (MB): <input type='text' name ='ssd' /> <br />
	  <input type='submit' />	
	</form>
	
  </body>
</html>





