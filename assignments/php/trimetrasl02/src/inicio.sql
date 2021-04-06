-- Script de creación de bases de datos para MySQL/MariaDB

DROP DATABASE IF EXISTS pruebatrim2;
/* DROP DATABASE IF EXISTS pruebatrim22; */

CREATE DATABASE pruebatrim2
    CHARACTER SET utf8 
    COLLATE utf8_general_ci;

-- ----------------- UD3: BALANCE DE INGRESOS Y GASTOS -----------------

USE pruebatrim2;

-- Pon aquí tus CREATE TABLE, INSERT INTO y restricciones necesarias.
CREATE TABLE usuarios(
    id int AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    alias varchar(8),
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE partidas(
    id int AUTO_INCREMENT PRIMARY KEY,
    usuario INT NOT NULL,
    rival INT NOT NULL,
    victoria BOOLEAN NOT NULL,
    CONSTRAINT partidas_de_FK FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
    CONSTRAINT partidas_contra_FK FOREIGN KEY (rival) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE retos(
    id int AUTO_INCREMENT PRIMARY KEY,
    de_usuario INT NOT NULL,
    para_usuario INT NOT NULL,
    respuesta CHAR(1) NOT NULL,
    CONSTRAINT reto_de_FK FOREIGN KEY (de_usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
    CONSTRAINT reto_para_FK FOREIGN KEY (para_usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);

/* Las contraseñas son siempre 1234nombre! */ 
/* excepto para jairan y nacgom que son 1234jaime y 1234nacho */
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
),
(
    'Alicia Gómez',
    'aligom',
    '$2y$10$6gxybUIv3F6ZIbR1vVRIgO7amTSW0z2SJhCo.gkjHAgkRTiVynSZe',
    'aligom@ejemplo.com'
),
(
    'Paco Porras',
    'pacpoc',
    '$2y$10$Hvb9yxsgqnp7KXNwEuWlIO12toivpdwCzy8cfxSJsUmcm13MQKg6q',
    'pacpoc@ejemplo.com'
),
(
    'Isabel Jurado',
    'isajur',
    '$2y$10$aaltlkZg3ty7Srl4TB.j4uwq/323mzhJ1KTbR105PEucy00aMqvl.',
    'isajur@ejemplo.com'
);

INSERT INTO partidas (usuario, rival, victoria) VALUES 
(1,3, 1),
(2,5, 0),
(2,3, 0),
(3,1, 1),
(4,3, 0),
(4,3, 0),
(5,1, 1),
(2,1, 0),
(1,4, 1),
(1,4, 1),
(5,4, 1);


INSERT INTO retos (de_usuario, para_usuario, respuesta) VALUES 
(1,2, 'p'),
(2,4, 'f'),
(4,2, 'f'),
(3,2, 't'),
(3,5, 'p'),
(3,1, 's'),
(4,2, 't'),
(4,5, 'p'),
(4,1, 's'),
(2,1, 'f');
