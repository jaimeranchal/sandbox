<?php

require_once "connection.php";
$codigo = htmlspecialchars($_REQUEST['codigo']);
$fecha = htmlspecialchars($_REQUEST['fecha']);
$beneficiario = htmlspecialchars($_REQUEST['benef']);
$tarea = htmlspecialchars($_REQUEST['tarea']);
$asistente = htmlspecialchars($_REQUEST['asist']);


$jsondata["data"] = array();

try {
	$stmt = $pdo->prepare("INSERT INTO asignaciontareas VALUES(?,?,?,?,?)");
	$stmt->execute([$beneficiario, $asistente, $tarea, $fecha, $codigo]);
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

