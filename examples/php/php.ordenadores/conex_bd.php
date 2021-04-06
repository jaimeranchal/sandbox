<?php

  $host = 'localhost';
  $dbname = 'test';
  $username = 'root';
  $password = '';

  // MySQL/MariaDB
  $dbh = new PDO('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);
  
?>
