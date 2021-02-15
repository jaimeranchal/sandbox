<?php

/* Conexión a base de datos con PDO */

/* Datos de la conexión */
$host = 'localhost';
$db = 'ud3_app_web';
$user = 'root';
$pass = '';
$excepcion = '';

try {
    // Data Source Name (dsn) y DataBase Handle (dbh)
    /* $dsn = 'mysql:host=' . $host . ';dbname=' . $db; */
    $dsn = "mysql:host=$host;dbname=$db"; //igual que la línea anterior
    $dbh = new PDO($dsn, $user, $pass); 
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Guarda el error en una variable por si es necesario imprimirlo
    $excepcion="Error en la base de datos: ".$e->getMessage();
}
?>


