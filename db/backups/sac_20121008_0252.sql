-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.1.63-0ubuntu0.11.10.1


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema sac_dev
--

CREATE DATABASE IF NOT EXISTS sac_dev;
USE sac_dev;

--
-- Definition of table `sac_dev`.`circuitos`
--

DROP TABLE IF EXISTS `sac_dev`.`circuitos`;
CREATE TABLE  `sac_dev`.`circuitos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`circuitos`
--

/*!40000 ALTER TABLE `circuitos` DISABLE KEYS */;
LOCK TABLES `circuitos` WRITE;
INSERT INTO `sac_dev`.`circuitos` VALUES  (1,'Circuito 1',1,'2012-08-23 17:43:22','2012-08-23 17:43:22'),
 (2,'Circuito 2',1,'2012-08-23 17:45:45','2012-08-23 17:45:45'),
 (3,'Circuito 3',1,'2012-08-23 17:46:03','2012-08-23 17:46:03'),
 (4,'Circuito 4',1,'2012-08-23 17:46:27','2012-08-23 17:46:27'),
 (5,'Circuito 5',1,'2012-08-23 17:46:57','2012-08-23 17:46:57');
UNLOCK TABLES;
/*!40000 ALTER TABLE `circuitos` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`departamentos`
--

DROP TABLE IF EXISTS `sac_dev`.`departamentos`;
CREATE TABLE  `sac_dev`.`departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `circuito_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departamentos_circuito_id` (`circuito_id`),
  CONSTRAINT `departamentos_circuito_id` FOREIGN KEY (`circuito_id`) REFERENCES `circuitos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`departamentos`
--

/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
LOCK TABLES `departamentos` WRITE;
INSERT INTO `sac_dev`.`departamentos` VALUES  (1,'Burruyacú',1,1,'2012-08-28 20:33:33','2012-08-28 22:33:33'),
 (2,'Capital',1,1,'2012-08-28 20:33:45','2012-08-28 22:33:45'),
 (3,'Chicligasta',1,1,'2012-08-28 20:34:06','2012-08-28 22:34:06'),
 (4,'Cruz Alta',1,1,'2012-08-28 20:34:17','2012-08-28 22:34:17'),
 (5,'Famaillá',1,1,'2012-08-28 20:34:27','2012-08-28 22:34:27'),
 (6,'Graneros',1,1,'2012-08-28 20:34:40','2012-08-28 22:34:40'),
 (7,'Juan Bautista Alberdi',1,1,'2012-08-28 20:35:07','2012-08-28 22:35:07'),
 (8,'La Cocha',1,1,'2012-08-28 20:35:20','2012-08-28 22:35:20'),
 (9,'Leales',1,1,'2012-08-28 20:35:32','2012-08-28 22:35:32'),
 (10,'Lules',1,1,'2012-08-28 20:35:42','2012-08-28 22:35:42'),
 (11,'Monteros',1,1,'2012-08-28 20:35:53','2012-08-28 22:35:53'),
 (12,'Río Chico',1,1,'2012-08-28 20:36:02','2012-08-28 22:36:02'),
 (13,'Simoca',1,1,'2012-08-28 20:36:11','2012-08-28 22:36:11'),
 (14,'Tafí del Valle',1,1,'2012-08-28 20:36:22','2012-08-28 22:36:22'),
 (15,'Tafí Viejo',1,1,'2012-08-28 20:36:31','2012-08-28 22:36:31'),
 (16,'Trancas',1,1,'2012-08-28 20:36:42','2012-08-28 22:36:42'),
 (17,'Yerba Buena',1,1,'2012-08-28 20:36:52','2012-08-28 22:36:52');
UNLOCK TABLES;
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`directores`
--

DROP TABLE IF EXISTS `sac_dev`.`directores`;
CREATE TABLE  `sac_dev`.`directores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(11) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `habilitado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`directores`
--

/*!40000 ALTER TABLE `directores` DISABLE KEYS */;
LOCK TABLES `directores` WRITE;
INSERT INTO `sac_dev`.`directores` VALUES  (1,33455225,'Giron','Marcos','3874955','giron@gmail.com',1,'2012-08-29 01:37:22','2012-08-29 01:37:22'),
 (2,20542255,'Perez','Mariana','43434','gaston@gmail.com',1,'2012-08-29 02:00:09','2012-10-04 09:44:21'),
 (7,33456789,'dsds','dsdsd','43434','guzmanjhonny@gmail.com',1,'2012-10-06 06:35:38','2012-10-06 06:35:38');
UNLOCK TABLES;
/*!40000 ALTER TABLE `directores` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`docentes`
--

DROP TABLE IF EXISTS `sac_dev`.`docentes`;
CREATE TABLE  `sac_dev`.`docentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` int(11) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`docentes`
--

/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
LOCK TABLES `docentes` WRITE;
INSERT INTO `sac_dev`.`docentes` VALUES  (1,40114481,'Marta','Sanchez','492554','marta@gmail.com',1,'2012-08-27 23:37:05','2012-10-06 07:09:48'),
 (2,33785658,'Alfaro','Matias','3434434','matias@gmail.com',1,'2012-08-27 23:48:51','2012-10-07 23:20:55'),
 (3,22356852,'Quinteros','Jorge','44223','mjhg@jhgff.com',1,'2012-09-02 18:46:38','2012-10-07 23:21:14'),
 (5,44343434,'Gallardo','Eisten','45454','guzmanjhonny@gmail.com',1,'2012-10-05 15:47:14','2012-10-07 04:51:24'),
 (6,33456789,'Zelaya','Victor','43434343','giron@gmail.com',1,'2012-10-05 17:55:43','2012-10-07 04:51:46');
UNLOCK TABLES;
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`docentes_titulos`
--

DROP TABLE IF EXISTS `sac_dev`.`docentes_titulos`;
CREATE TABLE  `sac_dev`.`docentes_titulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docente_id` int(11) DEFAULT NULL,
  `titulo_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_docentes_titulos_docentes` (`docente_id`),
  CONSTRAINT `fk_docentes_titulos_docentes` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`docentes_titulos`
--

/*!40000 ALTER TABLE `docentes_titulos` DISABLE KEYS */;
LOCK TABLES `docentes_titulos` WRITE;
INSERT INTO `sac_dev`.`docentes_titulos` VALUES  (1,5,1,NULL,'2012-10-05 15:47:14'),
 (7,6,2,NULL,'2012-10-05 18:20:08'),
 (10,1,1,NULL,'2012-10-06 07:09:48'),
 (11,6,3,NULL,'2012-10-06 19:54:18'),
 (12,2,2,NULL,'2012-10-07 23:20:55'),
 (13,3,3,NULL,'2012-10-07 23:21:14');
UNLOCK TABLES;
/*!40000 ALTER TABLE `docentes_titulos` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`escuelas`
--

DROP TABLE IF EXISTS `sac_dev`.`escuelas`;
CREATE TABLE  `sac_dev`.`escuelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cue` int(11) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL,
  `telefono` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `localidad_id` int(11) DEFAULT NULL,
  `director_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `escuelas_departamento_id` (`departamento_id`),
  CONSTRAINT `escuelas_departamento_id` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`escuelas`
