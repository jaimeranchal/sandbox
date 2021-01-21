
-- Script de creación de bases de datos para MySQL/MariaDB

DROP DATABASE IF EXISTS ud3_balance;
DROP DATABASE IF EXISTS ud3_app_web;

CREATE DATABASE ud3_balance
    CHARACTER SET utf8 
    COLLATE utf8_general_ci;

-- ----------------- UD3: BALANCE DE INGRESOS Y GASTOS -----------------

USE ud3_balance;

-- Pon aquí tus CREATE TABLE, INSERT INTO y restricciones necesarias.
CREATE TABLE usuarios(
    id varchar(8) PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
CREATE TABLE ingresos(
    fecha DATE NOT NULL,
    descripcion VARCHAR(255) PRIMARY KEY,
    cantidad DOUBLE,
    usuario varchar(8),
    CONSTRAINT ingresos_FK FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);
CREATE TABLE gastos(
    fecha DATE NOT NULL,
    descripcion VARCHAR(255) PRIMARY KEY,
    cantidad DOUBLE,
    usuario varchar(8),
    CONSTRAINT gastos_FK FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);
-- ---------------------------------------------------------------------

-- ------ UD3: APLICACIÓN WEB CON BBDD, SESIONES, COOKIES Y HASH -------

CREATE DATABASE ud3_app_web
    CHARACTER SET utf8 
    COLLATE utf8_general_ci;

USE ud3_app_web;

-- Pon aquí tus CREATE TABLE, INSERT INTO y restricciones necesarias.
CREATE TABLE usuarios(
    id int AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- ---------------------------------------------------------------------
