<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Your page</title>
    </head>
    <body>
        <h2>Please input your name</h2>
        <!-- uso la variable PHP_SELF para enviar los datos a este mismo archivo-->
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
            <input type="text" name="name" id="name"/>
            <button type="submit">Submit name</button>
        </form>
        <h3>Hello <?php echo $_POST["name"]; ?></h3>
    </body>
</html>
