-- Script de creación de bases de datos para MySQL/MariaDB
-- Alumno: Jaime Ranchal Beato 

DROP DATABASE IF EXISTS pruebaud3;

CREATE DATABASE pruebaud3;

USE pruebaud3;

CREATE TABLE usuarios(
    id VARCHAR(8) PRIMARY KEY,
    password VARCHAR(255) NOT NULL
);

CREATE table datos (
    usuario varchar(8) NOT NULL,
    nombre varchar(30) NOT NULL,
    apellidos varchar(50) NOT NULL,
    profesion varchar(50),
    foto varchar(255),
    tfno int(9) NOT NULL,
    email varchar(50) NOT NULL,
    web varchar(255),
    portfolio varchar(255),
    CONSTRAINT datos_FK FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
    CONSTRAINT datos_PK PRIMARY KEY (nombre, apellidos)
);
-- Los password son siempre 1234nombre (en minúscula), p.e: 1234jaime 
INSERT INTO usuarios (id, password) VALUES (
    'jairan',
    '$2y$10$oaAuy3rLzzZ.O5FVr2W83ui1P0b5IZq0TvW/5YlTbG3.NMd.TCr56'
),
(
    'nacgom',
    '$2y$10$PGzlMQKqCbHCG3bN54xllu45vKRuQjKqoNEjsjfwKENhlxNj5Z4ea'
);
