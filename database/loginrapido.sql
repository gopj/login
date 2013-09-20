-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-09-2013 a las 22:10:55
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `loginrapido`
--
CREATE DATABASE `loginrapido` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `loginrapido`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `idLog` int(11) NOT NULL AUTO_INCREMENT,
  `idUser` int(11) NOT NULL,
  `created` datetime NOT NULL,
  PRIMARY KEY (`idLog`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`idLog`, `idUser`, `created`) VALUES
(1, 1, '2013-09-19 02:54:29'),
(2, 1, '2013-09-18 19:57:39'),
(3, 1, '2013-09-18 20:00:45'),
(4, 1, '2013-09-18 20:02:40'),
(5, 1, '2013-09-20 14:56:18'),
(6, 1, '2013-09-20 14:56:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE IF NOT EXISTS `registros` (
  `idRegistro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8_bin NOT NULL,
  `carrera` varchar(60) COLLATE utf8_bin NOT NULL,
  `sexo` char(1) COLLATE utf8_bin NOT NULL,
  `semestre` tinyint(4) NOT NULL,
  `facultad` int(11) NOT NULL,
  PRIMARY KEY (`idRegistro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idUser` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `password` varchar(32) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `username`, `password`) VALUES
(1, 'kike', '066fc7b468bbf62055fe69a4f097de90');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
