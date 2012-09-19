-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 13, 2012 at 01:23 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sac_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `circuitos`
--

CREATE TABLE IF NOT EXISTS `circuitos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `circuitos`
--

INSERT INTO `circuitos` (`id`, `nombre`, `habilitado`, `created_at`, `updated_at`) VALUES
(1, 'Circuito 1', 1, '2012-08-23 20:43:22', '2012-08-23 17:43:22'),
(2, 'Circuito 2', 1, '2012-08-23 20:45:45', '2012-08-23 17:45:45'),
(3, 'Circuito 3', 1, '2012-08-23 20:46:03', '2012-08-23 17:46:03'),
(4, 'Circuito 4', 1, '2012-08-23 20:46:27', '2012-08-23 17:46:27'),
(5, 'Circuito 5', 1, '2012-08-23 20:46:57', '2012-08-23 17:46:57');

-- --------------------------------------------------------

--
-- Table structure for table `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `circuito_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `departamentos_circuito_id` (`circuito_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`, `habilitado`, `circuito_id`, `created_at`, `updated_at`) VALUES
(1, 'Burruyacú', 1, 1, '2012-08-28 23:33:33', '2012-08-28 22:33:33'),
(2, 'Capital', 1, 1, '2012-08-28 23:33:45', '2012-08-28 22:33:45'),
(3, 'Chicligasta', 1, 1, '2012-08-28 23:34:06', '2012-08-28 22:34:06'),
(4, 'Cruz Alta', 1, 1, '2012-08-28 23:34:17', '2012-08-28 22:34:17'),
(5, 'Famaillá', 1, 1, '2012-08-28 23:34:27', '2012-08-28 22:34:27'),
(6, 'Graneros', 1, 1, '2012-08-28 23:34:40', '2012-08-28 22:34:40'),
(7, 'Juan Bautista Alberdi', 1, 1, '2012-08-28 23:35:07', '2012-08-28 22:35:07'),
(8, 'La Cocha', 1, 1, '2012-08-28 23:35:20', '2012-08-28 22:35:20'),
(9, 'Leales', 1, 1, '2012-08-28 23:35:32', '2012-08-28 22:35:32'),
(10, 'Lules', 1, 1, '2012-08-28 23:35:42', '2012-08-28 22:35:42'),
(11, 'Monteros', 1, 1, '2012-08-28 23:35:53', '2012-08-28 22:35:53'),
(12, 'Río Chico', 1, 1, '2012-08-28 23:36:02', '2012-08-28 22:36:02'),
(13, 'Simoca', 1, 1, '2012-08-28 23:36:11', '2012-08-28 22:36:11'),
(14, 'Tafí del Valle', 1, 1, '2012-08-28 23:36:22', '2012-08-28 22:36:22'),
(15, 'Tafí Viejo', 1, 1, '2012-08-28 23:36:31', '2012-08-28 22:36:31'),
(16, 'Trancas', 1, 1, '2012-08-28 23:36:42', '2012-08-28 22:36:42'),
(17, 'Yerba Buena', 1, 1, '2012-08-28 23:36:52', '2012-08-28 22:36:52');

-- --------------------------------------------------------

--
-- Table structure for table `directores`
--

CREATE TABLE IF NOT EXISTS `directores` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `directores`
--

INSERT INTO `directores` (`id`, `dni`, `apellido`, `nombre`, `telefono`, `email`, `habilitado`, `created_at`, `updated_at`) VALUES
(1, 33455225, 'Giron', 'Marcos', '3874955', 'giron@gmail.com', 1, '2012-08-29 04:37:22', '2012-08-29 01:37:22'),
(2, 20542255, 'Perez', 'Mariana', '', '', 1, '2012-08-29 05:00:09', '2012-08-29 02:00:09');

-- --------------------------------------------------------

--
-- Table structure for table `docentes`
--

CREATE TABLE IF NOT EXISTS `docentes` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `docentes`
--

INSERT INTO `docentes` (`id`, `dni`, `apellido`, `nombre`, `telefono`, `email`, `habilitado`, `created_at`, `updated_at`) VALUES
(1, 40114481, 'Marta ', 'Sanchez', '492554', 'marta@gmail.com', 1, '2012-08-28 02:37:05', NULL),
(2, 3378565, 'Alfaro', 'Matias', '3434434', 'matias@gmail.com', 1, '2012-08-28 02:48:51', '2012-08-27 23:48:51'),
(3, 123456789, 'hghjgj', 'hgddffddfdfdf', '44223', 'mjhg@jhgff.com', 1, '2012-09-02 21:46:38', '2012-09-02 23:46:38');

-- --------------------------------------------------------

--
-- Table structure for table `docentes_escuelas`
--

CREATE TABLE IF NOT EXISTS `docentes_escuelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docente_perfil_id` int(11) DEFAULT NULL,
  `escuela_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `docentes_escuelas_docente_perfil_id` (`docente_perfil_id`),
  KEY `docentes_escuelas_escuela_id` (`escuela_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `docentes_perfiles`
--

CREATE TABLE IF NOT EXISTS `docentes_perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docente_id` int(11) DEFAULT NULL,
  `perfil_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `docentes_perfiles`
--

INSERT INTO `docentes_perfiles` (`id`, `docente_id`, `perfil_id`, `created_at`, `updated_at`) VALUES
(5, 2, 1, '2012-09-05 21:02:07', '2012-09-05 18:02:07');

-- --------------------------------------------------------

--
-- Table structure for table `docentes_titulos`
--

CREATE TABLE IF NOT EXISTS `docentes_titulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `docente_id` int(11) DEFAULT NULL,
  `titulo_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `escuelas`
--

CREATE TABLE IF NOT EXISTS `escuelas` (
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
  KEY `escuelas_departamento_id` (`departamento_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `escuelas`
--

INSERT INTO `escuelas` (`id`, `cue`, `nombre`, `direccion`, `telefono`, `email`, `habilitado`, `localidad_id`, `director_id`, `created_at`, `updated_at`, `departamento_id`) VALUES
(2, 253, 'Manuel Belgrano', 'Belgrano 2345', '381458558', 'mb@gmail.com', 1, 11, 1, '2012-08-29 04:38:06', '2012-08-29 02:04:04', 1),
(3, 150, 'Mariano Moreno', 'Asuncion 2345', '3814525665', 'mr@gmail.com', 1, 125, 2, '2012-08-29 04:59:45', '2012-08-29 16:19:05', 14);

-- --------------------------------------------------------

--
-- Table structure for table `fondo_comun`
--

CREATE TABLE IF NOT EXISTS `fondo_comun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `escuela_id_origen` int(11) DEFAULT NULL,
  `escuela_id_destino` int(11) DEFAULT NULL,
  `cantidad_horas` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `horas_institucionales`
--

CREATE TABLE IF NOT EXISTS `horas_institucionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_escuela_id` int(11) DEFAULT NULL,
  `linea_accion_docente_id` int(11) DEFAULT NULL,
  `cantidad_horas` int(11) DEFAULT NULL,
  `linea_periodo_escuela_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `horas_institucionales_linea_periodo_escuela_id` (`linea_periodo_escuela_id`),
  KEY `lineas_accion_docentes_id` (`linea_accion_docente_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lineas_accion`
--

CREATE TABLE IF NOT EXISTS `lineas_accion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `ciclo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineas_accion_ciclo` (`ciclo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `lineas_accion`
--

INSERT INTO `lineas_accion` (`id`, `nombre`, `descripcion`, `habilitado`, `ciclo`, `created_at`, `updated_at`) VALUES
(1, 'linea', 'linea de accion 1', 1, 5, '2012-08-31 18:57:33', '2012-09-06 19:01:17');

-- --------------------------------------------------------

--
-- Table structure for table `lineas_accion_docentes`
--

CREATE TABLE IF NOT EXISTS `lineas_accion_docentes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `linea_accion_id` int(11) DEFAULT NULL,
  `docente_perfil_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineas_accion_docentes_docente_perfil_id` (`docente_perfil_id`),
  KEY `lineas_accion_docentes_linea_accion_id` (`linea_accion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lineas_periodos_escuelas`
--

CREATE TABLE IF NOT EXISTS `lineas_periodos_escuelas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `periodo_escuela_id` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `horas_por_mes` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `horas_restantes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lineas_periodos_escuelas_periodo_escuela_id` (`periodo_escuela_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `lineas_periodos_escuelas`
--

INSERT INTO `lineas_periodos_escuelas` (`id`, `periodo_escuela_id`, `mes`, `horas_por_mes`, `created_at`, `updated_at`, `horas_restantes`) VALUES
(1, 18, 1, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80),
(2, 18, 2, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80),
(3, 18, 3, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80),
(4, 18, 4, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80),
(5, 18, 5, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80),
(6, 18, 6, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80),
(7, 18, 7, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80),
(8, 18, 8, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80),
(9, 18, 9, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80),
(10, 18, 10, 80, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 80);

-- --------------------------------------------------------

--
-- Table structure for table `localidades`
--

CREATE TABLE IF NOT EXISTS `localidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `habilitado` int(11) NOT NULL,
  `departamento_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=144 ;

--
-- Dumping data for table `localidades`
--

INSERT INTO `localidades` (`id`, `nombre`, `habilitado`, `departamento_id`, `created_at`, `updated_at`) VALUES
(1, 'Benjamín Aráoz', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(2, 'El Chañar', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(3, 'El Naranjo', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(4, 'El Puestito', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(5, 'El Sunchal', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(6, 'El Tajamar', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(7, 'El Timbó', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(8, 'Gobernador Garmendia', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(9, 'La Cruz', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(10, 'La Ramada', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(11, 'Piedrabuena', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(12, 'El Timbó', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(13, '7 de Abril', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(14, 'Tala Pozo', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(15, 'Villa Padre Monti', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(16, 'Villa Padre Monti', 1, 1, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(17, 'Alpachiri', 1, 3, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(18, 'Alto Verde', 1, 3, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(19, 'Arcadia', 1, 3, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(20, 'El Molino', 1, 3, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(21, 'Gastona', 1, 3, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(22, 'Ingenio La Trinidad', 1, 3, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(23, 'Los Gucheas', 1, 3, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(24, 'Medinas', 1, 3, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(25, 'Yucumanita', 1, 3, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(26, 'Alderetes', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(27, 'Colombres', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(28, 'Delfín Gallo', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(29, 'El Bracho', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(30, 'El Cevilar', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(31, 'El Naranjito', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(32, 'La Florida', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(33, 'Las Cejas', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(34, 'Los Bulacio', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(35, 'Los Pereyras', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(36, 'Los Pérez', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(37, 'Los Ralos', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(38, 'Los Villagra', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(39, 'Luisiana', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(40, 'Ranchillos', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(41, 'San Andrés', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(42, 'San Miguel', 1, 4, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(43, 'Padilla', 1, 5, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(44, 'Sauce Huascho', 1, 5, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(45, 'Lamadrid', 1, 6, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(46, 'Taco Ralo', 1, 6, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(47, 'Campo Bello', 1, 6, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(48, 'Los Gramajos', 1, 6, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(49, 'Arboles Grandes', 1, 6, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(50, 'Escaba', 1, 7, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(51, 'Villa Belgrano', 1, 7, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(52, 'Batiruana', 1, 7, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(53, 'Los Arroyos', 1, 7, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(54, 'La Calera', 1, 7, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(55, 'Talamuyo', 1, 7, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(56, 'La Invernada', 1, 8, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(57, 'El Sacrificio', 1, 8, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(58, 'Huasa Pampa', 1, 8, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(59, 'Rumi Punco', 1, 8, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(60, 'San Ignacio', 1, 8, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(61, 'San José de la Cocha', 1, 8, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(62, 'Yánima', 1, 8, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(63, 'El Corralito', 1, 8, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(64, 'Los Pizarros', 1, 8, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(65, 'Agua Dulce', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(66, 'El Mojón', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(67, 'Esquina', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(68, 'Estación Aráoz', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(69, 'Ingenio Leales', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(70, 'La Encantada', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(71, 'La Soledad', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(72, 'Las Talas', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(73, 'Los Gómez', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(74, 'Los Puestos', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(75, 'Los Sueldos', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(76, 'Mancopa', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(77, 'Manuel García Fernández', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(78, 'Quilmes', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(79, 'Río Colorado', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(80, 'Tacanas', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(81, 'Villa de Leales', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(82, 'Villa Fiad', 1, 9, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(83, 'El Manantial', 1, 10, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(84, 'San Felipe', 1, 10, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(85, 'San Pablo', 1, 10, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(86, 'Santa Bárbara', 1, 10, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(87, 'Villa Nougués', 1, 10, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(88, 'Potrero de Las Tablas', 1, 10, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(89, 'Acheral', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(90, 'Amberes', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(91, 'Capitán Cáceres', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(92, 'El Cercado', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(93, 'Los Rojo', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(94, 'Los Sosas', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(95, 'Río Seco', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(96, 'Santa Lucía', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(97, 'Santa Rosa', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(98, 'Sargento Moya', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(99, 'Soldado Maldonado', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(100, 'Teniente Berdina', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(101, 'Villa Quinteros', 1, 11, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(102, 'El Polear', 1, 12, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(103, 'La Tipa', 1, 12, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(104, 'Los Sarmientos', 1, 12, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(105, 'Monte Bello', 1, 12, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(106, 'Santa Ana', 1, 12, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(107, 'El Polear', 1, 12, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(108, 'El Polear', 1, 12, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(109, 'Atahona', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(110, 'Buena Vista', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(111, 'Ciudacita', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(112, 'La Tuna', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(113, 'Manuela Pedraza', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(114, 'Monteagudo', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(115, 'Nueva Trinidad', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(116, 'Pampa Mayo', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(117, 'Río Chico', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(118, 'San Antonio', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(119, 'San Pedro', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(120, 'Santa Cruz', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(121, 'Villa Chicligasta', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(122, 'Yerba Buena', 1, 13, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(123, 'Amaicha del Valle', 1, 14, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(124, 'Colalao del Valle', 1, 14, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(125, 'El Mollar', 1, 14, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(126, 'El Rodeo', 1, 14, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(127, 'Anca Juli', 1, 15, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(128, 'El Cadillal', 1, 15, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(129, 'El Colmenar', 1, 15, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(130, 'La Esperanza', 1, 15, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(131, 'Los Nogales', 1, 15, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(132, 'Villa Mariano Moreno', 1, 15, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(133, 'Raco', 1, 15, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(134, 'San Pedro de Colalao', 1, 16, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(135, 'Choromoro', 1, 16, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(136, 'Tapia', 1, 16, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(137, 'Gonzalo', 1, 16, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(138, 'Ticucho', 1, 16, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(139, 'Cevil Redondo', 1, 17, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(140, 'Marcos Paz', 1, 17, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(141, 'San Javier', 1, 17, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(142, 'La Sala', 1, 17, '2012-08-29 01:33:33', '2012-08-28 22:33:33'),
(143, 'Capital', 1, 2, '2012-08-29 18:42:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) DEFAULT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `cantidad_hora` int(11) DEFAULT NULL,
  `habilitado` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`id`, `nombre`, `descripcion`, `cantidad_hora`, `habilitado`, `created_at`, `updated_at`) VALUES
(1, 'Profesor', 'Descripcion de perfil profesor', 4, 1, '2012-09-05 19:32:34', '2012-09-05 16:38:03'),
(2, 'Coordinador', 'Coordinador de proyectos en  general', 5, 1, '2012-09-05 20:19:43', '2012-09-05 17:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `periodos`
--

CREATE TABLE IF NOT EXISTS `periodos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `costo_hora` float DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `periodos_estado_tabgral` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `periodos`
--

INSERT INTO `periodos` (`id`, `fecha_inicio`, `fecha_fin`, `costo_hora`, `created_at`, `updated_at`, `estado`) VALUES
(1, '2012-08-29 00:00:00', '2013-08-29 00:00:00', 250, '2012-08-29 20:06:24', '2012-08-29 19:54:49', 4),
(2, '2012-09-01 00:00:00', '2013-09-01 00:00:00', 350, '2012-08-29 23:33:05', '2012-09-02 21:53:26', 4),
(3, '2012-12-05 00:00:00', '2013-12-05 00:00:00', 380, '2012-08-29 23:36:18', '2012-08-29 20:36:18', 4),
(4, '2013-01-01 00:00:00', '2013-10-31 00:00:00', 350, '2012-09-06 19:36:47', '2012-09-06 16:36:47', 4),
(5, '2013-11-01 00:00:00', '2014-09-30 00:00:00', 250, '2012-09-06 20:03:49', '2012-09-06 17:03:49', 4),
(6, '2014-09-01 00:00:00', '2015-07-31 00:00:00', 350, '2012-09-06 20:36:54', '2012-09-06 17:36:54', 4),
(7, '2012-01-01 00:00:00', '2012-10-01 00:00:00', 250, '2012-09-07 05:31:15', '2012-09-07 02:31:15', 3);

-- --------------------------------------------------------

--
-- Table structure for table `periodos_escuelas`
--

CREATE TABLE IF NOT EXISTS `periodos_escuelas` (
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
  KEY `periodos_escuelas_estado_sys_tabgral_id` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `periodos_escuelas`
--

INSERT INTO `periodos_escuelas` (`id`, `periodo_id`, `escuelas_id`, `matricula`, `resolucion`, `cantidad_horas`, `created_at`, `updated_at`, `estado`) VALUES
(2, 3, 2, 1255, 1225, 500, '2012-09-06 19:36:13', '2012-09-06 16:36:13', 4),
(3, 4, 2, 2343, 34434, 600, '2012-09-06 19:37:19', '2012-09-06 16:37:19', 4),
(7, 5, 2, 3456, 3432, 700, '2012-09-06 20:10:53', '2012-09-06 17:10:53', 4),
(9, 6, 2, 4000, 33434, 800, '2012-09-06 20:41:30', '2012-09-06 17:41:30', 4),
(18, 7, 2, 43434, 4344, 800, '2012-09-07 05:55:51', '2012-09-07 02:55:51', 3);

-- --------------------------------------------------------

--
-- Table structure for table `sys_errores_sessiones`
--

CREATE TABLE IF NOT EXISTS `sys_errores_sessiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sys_grupos_tabgral`
--

CREATE TABLE IF NOT EXISTS `sys_grupos_tabgral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sys_grupos_tabgral`
--

INSERT INTO `sys_grupos_tabgral` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'estados generales', '2012-08-22 21:49:01', '0000-00-00 00:00:00'),
(2, 'estados periodos', '2012-08-29 23:18:57', '0000-00-00 00:00:00'),
(3, 'ciclos', '2012-09-06 21:12:39', '0000-00-00 00:00:00'),
(4, 'titulos', '2012-09-11 22:13:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sys_menu`
--

CREATE TABLE IF NOT EXISTS `sys_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `parent` int(11) DEFAULT NULL,
  `iconpath` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `active` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sismenu_tabgral_id` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sys_menu`
--

INSERT INTO `sys_menu` (`id`, `descripcion`, `estado`, `parent`, `iconpath`, `created_at`, `updated_at`, `active`) VALUES
(1, 'Administración', 1, 0, '1', '2012-08-23 01:39:16', NULL, 1),
(2, 'Usuarios', 1, 1, NULL, '2012-08-23 01:39:16', NULL, 0),
(3, 'Perfiles', 1, 1, '0', '2012-08-23 01:39:16', '2012-09-05 15:42:10', 0),
(4, 'Circuitos', 1, 6, '0', '2012-08-23 20:32:42', '2012-09-05 04:04:16', 0),
(5, 'Docentes', 1, 6, NULL, '2012-08-28 01:47:03', NULL, 0),
(6, 'SAC', 1, 0, '2', '2012-08-29 04:31:00', NULL, NULL),
(7, 'Directores', 1, 6, NULL, '2012-08-29 04:31:00', NULL, NULL),
(8, 'Lineas de acción', 1, 6, NULL, '2012-08-29 04:31:00', NULL, NULL),
(9, 'Escuelas', 1, 6, NULL, '2012-08-29 04:31:00', NULL, NULL),
(10, 'Departamentos', 1, 6, NULL, '2012-08-29 04:30:59', NULL, NULL),
(11, 'Periodos', 1, 6, NULL, '2012-08-29 20:24:25', NULL, NULL),
(12, 'Localidades', 1, 10, NULL, '2012-08-29 20:24:25', NULL, NULL),
(13, 'Permisos', 1, 1, NULL, '2012-09-05 05:40:27', NULL, NULL),
(14, 'Menus', 1, 1, '0', '2012-09-05 07:06:44', '2012-09-05 04:09:18', NULL),
(15, 'Perfiles de docentes', 1, 1, '0', '2012-09-05 19:29:44', '2012-09-05 16:29:44', NULL),
(16, 'Dashboard', 1, 0, '0', '2012-09-10 20:34:11', '2012-09-10 22:34:11', NULL),
(17, 'Titulos', 1, 6, '0', '2012-09-12 21:47:40', '2012-09-12 23:47:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_perfil`
--

CREATE TABLE IF NOT EXISTS `sys_perfil` (
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
  KEY `tabgral_id` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `sys_perfil`
--

INSERT INTO `sys_perfil` (`id`, `sismenu_id`, `perfiles_id`, `estado`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2012-08-23 01:40:40', '0000-00-00 00:00:00'),
(2, 2, 1, 1, '2012-08-23 01:40:40', '0000-00-00 00:00:00'),
(3, 3, 1, 1, '2012-08-23 01:40:40', '0000-00-00 00:00:00'),
(4, 4, 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 1, 1, '2012-08-28 01:48:24', '0000-00-00 00:00:00'),
(6, 6, 1, 1, '2012-08-29 04:34:36', '0000-00-00 00:00:00'),
(7, 7, 1, 1, '2012-08-29 04:34:36', '0000-00-00 00:00:00'),
(8, 8, 1, 1, '2012-08-29 04:34:36', '0000-00-00 00:00:00'),
(9, 9, 1, 1, '2012-08-29 04:34:36', '0000-00-00 00:00:00'),
(10, 10, 1, 1, '2012-08-29 04:34:43', '0000-00-00 00:00:00'),
(11, 11, 1, 1, '2012-08-29 20:24:56', '0000-00-00 00:00:00'),
(12, 12, 1, 1, '2012-08-29 20:24:25', '2012-08-29 17:24:25'),
(18, 13, 1, 1, '2012-09-05 07:07:11', '2012-09-05 04:07:11'),
(19, 14, 1, 1, '2012-09-05 07:07:14', '2012-09-05 04:07:14'),
(20, 11, 2, 1, '2012-09-05 07:12:16', '2012-09-05 04:12:16'),
(21, 6, 2, 1, '2012-09-05 07:18:15', '2012-09-05 04:18:15'),
(22, 9, 2, 1, '2012-09-05 07:22:37', '2012-09-05 04:22:37'),
(23, 15, 1, 1, '2012-09-05 19:29:52', '2012-09-05 16:29:52'),
(24, 16, 1, 1, '2012-09-10 20:34:25', '2012-09-10 22:34:25'),
(25, 16, 2, 1, '2012-09-10 20:35:25', '2012-09-10 22:35:25'),
(26, 17, 1, 1, '2012-09-12 21:47:49', '2012-09-12 23:47:49');

-- --------------------------------------------------------

--
-- Table structure for table `sys_perfiles`
--

CREATE TABLE IF NOT EXISTS `sys_perfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(150) DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `perfiles_tabgral_id` (`estado`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sys_perfiles`
--

INSERT INTO `sys_perfiles` (`id`, `descripcion`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 1, '2012-08-22 21:50:06', '2012-08-22 22:54:57'),
(2, 'Asesor', 1, '2012-09-05 07:11:40', '2012-09-05 15:46:23');

-- --------------------------------------------------------

--
-- Table structure for table `sys_permisos`
--

CREATE TABLE IF NOT EXISTS `sys_permisos` (
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
  KEY `sispermisos_perfiles_id` (`perfiles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `sys_permisos`
--

INSERT INTO `sys_permisos` (`id`, `tabla`, `flag_read`, `flag_insert`, `flag_update`, `flag_delete`, `perfiles_id`, `created_at`, `updated_at`) VALUES
(1, 'sys_usuarios', 1, 1, 1, 1, 1, '2012-08-22 22:20:29', '2012-09-05 04:44:07'),
(2, 'sys_perfiles', 1, 1, 1, 1, 1, '2012-08-22 22:20:29', '0000-00-00 00:00:00'),
(3, 'circuitos', 1, 1, 1, 1, 1, '2012-08-23 20:33:45', '0000-00-00 00:00:00'),
(4, 'docentes', 1, 1, 1, 1, 1, '2012-08-28 01:32:14', '2012-09-05 00:15:57'),
(5, 'escuelas', 1, 1, 1, 1, 1, '2012-08-29 03:01:34', '0000-00-00 00:00:00'),
(6, 'directores', 1, 1, 1, 1, 1, '2012-08-29 04:35:45', '0000-00-00 00:00:00'),
(7, 'lineas_accion', 1, 1, 1, 1, 1, '2012-08-29 04:35:45', '0000-00-00 00:00:00'),
(8, 'departamentos', 1, 1, 1, 1, 1, '2012-08-29 04:35:45', '0000-00-00 00:00:00'),
(9, 'periodos', 1, 1, 1, 1, 1, '2012-08-29 19:53:53', '0000-00-00 00:00:00'),
(10, 'periodos_escuelas', 1, 1, 1, 1, 1, '2012-08-29 19:53:53', '0000-00-00 00:00:00'),
(11, 'localidades', 1, 1, 1, 1, 1, '2012-08-29 20:24:25', '2012-09-05 00:26:31'),
(12, 'sys_permisos', 1, 1, 1, 1, 1, '2012-09-05 01:20:59', '2012-09-05 00:17:17'),
(15, 'sys_perfil', 1, 1, 1, 1, 1, '2012-09-05 04:37:58', '2012-09-05 01:37:58'),
(16, 'sys_menu', 1, 1, 1, 1, 1, '2012-09-05 06:17:28', '2012-09-05 03:17:28'),
(17, 'periodos', 1, 1, 1, 1, 2, '2012-09-05 07:19:32', '2012-09-05 04:19:32'),
(18, 'periodos_escuelas', 1, 0, 0, 0, 2, '2012-09-05 07:19:41', '2012-09-05 04:26:12'),
(19, 'escuelas', 1, 0, 0, 0, 2, '2012-09-05 07:23:05', '2012-09-05 15:49:55'),
(20, 'docentes_perfiles', 1, 1, 1, 1, 1, '2012-09-05 19:03:09', '2012-09-05 16:03:09'),
(21, 'perfiles', 1, 1, 1, 1, 1, '2012-09-05 19:03:22', '2012-09-05 16:03:22'),
(22, 'titulos', 1, 1, 1, 1, 1, '2012-09-12 21:46:00', '2012-09-12 18:46:00');

-- --------------------------------------------------------

--
-- Table structure for table `sys_sessiones`
--

CREATE TABLE IF NOT EXISTS `sys_sessiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sys_tabgral`
--

CREATE TABLE IF NOT EXISTS `sys_tabgral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `grupos_tabgral_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `grupos_tabgral_id` (`grupos_tabgral_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sys_tabgral`
--

INSERT INTO `sys_tabgral` (`id`, `descripcion`, `grupos_tabgral_id`, `created_at`, `updated_at`) VALUES
(1, 'Habilitado', 1, '2012-08-22 21:49:30', '0000-00-00 00:00:00'),
(2, 'No habilitado', 1, '2012-08-22 21:49:30', '0000-00-00 00:00:00'),
(3, 'Activo', 2, '2012-08-29 23:19:33', '0000-00-00 00:00:00'),
(4, 'Historico', 2, '2012-08-29 23:19:41', '0000-00-00 00:00:00'),
(5, 'Basico', 3, '2012-09-06 21:13:08', '0000-00-00 00:00:00'),
(6, 'Orientado', 3, '2012-09-06 21:13:08', '0000-00-00 00:00:00'),
(7, 'Universitario', 4, '2012-09-11 22:13:00', '0000-00-00 00:00:00'),
(8, 'Terciario', 4, '2012-09-11 22:13:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sys_usuarios`
--

CREATE TABLE IF NOT EXISTS `sys_usuarios` (
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
  KEY `usuarios_perfiles_id` (`perfiles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `sys_usuarios`
--

INSERT INTO `sys_usuarios` (`id`, `username`, `password`, `nombre`, `apellido`, `email`, `direccion`, `telefono`, `estado`, `perfiles_id`, `activationcode`, `tokenforgotpasswd`, `created_at`, `updated_at`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'admin@gmail.com', '', '', 1, 1, '', NULL, '2012-08-22 21:50:30', '2012-08-22 22:54:42'),
(2, 'marcelo', '995bf053c4694e1e353cfd42b94e4447', 'Marcelo', 'Flioriani', 'marcelo@gmail.com', NULL, NULL, 1, 1, NULL, NULL, '2012-08-23 02:31:41', '2012-08-22 23:31:41'),
(3, 'johnny', 'f4eb27cea7255cea4d1ffabf593372e8', 'Johnny', 'Guzman', 'guzmanjhonny@gmail.com', NULL, NULL, 1, 1, NULL, NULL, '2012-08-23 02:32:11', '2012-08-22 23:32:11'),
(4, 'jose', '662eaa47199461d01a623884080934ab', 'Jose', 'Perez', 'hectorluisauad@hotmail.com', 'laprida 234', '4265597', 1, 2, NULL, NULL, '2012-09-05 07:13:59', '2012-09-05 15:49:47');

-- --------------------------------------------------------

--
-- Table structure for table `sys_vinculos`
--

CREATE TABLE IF NOT EXISTS `sys_vinculos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sismenu_id` int(11) DEFAULT NULL,
  `link` varchar(250) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sismenu_id` (`sismenu_id`),
  KEY `sisvinculos_sismenu_id` (`sismenu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `sys_vinculos`
--

INSERT INTO `sys_vinculos` (`id`, `sismenu_id`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, '#', '2012-08-23 01:40:03', '0000-00-00 00:00:00'),
(2, 2, 'usuarios_controller/index', '2012-08-23 01:40:03', '0000-00-00 00:00:00'),
(3, 3, 'sys_perfiles_controller/index', '2012-08-23 01:40:03', '0000-00-00 00:00:00'),
(4, 4, 'circuitos_controller/index', '2012-08-23 20:33:09', '0000-00-00 00:00:00'),
(5, 5, 'docentes_controller/index', '2012-08-28 01:47:35', '0000-00-00 00:00:00'),
(6, 6, '#', '2012-08-29 04:33:57', '0000-00-00 00:00:00'),
(7, 7, 'directores_controller/index', '2012-08-29 04:33:57', '0000-00-00 00:00:00'),
(8, 8, 'lineas_accion_controller/index', '2012-08-29 04:33:57', '0000-00-00 00:00:00'),
(9, 9, 'escuelas_controller/index', '2012-08-29 04:33:57', '0000-00-00 00:00:00'),
(10, 10, 'departamentos_controller/index', '2012-08-29 04:33:57', '0000-00-00 00:00:00'),
(11, 11, 'periodos_controller/index', '2012-08-29 20:24:42', '0000-00-00 00:00:00'),
(12, 12, 'localidades_controller/index', '2012-08-29 20:24:25', '2012-08-29 17:24:25'),
(13, 13, 'sispermisos_controller/index', '2012-09-05 05:40:51', '0000-00-00 00:00:00'),
(14, 14, 'sismenu_controller/index', '2012-09-05 07:06:44', '0000-00-00 00:00:00'),
(15, 15, 'perfiles_controller/index', '2012-09-05 19:29:44', '0000-00-00 00:00:00'),
(16, 16, 'admin', '2012-09-10 20:34:11', '0000-00-00 00:00:00'),
(17, 17, 'titulos_controller/index', '2012-09-12 21:47:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `titulos`
--

CREATE TABLE IF NOT EXISTS `titulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `titulos`
--

INSERT INTO `titulos` (`id`, `nombre`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'Ingeniero en Sistemas', 7, NULL, '2012-09-13 01:06:17'),
(2, 'Profesor Lengua', 8, NULL, '2012-09-13 00:29:58'),
(3, 'Profesor Matemáticas', 7, NULL, '2012-09-13 01:06:02');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_circuito_id` FOREIGN KEY (`circuito_id`) REFERENCES `circuitos` (`id`);

--
-- Constraints for table `docentes_escuelas`
--
ALTER TABLE `docentes_escuelas`
  ADD CONSTRAINT `docentes_escuelas_escuela_id` FOREIGN KEY (`escuela_id`) REFERENCES `escuelas` (`id`),
  ADD CONSTRAINT `docentes_escuelas_docente_perfil_id` FOREIGN KEY (`docente_perfil_id`) REFERENCES `docentes_perfiles` (`id`);

--
-- Constraints for table `escuelas`
--
ALTER TABLE `escuelas`
  ADD CONSTRAINT `escuelas_departamento_id` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`);

--
-- Constraints for table `horas_institucionales`
--
ALTER TABLE `horas_institucionales`
  ADD CONSTRAINT `lineas_accion_docentes_id` FOREIGN KEY (`linea_accion_docente_id`) REFERENCES `lineas_accion_docentes` (`id`),
  ADD CONSTRAINT `horas_institucionales_linea_periodo_escuela_id` FOREIGN KEY (`linea_periodo_escuela_id`) REFERENCES `lineas_periodos_escuelas` (`id`);

--
-- Constraints for table `lineas_accion`
--
ALTER TABLE `lineas_accion`
  ADD CONSTRAINT `lineas_accion_ciclo` FOREIGN KEY (`ciclo`) REFERENCES `sys_tabgral` (`id`);

--
-- Constraints for table `lineas_accion_docentes`
--
ALTER TABLE `lineas_accion_docentes`
  ADD CONSTRAINT `lineas_accion_docentes_linea_accion_id` FOREIGN KEY (`linea_accion_id`) REFERENCES `lineas_accion` (`id`),
  ADD CONSTRAINT `lineas_accion_docentes_docente_perfil_id` FOREIGN KEY (`docente_perfil_id`) REFERENCES `docentes_perfiles` (`id`);

--
-- Constraints for table `lineas_periodos_escuelas`
--
ALTER TABLE `lineas_periodos_escuelas`
  ADD CONSTRAINT `lineas_periodos_escuelas_periodo_escuela_id` FOREIGN KEY (`periodo_escuela_id`) REFERENCES `periodos_escuelas` (`id`);

--
-- Constraints for table `periodos`
--
ALTER TABLE `periodos`
  ADD CONSTRAINT `periodos_estado_tabgral` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`);

--
-- Constraints for table `periodos_escuelas`
--
ALTER TABLE `periodos_escuelas`
  ADD CONSTRAINT `periodos_escuelas_estado_sys_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`),
  ADD CONSTRAINT `fk_periodos_escuelas_periodos` FOREIGN KEY (`periodo_id`) REFERENCES `periodos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sys_menu`
--
ALTER TABLE `sys_menu`
  ADD CONSTRAINT `sismenu_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`);

--
-- Constraints for table `sys_perfil`
--
ALTER TABLE `sys_perfil`
  ADD CONSTRAINT `sisperfil_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`),
  ADD CONSTRAINT `perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `sys_perfiles` (`id`),
  ADD CONSTRAINT `sisperfil_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sys_menu` (`id`);

--
-- Constraints for table `sys_perfiles`
--
ALTER TABLE `sys_perfiles`
  ADD CONSTRAINT `perfiles_tabgral_id` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`);

--
-- Constraints for table `sys_permisos`
--
ALTER TABLE `sys_permisos`
  ADD CONSTRAINT `sispermisos_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `sys_perfiles` (`id`);

--
-- Constraints for table `sys_tabgral`
--
ALTER TABLE `sys_tabgral`
  ADD CONSTRAINT `grupos_tabgral_id` FOREIGN KEY (`grupos_tabgral_id`) REFERENCES `sys_grupos_tabgral` (`id`);

--
-- Constraints for table `sys_usuarios`
--
ALTER TABLE `sys_usuarios`
  ADD CONSTRAINT `usuarios_perfiles_id` FOREIGN KEY (`perfiles_id`) REFERENCES `sys_perfiles` (`id`),
  ADD CONSTRAINT `usuarios_estado` FOREIGN KEY (`estado`) REFERENCES `sys_tabgral` (`id`);

--
-- Constraints for table `sys_vinculos`
--
ALTER TABLE `sys_vinculos`
  ADD CONSTRAINT `sisvinculos_sismenu_id` FOREIGN KEY (`sismenu_id`) REFERENCES `sys_menu` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