--

/*!40000 ALTER TABLE `escuelas` DISABLE KEYS */;
LOCK TABLES `escuelas` WRITE;
INSERT INTO `sac_dev`.`escuelas` VALUES  (2,900000000,'Manuel Belgrano','Belgrano 2345','381458558','mb@gmail.com',1,45,1,'2012-08-29 01:38:06','2012-10-06 04:53:36',6),
 (3,150,'Mariano Moreno','Asuncion 2345','3814525665','mr@gmail.com',1,125,2,'2012-08-29 01:59:45','2012-08-29 16:19:05',14),
 (4,900000122,'General Sanchez','San Martin','','',1,143,2,'2012-09-15 05:09:38','2012-09-15 05:09:38',2);
UNLOCK TABLES;
/*!40000 ALTER TABLE `escuelas` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`fondo_comun`
--

DROP TABLE IF EXISTS `sac_dev`.`fondo_comun`;
CREATE TABLE  `sac_dev`.`fondo_comun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `escuela_id_origen` int(11) DEFAULT NULL,
  `escuela_id_destino` int(11) DEFAULT NULL,
  `cantidad_horas` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`fondo_comun`
--

/*!40000 ALTER TABLE `fondo_comun` DISABLE KEYS */;
LOCK TABLES `fondo_comun` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `fondo_comun` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`lineas_accion`
--

DROP TABLE IF EXISTS `sac_dev`.`lineas_accion`;
CREATE TABLE  `sac_dev`.`lineas_accion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `ciclo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineas_accion_ciclo` (`ciclo`),
  CONSTRAINT `lineas_accion_ciclo` FOREIGN KEY (`ciclo`) REFERENCES `sys_tabgral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`lineas_accion`
--

/*!40000 ALTER TABLE `lineas_accion` DISABLE KEYS */;
LOCK TABLES `lineas_accion` WRITE;
INSERT INTO `sac_dev`.`lineas_accion` VALUES  (1,'Linea de accion','linea de accion 1',1,5,'2012-08-31 15:57:33','2012-10-04 03:41:26'),
 (2,'Capacitación','',1,5,'2012-09-15 05:47:44','2012-09-15 05:47:44'),
 (3,'Prevenciones','',1,6,'2012-09-15 05:48:16','2012-10-04 13:33:18'),
 (4,'Drogas','Drogas',1,5,'2012-09-18 04:49:27','2012-10-04 13:32:41');
UNLOCK TABLES;
/*!40000 ALTER TABLE `lineas_accion` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`lineas_accion_docentes`
--

DROP TABLE IF EXISTS `sac_dev`.`lineas_accion_docentes`;
CREATE TABLE  `sac_dev`.`lineas_accion_docentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linea_accion_escuela_id` int(11) DEFAULT NULL,
  `docente_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `cantidad_horas` int(11) DEFAULT NULL,
  `perfil_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineas_accion_docentes_docente_id` (`docente_id`),
  KEY `lineas_accion_docentes_lineas_accion_escuelas_id` (`linea_accion_escuela_id`),
  KEY `lineas_accion_docentes_perfil_id` (`perfil_id`),
  CONSTRAINT `lineas_accion_docentes_docente_id` FOREIGN KEY (`docente_id`) REFERENCES `docentes` (`id`),
  CONSTRAINT `lineas_accion_docentes_lineas_accion_escuelas_id` FOREIGN KEY (`linea_accion_escuela_id`) REFERENCES `lineas_accion_escuelas` (`id`),
  CONSTRAINT `lineas_accion_docentes_perfil_id` FOREIGN KEY (`perfil_id`) REFERENCES `perfiles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`lineas_accion_docentes`
--

/*!40000 ALTER TABLE `lineas_accion_docentes` DISABLE KEYS */;
LOCK TABLES `lineas_accion_docentes` WRITE;
INSERT INTO `sac_dev`.`lineas_accion_docentes` VALUES  (19,8,1,'2012-10-06 03:06:12','2012-10-06 03:06:12',6,1),
 (20,8,2,'2012-10-06 03:06:22','2012-10-06 03:06:22',4,3),
 (21,9,1,'2012-10-06 03:06:57','2012-10-06 03:06:57',8,4),
 (24,11,1,'2012-10-06 03:39:04','2012-10-06 03:39:04',3,3),
 (26,10,2,'2012-10-06 21:28:49','2012-10-06 21:28:49',5,2),
 (28,10,5,'2012-10-06 21:32:33','2012-10-06 22:03:23',6,4),
 (29,10,6,'2012-10-06 22:03:55','2012-10-06 22:03:55',5,5),
 (30,11,3,'2012-10-07 04:43:01','2012-10-07 04:43:01',5,2),
 (31,11,6,'2012-10-07 04:43:11','2012-10-07 04:43:11',5,4),
 (32,10,1,'2012-10-07 05:22:48','2012-10-07 08:54:09',5,1),
 (40,14,1,'2012-10-07 09:25:00','2012-10-07 23:19:19',3,1);
