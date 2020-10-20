<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>PHP Basic Ej.01</title>
    </head>
    <body>
        <p>Devuelve la versión de PHP y la información de configuración</p>
        <p><?php echo phpinfo($what = INFO_GENERAL); ?></p>
    </body>
</html>
