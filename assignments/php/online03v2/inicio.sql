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
    id INT AUTO_INCREMENT PRIMARY KEY, -- el cliente no conoce su id
    nombre VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE, -- usado para login
    password VARCHAR(255) NOT NULL,
    tipo char(1) not null -- c 'cliente', a 'admin'
);

CREATE TABLE facturacion(
    tfno int(9) NOT NULL,
    direccion varchar(255) not null,
    cliente int not null,
    CONSTRAINT cliente_PK PRIVATE KEY (direccion, cliente),
    CONSTRAINT cliente_FK FOREIGN KEY (cliente) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE ingredientes(
    id int AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    alergeno int not null -- booleano
);

CREATE TABLE especialidades(
    id int AUTO_INCREMENT PRIMARY KEY,
    precio float, -- precio fijo
    nombre varchar(50) not null
);

CREATE TABLE pedidos(
    id int AUTO_INCREMENT PRIMARY KEY,
    fecha DATE not null,
    entregado int not null, -- booleano
    cliente int not null,
    CONSTRAINT cliente_FK FOREIGN KEY (cliente) REFERENCES usuarios(id) ON DELETE CASCADE
);

CREATE TABLE pizzas(
    id int AUTO_INCREMENT PRIMARY KEY,
    precio float not null, 
/* 
    calculado (debería, al menos):
    formula = 6 + (0,80 * ingredientes) 
    generated always as (
        (SELECT count(i.id) from 
        ingredientes_pizza as i join pizzas p
        on i.pizza = p.id) * 0.80
    )
 */
    pedido int not null,
    especialidad int not null,
    CONSTRAINT pedido_FK FOREIGN KEY (pedido) REFERENCES pedidos(id) ON DELETE CASCADE,
    CONSTRAINT especialidad_FK FOREIGN KEY (especialidad) REFERENCES especialidades(id) ON DELETE CASCADE
);

CREATE TABLE ingredientes_esp(
    especialidad int not null,
    ingrediente int not null,
    CONSTRAINT especialidad_esp_FK FOREIGN KEY (especialidad) REFERENCES especialidades(id) ON DELETE CASCADE,
    CONSTRAINT ingrediente_esp_FK FOREIGN KEY (ingrediente) REFERENCES ingredientes(id) ON DELETE CASCADE
);

CREATE TABLE ingredientes_pizza(
    pizza int not null,
    ingrediente int not null,
    CONSTRAINT pizza_FK FOREIGN KEY (pizza) REFERENCES pizzas(id) ON DELETE CASCADE,
    CONSTRAINT ingrediente_piz_FK FOREIGN KEY (ingrediente) REFERENCES ingredientes(id) ON DELETE CASCADE
);

-- Insertamos datos

-- Los password son siempre 1234nombre (en minúscula), p.e: 1234jaime 
INSERT INTO usuarios (nombre, email, password, tipo) VALUES (
    'Jaime Ranchal',
    'jaime@ejemplo.com',
    '$2y$10$oaAuy3rLzzZ.O5FVr2W83ui1P0b5IZq0TvW/5YlTbG3.NMd.TCr56',
    'c'
),
(
    'Nacho Gómez',
    'nacho@ejemplo.com',
    '$2y$10$PGzlMQKqCbHCG3bN54xllu45vKRuQjKqoNEjsjfwKENhlxNj5Z4ea',
    'a'
);

INSERT INTO facturacion(tfno, direccion, cliente) VALUES(
    666999999,
    'C/Cuesta de la Gomera, 5, b-1, Tenerife',
    1
);

INSERT INTO ingredientes (nombre, alergeno) VALUES
('champiñones',0),
('bacon',0),
('jamón cocido',0),
('ternera picada',0),
('pollo',0),
('salami',0),
('frankfurt',0),
('piña',0),
('pimiento rojo',0),
('pimiento verde',0),
('cebolla',0),
('tomate fresco',0),
('pepperoni',0),
('maiz',0),
('aceitunas negras',0),
('gambas',1),
('atún',0),
('anchoas',0),
('palitos de cangrejo',0),
('mozzarella',0),
('queso provolone',1),
('queso cheddar',1),
('queso emmental',1),
('queso de cabra',1),
('queso azul',1),
('queso crema',1),
('salsa barbacoa',0),
('salsa boloñesa',0),
('salsa pesto',0),
('salsa carbonara',0),
('salsa de tomate',0);

INSERT INTO especialidades (nombre, precio) VALUES 
('Barbecue gourmet', 9.2),
('Boloñesa', 8.2),
('4 quesos', 8.2),
('Carbonara', 8.2),
('Barbacoa', 8.2),
('Otan', 9.2),
('Marenostrum', 9.2),
('Hawai', 9.2);

INSERT INTO ingredientes_esp (especialidad, ingrediente) VALUES
(1,27), -- Barbecue gourmet
(1,26), 
(1,20),
(1,2),
(1,5),
(1,11),
(2,28), -- Boloñesa
(2,20),
(2,4),
(2,11),
(2,21),
(3,31), -- 4 quesos
(3,21),
(3,22),
(3,23),
(3,25),
(4,30), -- Carbonara
(4,20),
(4,2),
(4,3),
(4,1),
(4,11),
(5,27), -- Barbacoa
(5,20),
(5,4),
(5,2),
(5,5),
(6,31), -- Otan
(6,20),
(6,16),
(6,19),
(6,20),
(6,20),
(7,31), -- Marenostrum
(7,20),
(7,17),
(7,18),
(7,12),
(7,15),
(8,31), -- Hawai
(8,20),
(8,3),
(8,3),
(8,8),
(8,21);

/* INSERT INTO ingredientes_pizza (ingrediente, especialidad) VALUES (); */
/* INSERT INTO pedidos(fecha, entregado, cliente) VALUES (); */
/* INSERT INTO pizzas(pedido, especialidad) VALUES (); */

-- ---------------------------------------------------------------------
