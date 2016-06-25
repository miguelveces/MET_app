-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-06-2016 a las 17:23:49
-- Versión del servidor: 5.7.11
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mantenedor`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frases`
--

CREATE TABLE `frases` (
  `id` int(11) NOT NULL,
  `libro_id` int(11) DEFAULT NULL,
  `idioma_id` int(11) DEFAULT NULL,
  `tema_id` int(11) DEFAULT NULL,
  `frase` varchar(400) DEFAULT NULL,
  `audio_frase` varchar(400) DEFAULT NULL,
  `ultima_fecha` varchar(400) DEFAULT NULL,
  `activo` int(11) DEFAULT NULL,
  `frase_traducida` varchar(400) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `frases`
--

INSERT INTO `frases` (`id`, `libro_id`, `idioma_id`, `tema_id`, `frase`, `audio_frase`, `ultima_fecha`, `activo`, `frase_traducida`) VALUES
(1, 1, 2, 8, 'sda', '../../audios/1/', '2016-06-15 21:19:28', 1, 'asdaasdasa'),
(2, 1, 2, 8, 'ssfsdf', '../../audios/1/jrcconsultores.sql', '2016-06-15 21:25:22', 1, 'sdfsdfs'),
(3, 1, 2, 8, 'gtgt', '../../audios/1/jrcconsultores.sql', '2016-06-15 21:27:58', 1, 'rttrtttry'),
(4, 1, 2, 2, 'fsdfdf', '../../audios/1/jrcconsultores.sql', '2016-06-15 21:29:33', 1, 'sdfsdf'),
(5, 1, 2, 8, 'uytutu', '../../audios/1/jrcconsultores.sql', '2016-06-15 21:32:07', 1, 'uytutyutyut');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `cod_libro` varchar(6) NOT NULL,
  `nombre_libro` varchar(40) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `cod_libro`, `nombre_libro`, `descripcion`) VALUES
(1, 'engspa', 'English - Spanish', 'describe los temas relacionados a hotel'),
(2, 'spaeng', 'Spanish - English', 'contiene los temas relacionados a Aoropuertos.'),
(3, 'japeng', 'Portugues - English', 'Temas relacionados a Hospital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica`
--

CREATE TABLE `practica` (
  `id` int(11) NOT NULL,
  `libro_id` int(11) DEFAULT NULL,
  `tema_id` int(11) DEFAULT NULL,
  `pregunta` varchar(400) DEFAULT NULL,
  `respuesta1` varchar(400) DEFAULT NULL,
  `respuesta2` varchar(400) DEFAULT NULL,
  `respuesta3` varchar(400) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `practica`
--

INSERT INTO `practica` (`id`, `libro_id`, `tema_id`, `pregunta`, `respuesta1`, `respuesta2`, `respuesta3`, `fecha`) VALUES
(1, 1, 1, 'migel', 'adsda', 'sdasd', 'adsasdsdsds', '2016-06-12 14:24:46'),
(2, 1, 1, 'sasdasd', 'adsda', 'sdasd', 'adsasdsdsds', '2016-06-11 14:40:54'),
(3, 1, 1, 'AASASD', 'EQEQWE', 'UYUIIUY', 'lsoer', '2016-06-11 14:42:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `practica2`
--

CREATE TABLE `practica2` (
  `id` int(11) NOT NULL,
  `libro_id` int(11) DEFAULT NULL,
  `tema_id` int(11) DEFAULT NULL,
  `acomoda_frase` varchar(400) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `practica2`
--

INSERT INTO `practica2` (`id`, `libro_id`, `tema_id`, `acomoda_frase`, `fecha`) VALUES
(1, 1, 1, 'mi frase 2', '2016-06-12 14:47:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temas`
--

CREATE TABLE `temas` (
  `id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `idioma_id` int(20) DEFAULT NULL,
  `nombre_tema` varchar(40) NOT NULL,
  `descripcion_tema` varchar(200) DEFAULT NULL,
  `ultima_fecha` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `temas`
--

INSERT INTO `temas` (`id`, `libro_id`, `idioma_id`, `nombre_tema`, `descripcion_tema`, `ultima_fecha`) VALUES
(1, 1, NULL, 'hotel 1', NULL, NULL),
(2, 1, NULL, 'hotel 2', NULL, NULL),
(3, 2, NULL, 'Aeropuerto 1', NULL, NULL),
(4, 2, NULL, 'Aeropuerto 2', NULL, NULL),
(5, 3, NULL, 'Hospital 1', NULL, NULL),
(6, 3, NULL, 'Hospital 2', NULL, NULL),
(7, 1, 2, 'ni hotel', 'este es mi hotel', '2016-06-07 21:55:11'),
(8, 1, 2, 'hospital', 'mi hosital', '2016-06-10 18:40:55'),
(9, 2, 2, 'dasd', 'asd', '2016-06-22 12:20:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(1) NOT NULL,
  `nombre_usuario` varchar(20) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `apellido` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `nombre_usuario`, `password`, `nombre`, `apellido`) VALUES
(1, 'user', 'user', 'miguel', 'veces'),
(2, 'user2', 'user2', 'miguel', 'veces');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vocabularios`
--

CREATE TABLE `vocabularios` (
  `id` int(11) NOT NULL,
  `id_libro` int(11) DEFAULT NULL,
  `id_tema` int(11) DEFAULT NULL,
  `palabra` varchar(60) DEFAULT NULL,
  `traduccion` varchar(60) DEFAULT NULL,
  `fecha_modificacion` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vocabularios`
--

INSERT INTO `vocabularios` (`id`, `id_libro`, `id_tema`, `palabra`, `traduccion`, `fecha_modificacion`) VALUES
(1, 1, 7, 'perro', 'dog', '2016-06-09 22:54:50'),
(2, 1, 1, 'perro', 'xx', '2016-06-10 18:09:17'),
(3, 1, 1, 'dd', 'vvvv', '2016-06-10 18:40:16'),
(4, 1, 8, 'qq', 'wwqweqwe', '2016-06-10 18:41:09');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `frases`
--
ALTER TABLE `frases`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `practica`
--
ALTER TABLE `practica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `practica2`
--
ALTER TABLE `practica2`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `temas`
--
ALTER TABLE `temas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`);

--
-- Indices de la tabla `vocabularios`
--
ALTER TABLE `vocabularios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `frases`
--
ALTER TABLE `frases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `practica`
--
ALTER TABLE `practica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `practica2`
--
ALTER TABLE `practica2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `temas`
--
ALTER TABLE `temas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `vocabularios`
--
ALTER TABLE `vocabularios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
