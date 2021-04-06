DROP DATABASE IF EXISTS academia;
CREATE DATABASE academia;

DROP TABLE IF EXISTS usuarios;

CREATE TABLE usuarios (
  id SERIAL,
  nombre VARCHAR(8),
  pass VARCHAR(8),
  tipo CHAR(1),
  CONSTRAINT UC_usuarios UNIQUE (nombre),
  CONSTRAINT PK_usuarios UNIQUE (id)
);

INSERT INTO usuarios(nombre,pass,tipo) VALUES ('jaime', '1234', 'a');
INSERT INTO usuarios(nombre,pass,tipo) VALUES ('pepe', '4321', 'e');
INSERT INTO usuarios(nombre,pass,tipo) VALUES ('belen', '4321', 'e');
INSERT INTO usuarios(nombre,pass,tipo) VALUES ('pedro', 'abcd', 'e');				   
