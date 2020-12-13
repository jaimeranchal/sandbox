-- Añado las opciones de codificación para garantizar que se guardan acentos, etc.
CREATE DATABASE IF NOT EXISTS online2pizzeria
    CHARACTER SET utf8 
    COLLATE utf8_general_ci;

USE online2pizzeria;

CREATE TABLE usuarios (
    id varchar(8) PRIMARY KEY,
    nombre varchar(20) NOT NULL,
    pass varchar(12) NOT NULL,
    email varchar(20) NOT NULL,
    rol char(1) NOT NULL -- cliente (c) o empresario (e)
);

CREATE TABLE especialidades(
    id varchar(8) PRIMARY KEY,
    descripcion varchar(255) not null
);

CREATE TABLE ingredientes(
    id varchar(8) PRIMARY KEY,
    nombre varchar(20) not null
);

CREATE TABLE pedidos(
    id int auto_increment primary key,
    usuario varchar(8),
    pizzas, -- ¿tabla intermedia? Contendrá más de una pizza
    fecha datetime not null,
    CONSTRAINT pedido_usuFK FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE CASCADE
);
