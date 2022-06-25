-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-06-2022 a las 21:06:14
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_hab`
--

DROP TABLE IF EXISTS `estado_hab`;
CREATE TABLE IF NOT EXISTS `estado_hab` (
  `idEstado` int(11) NOT NULL AUTO_INCREMENT,
  `estado` varchar(20) NOT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

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
  `numero` varchar(4) NOT NULL,
  `idTipoHab` int(11) DEFAULT NULL,
  `idEstado` int(11) DEFAULT NULL,
  PRIMARY KEY (`idHab`),
  KEY `idTipoHab` (`idTipoHab`),
  KEY `idEstado` (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

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
  `idReserva` int(11) NOT NULL AUTO_INCREMENT,
  `idCliente` int(11) DEFAULT NULL,
  `idUser` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  PRIMARY KEY (`idReserva`),
  KEY `idCliente` (`idCliente`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `idRol` int(11) NOT NULL AUTO_INCREMENT,
  `cargo` varchar(20) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`idRol`, `cargo`) VALUES
(1, 'Administrador'),
(2, 'Recepcionista');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`idTipo`, `tipo`, `precio`) VALUES
(1, 'Simple', '20.00'),
(2, 'Doble', '50.00'),
(3, 'Triple', '70.00'),
(4, 'Suites', '100.00'),
(5, 'Familiar', '120.00'),
(6, 'Matrimonial', '150.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `pass` varchar(70) NOT NULL,
  `dni` varchar(10) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellidoMaterno` varchar(20) NOT NULL,
  `apellidoPaterno` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `idRol` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idRol` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `pass`, `dni`, `nombre`, `apellidoMaterno`, `apellidoPaterno`, `telefono`, `correo`, `idRol`) VALUES
(1, 'admin', '$2y$10$lXy7A6GxW2Qb5OImtOSIHOEilMYjt9VT.T6HloTkgw07z5WBmypsq', '73000', 'alvaro', 'rivera', 'ramirez', '543543543', 'sdfcvxcvcv', 1),
(2, 'user', '$2y$10$zQdY4DSLnyaDSnwLzZIqiedcvOblAW.MN5qWIvSfdlA8ZogTXgs2S', '54354245', 'carlos', 'yufra', 'loza', '646123', 'erfgfvcxv', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_reserva`
--
ALTER TABLE `detalle_reserva`
  ADD CONSTRAINT `detalle_reserva_ibfk_1` FOREIGN KEY (`idReserva`) REFERENCES `reserva` (`idReserva`),
  ADD CONSTRAINT `detalle_reserva_ibfk_2` FOREIGN KEY (`idHab`) REFERENCES `habitacion` (`idHab`);

--
-- Filtros para la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD CONSTRAINT `habitacion_ibfk_1` FOREIGN KEY (`idTipoHab`) REFERENCES `tipo_habitacion` (`idTipo`),
  ADD CONSTRAINT `habitacion_ibfk_2` FOREIGN KEY (`idEstado`) REFERENCES `estado_hab` (`idEstado`);

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `roles` (`idRol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
