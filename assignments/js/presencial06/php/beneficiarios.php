<?php

require_once "connection.php";

$fecha=htmlspecialchars($_REQUEST['fecha']);


$jsondata["data"] = array();

try {

	$stmt = $pdo->prepare("SELECT * from beneficiarios WHERE fechaFinal<'$fecha'");
	$stmt->execute([]);
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

