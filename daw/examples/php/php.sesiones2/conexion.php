<?php

/* Conexión a base de datos con PDO */

/* Datos de la conexión */
$host = 'localhost';
$db = 'academia';
$user = 'root';
$pass = '';

try {
    // Data Source Name (dsn) y DataBase Handle (dbh)
    /* $dsn = 'mysql:host=' . $host . ';dbname=' . $db; */
    $dsn = "mysql:host=$host;dbname=$db"; //igual que la línea anterior
    $dbh = new PDO($dsn, $user, $pass); 
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // imprime el error, si se produce
    echo($e ->getMessage());
}
?>
