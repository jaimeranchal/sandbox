<?php

require_once "connection.php";


$cp=htmlspecialchars($_REQUEST['codigoP']);

$jsondata["data"] = array();

try {

	$stmt = $pdo->prepare("SELECT * FROM `asistentes` WHERE `CPInfluencia`=? ORDER BY apellidosNombre");
	$stmt->execute([$cp]);
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

