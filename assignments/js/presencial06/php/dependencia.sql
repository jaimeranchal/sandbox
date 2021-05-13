

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

DROP SCHEMA IF EXISTS dependencia;

-- -----------------------------------------------------
-- 
-- -----------------------------------------------------
CREATE SCHEMA dependencia DEFAULT CHARACTER SET utf8;
USE dependencia;

-- --------------------------------------------------------
--
-- Estructura de tabla para la tabla `beneficiarios`
--

CREATE TABLE IF NOT EXISTS `beneficiarios` (
  `idBenef` varchar(5) NOT NULL,
  `apellidosNombre` varchar(50) NOT NULL,
  `codigoPostal` varchar(5)  NOT NULL,
  `prioridad` varchar(1)  NOT NULL,
  `fechaInicio` date  NOT NULL,
  `fechaFinal` date  NOT NULL,
  PRIMARY KEY (`idBenef`)
) ENGINE=InnoDB DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;




-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistentes`
--

CREATE TABLE IF NOT EXISTS `asistentes` (
  `idAsistente` varchar(5) NOT NULL,
  `apellidosNombre` varchar(50) NOT NULL,
  `CPInfluencia` varchar(5) NOT NULL,
  
     PRIMARY KEY (`idAsistente`)
)ENGINE=InnoDB DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;



-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `idTarea` smallint(5) unsigned NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `tiempo` smallint(1) unsigned NOT NULL NOT NULL,
  PRIMARY KEY (`idTarea`)
  ) ENGINE=InnoDB DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;


--
-- Estructura de tabla para la tabla `prestacionesBene`
--

CREATE TABLE IF NOT EXISTS `prestacionesBene` (
  `idBenef` varchar(5) NOT NULL,
   `idTarea` smallint(5) unsigned NOT NULL,
  PRIMARY KEY (`idBenef`, `idTarea`)
  ) ENGINE=InnoDB DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;


--
-- Estructura de tabla para la tabla `asignacionTareas`
--

CREATE TABLE IF NOT EXISTS `asignacionTareas` (
  
  `idBenef` varchar(5) NOT NULL,
  `idAsistente` varchar(5) NOT NULL,
  `idTarea` smallint(5) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `cdgUsr` varchar(6) NOT NULL,
 
  PRIMARY KEY (`idBenef`, `idAsistente`,`idTarea`,`fecha`)
  ) ENGINE=InnoDB DEFAULT CHARACTER SET latin1 COLLATE latin1_spanish_ci;


-- Volcado de datos para la tabla `beneficiarios`
--


INSERT INTO `beneficiarios` (`idBenef`, `apellidosNombre`, `codigoPostal`,`prioridad`, `fechaInicio`, `fechaFinal`) VALUES
("00001", "ALBEROLA ROJAS, Javier", "14011",3, "2021-01-19", "2021-04-19"),
("00005", "CUADRA FERNÁNDEZ, Guillermo", "14001",2, "2021-02-23", "2021-06-23"),
("00006", "CORDERO VEGA, Adrián", "14001",1, "2021-05-23", "2021-07-23"),
("00010", "DE BURGOS BENGOETXEA, Ricardo", "14009",4, "2021-04-01", "2021-07-01"),
("00019", "SÁNCHEZ MARTÍNEZ, José María", "14011",5, "2021-03-01", "2021-08-01"),
("00002", "DEL CERRO GRANDE, Carlos", "14009",2, "2021-05-01", "2021-06-02"),
("00013", "ESTRADA FERNÁNDEZ, Xavier", "14009",3, "2021-03-01", "2021-06-23"),
("00003", "GIL MANZANO, Jesús", "14011",2, "2021-02-02", "2021-06-23"),
("00014", "GONZÁLEZ FUERTES, Pablo ", "14001",3, "2021-02-23", "2021-07-23"),
("00004", "GONZÁLEZ GONZÁLEZ, José Luis", "14010",5, "2021-02-23", "2021-06-23"),
("00015", "HERNÁNDEZ HERNÁNDEZ, Alejandro", "14008",1, "2021-04-04", "2021-08-23"),
("00016", "PIZARRO GÓMEZ, Valentín", "14009",2, "2021-02-23", "2021-06-23"),
("00007", "MATEU LAHOZ, Antonio Miguel", "14008",3, "2021-02-23", "2021-06-23"),
("00018", "PRIETO IGLESIAS, Eduardo", "14001",2, "2021-02-23", "2021-06-23"),
("00008", "JAIME LATRE, Santiago", "14009",2, "2021-05-01", "2021-06-02"),
("00009", "MARTÍNEZ MUNUERA, Juan", "14008",3, "2021-03-01", "2021-06-23"),
("00011", "MEDIÉ JIMÉNEZ, David","14011",5, "2021-03-01", "2021-08-01"),
("00017", "MUNUERA MONTERO, José Luis","14008",3, "2021-03-01", "2021-06-23"),
("00020", "MELERO LÓPEZ, Mario", "14008",3, "2021-02-23", "2021-06-23"),
("00012", "SOTO GRADO, César","14011",5, "2021-03-01", "2021-08-01");

--
-- Volcado de datos para la tabla `asistentes`
--

INSERT INTO `asistentes` (`idAsistente`, `apellidosNombre`, `CPInfluencia`) VALUES
("0001", "Castro Romero, Ana", "14011"),
("0002", "Vigo Roel, Mauricio", "14001"),
("0003", "Peñalver Zamora, Josefa", "14010"),
("0004", "Muñoz Torres, Manuel", "14001"),
("0005", "Zamora Rodríguez", "14009"),
("0006", "Sánchez Cano, Laura", "14008"),
("0007", "Adamuz Ortega, Juan", "14011"),
("0008", "Pérez Rosa, Luis", "14009"),
("0009", "Cruz Redondo, María", "14010"),
("0010", "Torres Parada, Juana", "14008"),
("0011", "Villarta Jaén, Ana", "14011"),
("0012", "Cantarero Muñoz, Pedro", "14009"),
("0013", "Torrejón Muñoz, Natalia", "14011"),
("0014", "López López, León", "14008"),
("0015", "Bascón Rodríguez, Sebastian", "14001"),
("0016", "Peñalver Zarco, Fco.", "14009"),
("0017", "Zacarias Barranco, Ángel", "14008"),
("0018", "Lillo Sánchez, Victoria", "14001"),
("0019", "Leal Cantos, Miguel", "14009"),
("0020", "Bascuñana López, Pilar", "14011");


 
INSERT INTO `tareas` (`idTarea`, `descripcion`,`tiempo`) VALUES
(1, "Vestir", 1),
(2, "Dar de comer", 2),
(3, "Dar de desayunar", 1),
(4, "Acompañamiento diario", 8),
(5, "Acompañamiento nocturno", 8),
(6, "Dar de cenar", 2),
(7, "Limpieza casa", 3);




INSERT INTO `prestacionesBene` (`idBenef`, `idTarea`) VALUES
("00001", 1),
("00001", 7),
("00001", 8),
("00005", 2),
("00005", 3),
("00005", 4),
("00006", 1),
("00007", 1),
("00007", 3),
("00006", 6),
("00010", 2),
("00010", 3),
("00010", 4),
("00019", 6),
("00019", 5),
("00002", 2),
("00002", 3),
("00002", 4),
("00013", 1),
("00013", 7),
("00003", 8),
("00014", 8),
("00014", 1),
("00004", 2),
("00004", 3),
("00004", 4),
("00015", 1),
("00015", 8),
("00016", 1),
("00016", 2),
("00016", 3),
("00016", 4),
("00007", 8),
("00018", 1),
("00018", 8),
("00008", 4),
("00008", 5),
("00009", 6),
("00009", 7),
("00009", 1),
("00011", 4),
("00011", 5),
("00011", 6),
("00011", 7),
("00017",1),
("00017",2),
("00017",4),
("00020", 3),
("00020", 4),
("00020", 5),
("00012", 2),
("00012", 3);
