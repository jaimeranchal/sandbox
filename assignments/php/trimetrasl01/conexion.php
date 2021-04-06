<?php

/* Conexión a base de datos con PDO */

/* Datos de la conexión */
$host = 'localhost';
$dbname = 'pruebatrim1';
$username = 'root';
$password = '';
$excepcion = '';

try {
    // Data Source Name (dsn) y DataBase Handle (dbh)
    /* $dsn = 'mysql:host=' . $host . ';dbname=' . $db; */
    $dsn = "mysql:host=$host;dbname=$dbname"; //igual que la línea anterior
    $dbh = new PDO($dsn, $username, $password); 
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Guarda el error en una variable por si es necesario imprimirlo
    $excepcion="Error en la base de datos: ".$e->getMessage();
}
?>

