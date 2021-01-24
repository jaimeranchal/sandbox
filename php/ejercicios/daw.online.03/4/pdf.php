<?php
// conexión a bbdd
require_once("./conexion.php");
// iniciamos sesión para recoger los datos de usuario
session_start();
// Gestión de los datos de la bbdd

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
// plantilla de la página (lo que se va a imprimir)
$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
// Cargamos la librería de mpdf
require_once $path . '/vendor/autoload.php';

// html a imprimir
$html = "";

// Instanciamos un nuevo objeto mpdf
// Incluímos configuración básica para el pdf 
$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);

$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Balance de ingresos y gastos");
$mpdf->SetAuthor("Usuario");
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();
?>
