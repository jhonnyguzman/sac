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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`departamentos`
--

/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
LOCK TABLES `departamentos` WRITE;
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`directores`
--

/*!40000 ALTER TABLE `directores` DISABLE KEYS */;
LOCK TABLES `directores` WRITE;
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
  `titulo` varchar(150) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`docentes`
--

/*!40000 ALTER TABLE `docentes` DISABLE KEYS */;
LOCK TABLES `docentes` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `docentes` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`docentes_escuelas`
--

DROP TABLE IF EXISTS `sac_dev`.`docentes_escuelas`;
CREATE TABLE  `sac_dev`.`docentes_escuelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docente_perfil_id` int(11) DEFAULT NULL,
  `escuela_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `docentes_escuelas_docente_perfil_id` (`docente_perfil_id`),
  KEY `docentes_escuelas_escuela_id` (`escuela_id`),
  CONSTRAINT `docentes_escuelas_escuela_id` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`),
  CONSTRAINT `docentes_escuelas_docente_perfil_id` FOREIGN KEY (`docente_perfil_id`) REFERENCES `docentes_perfiles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`docentes_escuelas`
--

/*!40000 ALTER TABLE `docentes_escuelas` DISABLE KEYS */;
LOCK TABLES `docentes_escuelas` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `docentes_escuelas` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`docentes_perfiles`
--

DROP TABLE IF EXISTS `sac_dev`.`docentes_perfiles`;
CREATE TABLE  `sac_dev`.`docentes_perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docente_id` int(11) DEFAULT NULL,
  `perfil_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`docentes_perfiles`
--

/*!40000 ALTER TABLE `docentes_perfiles` DISABLE KEYS */;
LOCK TABLES `docentes_perfiles` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `docentes_perfiles` ENABLE KEYS */;


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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`escuelas`
--

/*!40000 ALTER TABLE `escuelas` DISABLE KEYS */;
LOCK TABLES `escuelas` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `escuelas` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`horas_institucionales`
--

DROP TABLE IF EXISTS `sac_dev`.`horas_institucionales`;
CREATE TABLE  `sac_dev`.`horas_institucionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_escuela_id` int(11) DEFAULT NULL,
  `escuela_id_origen` int(11) DEFAULT NULL,
  `escuela_id_destino` int(11) DEFAULT NULL,
  `docente_perfil_id` int(11) DEFAULT NULL,
  `linea_accion_id` int(11) DEFAULT NULL,
  `cantidad_horas` int(11) DEFAULT NULL,
  `mes_utilizacion` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `horas_institucionales_lineas_accion` (`linea_accion_id`),
  CONSTRAINT `horas_institucionales_lineas_accion` FOREIGN KEY (`linea_accion_id`) REFERENCES `lineas_accion` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`horas_institucionales`
--

/*!40000 ALTER TABLE `horas_institucionales` DISABLE KEYS */;
LOCK TABLES `horas_institucionales` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `horas_institucionales` ENABLE KEYS */;


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`lineas_accion`
--

/*!40000 ALTER TABLE `lineas_accion` DISABLE KEYS */;
LOCK TABLES `lineas_accion` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `lineas_accion` ENABLE KEYS */;


--
-- Definition of table `sac_dev`.`lineas_accion_docentes`
--

DROP TABLE IF EXISTS `sac_dev`.`lineas_accion_docentes`;
CREATE TABLE  `sac_dev`.`lineas_accion_docentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linea_accion_id` int(11) DEFAULT NULL,
  `docente_perfil_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineas_accion_docentes_docente_perfil_id` (`docente_perfil_id`),
  KEY `lineas_accion_docentes_linea_accion_id` (`linea_accion_id`),
  CONSTRAINT `lineas_accion_docentes_linea_accion_id` FOREIGN KEY (`linea_accion_id`) REFERENCES `lineas_accion` (`id`),
  CONSTRAINT `lineas_accion_docentes_docente_perfil_id` FOREIGN KEY (`docente_perfil_id`) REFERENCES `docentes_perfiles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`lineas_accion_docentes`
--

/*!40000 ALTER TABLE `lineas_accion_docentes` DISABLE KEYS */;
LOCK TABLES `lineas_accion_docentes` WRITE;
UNLOCK TABLES;
/*!40000 ALTER TABLE `lineas_accion_docentes` ENABLE KEYS */;


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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`localidades`
--

/*!40000 ALTER TABLE `localidades` DISABLE KEYS */;
LOCK TABLES `localidades` WRITE;
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
  `cantidad_hora` decimal(10,2) NOT NULL,
  `habilitado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`perfiles`
--

/*!40000 ALTER TABLE `perfiles` DISABLE KEYS */;
LOCK TABLES `perfiles` WRITE;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`periodos`
--

/*!40000 ALTER TABLE `periodos` DISABLE KEYS */;
LOCK TABLES `periodos` WRITE;
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
  PRIMARY KEY (`id`),
  KEY `fk_periodos_escuelas_periodos` (`periodo_id`),
  CONSTRAINT `fk_periodos_escuelas_periodos` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`periodos_escuelas`
--

