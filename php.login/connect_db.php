<?php

$host = 'localhost';
$dbname = 'db_example';
$username = 'admin';
$password = '1234';

// Para bbdd en MySQL o MariaDB
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // selecciona el modo de error de PDO a excepción
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conectado con éxito a la base de datos";
} catch(PDOException $e) {
    echo "Conexión fallida: " . $e->getMessage();
}

function closeConn() {
    $conn = null;
}
?>
