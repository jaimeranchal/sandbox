<?php

require_once "connection.php";

$dni = htmlspecialchars($_REQUEST['dni']);
$inmueble = htmlspecialchars($_REQUEST['inmueble']);

$jsondata = array();

try {
	$stmt = $pdo->prepare("INSERT INTO reservas VALUES(NULL, ?, ?, CURDATE()");
	$stmt->execute(['$dni',$inmueble]);
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


