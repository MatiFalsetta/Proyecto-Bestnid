-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-06-2015 a las 18:15:18
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectobestnid`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
`idCategoria` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`) VALUES
(1, 'Televisores'),
(2, 'Celulares'),
(3, 'VideoJuegos'),
(5, 'Computadoras'),
(6, 'Notebooks'),
(7, 'Libros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE IF NOT EXISTS `comentario` (
`idComentario` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` datetime NOT NULL,
  `idSubasta` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
`idOferta` int(11) NOT NULL,
  `ganador` tinyint(1) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `fecha` datetime NOT NULL,
  `IdSubasta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE IF NOT EXISTS `subasta` (
`idSubasta` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` text NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subasta`
--

INSERT INTO `subasta` (`idSubasta`, `titulo`, `descripcion`, `foto`, `fechaInicio`, `fechaFin`, `IdUsuario`) VALUES
(23, 'Manga de Naruto', 'Subasto el manga de Naruto, de los tomos 1 al 20.', 'imagenes/0e7aef606d6a1dfd2c193ec7586e86cb.jpg', '2015-06-02', '2015-06-23', 1),
(24, 'PlayStation 3', 'Se subasta una PlayStation 3 en perfecto estado con un aÃ±o de uso.', 'imagenes/ps3_slim_640_ars-thumb-640xauto-7741.jpg', '2015-06-02', '2015-06-22', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastacategoria`
--

CREATE TABLE IF NOT EXISTS `subastacategoria` (
`idSubastaCategoria` int(11) NOT NULL,
  `idSubasta` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subastacategoria`
--

INSERT INTO `subastacategoria` (`idSubastaCategoria`, `idSubasta`, `idCategoria`) VALUES
(12, 23, 3),
(13, 23, 7),
(14, 24, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`idUsuario` int(11) NOT NULL,
  `administrador` tinyint(1) NOT NULL,
  `fechaNac` date NOT NULL,
  `mail` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` int(11) NOT NULL,
  `tarjetaCredito` int(11) NOT NULL,
  `contrasenia` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `administrador`, `fechaNac`, `mail`, `nombre`, `apellido`, `dni`, `tarjetaCredito`, `contrasenia`) VALUES
(1, 1, '1993-08-14', 'mati_7722@hotmail.com', 'Matias Carlos', 'Falsetta', 37802912, 123456789, 'matias93'),
(2, 0, '1987-05-29', 'pablo_la@yahoo.com', 'Pablo', 'Lazaro', 31825649, 789123654, 'pablito87'),
(6, 1, '1993-07-25', 'julidz@gmail.com', 'Julian', 'Deza', 37802913, 35795145, 'gandalf21'),
(14, 0, '1993-08-25', 'lucia@hotmail.com', 'Lucia', 'Jalus', 38691482, 68432796, 'almidon33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
 ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
 ADD PRIMARY KEY (`idComentario`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
 ADD PRIMARY KEY (`idOferta`);

--
-- Indices de la tabla `subasta`
--
ALTER TABLE `subasta`
 ADD PRIMARY KEY (`idSubasta`);

--
-- Indices de la tabla `subastacategoria`
--
ALTER TABLE `subastacategoria`
 ADD PRIMARY KEY (`idSubastaCategoria`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
MODIFY `idSubasta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `subastacategoria`
--
ALTER TABLE `subastacategoria`
MODIFY `idSubastaCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
