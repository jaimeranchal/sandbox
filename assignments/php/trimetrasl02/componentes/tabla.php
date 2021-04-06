<div class="row justify-content-center align-items-start text-center">
    <div class="col-md-4 m-2">
        <h3>Mis partidas</h3>
        <table class="table table-sm">
            <thead class="thead-dark">
                <tr>
                    <th>Contra</th>
                    <th>Ganadas</th>
                    <th>Perdidas</th>
                </tr>
            </thead>
            <tbody>
<?php foreach ($partidas_usuario as $key => $partida): ?>
                <tr>
                    <td><?=$key?></td>
                    <td><?=$partida['victorias']?></td>
                    <td><?=$partida['derrotas']?></td>
                </tr>
<?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-md-6 m-2">
        <div class="mb-2">
            <h3>Ganadores</h3>
            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Total partidas</th>
                        <th>% victorias</th>
                    </tr>
                </thead>
                <tbody>
<?php 
// ordenar el array por victorias con array_multi_sort
foreach ($datos_finales as $key => $fila) {
    $aux[$key] = $fila['perc_victorias'];
}
array_multisort($aux, SORT_DESC, $datos_finales);

$index = 1;
foreach ($datos_finales as $dato) :
?>
                    <tr>
                        <td><b><?=$index?></b></td>
                        <td><?=$dato['nombre']?></td>
                        <td><?=$dato['partidas']?></td>
                        <td><?=$dato['perc_victorias']?></td>
                    </tr>
<?php 
$index++;
endforeach; 
?>
                </tbody>
            </table>
        </div>
        <div class="mb-2">
            <h3>Perdedores</h3>
            <table class="table table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Total partidas</th>
                        <th>% derrotas</th>
                    </tr>
                </thead>
                <tbody>
<?php 
// ordenar el array por derrotas con array_multi_sort
foreach ($datos_finales as $key => $fila) {
    $aux[$key] = $fila['perc_derrotas'];
}
array_multisort($aux, SORT_DESC, $datos_finales);

$index = 1;
foreach ($datos_finales as $dato): 
?>
                    <tr>
                        <td><b><?=$index?></b></td>
                        <td><?=$dato['nombre']?></td>
                        <td><?=$dato['partidas']?></td>
                        <td><?=$dato['perc_derrotas']?></td>
                    </tr>
<?php 
$index++;
endforeach; 
?>
                </tbody>
            </table>
        </div>
    </div>
</div>
