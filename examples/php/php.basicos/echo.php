<!DOCTYPE html>
<html xmlns='http://www.w3.org/1999/xhtml' lang='en'>
  <head>
    <meta charset='utf-8' />
    <title>Primera página web en PHP</title>
  </head>

  <body>
    <h1>Mi primera aplicación en PHP</h1>

    <p>Hola!</p>

    <p><?php echo '¡Hola, mundo!' ?></p>

    <?php
    $suma = 3 + 2;
    ?>

    <p><?php echo $suma; ?></p>
  </body>
</html>
