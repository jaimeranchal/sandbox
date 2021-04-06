<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="./index.php">Título</a>
    <ul class="navbar-nav mr-auto">
        <li class="nav-item active"><a class="nav-link" href="#">Link1</a></li>
        <li class="nav-item active"><a class="nav-link" href="#">Link2</a></li>
        <li class="nav-item active"><a class="nav-link" href="#">Link3</a></li>
    </ul>
    
    <?php if(isset($_SESSION['usuario'])): ?>
    <span class="navbar-text ml-auto mr-3">
        Hola <span><?=$_SESSION['usuario']?></span>
    </span>
    <a class="btn btn-outline-dark" href="./logout.php">Salir</a>
    <?php else: ?>
    <a class="btn btn-outline-info" href="./signin.php">Regístrate</a>
    <?php endif; ?>
</nav>
