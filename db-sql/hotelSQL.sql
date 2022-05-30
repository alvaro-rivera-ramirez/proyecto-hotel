-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 30-05-2022 a las 23:09:59
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotelmr`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

DROP TABLE IF EXISTS `cliente`;
CREATE TABLE IF NOT EXISTS `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(9) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoPaterno` varchar(20) DEFAULT NULL,
  `apellidoMaterno` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `dni`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `email`) VALUES
(1, '74916163', 'Sergio', 'Linares', NULL, '917484585', NULL),
(2, '70548126', 'Camila', 'Hernandez', NULL, '978946143', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_reserva`
--

DROP TABLE IF EXISTS `detalle_reserva`;
CREATE TABLE IF NOT EXISTS `detalle_reserva` (
  `idDetalle` int(11) NOT NULL AUTO_INCREMENT,
  `idReserva` int(11) DEFAULT NULL,
  `idHab` int(11) DEFAULT NULL,
  `fechaIni` date DEFAULT NULL,
  `fechaFin` date DEFAULT NULL,
  `dias` int(11) DEFAULT NULL,
  `precio` decimal(5,2) DEFAULT NULL,
  PRIMARY KEY (`idDetalle`),
  KEY `idReserva` (`idReserva`),
  KEY `idHab` (`idHab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

DROP TABLE IF EXISTS `empleado`;
CREATE TABLE IF NOT EXISTS `empleado` (
  `idEmp` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(9) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellidoPaterno` varchar(20) DEFAULT NULL,
  `apellidoMaterno` varchar(20) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`idEmp`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmp`, `dni`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `email`) VALUES
(1, '72009522', 'Gustavo', 'Lopez', NULL, '954845106', NULL),
(2, '71121266', 'Marco', 'Navarro', NULL, '997646123', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_hab`
--

DROP TABLE IF EXISTS `estado_hab`;
CREATE TABLE IF NOT EXISTS `estado_hab` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_hab`
--

INSERT INTO `estado_hab` (`idEstado`, `estado`) VALUES
(1, 'Disponible'),
(2, 'Reservado'),
(3, 'Ocupado'),
(4, 'Limpieza'),
(5, 'Inhabilitado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

DROP TABLE IF EXISTS `habitacion`;
CREATE TABLE IF NOT EXISTS `habitacion` (
  `idHab` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(4) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `idTipoHab` int(11) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idHab`),
  KEY `idTipoHab` (`idTipoHab`),
  KEY `idEstado` (`idEstado`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`idHab`, `numero`, `idTipoHab`, `idEstado`) VALUES
(1, '151', 5, 1),
(2, '152', 2, 1),
(3, '153', 4, 1),
(4, '154', 3, 1),
(5, '155', 5, 1),
(6, '156', 1, 1),
(7, '157', 2, 1),
(8, '158', 3, 1),
(9, '159', 4, 1),
(10, '160', 5, 1),
(11, '161', 5, 1),
(12, '162', 3, 1),
(13, '163', 1, 1),
(14, '164', 2, 1),
(15, '165', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

DROP TABLE IF EXISTS `reserva`;
CREATE TABLE IF NOT EXISTS `reserva` (
  `idReserva` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idEmp` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `idCliente` (`idCliente`),
  KEY `idEmp` (`idEmp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `rol` varchar(15) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `rol`) VALUES
(1, 'administrador'),
(2, 'recepcionista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_habitacion`
--

DROP TABLE IF EXISTS `tipo_habitacion`;
CREATE TABLE IF NOT EXISTS `tipo_habitacion` (
  `idTipo` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(30) DEFAULT NULL,
  `precio` decimal(6,2) DEFAULT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`idTipo`, `tipo`, `precio`) VALUES
(1, 'Simple', NULL),
(2, 'Doble', NULL),
(3, 'Triple', NULL),
(4, 'Suites', NULL),
(5, 'Familiar', NULL),
(6, 'Matrimonial', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(10) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL,
  `idEmp` int(11) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `index_idEmp` (`idEmp`),
  KEY `idRol` (`idRol`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUser`, `username`, `password`, `idRol`, `idEmp`) VALUES
(1, 'admin11', 'admin11', 1, 1),
(2, 'user11', 'user11', 2, 2);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
