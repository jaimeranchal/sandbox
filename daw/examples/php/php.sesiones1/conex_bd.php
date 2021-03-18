<?php

$servidor = 'localhost';
$base_datos = 'ejemplo_4';
$username = 'root';
$password = '';

// MySQL/MariaDB
$dbh = new PDO('mysql:host=' . $servidor . ';dbname=' . $base_datos, $username, $password);


?>
