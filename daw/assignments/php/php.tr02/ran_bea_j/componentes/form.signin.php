<div class="row vh-100 justify-content-center align-items-center">
    <form class="col-8" action="signin2.php" method="POST">
        <h2 class="display-4">Nuevo usuario</h2>
        <p class="lead">Sólo necesitamos saber un par de cositas</p>

        <div class="form-group">
            <label  for="nombre">Nombre y apellidos</label>
            <div class="input-group mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
                <input type="text" name="nombre" class="form-control" 
                id="nombre" placeholder="Alicia Gómez" required>
            </div>
            
        </div>
        <div class="form-group">
            <label for="alias">Alias</label>
            <div class="input-group mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">@</div>
                </div>
                <input type="text" name="alias" class="form-control" 
                id="alias" placeholder="aligom" aria-describedby="aliasHelp" required>
            </div>
            <small id="aliasHelp" class="form-text text-muted">
                Entre 4 y 8 caracteres, sin números ni símbolos
            </small>
        </div>

        <div class="form-group">
            <label for="pass">Contraseña</label>
            <div class="input-group mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-key"></span>
                    </div>
                </div>
                <input type="password" name="password" class="form-control" 
                id="pass" placeholder="*******" aria-describedby="passHelp" required>
            </div>
            <small id="passHelp" class="form-text text-muted">
                Entre 8 y 12 caracteres o símbolos (<code>!@#$%</code>). 
                Debe tener al menos un número y una letra.
            </small>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <div class="input-group mr-sm-2">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <input type="email" name="email" class="form-control" 
                id="email" placeholder="aligom@ejemplo.es" required>
            </div>
        </div>
        
        <button type="submit" class="btn btn-outline-info m-2" name="submit">
            <span class="fas fa-user-plus"></span> Listo
        </button>
    </form>
</div>
