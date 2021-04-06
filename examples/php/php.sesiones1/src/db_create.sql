DROP DATABASE IF EXISTS ejemplo_4;
CREATE DATABASE ejemplo_4;

DROP TABLE IF EXISTS usuario;

CREATE TABLE usuario (
  id SERIAL,
  username VARCHAR(8),
  password VARCHAR(8),
  tipo CHAR(1),
  CONSTRAINT UC_usuario UNIQUE (username)
);

INSERT INTO usuario(username,password,tipo) VALUES ('nacho', '1234', 'a');
INSERT INTO usuario(username,password,tipo) VALUES ('pepe', '4321', 'e');
INSERT INTO usuario(username,password,tipo) VALUES ('pedro', 'abcd', 'e');				   