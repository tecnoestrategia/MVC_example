-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.25 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura para tabla mvctest.general
CREATE TABLE IF NOT EXISTS `general` (
  `id_general` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_general`),
  UNIQUE KEY `id_general` (`id_general`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='For test purpose';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla mvctest.langs
CREATE TABLE IF NOT EXISTS `langs` (
  `id_lang` int(11) NOT NULL AUTO_INCREMENT,
  `lang` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `flag` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_lang`),
  UNIQUE KEY `id_lang` (`id_lang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Table to set diferents langs';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla mvctest.pages
CREATE TABLE IF NOT EXISTS `pages` (
  `id_page` int(11) NOT NULL AUTO_INCREMENT,
  `id_lang` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `create_on` date NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_page`),
  UNIQUE KEY `id_page` (`id_page`),
  KEY `FK_pages_users` (`id_user`),
  KEY `FK_pages_langs` (`id_lang`),
  CONSTRAINT `FK_pages_langs` FOREIGN KEY (`id_lang`) REFERENCES `langs` (`id_lang`),
  CONSTRAINT `FK_pages_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Pages of example';

-- La exportación de datos fue deseleccionada.


-- Volcando estructura para tabla mvctest.users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `avatar` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `id_user` (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='users for example';

-- La exportación de datos fue deseleccionada.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
