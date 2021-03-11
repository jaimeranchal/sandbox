<div class="row justify-content-center align-items-center text-center">
    <form class="col-6" action="jugar2.php" method="post">
        <h2 class="display-3">Prueba tu suerte</h2>
        <p class="lead">Tienes un desafío de <?=$rival['nombre']?></p>
        <div class="form-group">
          <label for="mano">Elige una opción:</label>
          <select class="form-control" name="mano" id="mano">
            <option value="p">Piedra</option>
            <option value="f">Papel</option>
            <option value="t">Tijera</option>
            <option value="l">Lagarto</option>
            <option value="s">Spock</option>
          </select>
        </div>
        <input type="submit" name="submit" class="btn btn-block bg-primary text-light mb-3" value="Responder"/>
    </form>
</div>
