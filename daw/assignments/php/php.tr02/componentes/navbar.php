<nav class="navbar navbar-expand-lg navbar-light bg-light shadow sticky-top">
    <div class="container">
        <a class="navbar-brand" href="./index.php"><span class="fas fa-hand-spock fa-2x"></span></a>
        <ul class="navbar-nav mr-auto">
        <?php if (isset($_SESSION['usuario'])): ?>
            <li class="nav-item active"><a class="nav-link" href="./jugar.php">Jugar</a></li>
            <li class="nav-item active"><a class="nav-link" href="./retar.php
    ">Retar</a></li>
            <li class="nav-item active"><a class="nav-link" href="./clasif.php
    ">Clasificación</a></li>
        <?php endif; ?>
        </ul>

        <?php if(isset($_SESSION['usuario'])): ?>
        <span class="navbar-text ml-auto mr-3">
            Hola <span><?=$_SESSION['usuario']?></span>
        </span>
        <a class="btn btn-outline-dark" href="./logout.php">Salir</a>
        <?php else: ?>
        <a class="btn btn-outline-info" href="./signin.php">Regístrate</a>
        <?php endif; ?>
    </div>
</nav>
