-- mispc
DROP TABLE IF EXISTS ordenador;
DROP TABLE IF EXISTS usuario;

CREATE TABLE usuario (
    id INT,
    username VARCHAR(8),
    password VARCHAR(8),
	CONSTRAINT PK_Usuario PRIMARY KEY (id)
);

CREATE TABLE ordenador (
    id INT,
    cpu VARCHAR(8),
    ram INT,
	ssd INT,
	id_usuario INT,
	CONSTRAINT PK_Ordenador PRIMARY KEY (id),
	CONSTRAINT FK_OrdUsu FOREIGN KEY (id_usuario) REFERENCES usuario(id)
);

INSERT INTO usuario VALUES ('1', 'nacho', '1234');
INSERT INTO ordenador VALUES ('1', 'Core i7', '8', '512', '1');
INSERT INTO ordenador VALUES ('2', 'Core i5', '4', '256', '1');