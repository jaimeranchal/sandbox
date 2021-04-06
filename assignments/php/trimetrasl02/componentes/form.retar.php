<div class="row justify-content-center align-items-center text-center">
    <div class="col-md-8 my-4">
        <form class="form row align-items-center border-bottom" action="retar2.php" method="post">
            <label class="col-md-1 col-form-label" for="jugador">
                Rival
            </label>
            <div class="col-3">
                <select class="form-control" name="jugador" id="jugador">
                    <?php foreach ($jugadores as $jugador): ?>
                    <option value="<?php echo $jugador["id"] ?>">
                        <?php echo $jugador["nombre"]?>
                    </option>
                    <?php endforeach; ?>
                </select>
            </div> 
            <div class="col-6">
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <label class="btn btn-light">
                          <input type="radio" name="mano" id="piedra" value="p">  
                          <span title="piedra" class="fas fa-hand-rock fa-2x"></span>
                      </label>
                      <label class="btn btn-light">
                          <input type="radio" name="mano" id="papel" value="f">  
                          <span title="papel" class="fas fa-hand-paper fa-2x"></span>
                      </label>
                      <label class="btn btn-light">
                          <input type="radio" name="mano" id="tijeras" value="t">  
                          <span title="tijeras" class="fas fa-hand-scissors fa-2x"></span>
                      </label>
                      <label class="btn btn-light">
                          <input type="radio" name="mano" id="lagarto" value="l">  
                          <span title="lagarto" class="fas fa-hand-lizard fa-2x"></span>
                      </label>
                      <label class="btn btn-light">
                          <input type="radio" name="mano" id="spock" value="s">  
                          <span title="spock" class="fas fa-hand-spock fa-2x"></span>
                      </label>
                  </div>
              </div> 
            <div class="col-2">
                <button type="submit" name="submit" class="btn btn-primary text-light">
                    Retar
                </button>
            </div> 
        </form>
    </div>
<!--
    <form class="col-6" action="retar2.php" method="post">
        <div class="form-group">
          <label for="jugador">Jugador</label>
          <select class="form-control" name="jugador" id="jugador">
            <?php foreach ($jugadores as $jugador): ?>
              <option value="<?php echo $jugador["id"] ?>">
                <?php echo $jugador["nombre"]?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
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
        <input type="submit" name="submit" class="btn btn-block bg-primary text-light mb-3" value="Piedra, papel..."/>
    </form>
-->
</div>
