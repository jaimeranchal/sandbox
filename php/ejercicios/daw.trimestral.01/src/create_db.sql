DROP DATABASE IF EXISTS pruebatrim1;
CREATE DATABASE pruebatrim1;
USE pruebatrim1;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL,
    pass VARCHAR(12) NOT NULL
);

CREATE TABLE partidas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario INT NOT NULL,
    victoria BOOLEAN NOT NULL,
    CONSTRAINT partidas_FK1 FOREIGN KEY (usuario) 
        REFERENCES usuarios(id) ON DELETE CASCADE
);

-- datos de prueba
INSERT INTO usuarios(nombre, pass) VALUES('jaime', '12paswd');
INSERT INTO usuarios(nombre, pass) VALUES('jose', '12paswd');
INSERT INTO usuarios(nombre, pass) VALUES('maria', '12paswd');

INSERT INTO partidas(usuario, victoria) VALUES(1, 1);
INSERT INTO partidas(usuario, victoria) VALUES(1, 0);
INSERT INTO partidas(usuario, victoria) VALUES(2, 0);
INSERT INTO partidas(usuario, victoria) VALUES(2, 0);
INSERT INTO partidas(usuario, victoria) VALUES(3, 1);
INSERT INTO partidas(usuario, victoria) VALUES(3, 1);
INSERT INTO partidas(usuario, victoria) VALUES(1, 1);
INSERT INTO partidas(usuario, victoria) VALUES(1, 0);
INSERT INTO partidas(usuario, victoria) VALUES(2, 1);
INSERT INTO partidas(usuario, victoria) VALUES(2, 0);
INSERT INTO partidas(usuario, victoria) VALUES(3, 1);
INSERT INTO partidas(usuario, victoria) VALUES(3, 1);
