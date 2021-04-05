<div class="row justify-content-center align-items-center text-center">
    <form class="col-4 my-4 bg-light p-4 rounded" action="./login.php" method="POST">
        <h2 class="display-4">Inicia sesión</h2>
        <p class="lead">Introduce tus datos para continuar</p>

        <div class="form-group">
            <div class="input-group mr-sm-2">
                <label class="sr-only" for="usuario">Usuario</label>
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-at"></span>
                    </div>
                </div>
                <input type="text" name="alias" class="form-control" 
                id="alias" placeholder="tu alias: nacgom" required>
            </div>
        </div>

        <div class="form-group">
            <label class="sr-only" for="pass">Contraseña</label>
            <div class="input-group mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-key"></span>
                    </div>
                </div>
                <input type="password" name="password" class="form-control" 
                id="pass" placeholder="*******" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary m-2" name="submit">
            <span class="fas fa-sign-in-alt"></span> Entrar
        </button>
        <a class="btn btn-outline-info m-2" href="./signin.php">
            <span class="fas fa-user-plus"></span>
            Nuevo usuario
        </a>
    </form>
</div>
