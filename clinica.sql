-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-01-2018 a las 04:02:02
-- Versión del servidor: 5.7.19
-- Versión de PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinica`
--
CREATE DATABASE IF NOT EXISTS `clinica` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci;
USE `clinica`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

DROP TABLE IF EXISTS `citas`;
CREATE TABLE IF NOT EXISTS `citas` (
  `idCita` int(9) NOT NULL AUTO_INCREMENT,
  `hora` int(2) NOT NULL,
  `minuto` int(2) NOT NULL,
  `dia` int(2) NOT NULL,
  `mes` int(2) NOT NULL,
  `anno` int(4) NOT NULL,
  `idPaciente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `idEspecialidad` int(10) NOT NULL,
  `idMascota` int(11) NOT NULL,
  PRIMARY KEY (`idCita`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

DROP TABLE IF EXISTS `contacto`;
CREATE TABLE IF NOT EXISTS `contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `mensaje` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `leido` tinyint(1) NOT NULL DEFAULT '0',
  `respondido` tinyint(1) NOT NULL DEFAULT '0',
  `respuesta` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

DROP TABLE IF EXISTS `especialidad`;
CREATE TABLE IF NOT EXISTS `especialidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombreVeterinario` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`id`, `especialidad`, `nombreVeterinario`) VALUES
(1, 'Exótico', ''),
(2, 'Doméstico', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historia`
--

DROP TABLE IF EXISTS `historia`;
CREATE TABLE IF NOT EXISTS `historia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idMascota` int(9) NOT NULL,
  `peso` int(4) NOT NULL,
  `identificacion` int(1) NOT NULL,
  `polivalente` int(1) NOT NULL,
  `rabia` int(1) NOT NULL,
  `despint` int(1) NOT NULL,
  `despext` int(1) NOT NULL,
  `leishmania` int(1) NOT NULL,
  `dirofilaria` int(1) NOT NULL,
  `alimentacion` int(1) NOT NULL,
  `apetito` int(1) NOT NULL,
  `comportamiento` int(1) NOT NULL,
  `animo` int(1) NOT NULL,
  `orina` int(1) NOT NULL,
  `vomito` int(1) NOT NULL,
  `tos` int(1) NOT NULL,
  `estrenimiento` int(1) NOT NULL,
  `diarrea` int(1) NOT NULL,
  `cojera` int(1) NOT NULL,
  `alergias` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `boca` int(1) NOT NULL,
  `ojos` int(1) NOT NULL,
  `oido` int(1) NOT NULL,
  `pelo` int(1) NOT NULL,
  `piel` int(1) NOT NULL,
  `abdomen` int(1) NOT NULL,
  `auscultacion` int(1) NOT NULL,
  `urogenital` int(1) NOT NULL,
  `mamas` int(1) NOT NULL,
  `ganglios` int(1) NOT NULL,
  `locomotor` int(1) NOT NULL,
  `pesoo` int(1) NOT NULL,
  `fecha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nivel` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `dni`, `clave`, `nivel`) VALUES
(2, '32070764R', '880cbc1ed48043cbcdaa7286e058ef7f', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

DROP TABLE IF EXISTS `mascota`;
CREATE TABLE IF NOT EXISTS `mascota` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `idPaciente` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `raza` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fnacimiento` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

DROP TABLE IF EXISTS `paciente`;
CREATE TABLE IF NOT EXISTS `paciente` (
  `dni` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` int(9) NOT NULL,
  PRIMARY KEY (`dni`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`dni`, `nombre`, `apellidos`, `direccion`, `telefono`) VALUES
('32070764R', 'Maria del Carmen', 'Gamaza Muñoz', 'C/ El gastor', 956703320);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