/*!40000 ALTER TABLE `periodos_escuelas` DISABLE KEYS */;
LOCK TABLES `periodos_escuelas` WRITE;
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_grupos_tabgral`
--

/*!40000 ALTER TABLE `sys_grupos_tabgral` DISABLE KEYS */;
LOCK TABLES `sys_grupos_tabgral` WRITE;
INSERT INTO `sac_dev`.`sys_grupos_tabgral` VALUES  (1,'estados generales','2012-08-22 18:49:01','0000-00-00 00:00:00');
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
  PRIMARY KEY (`id`),
  KEY `sismenu_tabgral_id` (`estado`),
  CONSTRAINT `sismenu_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_menu`
--

/*!40000 ALTER TABLE `sys_menu` DISABLE KEYS */;
LOCK TABLES `sys_menu` WRITE;
INSERT INTO `sac_dev`.`sys_menu` VALUES  (1,'Administración',1,0,NULL,'2012-08-22 22:39:16',NULL),
 (2,'Usuarios',1,1,NULL,'2012-08-22 22:39:16',NULL),
 (3,'Perfiles',1,1,NULL,'2012-08-22 22:39:16',NULL),
 (4,'Circuitos',1,1,NULL,'2012-08-23 17:32:42',NULL);
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
  CONSTRAINT `sisperfil_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`),
  CONSTRAINT `perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `sys_perfiles` (`id`),
  CONSTRAINT `sisperfil_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sys_menu` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_perfil`
--

/*!40000 ALTER TABLE `sys_perfil` DISABLE KEYS */;
LOCK TABLES `sys_perfil` WRITE;
INSERT INTO `sac_dev`.`sys_perfil` VALUES  (1,1,1,1,'2012-08-22 22:40:40','0000-00-00 00:00:00'),
 (2,2,1,1,'2012-08-22 22:40:40','0000-00-00 00:00:00'),
 (3,3,1,1,'2012-08-22 22:40:40','0000-00-00 00:00:00'),
 (4,4,1,1,'0000-00-00 00:00:00','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_perfiles`
--

/*!40000 ALTER TABLE `sys_perfiles` DISABLE KEYS */;
LOCK TABLES `sys_perfiles` WRITE;
INSERT INTO `sac_dev`.`sys_perfiles` VALUES  (1,'Administrador',1,'2012-08-22 18:50:06','2012-08-22 22:54:57');
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_permisos`
--

/*!40000 ALTER TABLE `sys_permisos` DISABLE KEYS */;
LOCK TABLES `sys_permisos` WRITE;
INSERT INTO `sac_dev`.`sys_permisos` VALUES  (1,'sys_usuarios',1,1,1,1,1,'2012-08-22 19:20:29','0000-00-00 00:00:00'),
 (2,'sys_perfiles',1,1,1,1,1,'2012-08-22 19:20:29','0000-00-00 00:00:00'),
 (3,'circuitos',1,1,1,1,1,'2012-08-23 17:33:45','0000-00-00 00:00:00');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_tabgral`
--

/*!40000 ALTER TABLE `sys_tabgral` DISABLE KEYS */;
LOCK TABLES `sys_tabgral` WRITE;
INSERT INTO `sac_dev`.`sys_tabgral` VALUES  (1,'habilitado',1,'2012-08-22 18:49:30','0000-00-00 00:00:00'),
 (2,'No habilitado',1,'2012-08-22 18:49:30','0000-00-00 00:00:00');
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
  CONSTRAINT `usuarios_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `sys_perfiles` (`id`),
  CONSTRAINT `usuarios_estado` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_usuarios`
--

/*!40000 ALTER TABLE `sys_usuarios` DISABLE KEYS */;
LOCK TABLES `sys_usuarios` WRITE;
INSERT INTO `sac_dev`.`sys_usuarios` VALUES  (1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','admin','admin@gmail.com','','',1,1,'',NULL,'2012-08-22 18:50:30','2012-08-22 22:54:42'),
 (2,'marcelo','995bf053c4694e1e353cfd42b94e4447','Marcelo','Flioriani','marcelo@gmail.com',NULL,NULL,1,1,NULL,NULL,'2012-08-22 23:31:41','2012-08-22 23:31:41'),
 (3,'johnny','f4eb27cea7255cea4d1ffabf593372e8','Johnny','Guzman','guzmanjhonny@gmail.com',NULL,NULL,1,1,NULL,NULL,'2012-08-22 23:32:11','2012-08-22 23:32:11');
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sac_dev`.`sys_vinculos`
--

/*!40000 ALTER TABLE `sys_vinculos` DISABLE KEYS */;
LOCK TABLES `sys_vinculos` WRITE;
INSERT INTO `sac_dev`.`sys_vinculos` VALUES  (1,1,'#','2012-08-22 22:40:03','0000-00-00 00:00:00'),
 (2,2,'usuarios_controller/index','2012-08-22 22:40:03','0000-00-00 00:00:00'),
 (3,3,'perfiles_controller/index','2012-08-22 22:40:03','0000-00-00 00:00:00'),
 (4,4,'circuitos_controller/index','2012-08-23 17:33:09','0000-00-00 00:00:00');
UNLOCK TABLES;
/*!40000 ALTER TABLE `sys_vinculos` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
