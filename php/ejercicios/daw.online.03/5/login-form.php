<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html lang="es" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width initial-scale=1">
        <title>PHP3: Pizzeria</title>
        <!-- Bootstrap stylesheet -->
        <link
            rel="stylesheet"
            href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
            integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
            crossorigin="anonymous"
        />
        <!-- Ajustes de estilo solo para esta aplicación -->
        <link rel="stylesheet" href="./css/styles.css" type="text/css" media="screen" title="no title" charset="utf-8"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
    </head>

    <body class="d-flex flex-column min-vh-100">
        <!-- Navegación -->
         <nav class="navbar navbar-expand-lg navbar-light bg-transparent sticky-top">
            <div class="container-fluid">

                <div class="navbar-brand">
                    <a class= "text-dark" title="Volver a la página principal" href="./index.php">Inicio</a>
                </div>
                <span class="navbar-text site-title brand">Gulami's Pizza</span> 
                <span class="navbar-text">
                    <button class="btn bg-bermejo">
                        <a class="text-light m-2" href="./signin-form.html" title="¿No tienes cuenta? Crea una"> Regístrate</a>
                    </button>
                </span>
            </div>
        </nav>     
        <!-- Cuerpo -->
        <div class="d-flex flex-row justify-content-end w-75 mt-auto">
            <div id="hero">
                <img src="./img/login.svg" alt="Repartidor en moto sobre un planeta"/>
            </div>
            <div class="dialog p-4 m-5 bg-white">
                <h2 class="display-4 site-title text-center">Inicia sesión</h2>
                <p class="lead site-subtitle">Usa tu tfno y contraseña para entrar</p>
                <form action="login.php" method="POST">

                    <div class="w-75 ml-auto">
                        <div class="form-group">
                            <label class="sr-only" for="tfno">Teléfono</label>
                            <input type="text" name="tfno" class="form-control border-top-0 border-right-0 border-left-0 text-center" id="tfno" placeholder="Tfno: 666 558 899" required>
                        </div>
                        <div class="form-group">
                            <label class="sr-only" for="pass">Contraseña</label>
                            <input type="password" name="pass" class="form-control border-top-0 border-right-0 border-left-0 text-center" id="pass" placeholder="*******" required>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-lg btn-link font-weight-bold huevo" name="submit">
                            ¡Tengo hambre!
                        </button>
                    </div>
                </form>
            </div>

        </div>
        <!-- Footer -->
        <footer class="footer mt-auto">
            <div class="container-fluid mt-3 mb-n1 py-3 bg-transparent text-dark text-center">
                <p><span class="fas fa-copyright"></span> Jaime Ranchal Beato</p>
            </div>
        </footer>
        <!-- Librerías JavaScript -->
        <!-- Font Awesome JS -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

        <!-- Librerías JS requeridas por BootStrap -->
        <script
          src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
          integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
          crossorigin="anonymous">
        </script>
        <script
          src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
          integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
          crossorigin="anonymous">
        </script>
        <script
          src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
          integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
          crossorigin="anonymous">
        </script>
    </body>
</html>

