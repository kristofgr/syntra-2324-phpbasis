# ************************************************************
# Sequel Ace SQL dump
# Version 20062
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.39)
# Database: php_mysql
# Generation Time: 2024-01-11 11:25:45 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table animals
# ------------------------------------------------------------

DROP TABLE IF EXISTS `animals`;

CREATE TABLE `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;

INSERT INTO `animals` (`id`, `name`)
VALUES
	(1,'Kangoeroe'),
	(2,'Sparrow'),
	(3,'Lion'),
	(4,'Tiger'),
	(5,'Grizzly Bear'),
	(6,'Dog'),
	(7,'Cat'),
	(8,'Bambi'),
	(9,'Pinguin'),
	(10,'Yeti'),
	(16,'Kiwi'),
	(17,'Polar Bear'),
	(18,'Great Tit');

/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table animals_continents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `animals_continents`;

CREATE TABLE `animals_continents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_id` int(11) NOT NULL,
  `continent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_animal_id` (`animal_id`),
  KEY `fk_continent_id` (`continent_id`),
  CONSTRAINT `fk_animal_id` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`) ON DELETE NO ACTION,
  CONSTRAINT `fk_continent_id` FOREIGN KEY (`continent_id`) REFERENCES `continents` (`id`) ON DELETE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `animals_continents` WRITE;
/*!40000 ALTER TABLE `animals_continents` DISABLE KEYS */;

INSERT INTO `animals_continents` (`id`, `animal_id`, `continent_id`)
VALUES
	(1,1,4),
	(2,2,1),
	(3,2,2),
	(4,2,5),
	(5,2,4),
	(6,2,6),
	(7,2,7),
	(9,16,4),
	(10,17,3),
	(11,18,1),
	(12,18,4),
	(13,18,6),
	(14,18,7),
	(15,18,2);

/*!40000 ALTER TABLE `animals_continents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table continents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `continents`;

CREATE TABLE `continents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `continents` WRITE;
/*!40000 ALTER TABLE `continents` DISABLE KEYS */;

INSERT INTO `continents` (`id`, `name`)
VALUES
	(1,'Africa'),
	(2,'South-America'),
	(3,'Antartica'),
	(4,'Australia'),
	(5,'Asia'),
	(6,'Europe'),
	(7,'North-America');

/*!40000 ALTER TABLE `continents` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
