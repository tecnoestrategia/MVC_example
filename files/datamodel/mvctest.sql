-- --------------------------------------------------------
2	-- Host:                         127.0.0.1
3	-- Versión del servidor:         5.6.25 - MySQL Community Server (GPL)
4	-- SO del servidor:              Debian 8 64
5	-- HeidiSQL Versión:             9.3.0.4984
6	-- --------------------------------------------------------
7	
8	/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
9	/*!40101 SET NAMES utf8mb4 */;
10	/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
11	/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
12	
13	-- Volcando estructura para tabla mvctest.general
14	CREATE TABLE IF NOT EXISTS `general` (
15	  `id_general` int(11) NOT NULL AUTO_INCREMENT,
16	  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
17	  PRIMARY KEY (`id_general`),
18	  UNIQUE KEY `id_general` (`id_general`)
19	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='For test purpose';
20	
21	-- La exportación de datos fue deseleccionada.
22	
23	
24	-- Volcando estructura para tabla mvctest.langs
25	CREATE TABLE IF NOT EXISTS `langs` (
26	  `id_lang` int(11) NOT NULL AUTO_INCREMENT,
27	  `lang` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
28	  `flag` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
29	  PRIMARY KEY (`id_lang`),
30	  UNIQUE KEY `id_lang` (`id_lang`)
31	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Table to set diferents langs';
32	
33	-- La exportación de datos fue deseleccionada.
34	
35	
36	-- Volcando estructura para tabla mvctest.pages
37	CREATE TABLE IF NOT EXISTS `pages` (
38	  `id_page` int(11) NOT NULL AUTO_INCREMENT,
39	  `id_lang` int(11) NOT NULL DEFAULT '0',
40	  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
41	  `content` mediumtext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
42	  `create_on` date NOT NULL,
43	  `id_user` int(11) NOT NULL,
44	  PRIMARY KEY (`id_page`),
45	  UNIQUE KEY `id_page` (`id_page`),
46	  KEY `FK_pages_users` (`id_user`),
47	  KEY `FK_pages_langs` (`id_lang`),
48	  CONSTRAINT `FK_pages_langs` FOREIGN KEY (`id_lang`) REFERENCES `langs` (`id_lang`),
49	  CONSTRAINT `FK_pages_users` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`)
50	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='Pages of example';
51	
52	-- La exportación de datos fue deseleccionada.
53	
54	
55	-- Volcando estructura para tabla mvctest.users
56	CREATE TABLE IF NOT EXISTS `users` (
57	  `id_user` int(11) NOT NULL AUTO_INCREMENT,
58	  `name` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
59	  `avatar` tinytext CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
60	  PRIMARY KEY (`id_user`),
61	  UNIQUE KEY `id_user` (`id_user`)
62	) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci COMMENT='users for example';
63	
64	-- La exportación de datos fue deseleccionada.
65	/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
66	/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
67	/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;