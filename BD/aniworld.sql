-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.6.21 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla aniworld.anime
CREATE TABLE IF NOT EXISTS `anime` (
  `id_anime` int(5) NOT NULL AUTO_INCREMENT,
  `nom_anime` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_anime` varchar(700) COLLATE utf8_unicode_ci NOT NULL,
  `gen_anime` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `id_estudio` int(5) NOT NULL,
  `id_estado` int(2) NOT NULL,
  `id_temp` int(4) NOT NULL,
  `epi_anime` int(4) NOT NULL,
  `img_anime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_anime`),
  KEY `id_estudio` (`id_estudio`),
  CONSTRAINT `anime_ibfk_1` FOREIGN KEY (`id_estudio`) REFERENCES `estudio` (`id_estudio`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla aniworld.anime: ~3 rows (aproximadamente)
DELETE FROM `anime`;
/*!40000 ALTER TABLE `anime` DISABLE KEYS */;
INSERT INTO `anime` (`id_anime`, `nom_anime`, `descrip_anime`, `gen_anime`, `id_estudio`, `id_estado`, `id_temp`, `epi_anime`, `img_anime`) VALUES
	(2, 'Gakusen Toshi Asterisk', 'En el siglo pasado, la humanidad fue atacada por un desastre sin precedentes... el impacto “Invertia”. El mundo fue completamente destruido.\r\nSin embargo, los humanos adquirieron un nuevo poder: el “Genestella”.', '1,9,10,11,15,16,17', 1, 1, 3, 12, 'Gakusen-Toshi-Asterisk-Houka-Kenran.jpg'),
	(14, 'Charlotte', 'En el mundo aparecen niños con poderes sobrenaturales , y son capturados por una organización que desea tomar ventaja de estos poderes, Tomori es una chica que los busca y los protege antes que esa organización, pero su aventura comienza al conocer a Yu.', '1,10,14', 2, 2, 1, 12, 'wallhaven-352811.jpg'),
	(15, 'Gakusen Toshi Asterisk S2', 'En el siglo pasado, la humanidad fue atacada por un desastre sin precedentes... el impacto “Invertia”. El mundo fue completamente destruido. Sin embargo, los humanos adquirieron un nuevo poder: el “Genestella”.', '1,9,10,15', 1, 1, 3, 12, 's2.jpg');
/*!40000 ALTER TABLE `anime` ENABLE KEYS */;

-- Volcando estructura para tabla aniworld.estudio
CREATE TABLE IF NOT EXISTS `estudio` (
  `id_estudio` int(5) NOT NULL AUTO_INCREMENT,
  `nom_estudio` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_estudio` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_estudio`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla aniworld.estudio: ~5 rows (aproximadamente)
DELETE FROM `estudio`;
/*!40000 ALTER TABLE `estudio` DISABLE KEYS */;
INSERT INTO `estudio` (`id_estudio`, `nom_estudio`, `descrip_estudio`) VALUES
	(1, 'A1 Pictures', '  '),
	(2, 'Mad House', ''),
	(3, 'Shaft', ''),
	(4, 'Kyoto Animation', '      '),
	(5, 'Trigger', '    ');
/*!40000 ALTER TABLE `estudio` ENABLE KEYS */;

-- Volcando estructura para tabla aniworld.favoritos
CREATE TABLE IF NOT EXISTS `favoritos` (
  `id_fav` int(5) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `lista_animes` varchar(40) NOT NULL,
  PRIMARY KEY (`id_fav`),
  KEY `id_user` (`id_user`),
  KEY `lista_anime` (`lista_animes`),
  CONSTRAINT `favoritos_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla aniworld.favoritos: ~3 rows (aproximadamente)
DELETE FROM `favoritos`;
/*!40000 ALTER TABLE `favoritos` DISABLE KEYS */;
INSERT INTO `favoritos` (`id_fav`, `id_user`, `lista_animes`) VALUES
	(1, 1, '2,16,14,15'),
	(2, 3, ''),
	(3, 4, '2,15');
/*!40000 ALTER TABLE `favoritos` ENABLE KEYS */;

-- Volcando estructura para tabla aniworld.genero
CREATE TABLE IF NOT EXISTS `genero` (
  `id_gen` int(11) NOT NULL AUTO_INCREMENT,
  `nom_gen` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_gen` varchar(90) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_gen`),
  KEY `nom_gen` (`nom_gen`),
  KEY `descrip_gen` (`descrip_gen`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla aniworld.genero: ~10 rows (aproximadamente)
DELETE FROM `genero`;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;

-- Volcando estructura para tabla aniworld.lista
CREATE TABLE IF NOT EXISTS `lista` (
  `id_anime` int(4) NOT NULL AUTO_INCREMENT,
  `nom_anime` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_anime` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_anime`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla aniworld.lista: ~4 rows (aproximadamente)
DELETE FROM `lista`;
/*!40000 ALTER TABLE `lista` DISABLE KEYS */;
INSERT INTO `lista` (`id_anime`, `nom_anime`, `descrip_anime`) VALUES
	(1, 'Anitore ', ' Anime que quiero ver, no te olvides descargar , hola\r\n'),
	(3, 'Hackadoll the Animation', 'Descargar parece interesante '),
	(4, 'Owarimonogatari', ' Descargar , es buena  , yeah\r\n'),
	(5, 'One Piece', 'Actualizado');
/*!40000 ALTER TABLE `lista` ENABLE KEYS */;

-- Volcando estructura para tabla aniworld.tipouser
CREATE TABLE IF NOT EXISTS `tipouser` (
  `id_tipouser` int(3) NOT NULL AUTO_INCREMENT,
  `name_tipouser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `descrip_tipouser` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_tipouser`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla aniworld.tipouser: ~3 rows (aproximadamente)
DELETE FROM `tipouser`;
/*!40000 ALTER TABLE `tipouser` DISABLE KEYS */;
INSERT INTO `tipouser` (`id_tipouser`, `name_tipouser`, `descrip_tipouser`) VALUES
	(1, 'Administrador', 'Moderador'),
	(2, 'Moderador', 'Moderador'),
	(8, 'Programador', 'Modo Dios');
/*!40000 ALTER TABLE `tipouser` ENABLE KEYS */;

-- Volcando estructura para tabla aniworld.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipouser` int(3) NOT NULL,
  `nom_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass_user` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `mail_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_tipouser` (`id_tipouser`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_tipouser`) REFERENCES `tipouser` (`id_tipouser`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Volcando datos para la tabla aniworld.user: ~3 rows (aproximadamente)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id_user`, `id_tipouser`, `nom_user`, `pass_user`, `mail_user`) VALUES
	(1, 1, 'Administrador', '65402f90ef3ceb04c9a50fe3b5aa895d', ''),
	(3, 2, 'Moderador', '65402f90ef3ceb04c9a50fe3b5aa895d', ''),
	(4, 8, 'Programador', '65402f90ef3ceb04c9a50fe3b5aa895d', '');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
