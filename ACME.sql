-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.38-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para acme
CREATE DATABASE IF NOT EXISTS `acme` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `acme`;

-- Volcando estructura para tabla acme.tbl_conductor
CREATE TABLE IF NOT EXISTS `tbl_conductor` (
  `idtbl_conductor` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del propietario del vehiculo',
  `nuero_cedula` varchar(10) NOT NULL COMMENT 'Numero de cedula del propietario',
  `primer_nombre` varchar(60) NOT NULL COMMENT 'Primer nombre del propietario',
  `segundo_nombre` varchar(60) DEFAULT NULL COMMENT 'Segundo nombre del propietario',
  `apellidos` varchar(120) NOT NULL COMMENT 'Apellidos del propietario',
  `direccion` varchar(120) NOT NULL COMMENT 'Direccion de residencia del propietario',
  `telefono` varchar(10) NOT NULL COMMENT 'Telefono de residencia del propietario',
  `Ciudad` varchar(50) NOT NULL COMMENT 'Ciudad de recidencia del propietario',
  PRIMARY KEY (`idtbl_conductor`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla acme.tbl_propietario
CREATE TABLE IF NOT EXISTS `tbl_propietario` (
  `idtbl_propietario` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identificador del propietario del vehiculo',
  `nuero_cedula` varchar(10) NOT NULL COMMENT 'Numero de cedula del propietario',
  `primer_nombre` varchar(60) NOT NULL COMMENT 'Primer nombre del propietario',
  `segundo_nombre` varchar(60) DEFAULT NULL COMMENT 'Segundo nombre del propietario',
  `apellidos` varchar(120) NOT NULL COMMENT 'Apellidos del propietario',
  `direccion` varchar(120) NOT NULL COMMENT 'Direccion de residencia del propietario',
  `telefono` varchar(10) NOT NULL COMMENT 'Telefono de residencia del propietario',
  `Ciudad` varchar(50) NOT NULL COMMENT 'Ciudad de recidencia del propietario',
  PRIMARY KEY (`idtbl_propietario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para tabla acme.tbl_vehiculos
CREATE TABLE IF NOT EXISTS `tbl_vehiculos` (
  `idtbl_vehiculos` int(11) NOT NULL AUTO_INCREMENT COMMENT ' Identificador del propietario del vehiculo',
  `placa` varchar(10) NOT NULL COMMENT 'Numero de cedula del propietario',
  `marca` varchar(60) NOT NULL COMMENT 'Primer nombre del propietario',
  `tipo_vehiculo` enum('PARTICULAR','PUBLICO') NOT NULL COMMENT 'Segundo nombre del propietario',
  `conductor` int(11) NOT NULL COMMENT 'Apellidos del propietario',
  `propietario` int(11) NOT NULL COMMENT 'Direccion de residencia del propietario',
  PRIMARY KEY (`idtbl_vehiculos`),
  UNIQUE KEY `placa` (`placa`),
  KEY `Propietario` (`propietario`),
  KEY `Conductor` (`conductor`),
  CONSTRAINT `Conductor` FOREIGN KEY (`conductor`) REFERENCES `tbl_conductor` (`idtbl_conductor`),
  CONSTRAINT `Propietario` FOREIGN KEY (`propietario`) REFERENCES `tbl_propietario` (`idtbl_propietario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.
-- Volcando estructura para vista acme.vs_vehiculos
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vs_vehiculos` (
	`idtbl_vehiculos` INT(11) NOT NULL COMMENT ' Identificador del propietario del vehiculo',
	`placa` VARCHAR(10) NOT NULL COMMENT 'Numero de cedula del propietario' COLLATE 'utf8_general_ci',
	`marca` VARCHAR(60) NOT NULL COMMENT 'Primer nombre del propietario' COLLATE 'utf8_general_ci',
	`tipo_vehiculo` ENUM('PARTICULAR','PUBLICO') NOT NULL COMMENT 'Segundo nombre del propietario' COLLATE 'utf8_general_ci',
	`conductor` VARCHAR(242) NULL COLLATE 'utf8_general_ci',
	`propietario` VARCHAR(242) NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;

-- Volcando estructura para vista acme.vs_vehiculos
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vs_vehiculos`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vs_vehiculos` AS SELECT  
A.idtbl_vehiculos AS idtbl_vehiculos,
A.placa AS placa,
A.marca AS marca,
A.tipo_vehiculo AS tipo_vehiculo,
CONCAT_WS(' ',B.primer_nombre,B.segundo_nombre,B.apellidos) AS conductor,
CONCAT_WS(' ',C.primer_nombre,C.segundo_nombre,C.apellidos) AS propietario
FROM acme.tbl_vehiculos A
INNER JOIN acme.tbl_conductor B ON(A.conductor=B.idtbl_conductor)
INNER JOIN acme.tbl_propietario C ON(A.propietario=C.idtbl_propietario) ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
