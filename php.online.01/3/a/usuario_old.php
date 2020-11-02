<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>Datos personales</title>
</head>

<body>
    <div class="jumbotron d-sm-flex min-vh-100">
        <div class="container align-self-center">    
            <h2>Sobre ti</h2>
            <p>Estos son los datos que has introducido: </p>
            <ul class="list-group list-group-flush">
            <li class="list-group-item">Nombre y apellidos: <?php echo $_POST["nombre"], " ", $_POST["apellidos"]; ?></li>
            <li class="list-group-item">Fecha de nacimiento: <?php echo $_POST["fecNac"]; ?></li>
            <li class="list-group-item">Sexo: <?php echo $_POST["sexo"]; ?></li>
            <li class="list-group-item">Dirección: <?php echo $_POST["direccion"]; ?></li>
            </ul>
        </div>
    </div>
</body>

</html>
