-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2016 a las 02:03:19
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `windowstelecom`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
`id` int(1) NOT NULL,
  `nombre` tinytext,
  `usuario` varchar(45) DEFAULT NULL,
  `clave` varchar(45) DEFAULT NULL,
  `pSecreta` varchar(45) DEFAULT NULL,
  `rSecreta` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `usuario`, `clave`, `pSecreta`, `rSecreta`) VALUES
(1, NULL, 'Vikttorly', '25132279', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
`id` int(4) NOT NULL,
  `nombre` tinytext,
  `email` varchar(45) DEFAULT NULL,
  `telefono` int(15) DEFAULT NULL,
  `mensaje` varchar(3000) DEFAULT NULL,
  `leido` tinyint(1) NOT NULL,
  `estado` char(1) DEFAULT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `email`, `telefono`, `mensaje`, `leido`, `estado`, `fecha`) VALUES
(1, 'VICTOR MANUEL', 'viclaya1@hotmail.com', 2147483647, 'viasdasdaklsjdadasdas', 1, 'E', '2016-07-14 18:49:25'),
(2, 'QWEQWEqw', '12qewqwe123', 2147483647, '3qweqeqw', 1, 'E', '2016-07-14 21:47:30'),
(3, 'GABRIEL CORTEZ', 'gabrielito@gmail.com', 2147483647, 'HOLA ESTO ES UNA PRUEBA', 1, 'E', '2016-07-17 20:23:50'),
(4, 'MANUEL', 'manueo@gmail.com', 874645789, 'adqweqwasdasdasdasd', 1, 'E', '2016-07-23 17:05:59');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
 ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
MODIFY `id` int(1) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
