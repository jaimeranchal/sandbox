DROP DATABASE IF EXISTS pruebaud2;
CREATE DATABASE pruebaud2 character set utf8 collate utf8_general_ci;
-- Si esto falla
-- ALTER DATABASE dbname CHARACTER SET utf8 COLLATE utf8_general_ci;
USE pruebaud2;

create table libros(
    ISBN varchar(20),
    titulo varchar(50) not null,
    autor varchar(30) not null,
    editorial varchar(20),
    edicion year,
    fecha year, 
    CONSTRAINT PK_libros PRIMARY KEY (ISBN)
);
 /* La fecha suele ser el año para los libros,  
    de modo que escojo este tipo en lugar de DATE */

 /* Valores de prueba */
insert into libros values(
    '9788497700139',
    'El Principito',
    'Antoine de Saint-Exupery',
    'Editora Latinoamericana',
    '1998',
    '1942'
);
insert into libros values(
    '9788445071410',
    'El Hobbit',
    'J.R.R. Tolkien',
    'Minotauro',
    '2002',
    '1937'
);
insert into libros values(
    '9788486587215',
    'Federico García Lorca, Antología Comentada',
    'Eutimio Martín',
    'Ediciones de la Torre',
    '1997',
    '1989'
);