UNLOCK TABLES;
/*!40000 ALTER TABLE `lineas_accion_docentes` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`lineas_accion_escuelas`
--

DROP TABLE IF EXISTS `sac_dev`.`lineas_accion_escuelas`;
CREATE TABLE  `sac_dev`.`lineas_accion_escuelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linea_periodo_escuela_id` int(11) DEFAULT NULL,
  `linea_accion_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineas_accion_escuelas_linea_periodo_escuela_id` (`linea_periodo_escuela_id`),
  KEY `lineas_accion_escuelas_lineas_accion_id` (`linea_accion_id`),
  CONSTRAINT `lineas_accion_escuelas_lineas_accion_id` FOREIGN KEY (`linea_accion_id`) REFERENCES `lineas_accion` (`id`),
  CONSTRAINT `lineas_accion_escuelas_linea_periodo_escuela_id` FOREIGN KEY (`linea_periodo_escuela_id`) REFERENCES `lineas_periodos_escuelas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`lineas_accion_escuelas`
--

/*!40000 ALTER TABLE `lineas_accion_escuelas` DISABLE KEYS */;
LOCK TABLES `lineas_accion_escuelas` WRITE;
INSERT INTO `sac_dev`.`lineas_accion_escuelas` VALUES  (8,44,2,'2012-10-06 03:06:05','2012-10-06 03:06:05'),
 (9,54,3,'2012-10-06 03:06:40','2012-10-06 03:06:40'),
 (10,64,4,'2012-10-06 03:38:18','2012-10-06 03:38:18'),
 (11,76,1,'2012-10-06 03:38:56','2012-10-06 03:38:56'),
 (14,75,3,'2012-10-07 09:03:33','2012-10-07 09:03:33');
UNLOCK TABLES;
/*!40000 ALTER TABLE `lineas_accion_escuelas` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`lineas_periodos_escuelas`
--

DROP TABLE IF EXISTS `sac_dev`.`lineas_periodos_escuelas`;
CREATE TABLE  `sac_dev`.`lineas_periodos_escuelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_escuela_id` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `horas_por_mes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `horas_restantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineas_periodos_escuelas_periodo_escuela_id` (`periodo_escuela_id`),
  CONSTRAINT `lineas_periodos_escuelas_periodo_escuela_id` FOREIGN KEY (`periodo_escuela_id`) REFERENCES `periodos_escuelas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`lineas_periodos_escuelas`
--

/*!40000 ALTER TABLE `lineas_periodos_escuelas` DISABLE KEYS */;
LOCK TABLES `lineas_periodos_escuelas` WRITE;
INSERT INTO `sac_dev`.`lineas_periodos_escuelas` VALUES  (44,30,1,10,'2012-10-06 03:04:46','2012-10-06 03:04:46',2009,10),
 (45,30,2,10,'2012-10-06 03:04:46','2012-10-06 03:04:46',2009,10),
 (46,30,3,10,'2012-10-06 03:04:46','2012-10-06 03:04:46',2009,10),
 (47,30,4,10,'2012-10-06 03:04:46','2012-10-06 03:04:46',2009,10),
 (48,30,5,10,'2012-10-06 03:04:46','2012-10-06 03:04:46',2009,10),
 (49,30,6,10,'2012-10-06 03:04:46','2012-10-06 03:04:46',2009,10),
 (50,30,7,10,'2012-10-06 03:04:47','2012-10-06 03:04:46',2009,10),
 (51,30,8,10,'2012-10-06 03:04:47','2012-10-06 03:04:47',2009,10),
 (52,30,9,10,'2012-10-06 03:04:47','2012-10-06 03:04:47',2009,10),
 (53,30,10,10,'2012-10-06 03:04:47','2012-10-06 03:04:47',2009,10),
 (54,31,1,90,'2012-10-06 03:05:45','2012-10-06 03:05:45',2009,90),
 (55,31,2,90,'2012-10-06 03:05:46','2012-10-06 03:05:46',2009,90),
 (56,31,3,90,'2012-10-06 03:05:46','2012-10-06 03:05:46',2009,90),
 (57,31,4,90,'2012-10-06 03:05:46','2012-10-06 03:05:46',2009,90),
 (58,31,5,90,'2012-10-06 03:05:46','2012-10-06 03:05:46',2009,90),
 (59,31,6,90,'2012-10-06 03:05:46','2012-10-06 03:05:46',2009,90),
 (60,31,7,90,'2012-10-06 03:05:46','2012-10-06 03:05:46',2009,90),
 (61,31,8,90,'2012-10-06 03:05:46','2012-10-06 03:05:46',2009,90),
 (62,31,9,90,'2012-10-06 03:05:46','2012-10-06 03:05:46',2009,90),
 (63,31,10,90,'2012-10-06 03:05:46','2012-10-06 03:05:46',2009,90),
 (64,32,10,73,'2012-10-06 03:37:37','2012-10-07 08:54:09',2009,61),
 (65,32,11,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2009,73),
 (66,32,12,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2009,73),
 (67,32,1,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2010,73),
 (68,32,2,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2010,73),
 (69,32,3,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2010,73),
 (70,32,4,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2010,73),
 (71,32,5,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2010,73),
 (72,32,6,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2010,73),
 (73,32,7,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2010,73),
 (74,32,8,73,'2012-10-06 03:37:37','2012-10-06 03:37:37',2010,73),
 (75,33,10,68,'2012-10-06 03:37:59','2012-10-07 23:19:19',2009,65),
 (76,33,11,68,'2012-10-06 03:37:59','2012-10-07 04:43:11',2009,58),
 (77,33,12,68,'2012-10-06 03:37:59','2012-10-06 03:37:59',2009,68),
 (78,33,1,68,'2012-10-06 03:37:59','2012-10-06 03:37:59',2010,68),
 (79,33,2,68,'2012-10-06 03:37:59','2012-10-06 03:37:59',2010,68),
 (80,33,3,68,'2012-10-06 03:37:59','2012-10-06 03:37:59',2010,68),
 (81,33,4,68,'2012-10-06 03:37:59','2012-10-06 03:37:59',2010,68),
 (82,33,5,68,'2012-10-06 03:37:59','2012-10-06 03:37:59',2010,68),
 (83,33,6,68,'2012-10-06 03:37:59','2012-10-06 03:37:59',2010,68),
 (84,33,7,68,'2012-10-06 03:37:59','2012-10-06 03:37:59',2010,68),
 (85,33,8,68,'2012-10-06 03:37:59','2012-10-06 03:37:59',2010,68);
