-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.5-10.1.22-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             8.1.0.4655
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para bd_cambios
CREATE DATABASE IF NOT EXISTS `bd_cambios` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `bd_cambios`;


-- Volcando estructura para tabla bd_cambios.sgcsatatasignartarea
CREATE TABLE IF NOT EXISTS `sgcsatatasignartarea` (
  `ATAid` int(10) NOT NULL AUTO_INCREMENT,
  `PROcodigo` int(11) DEFAULT NULL,
  `PENid` int(10) NOT NULL,
  `PEQid` int(10) DEFAULT NULL,
  `ATAresponsable` int(10) NOT NULL,
  `ATAnombre` varchar(150) CHARACTER SET utf8 NOT NULL,
  `ATAdescripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `ATAprogreso` int(3) NOT NULL,
  `ATAfechaInicio` date NOT NULL,
  `ATAfechaFin` date NOT NULL,
  `ATAestado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ATAid`),
  KEY `FK_sgcsatatasignartarea_sgcspeqtproyectoequipo` (`PEQid`),
  KEY `FK_sgcsatatasignartarea_sgcspentproyectoentregable` (`PENid`),
  CONSTRAINT `FK_sgcsatatasignartarea_sgcspentproyectoentregable` FOREIGN KEY (`PENid`) REFERENCES `sgcspentproyectoentregable` (`PENid`),
  CONSTRAINT `FK_sgcsatatasignartarea_sgcspeqtproyectoequipo` FOREIGN KEY (`PEQid`) REFERENCES `sgcspeqtproyectoequipo` (`PEQid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bd_cambios.sgcsatatasignartarea: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsatatasignartarea` DISABLE KEYS */;
INSERT INTO `sgcsatatasignartarea` (`ATAid`, `PROcodigo`, `PENid`, `PEQid`, `ATAresponsable`, `ATAnombre`, `ATAdescripcion`, `ATAprogreso`, `ATAfechaInicio`, `ATAfechaFin`, `ATAestado`) VALUES
	(1, NULL, 1, NULL, 3, 'Tarea1', '---', 100, '2017-06-06', '2017-06-12', 'F'),
	(2, NULL, 1, NULL, 7, 'Tarea2', '---', 100, '2017-06-06', '2017-06-06', 'F'),
	(3, NULL, 9, NULL, 6, 'Tarea1', '---', 0, '2017-06-14', '2017-06-14', 'C'),
	(4, NULL, 1, NULL, 6, 'Tarea3', '---', 0, '2017-05-30', '2017-05-30', 'C');
/*!40000 ALTER TABLE `sgcsatatasignartarea` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcscampcambios
CREATE TABLE IF NOT EXISTS `sgcscampcambios` (
  `CAMcodigo` int(9) NOT NULL,
  `PRYcodigo` int(4) NOT NULL,
  `USUcodigo` int(9) NOT NULL,
  `CAMdescripcion` varchar(500) CHARACTER SET latin1 NOT NULL,
  `CAMobservacion` varchar(500) CHARACTER SET latin1 NOT NULL,
  `CAMrespuesta` varchar(500) CHARACTER SET latin1 NOT NULL,
  `CAMestado` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`CAMcodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bd_cambios.sgcscampcambios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcscampcambios` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgcscampcambios` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcsenttentregable
CREATE TABLE IF NOT EXISTS `sgcsenttentregable` (
  `ENTid` int(10) NOT NULL AUTO_INCREMENT,
  `ETAid` int(10) NOT NULL,
  `ENTnombre` varchar(150) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ENTid`),
  KEY `FK_sgcsenttentregable_sgcsetatetapa` (`ETAid`),
  CONSTRAINT `FK_sgcsenttentregable_sgcsetatetapa` FOREIGN KEY (`ETAid`) REFERENCES `sgcsetatetapa` (`ETAid`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci CHECKSUM=1;

-- Volcando datos para la tabla bd_cambios.sgcsenttentregable: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsenttentregable` DISABLE KEYS */;
INSERT INTO `sgcsenttentregable` (`ENTid`, `ETAid`, `ENTnombre`) VALUES
	(1, 1, 'Entregable 1'),
	(2, 2, 'Entregable 1'),
	(3, 2, 'Entregable 2'),
	(4, 2, 'Entregable 3'),
	(5, 2, 'Entregable 4'),
	(6, 2, 'Entregable 5'),
	(7, 3, 'Entregable 1'),
	(8, 3, 'Entregable 2'),
	(9, 4, 'Entregable 1'),
	(10, 4, 'Entregable 2'),
	(11, 4, 'Entregable 3'),
	(12, 5, 'Entregable 1'),
	(13, 6, 'Entregable 1'),
	(14, 7, 'Entregable 1'),
	(15, 7, 'Entregable 2'),
	(16, 7, 'Entregable 3'),
	(17, 8, 'Entregable 1'),
	(18, 9, 'Entregable 1'),
	(19, 9, 'Entregable 2'),
	(20, 9, 'Entregable 3'),
	(21, 9, 'Entregable 4');
/*!40000 ALTER TABLE `sgcsenttentregable` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcsesptespecialidad
CREATE TABLE IF NOT EXISTS `sgcsesptespecialidad` (
  `ESPid` int(10) NOT NULL AUTO_INCREMENT,
  `ESPnombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ESPdescripcion` varchar(350) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`ESPid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bd_cambios.sgcsesptespecialidad: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsesptespecialidad` DISABLE KEYS */;
INSERT INTO `sgcsesptespecialidad` (`ESPid`, `ESPnombre`, `ESPdescripcion`) VALUES
	(1, 'Cliente', '---'),
	(2, 'Gestion de Proyectos', '---'),
	(3, 'Programador', '---'),
	(4, 'Gestor Base de Datos', '---'),
	(5, 'Testing', '---'),
	(6, 'Auditor', '---'),
	(7, 'Administrador', '---');
/*!40000 ALTER TABLE `sgcsesptespecialidad` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcsetatetapa
CREATE TABLE IF NOT EXISTS `sgcsetatetapa` (
  `ETAid` int(10) NOT NULL AUTO_INCREMENT,
  `METid` int(10) NOT NULL,
  `ETAnombre` varchar(150) CHARACTER SET latin1 NOT NULL,
  `ETAdescripcion` varchar(350) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`ETAid`),
  KEY `FK_sgcsetptetapa_sgcsmetpmetodologia` (`METid`),
  CONSTRAINT `FK_sgcsetptetapa_sgcsmetpmetodologia` FOREIGN KEY (`METid`) REFERENCES `sgcsmetpmetodologia` (`METid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bd_cambios.sgcsetatetapa: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsetatetapa` DISABLE KEYS */;
INSERT INTO `sgcsetatetapa` (`ETAid`, `METid`, `ETAnombre`, `ETAdescripcion`) VALUES
	(1, 1, 'Inicio', '---'),
	(2, 1, 'Analisis', '---'),
	(3, 1, 'Diseño', '---'),
	(4, 1, 'Construccion', '---'),
	(5, 1, 'Pruebas', '---'),
	(6, 2, 'Inicio', '---'),
	(7, 2, 'Desarrollo', '---'),
	(8, 3, 'Inicio', '---'),
	(9, 3, 'Desarrollo', '---');
/*!40000 ALTER TABLE `sgcsetatetapa` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcsmetpmetodologia
CREATE TABLE IF NOT EXISTS `sgcsmetpmetodologia` (
  `METid` int(10) NOT NULL AUTO_INCREMENT,
  `METnombre` varchar(150) CHARACTER SET latin1 NOT NULL,
  `METdescripcion` varchar(500) CHARACTER SET latin1 DEFAULT '---',
  PRIMARY KEY (`METid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bd_cambios.sgcsmetpmetodologia: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsmetpmetodologia` DISABLE KEYS */;
INSERT INTO `sgcsmetpmetodologia` (`METid`, `METnombre`, `METdescripcion`) VALUES
	(1, 'RUP', '---'),
	(2, 'XP', '---'),
	(3, 'SCRUM', '---  ');
/*!40000 ALTER TABLE `sgcsmetpmetodologia` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcspentproyectoentregable
CREATE TABLE IF NOT EXISTS `sgcspentproyectoentregable` (
  `PENid` int(10) NOT NULL AUTO_INCREMENT,
  `PROcodigo` int(10) NOT NULL,
  `ENTid` int(10) NOT NULL,
  `PEQid` int(10) DEFAULT NULL,
  `PENresponsable` int(10) DEFAULT NULL,
  `PENfechaInicio` date DEFAULT NULL,
  `PENfechaFin` date DEFAULT NULL,
  `PENenlace` varchar(400) DEFAULT NULL,
  `PENestado` varchar(1) NOT NULL,
  `PENactivo` varchar(2) DEFAULT NULL,
  `PENprogreso` int(3) DEFAULT '0',
  PRIMARY KEY (`PENid`),
  KEY `FK_sgcspentproyectoentregable_sgcspropproyecto` (`PROcodigo`),
  KEY `FK_sgcspentproyectoentregable_sgcsenttentregable` (`ENTid`),
  KEY `FK_sgcspentproyectoentregable_sgcspeqtproyectoequipo` (`PEQid`),
  CONSTRAINT `FK_sgcspentproyectoentregable_sgcsenttentregable` FOREIGN KEY (`ENTid`) REFERENCES `sgcsenttentregable` (`ENTid`),
  CONSTRAINT `FK_sgcspentproyectoentregable_sgcspeqtproyectoequipo` FOREIGN KEY (`PEQid`) REFERENCES `sgcspeqtproyectoequipo` (`PEQid`),
  CONSTRAINT `FK_sgcspentproyectoentregable_sgcspropproyecto` FOREIGN KEY (`PROcodigo`) REFERENCES `sgcspropproyecto` (`PROcodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla bd_cambios.sgcspentproyectoentregable: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcspentproyectoentregable` DISABLE KEYS */;
INSERT INTO `sgcspentproyectoentregable` (`PENid`, `PROcodigo`, `ENTid`, `PEQid`, `PENresponsable`, `PENfechaInicio`, `PENfechaFin`, `PENenlace`, `PENestado`, `PENactivo`, `PENprogreso`) VALUES
	(1, 6, 1, NULL, 7, '2017-06-05', '2017-06-27', 'url', 'C', 'SI', 0),
	(2, 6, 2, NULL, NULL, NULL, NULL, NULL, 'C', 'SI', NULL),
	(3, 6, 3, NULL, NULL, NULL, NULL, NULL, 'C', 'SI', NULL),
	(4, 6, 4, NULL, NULL, NULL, NULL, NULL, 'C', 'SI', NULL),
	(5, 6, 7, NULL, NULL, NULL, NULL, NULL, 'C', 'SI', NULL),
	(6, 6, 9, NULL, NULL, NULL, NULL, NULL, 'C', 'SI', NULL),
	(7, 6, 1, NULL, NULL, NULL, NULL, NULL, 'C', 'SI', NULL),
	(8, 6, 1, NULL, NULL, NULL, NULL, NULL, 'C', 'SI', NULL),
	(9, 1, 1, NULL, 6, '2017-06-20', '2017-06-27', 'url', 'C', 'SI', 0),
	(10, 1, 2, NULL, NULL, NULL, NULL, NULL, 'C', NULL, NULL),
	(11, 1, 3, NULL, NULL, NULL, NULL, NULL, 'C', NULL, NULL),
	(12, 1, 6, NULL, NULL, NULL, NULL, NULL, 'C', NULL, NULL),
	(13, 1, 7, NULL, NULL, NULL, NULL, NULL, 'C', NULL, NULL),
	(14, 1, 9, NULL, NULL, NULL, NULL, NULL, 'C', NULL, NULL),
	(15, 1, 10, NULL, NULL, NULL, NULL, NULL, 'C', NULL, NULL);
/*!40000 ALTER TABLE `sgcspentproyectoentregable` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcspeqtproyectoequipo
CREATE TABLE IF NOT EXISTS `sgcspeqtproyectoequipo` (
  `PEQid` int(10) NOT NULL AUTO_INCREMENT,
  `PROcodigo` int(10) NOT NULL,
  `USUcodigo` int(10) NOT NULL,
  `ROLid` int(10) NOT NULL,
  `PEQestado` varchar(1) NOT NULL,
  PRIMARY KEY (`PEQid`),
  KEY `FK_sgcspeqtproyectoequipo_sgcspropproyecto` (`PROcodigo`),
  KEY `FK_sgcspeqtproyectoequipo_sgcsusutusuario` (`USUcodigo`),
  KEY `FK_sgcspeqtproyectoequipo_sgcsroltrol` (`ROLid`),
  CONSTRAINT `FK_sgcspeqtproyectoequipo_sgcspropproyecto` FOREIGN KEY (`PROcodigo`) REFERENCES `sgcspropproyecto` (`PROcodigo`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_sgcspeqtproyectoequipo_sgcsroltrol` FOREIGN KEY (`ROLid`) REFERENCES `sgcsroltrol` (`ROLid`),
  CONSTRAINT `FK_sgcspeqtproyectoequipo_sgcsusutusuario` FOREIGN KEY (`USUcodigo`) REFERENCES `sgcsusutusuario` (`USUcodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla bd_cambios.sgcspeqtproyectoequipo: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcspeqtproyectoequipo` DISABLE KEYS */;
INSERT INTO `sgcspeqtproyectoequipo` (`PEQid`, `PROcodigo`, `USUcodigo`, `ROLid`, `PEQestado`) VALUES
	(1, 1, 4, 2, 'A'),
	(2, 2, 2, 2, 'A'),
	(3, 3, 5, 2, 'A'),
	(4, 1, 5, 4, 'A'),
	(5, 1, 6, 4, 'A'),
	(6, 4, 6, 2, 'A'),
	(7, 5, 3, 2, 'A'),
	(9, 6, 5, 2, 'A'),
	(10, 6, 3, 3, 'A'),
	(11, 6, 7, 5, 'A'),
	(12, 6, 6, 6, 'A');
/*!40000 ALTER TABLE `sgcspeqtproyectoequipo` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcsprepproyectorevision
CREATE TABLE IF NOT EXISTS `sgcsprepproyectorevision` (
  `PREid` int(10) NOT NULL AUTO_INCREMENT,
  `REVid` int(10) NOT NULL,
  PRIMARY KEY (`PREid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_cambios.sgcsprepproyectorevision: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsprepproyectorevision` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgcsprepproyectorevision` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcspropproyecto
CREATE TABLE IF NOT EXISTS `sgcspropproyecto` (
  `PROcodigo` int(10) NOT NULL AUTO_INCREMENT,
  `METid` int(10) NOT NULL,
  `USUcodigo` int(10) NOT NULL,
  `PROcliente` int(10) NOT NULL,
  `PROnombre` varchar(150) NOT NULL,
  `PROdescripcion` varchar(300) DEFAULT '---',
  `PROfechaInicio` date NOT NULL,
  `PROfechaFin` date NOT NULL,
  `PROestado` varchar(2) NOT NULL,
  PRIMARY KEY (`PROcodigo`),
  KEY `FK_sgcspropproyecto_sgcsmetpmetodologia` (`METid`),
  KEY `FK_sgcspropproyecto_sgcsusutusuario` (`USUcodigo`),
  CONSTRAINT `FK_sgcspropproyecto_sgcsmetpmetodologia` FOREIGN KEY (`METid`) REFERENCES `sgcsmetpmetodologia` (`METid`),
  CONSTRAINT `FK_sgcspropproyecto_sgcsusutusuario` FOREIGN KEY (`USUcodigo`) REFERENCES `sgcsusutusuario` (`USUcodigo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 CHECKSUM=1 ROW_FORMAT=DYNAMIC;

-- Volcando datos para la tabla bd_cambios.sgcspropproyecto: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcspropproyecto` DISABLE KEYS */;
INSERT INTO `sgcspropproyecto` (`PROcodigo`, `METid`, `USUcodigo`, `PROcliente`, `PROnombre`, `PROdescripcion`, `PROfechaInicio`, `PROfechaFin`, `PROestado`) VALUES
	(1, 1, 4, 8, 'Sistema Sustentacion de Tesis de la UPT', '---', '2017-01-01', '2017-03-01', 'S'),
	(2, 1, 7, 8, 'Sistema de Control Domotica', '---', '2017-01-02', '2017-02-01', 'S'),
	(3, 2, 5, 8, 'Sistema de Tramite Documentaria', '---', '2017-01-05', '2017-04-01', 'S'),
	(4, 2, 2, 8, 'Sistema de Asistencia UPT', '---', '2017-02-04', '2017-05-21', 'S'),
	(5, 1, 3, 8, 'Sistema de Asistencia EPS', 'Proyecto realizado para la empresa de EPS Tacna.', '2017-02-07', '2017-02-25', 'S'),
	(6, 1, 5, 11, 'Proyecto de Investigación Prueba', 'Ninguno', '2017-05-22', '2017-05-22', 'S');
/*!40000 ALTER TABLE `sgcspropproyecto` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcspvetproyectoversion
CREATE TABLE IF NOT EXISTS `sgcspvetproyectoversion` (
  `PVEid` int(10) NOT NULL AUTO_INCREMENT,
  `VERid` int(10) NOT NULL,
  PRIMARY KEY (`PVEid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_cambios.sgcspvetproyectoversion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcspvetproyectoversion` DISABLE KEYS */;
/*!40000 ALTER TABLE `sgcspvetproyectoversion` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcsrevprevision
CREATE TABLE IF NOT EXISTS `sgcsrevprevision` (
  `REVid` int(10) NOT NULL AUTO_INCREMENT,
  `ENTid` int(10) NOT NULL,
  `REVnombre` varchar(150) NOT NULL,
  `REVmotivo` varchar(350) NOT NULL,
  `REVenlace` varchar(300) NOT NULL,
  `REVpredecesor` varchar(150) NOT NULL,
  `REVfecha` date NOT NULL,
  `REVresponsable` int(10) NOT NULL,
  `REVestado` varchar(1) NOT NULL,
  PRIMARY KEY (`REVid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla bd_cambios.sgcsrevprevision: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsrevprevision` DISABLE KEYS */;
INSERT INTO `sgcsrevprevision` (`REVid`, `ENTid`, `REVnombre`, `REVmotivo`, `REVenlace`, `REVpredecesor`, `REVfecha`, `REVresponsable`, `REVestado`) VALUES
	(1, 1, 'Revision 1', 'Terminado por todo', '', '', '0000-00-00', 0, 'P');
/*!40000 ALTER TABLE `sgcsrevprevision` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcsroltrol
CREATE TABLE IF NOT EXISTS `sgcsroltrol` (
  `ROLid` int(10) NOT NULL AUTO_INCREMENT,
  `ROLnombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `ROLdescripcion` varchar(150) CHARACTER SET utf8 DEFAULT '---',
  `ROLestado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ROLid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bd_cambios.sgcsroltrol: ~7 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsroltrol` DISABLE KEYS */;
INSERT INTO `sgcsroltrol` (`ROLid`, `ROLnombre`, `ROLdescripcion`, `ROLestado`) VALUES
	(1, 'Administrador', '---', 'A'),
	(2, 'Jefe de Proyecto', '---', 'A'),
	(3, 'Desarrollador', '---', 'A'),
	(4, 'Analista', '---', 'A'),
	(5, 'Diseñador', '---', 'A'),
	(6, 'Tester', '---', 'A'),
	(7, 'Cliente', '---', 'A');
/*!40000 ALTER TABLE `sgcsroltrol` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcstusttipousuario
CREATE TABLE IF NOT EXISTS `sgcstusttipousuario` (
  `TUSid` int(10) NOT NULL AUTO_INCREMENT,
  `TUSnombre` varchar(50) CHARACTER SET utf8 NOT NULL,
  `TUSdescripcion` varchar(150) CHARACTER SET utf8 DEFAULT '---',
  PRIMARY KEY (`TUSid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bd_cambios.sgcstusttipousuario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcstusttipousuario` DISABLE KEYS */;
INSERT INTO `sgcstusttipousuario` (`TUSid`, `TUSnombre`, `TUSdescripcion`) VALUES
	(1, 'Admin', '---'),
	(2, 'Staf', '---'),
	(3, 'Cliente', '---');
/*!40000 ALTER TABLE `sgcstusttipousuario` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcsusutusuario
CREATE TABLE IF NOT EXISTS `sgcsusutusuario` (
  `USUcodigo` int(10) NOT NULL AUTO_INCREMENT,
  `TUSid` int(10) NOT NULL,
  `ESPid` int(10) NOT NULL,
  `USUnombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `USUapellido` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `USUtelefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `USUdniruc` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `USUcorreo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `USUusuario` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `USUclave` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `USUestado` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `USUfechaNacimiento` date NOT NULL,
  `USUempresa` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`USUcodigo`),
  KEY `FK_tb_usuario_tb_tipo_usuario` (`TUSid`),
  KEY `FK_sgcsusutusuario_sgcsesptespecialidad` (`ESPid`),
  CONSTRAINT `FK_sgcsusutusuario_sgcsesptespecialidad` FOREIGN KEY (`ESPid`) REFERENCES `sgcsesptespecialidad` (`ESPid`),
  CONSTRAINT `FK_sgcsusutusuario_sgcstusttipousuario` FOREIGN KEY (`TUSid`) REFERENCES `sgcstusttipousuario` (`TUSid`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bd_cambios.sgcsusutusuario: ~11 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsusutusuario` DISABLE KEYS */;
INSERT INTO `sgcsusutusuario` (`USUcodigo`, `TUSid`, `ESPid`, `USUnombre`, `USUapellido`, `USUtelefono`, `USUdniruc`, `USUcorreo`, `USUusuario`, `USUclave`, `USUestado`, `USUfechaNacimiento`, `USUempresa`) VALUES
	(1, 1, 7, 'Administrador', 'Admin', '952673634', '00000000', 'admin@hotmail.com', 'admin', '$2y$10$5ELrgaOs1xSy.rVIjl9Uue7qUFTsSm/jy5Y3b4xEi5bucOxmE3Qe6', 'A', '0000-00-00', 'Bee Technology'),
	(2, 2, 4, 'Edgar ', 'Carpio', '952673634', '24785774', 'edgar@hotmail.com', 'ecarpio', '$2y$10$5ELrgaOs1xSy.rVIjl9Uue7qUFTsSm/jy5Y3b4xEi5bucOxmE3Qe6', 'A', '1986-09-08', 'Bee Technology'),
	(3, 2, 3, 'Jimmy ', 'Aroquipa', '952006195', '24785774', 'Jimmy@hotmail.com', 'jaroquipa', '$2y$10$5ELrgaOs1xSy.rVIjl9Uue7qUFTsSm/jy5Y3b4xEi5bucOxmE3Qe6', 'A', '1985-02-06', 'Bee Technology'),
	(4, 2, 2, 'Henry ', 'Guido', '952673634', '24785774', 'Raul@hotmail.com', 'hguido', '$2y$10$5ELrgaOs1xSy.rVIjl9Uue7qUFTsSm/jy5Y3b4xEi5bucOxmE3Qe6', 'A', '1992-03-05', 'Bee Technology'),
	(5, 2, 2, 'Mauricio ', 'Garcia', '952673634', '24785774', 'Desarrollador@hotmail.com', 'mgarcia', '$2y$10$5ELrgaOs1xSy.rVIjl9Uue7qUFTsSm/jy5Y3b4xEi5bucOxmE3Qe6', 'A', '1986-09-08', 'Bee Technology'),
	(6, 2, 5, 'Edwin ', 'Condori', '952673634', '24785774', 'econdori@hotmail.com', 'econdori', '$2y$10$5ELrgaOs1xSy.rVIjl9Uue7qUFTsSm/jy5Y3b4xEi5bucOxmE3Qe6', 'A', '1989-09-19', 'Bee Technology'),
	(7, 2, 4, 'Juan ', 'Perez', '952673634', '24785774', 'Tester@hotmail.com', 'jperez', '$2y$10$5ELrgaOs1xSy.rVIjl9Uue7qUFTsSm/jy5Y3b4xEi5bucOxmE3Qe6', 'A', '1986-09-08', 'Bee Technology'),
	(8, 3, 1, 'UPT ', 'Tacna', '952673634', '20124745418', 'UPTTacna@hotmail.com', 'upttacna', '$2y$10$5ELrgaOs1xSy.rVIjl9Uue7qUFTsSm/jy5Y3b4xEi5bucOxmE3Qe6', 'A', '1986-09-08', 'UPT Tacna'),
	(9, 3, 1, 'EPS', 'Tacna', '952673634', '20478577450', 'EPSTacna@hotmail.com', 'epstacna', '$2y$10$5ELrgaOs1xSy.rVIjl9Uue7qUFTsSm/jy5Y3b4xEi5bucOxmE3Qe6', 'A', '1986-10-01', 'EPS Tacna'),
	(10, 2, 4, 'Ramon', 'Suarez Sanchez', '95415462', '45879631', 'suarez@hotmail.com', 'rsuarez', '123456', 'A', '2004-06-24', 'Bee Technology'),
	(11, 3, 1, 'Claro', 'SAC', '95415462', '45879631', 'claro@hotmail.com', 'clarosac', '$2y$10$.FarwYKrz3Q7R1QLTeRJt./iL9ee84QdrfGLLy1ekY8zLgt4Rfu5i', 'A', '2017-06-28', NULL);
/*!40000 ALTER TABLE `sgcsusutusuario` ENABLE KEYS */;


-- Volcando estructura para tabla bd_cambios.sgcsvertversion
CREATE TABLE IF NOT EXISTS `sgcsvertversion` (
  `VERid` int(9) NOT NULL AUTO_INCREMENT,
  `PROcodigo` int(4) NOT NULL,
  `ENTid` int(9) NOT NULL,
  `USUcodigo` int(9) NOT NULL,
  `VERversion` varchar(100) CHARACTER SET latin1 NOT NULL,
  `VERdescripcion` varchar(500) CHARACTER SET latin1 NOT NULL,
  `VERarchivo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `VERextencion` varchar(30) CHARACTER SET latin1 NOT NULL,
  `VERestado` varchar(30) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`VERid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla bd_cambios.sgcsvertversion: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `sgcsvertversion` DISABLE KEYS */;
INSERT INTO `sgcsvertversion` (`VERid`, `PROcodigo`, `ENTid`, `USUcodigo`, `VERversion`, `VERdescripcion`, `VERarchivo`, `VERextencion`, `VERestado`) VALUES
	(1, 2, 2, 4, '0', 'awqeqwewqewq', '2_02_103704.docx', '0', 'espera');
/*!40000 ALTER TABLE `sgcsvertversion` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
