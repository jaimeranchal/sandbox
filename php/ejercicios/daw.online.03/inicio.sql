
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
    id int AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    descripcion VARCHAR(255),
    cantidad DOUBLE,
    usuario varchar(8),
    CONSTRAINT ingresos_FK FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);
CREATE TABLE gastos(
    id int AUTO_INCREMENT PRIMARY KEY,
    fecha DATE NOT NULL,
    descripcion VARCHAR(255),
    cantidad DOUBLE,
    usuario varchar(8),
    CONSTRAINT gastos_FK FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Los password son siempre 1234nombre (en minúscula), p.e: 1234jaime 
INSERT INTO usuarios (id, nombre, email, password) VALUES (
    'jairan',
    'Jaime Ranchal',
    'jaime@ejemplo.com',
    '$2y$10$oaAuy3rLzzZ.O5FVr2W83ui1P0b5IZq0TvW/5YlTbG3.NMd.TCr56'
),
(
    'nacgom',
    'Nacho Gómez',
    'nacho@ejemplo.com',
    '$2y$10$PGzlMQKqCbHCG3bN54xllu45vKRuQjKqoNEjsjfwKENhlxNj5Z4ea'
);

INSERT INTO ingresos (fecha, descripcion, cantidad, usuario) VALUES (
    '2020-01-05',
    'Nómina',
    1140.56,
    'nacgom'
),
(
    '2020-01-08',
    'Web pizzeria',
    460,
    'nacgom'
),
(
    '2020-01-16',
    'Prestamo',
    2000,
    'nacgom'
),
(
    '2020-01-23',
    'Intereses banco',
    130,
    'nacgom'
);

INSERT INTO gastos (fecha, descripcion, cantidad, usuario) VALUES (
    '2020-01-03',
    'Alquiler',
    550,
    'nacgom'
),
(
    '2020-01-07',
    'Luz y agua',
    250,
    'nacgom'
),
(
    '2020-01-07',
    'Equipo oficina',
    858.65,
    'nacgom'
),
(
    '2020-01-14',
    'Mercadona',
    138.45,
    'nacgom'
);

INSERT INTO ingresos (fecha, descripcion, cantidad, usuario) VALUES (
    '2020-01-29',
    'Subsidio',
    480.95,
    'jairan'
),
(
    '2020-02-06',
    'Diseño tatuaje',
    75,
    'jairan'
),
(
    '2020-02-13',
    'Mantenimiento anual Juan',
    120,
    'jairan'
),
(
    '2020-02-27',
    'Clases academia',
    160,
    'jairan'
);

INSERT INTO gastos (fecha, descripcion, cantidad, usuario) VALUES (
    '2020-02-05',
    'Alquiler',
    430,
    'jairan'
),
(
    '2020-02-11',
    'Luz y agua',
    136.68,
    'jairan'
),
(
    '2020-02-19',
    'Monitor',
    125.95,
    'jairan'
),
(
    '2020-01-03',
    'Internet PTV',
    35.95,
    'jairan'
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