UNLOCK TABLES;
/*!40000 ALTER TABLE `lineas_periodos_escuelas` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`localidades`
--

DROP TABLE IF EXISTS `sac_dev`.`localidades`;
CREATE TABLE  `sac_dev`.`localidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=144 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`localidades`
--

/*!40000 ALTER TABLE `localidades` DISABLE KEYS */;
LOCK TABLES `localidades` WRITE;
INSERT INTO `sac_dev`.`localidades` VALUES  (1,'Benjamín Aráoz',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (2,'El Chañar',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (3,'El Naranjo',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (4,'El Puestito',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (5,'El Sunchal',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (6,'El Tajamar',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (7,'El Timbó',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (8,'Gobernador Garmendia',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (9,'La Cruz',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (10,'La Ramada',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (11,'Piedrabuena',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (12,'El Timbó',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (13,'7 de Abril',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (14,'Tala Pozo',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (15,'Villa Padre Monti',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (16,'Villa Padre Monti',1,1,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (17,'Alpachiri',1,3,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (18,'Alto Verde',1,3,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (19,'Arcadia',1,3,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (20,'El Molino',1,3,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (21,'Gastona',1,3,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (22,'Ingenio La Trinidad',1,3,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (23,'Los Gucheas',1,3,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (24,'Medinas',1,3,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (25,'Yucumanita',1,3,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (26,'Alderetes',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (27,'Colombres',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (28,'Delfín Gallo',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (29,'El Bracho',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (30,'El Cevilar',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (31,'El Naranjito',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (32,'La Florida',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (33,'Las Cejas',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (34,'Los Bulacio',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (35,'Los Pereyras',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (36,'Los Pérez',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (37,'Los Ralos',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (38,'Los Villagra',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (39,'Luisiana',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (40,'Ranchillos',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (41,'San Andrés',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (42,'San Miguel',1,4,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (43,'Padilla',1,5,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (44,'Sauce Huascho',1,5,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (45,'Lamadrid',1,6,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (46,'Taco Ralo',1,6,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (47,'Campo Bello',1,6,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (48,'Los Gramajos',1,6,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (49,'Arboles Grandes',1,6,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (50,'Escaba',1,7,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (51,'Villa Belgrano',1,7,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (52,'Batiruana',1,7,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (53,'Los Arroyos',1,7,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (54,'La Calera',1,7,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (55,'Talamuyo',1,7,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (56,'La Invernada',1,8,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (57,'El Sacrificio',1,8,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (58,'Huasa Pampa',1,8,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (59,'Rumi Punco',1,8,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (60,'San Ignacio',1,8,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (61,'San José de la Cocha',1,8,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (62,'Yánima',1,8,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (63,'El Corralito',1,8,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (64,'Los Pizarros',1,8,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (65,'Agua Dulce',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (66,'El Mojón',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (67,'Esquina',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (68,'Estación Aráoz',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (69,'Ingenio Leales',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (70,'La Encantada',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (71,'La Soledad',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (72,'Las Talas',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (73,'Los Gómez',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (74,'Los Puestos',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (75,'Los Sueldos',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (76,'Mancopa',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (77,'Manuel García Fernández',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (78,'Quilmes',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (79,'Río Colorado',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (80,'Tacanas',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (81,'Villa de Leales',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (82,'Villa Fiad',1,9,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (83,'El Manantial',1,10,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (84,'San Felipe',1,10,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (85,'San Pablo',1,10,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (86,'Santa Bárbara',1,10,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (87,'Villa Nougués',1,10,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (88,'Potrero de Las Tablas',1,10,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (89,'Acheral',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (90,'Amberes',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (91,'Capitán Cáceres',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (92,'El Cercado',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (93,'Los Rojo',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (94,'Los Sosas',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (95,'Río Seco',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (96,'Santa Lucía',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (97,'Santa Rosa',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (98,'Sargento Moya',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (99,'Soldado Maldonado',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (100,'Teniente Berdina',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (101,'Villa Quinteros',1,11,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (102,'El Polear',1,12,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (103,'La Tipa',1,12,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (104,'Los Sarmientos',1,12,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (105,'Monte Bello',1,12,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (106,'Santa Ana',1,12,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (107,'El Polear',1,12,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (108,'El Polear',1,12,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (109,'Atahona',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (110,'Buena Vista',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (111,'Ciudacita',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (112,'La Tuna',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (113,'Manuela Pedraza',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (114,'Monteagudo',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (115,'Nueva Trinidad',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (116,'Pampa Mayo',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (117,'Río Chico',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (118,'San Antonio',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (119,'San Pedro',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (120,'Santa Cruz',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (121,'Villa Chicligasta',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (122,'Yerba Buena',1,13,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (123,'Amaicha del Valle',1,14,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (124,'Colalao del Valle',1,14,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (125,'El Mollar',1,14,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (126,'El Rodeo',1,14,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (127,'Anca Juli',1,15,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (128,'El Cadillal',1,15,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (129,'El Colmenar',1,15,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (130,'La Esperanza',1,15,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (131,'Los Nogales',1,15,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (132,'Villa Mariano Moreno',1,15,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (133,'Raco',1,15,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (134,'San Pedro de Colalao',1,16,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (135,'Choromoro',1,16,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (136,'Tapia',1,16,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (137,'Gonzalo',1,16,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (138,'Ticucho',1,16,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (139,'Cevil Redondo',1,17,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (140,'Marcos Paz',1,17,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (141,'San Javier',1,17,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (142,'La Sala',1,17,'2012-08-28 22:33:33','2012-08-28 22:33:33'),
 (143,'Capital',1,2,'2012-08-29 15:42:23',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `localidades` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`perfiles`
--

DROP TABLE IF EXISTS `sac_dev`.`perfiles`;
CREATE TABLE  `sac_dev`.`perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `cantidad_hora` int(11) DEFAULT NULL,
  `habilitado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`perfiles`
--

/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
LOCK TABLES `perfiles` WRITE;
INSERT INTO `sac_dev`.`perfiles` VALUES  (1,'Profesor','Descripcion de perfil profesor',4,1,'2012-09-05 16:32:34','2012-09-05 16:38:03'),
 (2,'Coordinador','Coordinador de proyectos en  general',5,1,'2012-09-05 17:19:43','2012-09-05 17:19:43'),
 (3,'Auxiliar','Auxiliar',5,1,'2012-09-14 21:30:06','2012-09-14 21:30:06'),
 (4,'Representante de área','Representante de área',5,1,'2012-09-14 21:30:38','2012-09-14 21:30:38'),
 (5,'Perfil X','Perfil X',4,1,'2012-09-15 03:18:25','2012-09-15 03:18:25'),
 (6,'Perfil Y','Perfil Y',4,1,'2012-09-15 03:18:39','2012-09-15 03:18:39');
UNLOCK TABLES;
/*!40000 ALTER TABLE `perfiles` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`periodos`
--

DROP TABLE IF EXISTS `sac_dev`.`periodos`;
CREATE TABLE  `sac_dev`.`periodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `costo_hora` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `periodos_estado_tabgral` (`estado`),
  CONSTRAINT `periodos_estado_tabgral` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`periodos`
--

/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
LOCK TABLES `periodos` WRITE;
INSERT INTO `sac_dev`.`periodos` VALUES  (13,'2009-01-01 00:00:00','2009-10-01 00:00:00',250,'2012-10-06 03:04:11','2012-10-06 03:04:11',4),
 (14,'2009-10-01 00:00:00','2010-08-01 00:00:00',350,'2012-10-06 03:35:45','2012-10-06 03:35:45',3);
UNLOCK TABLES;
/*!40000 ALTER TABLE `periodos` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`periodos_escuelas`
--

DROP TABLE IF EXISTS `sac_dev`.`periodos_escuelas`;
CREATE TABLE  `sac_dev`.`periodos_escuelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_id` int(11) DEFAULT NULL,
  `escuelas_id` int(11) DEFAULT NULL,
  `matricula` int(11) DEFAULT NULL,
  `resolucion` int(11) DEFAULT NULL,
  `cantidad_horas` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_periodos_escuelas_periodos` (`periodo_id`),
  KEY `periodos_escuelas_estado_sys_tabgral_id` (`estado`),
  CONSTRAINT `fk_periodos_escuelas_periodos` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `periodos_escuelas_estado_sys_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`periodos_escuelas`
--

/*!40000 ALTER TABLE `periodos_escuelas` DISABLE KEYS */;
LOCK TABLES `periodos_escuelas` WRITE;
INSERT INTO `sac_dev`.`periodos_escuelas` VALUES  (30,13,2,4522,45221,800,'2012-10-06 03:04:46','2012-10-06 03:05:04',4),
 (31,13,3,5000,45225,900,'2012-10-06 03:05:45','2012-10-06 03:05:45',4),
 (32,14,2,4522,45885,800,'2012-10-06 03:37:37','2012-10-06 03:37:37',3),
 (33,14,3,5500,45522,750,'2012-10-06 03:37:59','2012-10-06 03:37:59',3);
UNLOCK TABLES;
/*!40000 ALTER TABLE `periodos_escuelas` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_errores_sessiones`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_errores_sessiones`;
CREATE TABLE  `sac_dev`.`sys_errores_sessiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_errores_sessiones`
--

/*!40000 ALTER TABLE `sys_errores_sessiones` DISABLE KEYS */;
LOCK TABLES `sys_errores_sessiones` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_errores_sessiones` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_grupos_tabgral`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_grupos_tabgral`;
CREATE TABLE  `sac_dev`.`sys_grupos_tabgral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_grupos_tabgral`
--

/*!40000 ALTER TABLE `sys_grupos_tabgral` DISABLE KEYS */;
LOCK TABLES `sys_grupos_tabgral` WRITE;
INSERT INTO `sac_dev`.`sys_grupos_tabgral` VALUES  (1,'estados generales','2012-08-22 18:49:01','0000-00-00 00:00:00'),
 (2,'estados periodos','2012-08-29 20:18:57','0000-00-00 00:00:00'),
 (3,'ciclos','2012-09-06 18:12:39','0000-00-00 00:00:00'),
 (4,'titulos','2012-09-11 19:13:00','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_grupos_tabgral` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_menu`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_menu`;
CREATE TABLE  `sac_dev`.`sys_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `parent` int(11) DEFAULT NULL,
  `iconpath` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sismenu_tabgral_id` (`estado`),
  CONSTRAINT `sismenu_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_menu`
--

/*!40000 ALTER TABLE `sys_menu` DISABLE KEYS */;
LOCK TABLES `sys_menu` WRITE;
INSERT INTO `sac_dev`.`sys_menu` VALUES  (1,'Administración',1,0,'1','2012-08-22 22:39:16',NULL,1),
 (2,'Usuarios',1,1,NULL,'2012-08-22 22:39:16',NULL,0),
 (3,'Perfiles',1,1,'0','2012-08-22 22:39:16','2012-09-05 15:42:10',0),
 (4,'Circuitos',1,6,'0','2012-08-23 17:32:42','2012-09-05 04:04:16',0),
 (5,'Docentes',1,6,NULL,'2012-08-27 22:47:03',NULL,0),
 (6,'SAC',1,0,'2','2012-08-29 01:31:00',NULL,NULL),
 (7,'Directores',1,6,NULL,'2012-08-29 01:31:00',NULL,NULL),
 (8,'Lineas de acción',1,6,NULL,'2012-08-29 01:31:00',NULL,NULL),
 (9,'Escuelas',1,6,NULL,'2012-08-29 01:31:00',NULL,NULL),
 (10,'Departamentos',1,6,NULL,'2012-08-29 01:30:59',NULL,NULL),
 (11,'Periodos',1,6,NULL,'2012-08-29 17:24:25',NULL,NULL),
 (12,'Localidades',1,10,NULL,'2012-08-29 17:24:25',NULL,NULL),
 (13,'Permisos',1,1,NULL,'2012-09-05 02:40:27',NULL,NULL),
 (14,'Menus',1,1,'0','2012-09-05 04:06:44','2012-09-05 04:09:18',NULL),
 (15,'Perfiles de docentes',1,1,'0','2012-09-05 16:29:44','2012-09-05 16:29:44',NULL),
 (16,'Dashboard',1,0,'0','2012-09-10 17:34:11','2012-09-10 22:34:11',NULL),
 (17,'Titulos',1,6,'0','2012-09-12 18:47:40','2012-09-12 23:47:40',NULL),
 (18,'Horas institucionales',2,6,'0','2012-09-15 04:58:50','2012-09-16 08:07:07',NULL),
 (19,'Consultas varias',1,6,'0','2012-10-05 22:22:13','2012-10-05 22:22:13',NULL);
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_menu` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_perfil`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_perfil`;
CREATE TABLE  `sac_dev`.`sys_perfil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_id` int(11) NOT NULL,
  `perfiles_id` int(11) NOT NULL,
  `estado` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfiles_id` (`perfiles_id`),
  KEY `sisperfil_sismenu_id` (`sismenu_id`),
  KEY `sisperfil_tabgral_id` (`estado`),
  KEY `tabgral_id` (`estado`),
  CONSTRAINT `perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `sys_perfiles` (`id`),
  CONSTRAINT `sisperfil_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sys_menu` (`id`),
  CONSTRAINT `sisperfil_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_perfil`
--

/*!40000 ALTER TABLE `sys_perfil` DISABLE KEYS */;
LOCK TABLES `sys_perfil` WRITE;
INSERT INTO `sac_dev`.`sys_perfil` VALUES  (1,1,1,1,'2012-08-22 22:40:40','0000-00-00 00:00:00'),
 (2,2,1,1,'2012-08-22 22:40:40','0000-00-00 00:00:00'),
 (3,3,1,1,'2012-08-22 22:40:40','0000-00-00 00:00:00'),
 (4,4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
 (5,5,1,1,'2012-08-27 22:48:24','0000-00-00 00:00:00'),
 (6,6,1,1,'2012-08-29 01:34:36','0000-00-00 00:00:00'),
 (7,7,1,1,'2012-08-29 01:34:36','0000-00-00 00:00:00'),
 (8,8,1,1,'2012-08-29 01:34:36','0000-00-00 00:00:00'),
 (9,9,1,1,'2012-08-29 01:34:36','0000-00-00 00:00:00'),
 (10,10,1,1,'2012-08-29 01:34:43','0000-00-00 00:00:00'),
 (11,11,1,1,'2012-08-29 17:24:56','0000-00-00 00:00:00'),
 (12,12,1,1,'2012-08-29 17:24:25','2012-08-29 17:24:25'),
 (18,13,1,1,'2012-09-05 04:07:11','2012-09-05 04:07:11'),
 (19,14,1,1,'2012-09-05 04:07:14','2012-09-05 04:07:14'),
 (20,11,2,1,'2012-09-05 04:12:16','2012-09-05 04:12:16'),
 (21,6,2,1,'2012-09-05 04:18:15','2012-09-05 04:18:15'),
 (22,9,2,1,'2012-09-05 04:22:37','2012-09-05 04:22:37'),
 (23,15,1,1,'2012-09-05 16:29:52','2012-09-05 16:29:52'),
 (24,16,1,1,'2012-09-10 17:34:25','2012-09-10 22:34:25'),
 (25,16,2,1,'2012-09-10 17:35:25','2012-09-10 22:35:25'),
 (26,17,1,1,'2012-09-12 18:47:49','2012-09-12 23:47:49'),
 (27,18,1,1,'2012-09-15 04:59:09','2012-09-15 04:59:09'),
 (28,19,1,1,'2012-10-05 22:22:25','2012-10-05 22:22:25');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_perfil` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_perfiles`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_perfiles`;
CREATE TABLE  `sac_dev`.`sys_perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfiles_tabgral_id` (`estado`),
  CONSTRAINT `perfiles_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_perfiles`
--

/*!40000 ALTER TABLE `sys_perfiles` DISABLE KEYS */;
LOCK TABLES `sys_perfiles` WRITE;
INSERT INTO `sac_dev`.`sys_perfiles` VALUES  (1,'Administrador',1,'2012-08-22 18:50:06','2012-08-22 22:54:57'),
 (2,'Asesor',1,'2012-09-05 04:11:40','2012-09-05 15:46:23'),
 (3,'Responsable de PMI',1,'2012-09-16 21:53:34','2012-09-16 21:53:34');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_perfiles` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_permisos`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_permisos`;
CREATE TABLE  `sac_dev`.`sys_permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tabla` varchar(150) NOT NULL,
  `flag_read` int(11) DEFAULT '1',
  `flag_insert` int(11) DEFAULT '0',
  `flag_update` int(11) DEFAULT '0',
  `flag_delete` int(11) DEFAULT '0',
  `perfiles_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfiles_id` (`perfiles_id`),
  KEY `sispermisos_perfiles_id` (`perfiles_id`),
  CONSTRAINT `sispermisos_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `sys_perfiles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_permisos`
--

/*!40000 ALTER TABLE `sys_permisos` DISABLE KEYS */;
LOCK TABLES `sys_permisos` WRITE;
INSERT INTO `sac_dev`.`sys_permisos` VALUES  (1,'sys_usuarios',1,1,1,1,1,'2012-08-22 19:20:29','2012-09-05 04:44:07'),
 (2,'sys_perfiles',1,1,1,1,1,'2012-08-22 19:20:29','0000-00-00 00:00:00'),
 (3,'circuitos',1,1,1,1,1,'2012-08-23 17:33:45','2012-10-04 08:55:10'),
 (4,'docentes',1,1,1,1,1,'2012-08-27 22:32:14','2012-09-05 00:15:57'),
 (5,'escuelas',1,1,1,1,1,'2012-08-29 00:01:34','0000-00-00 00:00:00'),
 (6,'directores',1,1,1,1,1,'2012-08-29 01:35:45','2012-10-04 21:01:53'),
 (7,'lineas_accion',1,1,1,1,1,'2012-08-29 01:35:45','0000-00-00 00:00:00'),
 (8,'departamentos',1,1,1,1,1,'2012-08-29 01:35:45','0000-00-00 00:00:00'),
 (9,'periodos',1,1,1,1,1,'2012-08-29 16:53:53','0000-00-00 00:00:00'),
 (10,'periodos_escuelas',1,1,1,1,1,'2012-08-29 16:53:53','2012-10-07 23:52:49'),
 (11,'localidades',1,1,1,1,1,'2012-08-29 17:24:25','2012-09-05 00:26:31'),
 (12,'sys_permisos',1,1,1,1,1,'2012-09-04 22:20:59','2012-09-05 00:17:17'),
 (15,'sys_perfil',1,1,1,1,1,'2012-09-05 01:37:58','2012-09-05 01:37:58'),
 (16,'sys_menu',1,1,1,1,1,'2012-09-05 03:17:28','2012-09-05 03:17:28'),
 (17,'periodos',1,1,1,1,2,'2012-09-05 04:19:32','2012-09-05 04:19:32'),
 (18,'periodos_escuelas',1,0,0,0,2,'2012-09-05 04:19:41','2012-09-05 04:26:12'),
 (19,'escuelas',1,0,0,0,2,'2012-09-05 04:23:05','2012-09-05 15:49:55'),
 (20,'docentes_perfiles_escuelas',1,1,1,1,1,'2012-09-05 16:03:09','2012-09-05 16:03:09'),
 (21,'perfiles',1,1,1,1,1,'2012-09-05 16:03:22','2012-09-05 16:03:22'),
 (22,'titulos',1,1,1,1,1,'2012-09-12 18:46:00','2012-09-12 18:46:00'),
 (24,'lineas_accion_docentes',1,1,1,1,1,'2012-09-15 04:58:04','2012-09-15 04:58:04'),
 (26,'lineas_accion_escuelas',1,1,1,1,1,'2012-09-15 07:52:41','2012-09-15 07:52:41'),
 (27,'lineas_periodos_escuelas',1,1,1,1,1,'2012-09-16 05:18:09','2012-09-16 05:18:09'),
 (28,'lineas_accion_docentes',1,1,1,1,2,'2012-10-04 13:24:22','2012-10-04 13:24:22'),
 (29,'lineas_accion_escuelas',1,1,1,1,2,'2012-10-04 13:24:30','2012-10-04 13:24:30'),
 (30,'lineas_periodos_escuelas',1,1,1,1,2,'2012-10-04 13:24:38','2012-10-04 13:24:38'),
 (31,'lineas_accion',1,1,1,1,2,'2012-10-04 13:24:47','2012-10-04 13:24:47');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_permisos` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_sessiones`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_sessiones`;
CREATE TABLE  `sac_dev`.`sys_sessiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_sessiones`
--

/*!40000 ALTER TABLE `sys_sessiones` DISABLE KEYS */;
LOCK TABLES `sys_sessiones` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_sessiones` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_tabgral`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_tabgral`;
CREATE TABLE  `sac_dev`.`sys_tabgral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `grupos_tabgral_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grupos_tabgral_id` (`grupos_tabgral_id`),
  CONSTRAINT `grupos_tabgral_id` FOREIGN KEY (`grupos_tabgral_id`) REFERENCES `sys_grupos_tabgral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_tabgral`
--

/*!40000 ALTER TABLE `sys_tabgral` DISABLE KEYS */;
LOCK TABLES `sys_tabgral` WRITE;
INSERT INTO `sac_dev`.`sys_tabgral` VALUES  (1,'Habilitado',1,'2012-08-22 18:49:30','0000-00-00 00:00:00'),
 (2,'No habilitado',1,'2012-08-22 18:49:30','0000-00-00 00:00:00'),
 (3,'Activo',2,'2012-08-29 20:19:33','0000-00-00 00:00:00'),
 (4,'Historico',2,'2012-08-29 20:19:41','0000-00-00 00:00:00'),
 (5,'Basico',3,'2012-09-06 18:13:08','0000-00-00 00:00:00'),
 (6,'Orientado',3,'2012-09-06 18:13:08','0000-00-00 00:00:00'),
 (7,'Universitario',4,'2012-09-11 19:13:00','0000-00-00 00:00:00'),
 (8,'Terciario',4,'2012-09-11 19:13:00','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_tabgral` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_usuarios`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_usuarios`;
CREATE TABLE  `sac_dev`.`sys_usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `perfiles_id` int(11) NOT NULL,
  `activationcode` varchar(150) DEFAULT NULL,
  `tokenforgotpasswd` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfiles_id` (`telefono`),
  KEY `perfiles_id_usuarios` (`perfiles_id`),
  KEY `tabgral_id` (`direccion`),
  KEY `usuarios_estado` (`estado`),
  KEY `usuarios_perfiles_id` (`perfiles_id`),
  CONSTRAINT `usuarios_estado` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`),
  CONSTRAINT `usuarios_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `sys_perfiles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_usuarios`
--

/*!40000 ALTER TABLE `sys_usuarios` DISABLE KEYS */;
LOCK TABLES `sys_usuarios` WRITE;
INSERT INTO `sac_dev`.`sys_usuarios` VALUES  (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin','admin@gmail.com','','',1,1,'',NULL,'2012-08-22 18:50:30','2012-08-22 22:54:42'),
 (2,'marcelo','995bf053c4694e1e353cfd42b94e4447','Marcelo','Flioriani','marcelo@gmail.com',NULL,NULL,1,1,NULL,NULL,'2012-08-22 23:31:41','2012-08-22 23:31:41'),
 (3,'johnny','f4eb27cea7255cea4d1ffabf593372e8','Johnny','Guzman','guzmanjhonny@gmail.com',NULL,NULL,1,1,NULL,NULL,'2012-08-22 23:32:11','2012-08-22 23:32:11'),
 (4,'jose','662eaa47199461d01a623884080934ab','Jose','Perez','hectorluisauad@hotmail.com','laprida 234','4265597',1,2,NULL,NULL,'2012-09-05 04:13:59','2012-09-05 15:49:47'),
 (5,'miguel','75e72cd9ff5f521255e5abdc86dbcdd0','Miguel','Castro','miguelcastro@gmail.com','San Juan 3445','3814923445',1,2,NULL,NULL,'2012-10-04 13:20:34','2012-10-06 19:53:51');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_usuarios` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`sys_vinculos`
--

DROP TABLE IF EXISTS `sac_dev`.`sys_vinculos`;
CREATE TABLE  `sac_dev`.`sys_vinculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_id` int(11) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sismenu_id` (`sismenu_id`),
  KEY `sisvinculos_sismenu_id` (`sismenu_id`),
  CONSTRAINT `sisvinculos_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sys_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_vinculos`
--

/*!40000 ALTER TABLE `sys_vinculos` DISABLE KEYS */;
LOCK TABLES `sys_vinculos` WRITE;
INSERT INTO `sac_dev`.`sys_vinculos` VALUES  (1,1,'#','2012-08-22 22:40:03','0000-00-00 00:00:00'),
 (2,2,'usuarios_controller/index','2012-08-22 22:40:03','0000-00-00 00:00:00'),
 (3,3,'sys_perfiles_controller/index','2012-08-22 22:40:03','0000-00-00 00:00:00'),
 (4,4,'circuitos_controller/index','2012-08-23 17:33:09','0000-00-00 00:00:00'),
 (5,5,'docentes_controller/index','2012-08-27 22:47:35','0000-00-00 00:00:00'),
 (6,6,'#','2012-08-29 01:33:57','0000-00-00 00:00:00'),
 (7,7,'directores_controller/index','2012-08-29 01:33:57','0000-00-00 00:00:00'),
 (8,8,'lineas_accion_controller/index','2012-08-29 01:33:57','0000-00-00 00:00:00'),
 (9,9,'escuelas_controller/index','2012-08-29 01:33:57','0000-00-00 00:00:00'),
 (10,10,'departamentos_controller/index','2012-08-29 01:33:57','0000-00-00 00:00:00'),
 (11,11,'periodos_controller/index','2012-08-29 17:24:42','0000-00-00 00:00:00'),
 (12,12,'localidades_controller/index','2012-08-29 17:24:25','2012-08-29 17:24:25'),
 (13,13,'sispermisos_controller/index','2012-09-05 02:40:51','0000-00-00 00:00:00'),
 (14,14,'sismenu_controller/index','2012-09-05 04:06:44','0000-00-00 00:00:00'),
 (15,15,'perfiles_controller/index','2012-09-05 16:29:44','0000-00-00 00:00:00'),
 (16,16,'admin','2012-09-10 17:34:11','0000-00-00 00:00:00'),
 (17,17,'titulos_controller/index','2012-09-12 18:47:40','0000-00-00 00:00:00'),
 (18,18,'horas_institucionales_controller/index','2012-09-15 04:58:50','0000-00-00 00:00:00'),
 (19,19,'consultas_controller/index','2012-10-05 22:22:13','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_vinculos` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`titulos`
--

DROP TABLE IF EXISTS `sac_dev`.`titulos`;
CREATE TABLE  `sac_dev`.`titulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`titulos`
--

/*!40000 ALTER TABLE `titulos` DISABLE KEYS */;
LOCK TABLES `titulos` WRITE;
INSERT INTO `sac_dev`.`titulos` VALUES  (1,'Ingeniero en Sistemas',7,NULL,'2012-10-04 08:35:53'),
 (2,'Profesor Lengua',8,NULL,'2012-09-13 00:29:58'),
 (3,'Profesor Matemáticas',7,NULL,'2012-10-04 08:36:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `titulos` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
