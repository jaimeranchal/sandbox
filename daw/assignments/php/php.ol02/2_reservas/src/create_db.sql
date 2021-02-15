DROP DATABASE IF EXISTS online2alquiler_coches;

-- Añado las opciones de codificación para garantizar que se guardan acentos, etc.
CREATE DATABASE IF NOT EXISTS online2alquiler_coches
    CHARACTER SET utf8 
    COLLATE utf8_general_ci;

USE online2alquiler_coches;

CREATE TABLE usuarios (
    id varchar(8) PRIMARY KEY,
    nombre varchar(20) NOT NULL,
    pass varchar(12) NOT NULL,
    email varchar(20) NOT NULL,
    rol char(1) NOT NULL -- cliente (c) o empresario (e)
);
CREATE TABLE inventario(
    id varchar(6) PRIMARY KEY,
    modelo varchar(20) not null, -- nombre completo del modelo
    matriculado varchar(4) not null, -- fecha de matriculación
    reservado boolean default 0 not null
);
CREATE TABLE reservas(
    id int AUTO_INCREMENT PRIMARY KEY,
    usuario varchar(8) not null,
    modelo varchar(6) not null,
    inicio date not null,
    fin date not null,
    CONSTRAINT reservas_usuFK FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
    CONSTRAINT reservas_modFK FOREIGN KEY (modelo) REFERENCES inventario(id) ON DELETE CASCADE
);

-- Insertamos datos

INSERT INTO usuarios(id, nombre, pass, email, rol) VALUES(
    'ranbea', 
    'Jaime Ranchal', 
    '1234', 
    'jaime@correo.es', 
    'c'
);
INSERT INTO usuarios(id, nombre, pass, email, rol) VALUES(
    'cargom', 
    'Jose Cárdenas', 
    '1234', 
    'cargom@correo.es', 
    'c'
);
INSERT INTO usuarios(id, nombre, pass, email, rol) VALUES(
    'arrlop', 
    'Domingo Arribas', 
    '1234', 
    'arrlop@correo.es', 
    'c'
);
INSERT INTO usuarios(id, nombre, pass, email, rol) VALUES(
    'lopquin', 
    'Manuel López', 
    '1234', 
    'manlop@correo.es', 
    'e'
);

-- Datos de modelos
INSERT INTO inventario(id, modelo, matriculado, reservado) values('seat01', 'Seat Ibiza', '2008', 0);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('seat02', 'Seat León', '2017', 1);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('seat03', 'Seat Arona', '2016', 0);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('seat04', 'Seat Toledo','2009', 0);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('rena01', 'Renault Clio', '2010', 0);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('rena02', 'Renault Megane', '2013', 1);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('kia01', 'Kia Sportage', '2014', 0);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('kia02', 'Kia Rio', '2011', 1);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('citr01', 'Citroen C3', '2016', 1);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('citr02', 'Citroen Berlingo', '2019', 1);
INSERT INTO inventario(id, modelo, matriculado, reservado) values('bmw01', 'BMW i3', '2018', 0);

-- Algunas reservas
-- NOTA: tipo DATE: 'YYYY-MM-DD'
INSERT INTO reservas(usuario, modelo, inicio, fin) VALUES(
    'ranbea',
    'seat02',
    '2020-02-11',
    '2020-02-15'
);
INSERT INTO reservas(usuario, modelo, inicio, fin) VALUES(
    'arrlop',
    'rena02',
    '2019-12-01',
    '2019-12-03'
);
INSERT INTO reservas(usuario, modelo, inicio, fin) VALUES(
    'cargom',
    'kia02',
    '2020-05-26',
    '2020-06-02'
);
INSERT INTO reservas(usuario, modelo, inicio, fin) VALUES(
    'cargom',
    'citr01',
    '2020-07-08',
    '2020-07-10'
);
INSERT INTO reservas(usuario, modelo, inicio, fin) VALUES(
    'arrlop',
    'citr02',
    '2020-01-03',
    '2020-01-08'
);
