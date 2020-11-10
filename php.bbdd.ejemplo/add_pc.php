<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Mis Ordenadores</title>
  </head>

  <?php
  
  $id = $_POST['id'];
  $cpu = $_POST['cpu'];
  $ram = $_POST['ram'];
  $ssd = $_POST['ssd'];
  
  require_once('conex_bd.php');
  $sql = 'INSERT INTO ordenador VALUES (?,?,?,?,1)';
  $sth = $dbh->prepare($sql);
  $sth->execute(array($id, $cpu, $ram, $ssd));
  ?>

  <body>
    <h1>Mis Ordenadores</h1>
	
	<h2>Añadir</h2>
	
	<p><a href='index.php'>Inicio</a> | <a href='lista_pc.php'>Listado</a> | Añadir | Editar | Borrar</p>
	
	<p>¡Se ha insertado el ordenador correctamente'</p>
	
  </body>
</html>





