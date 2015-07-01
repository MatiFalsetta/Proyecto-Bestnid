-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2015 a las 15:20:00
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombre`) VALUES
(1, 'Televisor'),
(2, 'Celular'),
(3, 'VideoJuego'),
(5, 'Computadora'),
(6, 'Notebook'),
(7, 'Libro'),
(9, 'lolas');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`idComentario`, `descripcion`, `fecha`, `idSubasta`, `idUsuario`) VALUES
(2, 'Hola que tal!?', '2015-06-12 23:59:37', 24, 1),
(3, 'Todo bien, acÃ¡ probando la caja de comentarios.', '2015-06-13 00:00:55', 24, 1),
(4, 'Aca vamos a probar una comentario de mas de una linea de texto para ver que pasa cuando tiene que bajar al siguiente renglon y como resopnde el css y comprobar que se esta haciendo bien el estilo de la aplicaciÃ³n web.', '2015-06-13 00:37:45', 24, 1),
(5, 'Holis!', '2015-06-13 01:12:58', 25, 1),
(8, 'Comentario random numero 27 version 3.723', '2015-06-15 02:44:45', 28, 1),
(9, 'efsdgsdsd', '2015-06-20 00:34:27', 23, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comision`
--

CREATE TABLE IF NOT EXISTS `comision` (
`idComision` int(11) NOT NULL,
  `porcentaje` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `comision`
--

INSERT INTO `comision` (`idComision`, `porcentaje`) VALUES
(1, 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

CREATE TABLE IF NOT EXISTS `oferta` (
`idOferta` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` float NOT NULL,
  `fecha` datetime NOT NULL,
  `IdSubasta` int(11) NOT NULL,
  `IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`idOferta`, `descripcion`, `precio`, `fecha`, `IdSubasta`, `IdUsuario`) VALUES
(7, 'Te voy a rezar toda mi vida por tu seguridad si me elegÃ­s a mi!', 20, '2015-06-18 00:13:27', 24, 20),
(8, 'Amo al kingdom!', 122, '2015-06-18 00:15:20', 29, 20),
(10, 'Por que me encanta!', 2, '2015-06-20 00:35:57', 29, 1),
(11, 'Me encantÃ³!', 105, '2015-06-30 01:18:00', 25, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subasta`
--

CREATE TABLE IF NOT EXISTS `subasta` (
`idSubasta` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `foto` text NOT NULL,
  `fechaInicio` datetime NOT NULL,
  `fechaFin` datetime NOT NULL,
  `IdUsuario` int(11) NOT NULL,
  `idOfertaGanadora` int(11) NOT NULL DEFAULT '-1',
  `pago` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subasta`
--

INSERT INTO `subasta` (`idSubasta`, `titulo`, `descripcion`, `foto`, `fechaInicio`, `fechaFin`, `IdUsuario`, `idOfertaGanadora`, `pago`) VALUES
(23, 'Manga de Naruto', 'Subasto el manga de Naruto, de los tomos 1 al 20.', 'imagenes/0e7aef606d6a1dfd2c193ec7586e86cb.jpg', '2015-06-02 09:21:40', '2015-06-23 23:30:00', 1, -1, 0),
(24, 'PlayStation 3', 'Se subasta una PlayStation 3 en perfecto estado con un aÃ±o de uso.', 'imagenes/ps3_slim_640_ars-thumb-640xauto-7741.jpg', '2015-06-02 15:07:04', '2015-07-22 03:03:03', 1, -1, 0),
(25, 'Televisor Samsung', 'Oferto al mejor postor un televisor Samsung 32" SmartTV. El modelo es Samsung 32h5500 y esta sin estrenar.', 'imagenes/bcf82c8a3080e98547c79cf30dbbb92ffd301008.jpg', '2015-06-02 01:10:01', '2015-06-23 22:00:50', 15, 11, 0),
(26, 'Nokia Lumia 635', 'Quiero subastar mi celular nokia lumia 635 con 3 meses de uso ya que conseguÃ­ uno nuevo. Se lo voy a dar al que me diga por que lo necesita y para que dependiendo de la urgencia.', 'imagenes/Lumia-635-1.jpg', '2015-05-20 23:59:04', '2015-06-07 21:00:59', 1, -1, 0),
(28, 'Nueva subasta', 'subasto estas dos mascotas para su confort', 'imagenes/WP_20150501_12_48_51_Pro.jpg', '2015-06-05 14:35:02', '2015-07-05 23:59:00', 1, -1, 0),
(29, 'Kingdom Hearts', 'Juego de ps2 en perfecto estado y con muy poco uso.', 'imagenes/kingdomhearts-03.jpg', '2015-06-05 14:45:08', '2015-07-14 00:00:00', 15, -1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subastacategoria`
--

CREATE TABLE IF NOT EXISTS `subastacategoria` (
`idSubastaCategoria` int(11) NOT NULL,
  `idSubasta` int(11) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subastacategoria`
--

INSERT INTO `subastacategoria` (`idSubastaCategoria`, `idSubasta`, `idCategoria`) VALUES
(12, 23, 3),
(13, 23, 7),
(14, 24, 3),
(15, 25, 1),
(16, 26, 2),
(17, 27, 1),
(18, 27, 3),
(19, 27, 5),
(20, 27, 6),
(21, 28, 3),
(22, 28, 6),
(23, 29, 3),
(24, 29, 5);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `administrador`, `fechaNac`, `mail`, `nombre`, `apellido`, `dni`, `tarjetaCredito`, `contrasenia`) VALUES
(1, 1, '1993-08-14', 'mati_7722@hotmail.com', 'Matias', 'Falsetta', 37802912, 1234567890, 'matias93'),
(2, 0, '1987-05-29', 'pablo_la@yahoo.com', 'Pablo', 'Lazaro', 31825649, 789123654, 'pablito87'),
(6, 1, '1993-07-25', 'julidz@gmail.com', 'Julian', 'Deza', 37802913, 35795145, 'gandalf21'),
(14, 0, '1993-08-25', 'lucia@hotmail.com', 'Lucia', 'Jalus', 38691482, 68432796, 'almidon33'),
(15, 0, '1999-03-05', 'rochifalsetta@hotmail.com.ar', 'Rocio', 'Falsetta', 41764696, 532112, '4793483raf'),
(16, 0, '1990-06-05', 'matu_cx@hotmail.com.ar', 'Matute', 'Morales', 56498321, 2147483647, '123456qwerty'),
(17, 0, '1998-06-05', 'sandra@hotmail.com.ar', 'Santra', 'Ledesma', 1231231, 312313123, '21313qweqwe'),
(18, 0, '1987-01-12', 'pablo@hotmail.com', 'Pablo', 'Lujan', 312124124, 2147483647, '564987qedga'),
(19, 0, '2090-06-17', 'matias@matias.com', 'matias', 'matias', 33333333, 333333333, 'matias123'),
(20, 0, '1993-08-14', 'mati_772@hotmail.com', 'Matias', 'Falsetta', 37802912, 324198461, 'matias93');

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
-- Indices de la tabla `comision`
--
ALTER TABLE `comision`
 ADD PRIMARY KEY (`idComision`);

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
MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
MODIFY `idComentario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `comision`
--
ALTER TABLE `comision`
MODIFY `idComision` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
MODIFY `idOferta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `subasta`
--
ALTER TABLE `subasta`
MODIFY `idSubasta` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `subastacategoria`
--
ALTER TABLE `subastacategoria`
MODIFY `idSubastaCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
