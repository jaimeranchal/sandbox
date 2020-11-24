<?php

$host = 'localhost';
$db = 'biblioteca';
$user = 'root';
$pass = '';

// MySQL/MariaDB
$conn = new PDO('mysql:host=' . $host . ';dbname=' . $db, $user, $pass);
?>
