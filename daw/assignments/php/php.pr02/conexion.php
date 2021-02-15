<?php

$host = 'localhost';
$db = 'pruebaud2';
$user = 'root';
$pass = '';

// MySQL/MariaDB
$conn = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
?>
