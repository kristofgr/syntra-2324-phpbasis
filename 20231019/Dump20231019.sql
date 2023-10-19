-- MySQL dump 10.13  Distrib 8.0.32, for macos13 (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	5.7.39

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `soorten`
--

DROP TABLE IF EXISTS `soorten`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `soorten` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `category` varchar(100) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `last_view` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=226 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `soorten`
--

LOCK TABLES `soorten` WRITE;
/*!40000 ALTER TABLE `soorten` DISABLE KEYS */;
INSERT INTO `soorten` VALUES (1,'Blauwborst','Vogels',0,NULL),(2,'Blauwe kiekendief','Vogels',0,NULL),(3,'Boerenzwaluw','Vogels',0,NULL),(4,'Geelgors','Vogels',0,NULL),(5,'Gele kwikstaart','Vogels',0,NULL),(6,'Grauwe gors','Vogels',0,NULL),(7,'Grauwe kiekendief','Vogels',0,NULL),(8,'Grutto','Vogels',0,NULL),(9,'Kievit','Vogels',0,NULL),(10,'Kwartel','Vogels',0,NULL),(11,'Patrijs','Vogels',0,NULL),(12,'Roek','Vogels',0,NULL),(13,'Smelleken','Vogels',0,NULL),(14,'Steenuil','Vogels',0,NULL),(15,'Torenvalk','Vogels',0,NULL),(16,'Veldleeuwerik','Vogels',0,NULL),(17,'Velduil','Vogels',0,NULL),(18,'Buizerd','Vogels',0,NULL),(19,'Rode wouw','Vogels',0,NULL),(20,'Ekster','Vogels',0,NULL),(21,'Houtduif','Vogels',0,NULL),(22,'Spreeuw','Vogels',0,NULL),(23,'Vink','Vogels',0,NULL),(24,'Zomertortel','Vogels',0,NULL),(25,'Fazant','Vogels',0,NULL),(26,'Grote lijster','Vogels',0,NULL),(27,'Keep','Vogels',0,NULL),(28,'Koperwiek','Vogels',0,NULL),(29,'Sperwer','Vogels',0,NULL),(30,'Grote zilverreiger','Vogels',0,NULL),(31,'Ooievaar','Vogels',0,NULL),(32,'Wulp','Vogels',0,NULL),(33,'Blauwe reiger','Vogels',0,NULL),(34,'Kerkuil','Vogels',0,NULL),(35,'Slechtvalk','Vogels',0,NULL),(36,'Groenling','Vogels',0,NULL),(37,'Huismus','Vogels',0,NULL),(38,'Kauw','Vogels',0,NULL),(39,'Putter','Vogels',0,NULL),(40,'Turkse tortel','Vogels',0,NULL),(41,'Kramsvogel','Vogels',0,NULL),(42,'Ringmus','Vogels',0,NULL),(43,'Zwarte kraai','Vogels',0,NULL),(44,'Bosuil','Vogels',0,NULL),(45,'Havik','Vogels',0,NULL),(46,'Middelste bonte specht','Vogels',0,NULL),(47,'Oehoe','Vogels',0,NULL),(48,'Raaf','Vogels',0,NULL),(49,'Ruigpootuil','Vogels',0,NULL),(50,'Wespendief','Vogels',0,NULL),(51,'Wielewaal','Vogels',0,NULL),(52,'Zwarte specht','Vogels',0,NULL),(53,'Koekoek','Vogels',0,NULL),(54,'Nachtegaal','Vogels',0,NULL),(55,'Ransuil','Vogels',0,NULL),(56,'Zwarte ooievaar','Vogels',0,NULL),(57,'Pimpelmees','Vogels',0,NULL),(58,'Appelvink','Vogels',0,NULL),(59,'Boomkruiper','Vogels',0,NULL),(60,'Gaai','Vogels',0,NULL),(61,'Goudhaan','Vogels',0,NULL),(62,'Groene specht','Vogels',0,NULL),(63,'Grote bonte specht','Vogels',0,NULL),(64,'Heggenmus','Vogels',0,NULL),(65,'Koolmees','Vogels',0,NULL),(66,'Merel','Vogels',0,NULL),(67,'Roodborst','Vogels',0,NULL),(68,'Staartmees','Vogels',0,NULL),(69,'Winterkoning','Vogels',0,NULL),(70,'Zanglijster','Vogels',0,NULL),(71,'Zwartkop','Vogels',0,NULL),(72,'Bonte vliegenvanger','Vogels',0,NULL),(73,'Boomklever','Vogels',0,NULL),(74,'Kuifmees','Vogels',0,NULL),(75,'Sijs','Vogels',0,NULL),(76,'Spotvogel','Vogels',0,NULL),(77,'Tjiftjaf','Vogels',0,NULL),(78,'Zwarte mees','Vogels',0,NULL),(79,'Aalscholver','Vogels',0,NULL),(80,'Canadese gans','Vogels',0,NULL),(81,'IJsvogel','Vogels',0,NULL),(82,'Kleine zilverreiger','Vogels',0,NULL),(83,'Oeverzwaluw','Vogels',0,NULL),(84,'Rietgors','Vogels',0,NULL),(85,'Roerdomp','Vogels',0,NULL),(86,'Tuinfluiter','Vogels',0,NULL),(87,'Visarend','Vogels',0,NULL),(88,'Waterspreeuw','Vogels',0,NULL),(89,'Zeearend','Vogels',0,NULL),(90,'Zomertaling','Vogels',0,NULL),(91,'Kraanvogel','Vogels',0,NULL),(92,'Holenduif','Vogels',0,NULL),(93,'Notenkraker','Vogels',0,NULL),(94,'Pestvogel','Vogels',0,NULL),(95,'Gierzwaluw','Vogels',0,NULL),(96,'Huiszwaluw','Vogels',0,NULL),(97,'Halsbandparkiet','Vogels',0,NULL),(98,'Bever','Zoogdieren',0,NULL),(99,'Das','Zoogdieren',0,NULL),(100,'Edelhert','Zoogdieren',0,NULL),(101,'Euraziatische lynx','Zoogdieren',0,NULL),(102,'Everzwijn','Zoogdieren',0,NULL),(103,'Ree','Zoogdieren',0,NULL),(104,'Vos','Zoogdieren',0,NULL),(105,'Wolf','Zoogdieren',0,NULL),(106,'Bosmuis','Zoogdieren',0,NULL),(107,'Eekhoorn','Zoogdieren',0,NULL),(108,'Egel','Zoogdieren',0,NULL),(109,'Eikelmuis','Zoogdieren',0,NULL),(110,'Haas','Zoogdieren',0,NULL),(111,'Hazelmuis','Zoogdieren',0,NULL),(112,'Konijn','Zoogdieren',0,NULL),(113,'Mol','Zoogdieren',0,NULL),(114,'Steenmarter','Zoogdieren',0,NULL),(115,'Baardvleermuis','Zoogdieren',0,NULL),(116,'Bechsteins vleermuis','Zoogdieren',0,NULL),(117,'Bosvleermuis','Zoogdieren',0,NULL),(118,'Brandts vleermuis','Zoogdieren',0,NULL),(119,'Franjestaart','Zoogdieren',0,NULL),(120,'Gewone dwergvleermuis','Zoogdieren',0,NULL),(121,'Gewone grootoorvleermuis','Zoogdieren',0,NULL),(122,'Grijze grootoorvleermuis','Zoogdieren',0,NULL),(123,'Grote hoefijzerneus','Zoogdieren',0,NULL),(124,'Grote rosse vleermuis','Zoogdieren',0,NULL),(125,'Ingekorven vleermuis','Zoogdieren',0,NULL),(126,'Kleine dwergvleermuis','Zoogdieren',0,NULL),(127,'Laatvlieger','Zoogdieren',0,NULL),(128,'Meervleermuis','Zoogdieren',0,NULL),(129,'Mopsvleermuis','Zoogdieren',0,NULL),(130,'Rosse vleermuis','Zoogdieren',0,NULL),(131,'Ruige dwergvleermuis','Zoogdieren',0,NULL),(132,'Tweekleurige vleermuis','Zoogdieren',0,NULL),(133,'Vale vleermuis','Zoogdieren',0,NULL),(134,'Watervleermuis','Zoogdieren',0,NULL),(135,'Otter','Zoogdieren',0,NULL),(136,'Bruinvis','Zoogdieren',0,NULL),(137,'Gewone zeehond','Zoogdieren',0,NULL),(138,'Grijze zeehond','Zoogdieren',0,NULL),(139,'Tuimelaar','Zoogdieren',0,NULL),(140,'Witsnuitdolfijn','Zoogdieren',0,NULL),(141,'Brandnetel','Bomen en planten',0,NULL),(142,'Bosanemoon','Bomen en planten',0,NULL),(143,'Daslook','Bomen en planten',0,NULL),(144,'Eenbes','Bomen en planten',0,NULL),(145,'Salomonszegel','Bomen en planten',0,NULL),(146,'Slanke sleutelbloem','Bomen en planten',0,NULL),(147,'Speenkruid','Bomen en planten',0,NULL),(148,'Wilde hyacint','Bomen en planten',0,NULL),(149,'Vliegend hert','Insecten',0,NULL),(150,'Bosmier','Insecten',0,NULL),(151,'Lederloopkever','Insecten',0,NULL),(152,'Lieveheersbeestjes','Insecten',0,NULL),(153,'Neushoornkever','Insecten',0,NULL),(154,'Veenmol','Insecten',0,NULL),(155,'Blauwe glazenmaker','Insecten',0,NULL),(156,'Bloedrode heidelibel','Insecten',0,NULL),(157,'Bosbeekjuffer','Insecten',0,NULL),(158,'Vliegende speld','Insecten',0,NULL),(159,'Weidebeekjuffer','Insecten',0,NULL),(160,'Mug','Insecten',0,NULL),(161,'Slakken','Insecten',0,NULL),(162,'Blauwvleugelsprinkhaan','Insecten',0,NULL),(163,'Boomsprinkhaan','Insecten',0,NULL),(164,'Boskrekel','Insecten',0,NULL),(165,'Grote groene sabelsprinkhaan','Insecten',0,NULL),(166,'Huiskrekel','Insecten',0,NULL),(167,'Krasser','Insecten',0,NULL),(168,'Moerassprinkhaan','Insecten',0,NULL),(169,'Negertje','Insecten',0,NULL),(170,'Sikkelsprinkhaan','Insecten',0,NULL),(171,'Veldkrekel','Insecten',0,NULL),(172,'Wrattenbijter','Insecten',0,NULL),(173,'Andoornbij','Insecten',0,NULL),(174,'Blauwe ertsbij','Insecten',0,NULL),(175,'Bosbesbij','Insecten',0,NULL),(176,'Bromvliegen','Insecten',0,NULL),(177,'Gewone langhoornbij','Insecten',0,NULL),(178,'Gewone sachembij','Insecten',0,NULL),(179,'Gewone wespbij','Insecten',0,NULL),(180,'Grijze zandbij','Insecten',0,NULL),(181,'Grote bladsnijder','Insecten',0,NULL),(182,'Grote bloedbij','Insecten',0,NULL),(183,'Grote wolbij','Insecten',0,NULL),(184,'Juweelzweefvlieg (Calliprobola speciosa)','Insecten',0,NULL),(185,'Klimopzijdebij','Insecten',0,NULL),(186,'Pluimvoetbij','Insecten',0,NULL),(187,'Slobkousbij','Insecten',0,NULL),(188,'Zwart-rosse zandbij','Insecten',0,NULL),(189,'Gevlekt longkruid','Bomen en planten',0,NULL),(190,'Gevlekte aronskelk','Bomen en planten',0,NULL),(191,'Bergnachtorchis','Bomen en planten',0,NULL),(192,'Bijenorchis','Bomen en planten',0,NULL),(193,'Bleek bosvogeltje','Bomen en planten',0,NULL),(194,'Bokkenorchis','Bomen en planten',0,NULL),(195,'Brede orchis','Bomen en planten',0,NULL),(196,'Gevlekte orchis','Bomen en planten',0,NULL),(197,'Grote keverorchis','Bomen en planten',0,NULL),(198,'Grote muggenorchis','Bomen en planten',0,NULL),(199,'Honingorchis','Bomen en planten',0,NULL),(200,'Moeraswespenorchis','Bomen en planten',0,NULL),(201,'Purperorchis','Bomen en planten',0,NULL),(202,'Vleeskleurige orchis','Bomen en planten',0,NULL),(203,'Broeikasspin','Insecten',0,NULL),(204,'Gewone bostrechterspin','Insecten',0,NULL),(205,'Gewone doolhofspin','Insecten',0,NULL),(206,'Gewone huisspin','Insecten',0,NULL),(207,'Gewone kameleonspin','Insecten',0,NULL),(208,'Gewone tandkaak','Insecten',0,NULL),(209,'Grote huisspin','Insecten',0,NULL),(210,'Grote kaardespin','Insecten',0,NULL),(211,'Grote steatoda','Insecten',0,NULL),(212,'Grote trilspin','Insecten',0,NULL),(213,'Hooiwagens','Insecten',0,NULL),(214,'Kraamwebspin','Insecten',0,NULL),(215,'Kruisspin','Insecten',0,NULL),(216,'Lentevuurspin','Insecten',0,NULL),(217,'Marmerspin','Insecten',0,NULL),(218,'Platte wielwebspin','Insecten',0,NULL),(219,'Roodwitte celspin','Insecten',0,NULL),(220,'Schorskoloniespin','Insecten',0,NULL),(221,'Schorsmarpissa','Insecten',0,NULL),(222,'Stalmuursluiper','Insecten',0,NULL),(223,'Viervlekwielwebspin','Insecten',0,NULL),(224,'Wesp- of tijgerspin','Insecten',0,NULL),(225,'Zwarthandboswolfspin','Insecten',0,NULL);
/*!40000 ALTER TABLE `soorten` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-19 12:56:11
