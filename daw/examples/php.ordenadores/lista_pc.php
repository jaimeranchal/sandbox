<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Mis Ordenadores</title>
  </head>

  <?php
  
  require_once('conex_bd.php');
  
$sth = $dbh->prepare('SELECT * FROM ordenador');
$sth->execute(array());
$resultado = $sth->fetchAll();
  
  ?>

  <body>
    <h1>Mis Ordenadores</h1>
	
	<h2>Listado</h2>
	
	<p><a href='index.php'>Inicio</a> | Listado | <a href='form_pc.php'>Añadir</a> | Editar | Borrar</p>
	
	<hr />
	
    <?php
	
    foreach ($resultado as &$fila) { ?>
      
	  <p>ID: <?= $fila['id'] ?></p>
	  <p>CPU: <?= $fila['cpu'] ?></p>
	  <p>SSD: <?php echo $fila['ssd']; ?></p>
	  <hr />
	  
	<?php } ?>
	  
	  
	
  </body>
</html>





