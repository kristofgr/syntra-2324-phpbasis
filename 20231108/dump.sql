# ************************************************************
# Sequel Ace SQL dump
# Version 20058
#
# https://sequel-ace.com/
# https://github.com/Sequel-Ace/Sequel-Ace
#
# Host: 127.0.0.1 (MySQL 5.7.39)
# Database: php_mysql
# Generation Time: 2023-11-09 09:15:33 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
SET NAMES utf8mb4;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE='NO_AUTO_VALUE_ON_ZERO', SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table avatars
# ------------------------------------------------------------

DROP TABLE IF EXISTS `avatars`;

CREATE TABLE `avatars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `category` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8;

LOCK TABLES `avatars` WRITE;
/*!40000 ALTER TABLE `avatars` DISABLE KEYS */;

INSERT INTO `avatars` (`id`, `name`, `category`, `image`, `status`)
VALUES
	(1,'The Dark Knight Rises','Halloween','https://avatarfiles.alphacoders.com/264/thumb-26411.gif',1),
	(2,'Suicide Squad','Halloween','https://avatarfiles.alphacoders.com/820/thumb-82069.gif',1),
	(3,'How To Train Your Dragon','Animation','https://avatarfiles.alphacoders.com/689/thumb-68958.gif',1),
	(4,'Spider-Man: Homecoming','Superheroes','https://avatarfiles.alphacoders.com/920/thumb-92062.gif',1),
	(5,'Minions','Minions','https://avatarfiles.alphacoders.com/123/thumb-123713.jpg',1),
	(6,'It (2017)','Halloween','https://avatarfiles.alphacoders.com/107/thumb-107543.gif',1),
	(7,'Suicide Squad','Movies','https://avatarfiles.alphacoders.com/820/thumb-82068.gif',1),
	(8,'The Lord Of The Rings','Lord Of The Rings','https://avatarfiles.alphacoders.com/143/thumb-1434.jpg',1),
	(9,'Spider-Man 3','Halloween','https://avatarfiles.alphacoders.com/126/thumb-126644.gif',1),
	(10,'Black Panther','Movies','https://avatarfiles.alphacoders.com/127/thumb-127465.jpg',1),
	(11,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152841.jpg',1),
	(12,'Pirates of the Caribbean: On Stranger Tides','Movies','https://avatarfiles.alphacoders.com/151/thumb-151563.jpg',1),
	(13,'The Little Mermaid (1989)','Animation','https://avatarfiles.alphacoders.com/123/thumb-123712.jpg',1),
	(14,'Star Wars: The Last Jedi','Star Wars','https://avatarfiles.alphacoders.com/906/thumb-90626.gif',1),
	(15,'The Little Mermaid (1989)','Animation','https://avatarfiles.alphacoders.com/656/thumb-65671.gif',1),
	(16,'Star Wars','Star Wars','https://avatarfiles.alphacoders.com/851/thumb-851.jpg',1),
	(17,'The Dark Knight','Movies','https://avatarfiles.alphacoders.com/182/thumb-182355.jpg',1),
	(18,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152844.jpg',1),
	(19,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152842.jpg',1),
	(20,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152589.jpg',1),
	(21,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152588.jpg',0),
	(22,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152587.jpg',1),
	(23,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152586.jpg',1),
	(24,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152585.jpg',1),
	(25,'La luna','Animation','https://avatarfiles.alphacoders.com/125/thumb-125516.png',1),
	(26,'Happy Feet','Animation','https://avatarfiles.alphacoders.com/121/thumb-121599.png',1),
	(27,'Star Wars','Star Wars','https://avatarfiles.alphacoders.com/111/thumb-111183.jpg',1),
	(28,'Iron Man 2','Superheroes','https://avatarfiles.alphacoders.com/983/thumb-98360.jpg',1),
	(29,'Harry Potter','Movies','https://avatarfiles.alphacoders.com/895/thumb-89557.jpg',1),
	(30,'Crossover','Animation','https://avatarfiles.alphacoders.com/879/thumb-87928.png',1),
	(31,'Guardians of the Galaxy Vol. 2','Animation','https://avatarfiles.alphacoders.com/858/thumb-85823.jpg',1),
	(32,'Suicide Squad','Movies','https://avatarfiles.alphacoders.com/771/thumb-77134.jpg',1),
	(33,'Lilo &amp; Stitch','Animation','https://avatarfiles.alphacoders.com/656/thumb-65658.png',1),
	(34,'Star Wars','Star Wars','https://avatarfiles.alphacoders.com/223/thumb-22394.jpg',1),
	(35,'The Avengers','Superheroes','https://avatarfiles.alphacoders.com/954/thumb-9546.jpg',1),
	(36,'Conan the Barbarian (2011)','Movies','https://avatarfiles.alphacoders.com/266/thumb-26.jpg',1),
	(37,'The Lion King (2019)','Animation','https://avatarfiles.alphacoders.com/162/thumb-162138.jpg',1),
	(38,'Spider-Man: Into The Spider-Verse','Movies','https://avatarfiles.alphacoders.com/161/thumb-161381.jpg',1),
	(39,'The Secret Life of Pets','Animation','https://avatarfiles.alphacoders.com/159/thumb-159660.gif',1),
	(40,'Monsters, Inc.','Squares','https://avatarfiles.alphacoders.com/152/thumb-152922.jpg',1),
	(41,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152921.jpg',1),
	(42,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152845.jpg',1),
	(43,'Minions','Minions','https://avatarfiles.alphacoders.com/152/thumb-152843.jpg',1),
	(44,'The Lorax','Squares','https://avatarfiles.alphacoders.com/130/thumb-130279.jpg',1),
	(45,'Avatar','Animation','https://avatarfiles.alphacoders.com/125/thumb-125529.jpg',1),
	(46,'Black Panther','Superheroes','https://avatarfiles.alphacoders.com/124/thumb-124245.jpg',1),
	(47,'Ice Age: Dawn of the Dinosaurs','Animation','https://avatarfiles.alphacoders.com/123/thumb-123714.jpg',1),
	(48,'The Lord Of The Rings','Lord Of The Rings','https://avatarfiles.alphacoders.com/123/thumb-123710.png',1),
	(49,'The Dark Knight','Halloween','https://avatarfiles.alphacoders.com/121/thumb-121990.png',1),
	(50,'Superman (1978)','Old School','https://avatarfiles.alphacoders.com/121/thumb-121603.png',1),
	(51,'Smurfs: The Lost Village','Animation','https://avatarfiles.alphacoders.com/121/thumb-121379.png',1),
	(52,'Transformers','Movies','https://avatarfiles.alphacoders.com/805/thumb-80542.jpg',1),
	(53,'Finding Dory','Animation','https://avatarfiles.alphacoders.com/719/thumb-71983.png',1),
	(54,'Sleeping Beauty (1959)','Old School','https://avatarfiles.alphacoders.com/678/thumb-67879.gif',1),
	(55,'Frozen','Animation','https://avatarfiles.alphacoders.com/260/thumb-26013.jpg',1),
	(56,'Star Wars','Star Wars','https://avatarfiles.alphacoders.com/188/thumb-18843.jpg',1),
	(57,'Ender\'s Game','Games','https://avatarfiles.alphacoders.com/343/thumb-343208.jpg',1),
	(58,'Back To The Future','Old School','https://avatarfiles.alphacoders.com/331/thumb-331066.jpg',1),
	(59,'The Good, the Bad and the Ugly','Old School','https://avatarfiles.alphacoders.com/326/thumb-326021.jpg',1),
	(60,'Lightyear','Animation','https://avatarfiles.alphacoders.com/323/thumb-323892.jpg',1),
	(61,'Ron’s Gone Wrong','Animation','https://avatarfiles.alphacoders.com/313/thumb-313809.jpg',1),
	(62,'Alice in Wonderland (2010)','Squares','https://avatarfiles.alphacoders.com/263/thumb-263039.jpg',1),
	(63,'The Godfather','Old School','https://avatarfiles.alphacoders.com/227/thumb-227635.jpg',1),
	(64,'Shrek','Animation','https://avatarfiles.alphacoders.com/222/thumb-222101.jpg',1),
	(65,'How to Train Your Dragon 2','Animation','https://avatarfiles.alphacoders.com/215/thumb-215049.png',1),
	(66,'Batman Forever','Movies','https://avatarfiles.alphacoders.com/208/thumb-208175.jpg',1),
	(67,'Guardians of the Galaxy','Movies','https://avatarfiles.alphacoders.com/204/thumb-204304.jpg',1),
	(68,'Avengers Endgame','Movies','https://avatarfiles.alphacoders.com/184/thumb-184453.jpg',1),
	(69,'Avengers: Age of Ultron','Superheroes','https://avatarfiles.alphacoders.com/156/thumb-156949.jpg',1),
	(70,'It (2017)','Halloween','https://avatarfiles.alphacoders.com/154/thumb-154834.png',1),
	(71,'Wall·E','Animation','https://avatarfiles.alphacoders.com/139/thumb-139949.png',1),
	(72,'Avengers: Infinity War','Superheroes','https://avatarfiles.alphacoders.com/130/thumb-130595.jpg',1),
	(73,'Crossover','Halloween','https://avatarfiles.alphacoders.com/128/thumb-128854.png',1),
	(74,'Thor','Superheroes','https://avatarfiles.alphacoders.com/127/thumb-127575.jpg',1),
	(75,'Green Lantern','Superheroes','https://avatarfiles.alphacoders.com/124/thumb-124412.jpg',1),
	(76,'Alien','Old School','https://avatarfiles.alphacoders.com/123/thumb-123352.jpg',1),
	(77,'Zootopia','Animation','https://avatarfiles.alphacoders.com/122/thumb-122938.jpg',1),
	(78,'Monsters, Inc.','Animation','https://avatarfiles.alphacoders.com/121/thumb-121991.png',1),
	(79,'The Terminator','Old School','https://avatarfiles.alphacoders.com/121/thumb-121989.png',1),
	(80,'A Charlie Brown Christmas','Xmas','https://avatarfiles.alphacoders.com/117/thumb-117206.jpg',0),
	(81,'Avatar','Animation','https://avatarfiles.alphacoders.com/115/thumb-115683.jpg',1),
	(82,'Saw','Halloween','https://avatarfiles.alphacoders.com/108/thumb-108490.gif',1),
	(83,'Black Panther','Movies','https://avatarfiles.alphacoders.com/127/thumb-127465.jpg',1);

/*!40000 ALTER TABLE `avatars` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table profiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `profiles`;

CREATE TABLE `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `maturity` tinyint(4) NOT NULL DEFAULT '0',
  `avatar_id` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `fk_profile_avatar_idx` (`avatar_id`),
  CONSTRAINT `fk_profile_avatar` FOREIGN KEY (`avatar_id`) REFERENCES `avatars` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

LOCK TABLES `profiles` WRITE;
/*!40000 ALTER TABLE `profiles` DISABLE KEYS */;

INSERT INTO `profiles` (`id`, `name`, `maturity`, `avatar_id`, `created_at`, `updated_at`, `status`)
VALUES
	(1,'Kristof',1,33,'2023-11-08 11:41:00','2023-11-08 11:41:00',1),
	(2,'Zaid',1,10,'2023-11-08 11:41:13','2023-11-08 11:41:13',1),
	(3,'Arnoud',0,59,'2023-11-08 14:08:59','2023-11-08 14:08:59',1),
	(4,'Amid',0,60,'2023-11-08 16:18:03','2023-11-08 16:18:03',1);

/*!40000 ALTER TABLE `profiles` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
