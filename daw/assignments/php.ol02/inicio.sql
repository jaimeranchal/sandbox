/* Ejercicio 1: test-php */
DROP DATABASE IF EXISTS online2test_php;

-- Añado las opciones de codificación para garantizar que se guardan acentos, etc.
CREATE DATABASE IF NOT EXISTS online2test_php
    CHARACTER SET utf8 
    COLLATE utf8_general_ci;

USE online2test_php;

-- Estrictamente hablando, los datos de los alumnos deberían estar en otra tabla
CREATE TABLE usuarios (
    id varchar(8) PRIMARY KEY,
    nombre varchar(20) NOT NULL,
    pass varchar(12) NOT NULL,
    email varchar(20) NOT NULL,
    rol char(1) NOT NULL,
    intentos int DEFAULT 3, -- Inicializado a 3 para evitar tener que hacerlo manualmente
    nota_1 float DEFAULT 0, -- Inicializadas a 0 para poder calcular la media automáticamente sin fallos
    nota_2 float DEFAULT 0,
    nota_3 float DEFAULT 0
);
CREATE TABLE preguntas (
    id int AUTO_INCREMENT PRIMARY KEY,
    texto varchar(255) NOT NULL
);
CREATE TABLE opciones (
    id int AUTO_INCREMENT PRIMARY KEY,
    pregunta int NOT NULL,
    texto varchar(255) NOT NULL,
    correcta boolean NOT NULL,
    CONSTRAINT opciones_FK FOREIGN KEY (pregunta) REFERENCES preguntas(id) ON DELETE CASCADE
);
CREATE TABLE respuestas_usuario (
    usuario varchar(8) NOT NULL,
    pregunta int NOT NULL,
    respuesta int NOT NULL,
    CONSTRAINT opciones_FK1 FOREIGN KEY (usuario) REFERENCES usuarios(id) ON DELETE CASCADE,
    CONSTRAINT opciones_FK2 FOREIGN KEY (pregunta) REFERENCES preguntas(id) ON DELETE CASCADE,
    CONSTRAINT opciones_FK3 FOREIGN KEY (respuesta) REFERENCES opciones(id) ON DELETE CASCADE
);

-- Insertamos datos de usuarios
INSERT INTO usuarios(id, nombre, pass, email, rol) VALUES(
    'ranbea', 
    'Jaime Ranchal', 
    '1234', 
    'jaime@correo.es', 
    'a'
);
INSERT INTO usuarios(id, nombre, pass, email, rol) VALUES(
    'cargom', 
    'Jose Cárdenas', 
    '1234', 
    'cargom@correo.es', 
    'a'
);
INSERT INTO usuarios(id, nombre, pass, email, rol) VALUES(
    'arrlop', 
    'Domingo Arribas', 
    '1234', 
    'arrlop@correo.es', 
    'a'
);
INSERT INTO usuarios(id, nombre, pass, email, rol) VALUES(
    'lopquin', 
    'Manuel López', 
    '1234', 
    'manlop@correo.es', 
    'p'
);

-- Insertamos texto de las preguntas
INSERT INTO preguntas(texto) VALUES('¿Dónde se ejecuta el código PHP?');
INSERT INTO preguntas(texto) VALUES('¿Qué marcas se utilizan para insertar código PHP?');
INSERT INTO preguntas(texto) VALUES('¿En qué atributo de un formulario especificamos la página a la que se van a enviar los datos del mismo?');
INSERT INTO preguntas(texto) VALUES('¿Cuál de estas instrucciones está correctamente escrita en PHP?');
INSERT INTO preguntas(texto) VALUES('¿Cuál de estas instrucciones PHP imprimirá por pantalla correctamente el mensaje “Hola Mundo” en letra negrita?');
INSERT INTO preguntas(texto) VALUES('Dos de las formas de pasar los parámetros entre páginas PHP son:');
INSERT INTO preguntas(texto) VALUES('¿Cuál de estas instrucciones se utiliza para realizar una consulta a una base de datos MySQL?');
INSERT INTO preguntas(texto) VALUES('Un array es...');
INSERT INTO preguntas(texto) VALUES('¿Cómo se define una variable de tipo string en PHP?');
INSERT INTO preguntas(texto) VALUES('Tenemos el siguiente código, ¿Cuál será el valor de $b? $a=&#x201D;10&#x201D;; $b=$a + 2;');
INSERT INTO preguntas(texto) VALUES('¿Para qué sirve el siguiente código?: if (isset($variable)){}');

-- Insertamos respuestas
INSERT INTO opciones(pregunta, texto, correcta) VALUES(1, 'Servidor', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(1, 'Cliente', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(2, '&#x3C;? y ?&#x3E;', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(2, '&#x3C;php&#x3E; y &#x3C;/php&#x3E;', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(2, '&#x3C;# y #&#x3E;', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(3, 'name', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(3, 'file', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(3, 'action', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(3, 'description', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(4, 'if (a=0) print a', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(4, 'if (a==0) echo "hola mundo";', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(4, 'if (a==0) {echo ok}', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(4, 'if (a==0) print a', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(5, 'print &#x3C;strong &#x3E;Hola Mundo &#x3C;/strong&#x3E;;', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(5, 'print (&#x3C;strong&#x3E;Hola Mundo&#x3C; /strong&#x3E;);', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(5, 'print (&#x22;&#x3C;strong&#x3E;Hola Mundo &#x3C;/strong&#x3E;&#x22;);', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(6, 'require e include', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(6, 'get y put', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(6, 'post y get', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(6, 'into e include', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(7, 'mysql_query', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(7, 'mysql_access', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(7, 'mysql_db_access', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(8, 'Un conjunto de caracteres alfanuméricos', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(8, 'Un sistema para convertir una variable de texto en un número', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(8, 'Un conjunto de elementos', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(9, 'char', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(9, 'string', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(9, 'En PHP no se define explícitamente el tipo de una variable', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(10, '"12"', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(10, '12', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(10, '"102"', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(10, 'Ninguno (no se puede sumar un número a una cadena)', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(11, 'Recorre un array de nombre $variable', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(11, 'Crea una variable de nombre "$variable"', false);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(11, 'Verifica si la variable "$variable" está definida y tiene un valor no nulo', true);
INSERT INTO opciones(pregunta, texto, correcta) VALUES(11, 'Ninguna de las anteriores', false);


/* Ejercicio 2: alquiler de coches */

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

