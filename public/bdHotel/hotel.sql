-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-07-2022 a las 03:16:37
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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `dni`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `email`, `created_at`, `updated_at`) VALUES
(1, '74916163', 'Sergio', 'Linares', NULL, '917484585', NULL, NULL, NULL),
(2, '70548126', 'Camila', 'Hernandez', NULL, '978946143', NULL, NULL, NULL);

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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idHab`),
  KEY `idTipoHab` (`idTipoHab`),
  KEY `idEstado` (`idEstado`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`idHab`, `numero`, `idTipoHab`, `idEstado`, `created_at`, `updated_at`) VALUES
(1, '151', 5, 1, '2022-07-06 15:00:12', NULL),
(2, '152', 2, 1, '2022-07-06 15:00:12', NULL),
(3, '153', 4, 1, '2022-07-06 15:00:12', NULL),
(4, '154', 3, 1, '2022-07-06 15:00:12', NULL),
(5, '155', 5, 3, '2022-07-06 15:00:12', NULL),
(6, '156', 1, 1, '2022-07-06 15:00:12', NULL),
(7, '157', 2, 1, '2022-07-06 15:00:12', NULL),
(8, '158', 3, 1, '2022-07-06 15:00:12', NULL),
(9, '159', 4, 2, '2022-07-06 15:00:12', NULL),
(10, '160', 5, 1, '2022-07-06 15:00:12', NULL),
(11, '161', 5, 1, '2022-07-06 15:00:12', NULL),
(12, '162', 3, 1, '2022-07-06 15:00:12', NULL),
(13, '163', 1, 1, '2022-07-06 15:00:12', NULL),
(14, '164', 2, 1, '2022-07-06 15:00:12', NULL),
(15, '165', 4, 1, '2022-07-06 15:00:12', NULL);

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
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
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
  `descripcion` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`idTipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_habitacion`
--

INSERT INTO `tipo_habitacion` (`idTipo`, `tipo`, `precio`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Simple', '20.00', NULL, NULL, NULL),
(2, 'Doble', '50.00', NULL, NULL, NULL),
(3, 'Triple', '70.00', NULL, NULL, NULL),
(4, 'Suites', '100.00', NULL, NULL, NULL),
(5, 'Familiar', '120.00', NULL, NULL, NULL),
(6, 'Matrimonial', '150.00', NULL, NULL, NULL);

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
  `apellidoPaterno` varchar(20) NOT NULL,
  `apellidoMaterno` varchar(20) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `idRol` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idRol` (`idRol`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `username`, `pass`, `dni`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `telefono`, `email`, `idRol`, `created_at`, `updated_at`, `activo`) VALUES
(1, 'admin', '$2y$10$lXy7A6GxW2Qb5OImtOSIHOEilMYjt9VT.T6HloTkgw07z5WBmypsq', '73000', 'alvaro', 'rivera', 'ramirez', '543543543', 'alvarirvera2001@gmail.com', 1, '2022-06-30 15:47:49', NULL, 1),
(2, 'user', '$2y$10$zQdY4DSLnyaDSnwLzZIqiedcvOblAW.MN5qWIvSfdlA8ZogTXgs2S', '54354245', 'carlos', 'yufra', 'loza', '981161423', 'carlos222@gmail.com', 2, '2022-06-30 15:48:37', '2022-07-09 21:36:06', 1),
(3, 'Aldo', '$2y$10$YYUoBN6UWLjSYvZ7QvRbmumaCq9zyX19.wWdxQp44k0.yavtNRB8u', '7324343', 'Aldo', 'Centeno', 'Maquera', '94523452', 'aldo111@hotmail.com', 1, '2022-06-30 15:49:09', '2022-07-09 21:33:48', 1),
(4, 'arturo', '$2y$10$fVL.1aSttFNRap5hV5/p3eYq3vbu899qDvyy9vO2ssF5sjdLmREUy', '716156', 'Arturo', 'Mayta', 'Castillo', '924525414', 'arturo11@gmail.com', 1, '2022-07-04 19:31:25', NULL, 1),
(5, 'richard', '$2y$10$lXy7A6GxW2Qb5OImtOSIHOEilMYjt9VT.T6HloTkgw07z5WBmypsq', '75745', 'Richar', 'Ticona', 'Copari', '94532542', 'richard@gmail.com', 2, '2022-07-04 19:33:06', NULL, 1),
(6, 'diego', '$2y$10$99iiUlDk.KC5KtyMIrkx1O1zWPgH5YrPnBfKzVp0IrlxNvyyrVdQe', '7575786', 'Diego', 'Gomez', '', '756164542', 'diego_gomez@gmail.com', 2, '2022-07-04 20:53:34', '2022-07-09 21:32:31', 1);

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
