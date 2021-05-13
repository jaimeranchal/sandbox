<?php

require_once "connection.php";

$fecha=htmlspecialchars($_REQUEST['fecha']);
$benef=htmlspecialchars($_REQUEST['beneficiario']);


$jsondata["data"] = array();

try {
	$stmt = $pdo->prepare("Select prestacionesbene.idTarea, prestacionesbene.idBenef, tareas.descripcion,tareas.tiempo FROM prestacionesbene, tareas WHERE prestacionesbene.idTarea=tareas.idTarea AND prestacionesbene.idBenef='$benef' AND prestacionesbene.idTarea NOT IN (SELECT idTarea FROM asignaciontareas where fecha='$fecha' AND idBenef='$benef')");
	$stmt->execute();
	while ($row = $stmt->fetch()) {
        $jsondata["data"][] = $row;
    }
} catch (PDOException $e) {
	$jsondata["mensaje"][]="Error";
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
$pdo=null;

exit();

