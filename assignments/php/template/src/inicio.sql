-- Script de creación de bases de datos para MySQL/MariaDB

DROP DATABASE IF EXISTS nombre_db;
/* DROP DATABASE IF EXISTS nombre_db2; */

CREATE DATABASE nombre_db
    CHARACTER SET utf8 
    COLLATE utf8_general_ci;

-- ----------------- UD3: BALANCE DE INGRESOS Y GASTOS -----------------

USE nombre_db;

-- Pon aquí tus CREATE TABLE, INSERT INTO y restricciones necesarias.
CREATE TABLE usuarios(
    id int AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    alias varchar(8),
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL
);

INSERT INTO usuarios (nombre, alias, password, email) VALUES (
    'Jaime Ranchal',
    'jairan',
    '$2y$10$oaAuy3rLzzZ.O5FVr2W83ui1P0b5IZq0TvW/5YlTbG3.NMd.TCr56',
    'jaime@ejemplo.com'
),
(
    'Nacho Gómez',
    'nacgom',
    '$2y$10$PGzlMQKqCbHCG3bN54xllu45vKRuQjKqoNEjsjfwKENhlxNj5Z4ea',
    'nacho@ejemplo.com'
);
