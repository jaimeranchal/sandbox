<div class="row justify-content-center my-4 align-items-center text-center">
  <div class="col-md-8">
          <?php 
          foreach ($retos as $reto): 
              $rival = $conn->leerDatos(
                  'usuarios',
                  array('nombre'),
                  $param = ['where' => 'WHERE id=?'],
                  array($reto['de_usuario']),
                  1
              );
          ?>
          <form class="form row align-items-center border rounded" action="jugar2.php" method="post">
              <!-- envío el id del reto -->
              <input type="hidden" name="reto_id" value="<?=$reto['id']?>"/>
              <!-- envío el id del rival -->
              <input type="hidden" name="rival_id" value="<?=$reto['de_usuario']?>"/>
              <!-- envío la opción escogida por el rival -->
              <input type="hidden" name="mano_rival" value="<?=$reto['respuesta']?>"/>
              <div class="col-3 m-2 text-left">
                <span>
                    <span>De <i><?=$rival['nombre']?></i></span>
                </span>
              </div>
              <div class="col-6 m-2">
<!--
                <select class="custom-select" name="mano" id="mano">
                  <option value="p">Piedra</option>
                  <option value="f">Papel</option>
                  <option value="t">Tijera</option>
                  <option value="l">Lagarto</option>
                  <option value="s">Spock</option>
                </select>
-->
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

              <div class="col-1 m-2">
                <button type="submit" name="submit" class="btn btn-primary text-light">
                    Responder
                </button>
              </div>
          </form>
          <?php endforeach; ?>
  </div>
</div>
