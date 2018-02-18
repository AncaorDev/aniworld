-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-02-2018 a las 06:25:11
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `aniworld`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anime`
--

CREATE TABLE IF NOT EXISTS `anime` (
`id_anime` int(5) NOT NULL,
  `nom_anime` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_anime` varchar(700) COLLATE utf8_unicode_ci NOT NULL,
  `gen_anime` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_estudio` int(5) NOT NULL,
  `id_estado` int(2) NOT NULL,
  `id_temp` int(4) NOT NULL,
  `epi_anime` int(4) NOT NULL,
  `img_anime` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `anime`
--

INSERT INTO `anime` (`id_anime`, `nom_anime`, `descrip_anime`, `gen_anime`, `id_estudio`, `id_estado`, `id_temp`, `epi_anime`, `img_anime`) VALUES
(2, 'Gakusen Toshi Asterisk', 'En el siglo pasado, la humanidad fue atacada por un desastre sin precedentes... el impacto “Invertia”. El mundo fue completamente destruido.\r\nSin embargo, los humanos adquirieron un nuevo poder: el “Genestella”.', '1,9,10,11,15,16,17', 1, 1, 3, 12, 'Gakusen-Toshi-Asterisk-Houka-Kenran.jpg'),
(14, 'Charlotte', 'En el mundo aparecen niños con poderes sobrenaturales , y son capturados por una organización que desea tomar ventaja de estos poderes, Tomori es una chica que los busca y los protege antes que esa organización, pero su aventura comienza al conocer a Yu.', '1,10,14', 2, 2, 1, 12, 'wallhaven-352811.jpg'),
(15, 'Gakusen Toshi Asterisk S2', 'En el siglo pasado, la humanidad fue atacada por un desastre sin precedentes... el impacto “Invertia”. El mundo fue completamente destruido. Sin embargo, los humanos adquirieron un nuevo poder: el “Genestella”.', '1,9,10,15', 1, 1, 3, 12, 's2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudio`
--

CREATE TABLE IF NOT EXISTS `estudio` (
`id_estudio` int(5) NOT NULL,
  `nom_estudio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_estudio` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `estudio`
--

INSERT INTO `estudio` (`id_estudio`, `nom_estudio`, `descrip_estudio`) VALUES
(1, 'A1 Pictures', '  '),
(2, 'Mad House', ''),
(3, 'Shaft', ''),
(4, 'Kyoto Animation', '      '),
(5, 'Trigger', '    ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE IF NOT EXISTS `favoritos` (
`id_fav` int(5) NOT NULL,
  `id_user` int(11) NOT NULL,
  `lista_animes` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id_fav`, `id_user`, `lista_animes`) VALUES
(1, 1, '2,16,14,15'),
(2, 3, ''),
(3, 4, '2,15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE IF NOT EXISTS `genero` (
`id_gen` int(11) NOT NULL,
  `nom_gen` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_gen` varchar(90) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id_gen`, `nom_gen`, `descrip_gen`) VALUES
(1, 'Shonen', ' '),
(2, 'Yuri', ' '),
(9, 'Ecchi', '    '),
(10, 'Aventura', '       '),
(11, 'Romance', '    '),
(12, 'Deportes', '    '),
(14, 'Misterio', ' '),
(15, 'Harem', ' '),
(16, 'Sobrenatural ', ' '),
(17, 'Acción', ' ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE IF NOT EXISTS `lista` (
`id_anime` int(4) NOT NULL,
  `nom_anime` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_anime` varchar(300) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `lista`
--

INSERT INTO `lista` (`id_anime`, `nom_anime`, `descrip_anime`) VALUES
(1, 'Anitore ', ' Anime que quiero ver, no te olvides descargar , hola\r\n'),
(3, 'Hackadoll the Animation', 'Descargar parece interesante '),
(4, 'Owarimonogatari', ' Descargar , es buena  , yeah\r\n'),
(5, 'One Piece', 'Actualizado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipouser`
--

CREATE TABLE IF NOT EXISTS `tipouser` (
`id_tipouser` int(3) NOT NULL,
  `name_tipouser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_tipouser` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipouser`
--

INSERT INTO `tipouser` (`id_tipouser`, `name_tipouser`, `descrip_tipouser`) VALUES
(1, 'Administrador', 'Moderador'),
(2, 'Moderador', 'Moderador'),
(8, 'Programador', 'Modo Dios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id_user` int(11) NOT NULL,
  `id_tipouser` int(3) NOT NULL,
  `nom_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass_user` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `mail_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `id_tipouser`, `nom_user`, `pass_user`, `mail_user`) VALUES
(1, 1, 'Administrador', '65402f90ef3ceb04c9a50fe3b5aa895d', ''),
(3, 2, 'Moderador', '65402f90ef3ceb04c9a50fe3b5aa895d', ''),
(4, 8, 'Programador', '65402f90ef3ceb04c9a50fe3b5aa895d', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anime`
--
ALTER TABLE `anime`
 ADD PRIMARY KEY (`id_anime`), ADD KEY `id_estudio` (`id_estudio`);

--
-- Indices de la tabla `estudio`
--
ALTER TABLE `estudio`
 ADD PRIMARY KEY (`id_estudio`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
 ADD PRIMARY KEY (`id_fav`), ADD KEY `id_user` (`id_user`), ADD KEY `lista_anime` (`lista_animes`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
 ADD PRIMARY KEY (`id_gen`), ADD KEY `nom_gen` (`nom_gen`), ADD KEY `descrip_gen` (`descrip_gen`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
 ADD PRIMARY KEY (`id_anime`);

--
-- Indices de la tabla `tipouser`
--
ALTER TABLE `tipouser`
 ADD PRIMARY KEY (`id_tipouser`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id_user`), ADD KEY `id_tipouser` (`id_tipouser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anime`
--
ALTER TABLE `anime`
MODIFY `id_anime` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `estudio`
--
ALTER TABLE `estudio`
MODIFY `id_estudio` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
MODIFY `id_fav` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
MODIFY `id_gen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
MODIFY `id_anime` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tipouser`
--
ALTER TABLE `tipouser`
MODIFY `id_tipouser` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `anime`
--
ALTER TABLE `anime`
ADD CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`id_estudio`) REFERENCES `estudio` (`id_estudio`);

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
ADD CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_tipouser`) REFERENCES `tipouser` (`id_tipouser`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
