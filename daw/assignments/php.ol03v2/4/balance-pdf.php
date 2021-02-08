<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php
session_start();
// Dependencias
require_once("./conexion.php");// bbdd
require_once("../vendor/autoload.php"); // librería mpdf

// Recuperamos la información actualizada del ingresos y gastos
// Ingresos
$sql = 'SELECT DISTINCT * from ingresos WHERE usuario=? ORDER BY fecha';
$sth = $dbh->prepare($sql);
$sth->execute(array($_SESSION['usuario']));
// Recuperamos los datos 
$ingresos = $sth->fetchAll();

// Gastos
$sql = 'SELECT DISTINCT * from gastos WHERE usuario=? ORDER BY fecha';
$sth = $dbh->prepare($sql);
$sth->execute(array($_SESSION['usuario']));
// Recuperamos los datos 
$gastos = $sth->fetchAll();

// variables para calcular total y balance
$total_ingresos = 0;
$total_gastos = 0;
$balance = 0;

// Creamos una instancia de la clase
$mpdf = new \Mpdf\Mpdf();
// inicio un búfer para capturar la página
ob_start();
?>

<!-- Muestra los datos en una tabla -->
<div class="card-deck">
    <div class="card border-0">
        <table class="table table-hover w-auto">
            <thead>
                <tr>
                    <td class="text-center" colspan="3"><h2 class="display-4">Ingresos</h2></td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ingresos as $ingreso) { 
                $total_ingresos += $ingreso['cantidad']; ?>
                <tr>
                    <td><?=$ingreso['fecha']?></td>
                    <td class="text-left"><?=$ingreso['descripcion']?></td>
                    <td class="text-right"><?=$ingreso['cantidad']?> €</td>
                </tr>
                <?php } ?>
                <tr>
                    <td class="text-right" colspan="2"><span class="font-weight-bold inter-700">Total de ingresos</span></td>
                    <td class="text-right"><?=$total_ingresos?> €</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="card border-0">
        <table class="table table-hover w-auto">
            <thead>
                <tr>
                    <td class="text-center" colspan="3"><h2 class="display-4">Gastos</h2></td>
                </tr>
                <tr>
                    <th>Fecha</th>
                    <th>Concepto</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gastos as $gasto) { 
                $total_gastos += $gasto['cantidad']; ?>
                <tr>
                    <td><?=$gasto['fecha']?></td>
                    <td class="text-left"><?=$gasto['descripcion']?></td>
                    <td class="text-right"><?=$gasto['cantidad']?> €</td>
                </tr>
                <?php } ?>
                <tr>
                    <td class="text-right" colspan="2"><span class="font-weight-bold inter-700">Total de gastos</span></td>
                    <td class="text-right"><?=$total_gastos?> €</td>
                </tr>
                    <td class="text-right" colspan="2"><span class="font-weight-bold inter-700">Balance</span></td>
                    <td class="text-right"><?=$total_ingresos - $total_gastos?> €</td>
                <tr>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY); // Escribe el búfer capturado en el pdf
$mpdf->Output(); // Muestra el pdf
?>

