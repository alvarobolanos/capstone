-- MySQL dump 10.13  Distrib 8.0.21, for macos10.15 (x86_64)
--
-- Host: 127.0.0.1    Database: capstone
-- ------------------------------------------------------
-- Server version	8.0.21

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
-- Table structure for table `games`
--

DROP TABLE IF EXISTS `games`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `games` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `image_url` varchar(191) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `games`
--

LOCK TABLES `games` WRITE;
/*!40000 ALTER TABLE `games` DISABLE KEYS */;
INSERT INTO `games` VALUES (1,'World Geography','A trivia game about world geography in which you will test your knowledge about places, bodies of water and other interesting facts that everyone should know. If you do not know these, then you should have stayed in school kido.','https://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/OrteliusWorldMap.jpeg/2560px-OrteliusWorldMap.jpeg','2020-10-05 23:31:22');
/*!40000 ALTER TABLE `games` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players`
--

DROP TABLE IF EXISTS `players`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `players` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(191) COLLATE utf8mb4_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players`
--

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;
/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `players_scores`
--

DROP TABLE IF EXISTS `players_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `players_scores` (
  `player_id` int DEFAULT NULL,
  `score_id` int DEFAULT NULL,
  KEY `player_id` (`player_id`),
  KEY `score_id` (`score_id`),
  CONSTRAINT `players_scores_ibfk_1` FOREIGN KEY (`player_id`) REFERENCES `players` (`id`),
  CONSTRAINT `players_scores_ibfk_2` FOREIGN KEY (`score_id`) REFERENCES `scores` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `players_scores`
--

LOCK TABLES `players_scores` WRITE;
/*!40000 ALTER TABLE `players_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `players_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `qanda`
--

DROP TABLE IF EXISTS `qanda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `qanda` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer_1` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `answer_2` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `answer_3` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `answer_4` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `correct_answer` tinytext COLLATE utf8mb4_general_ci NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `game_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`),
  CONSTRAINT `qanda_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `qanda`
--

LOCK TABLES `qanda` WRITE;
/*!40000 ALTER TABLE `qanda` DISABLE KEYS */;
INSERT INTO `qanda` VALUES (1,'What is the largest Island in the Caribbean?','Puerto Rico','La Hispaniola','Cuba','Dominica','Cuba','2020-11-03 02:22:28',1),(2,'Where is the tallest waterfall located?','Venezuela','USA','Congo','Denmark','Denmark','2020-11-03 02:22:28',1),(3,'What is the tallest peak in Europe?','Mt. Elbrus','Mt. Blanc','Mt. Olympus','Mt. Edna','Mt. Elbrus','2020-11-03 02:22:28',1),(4,'In what country could you find Tungurahua volcano?','Costa Rica','Ecuador','Mexico','Chile','Ecuador','2020-11-03 02:22:28',1),(5,'What is the biggest metropolitan area (by population) in the USA?','Boston-Cambridge-Newton','Dallas-Fort Worth','Miami-Ft. Lauderdale-West Palm Beach','New York-Newark-Jersey City','New York-Newark-Jersey City','2020-11-03 02:22:28',1),(6,'What country has the highest bird diversity?','USA','India','Colombia','Indonesia','Colombia','2020-11-03 02:22:28',1),(7,'What is the country with the largest forest area?','Russian Federation','Brazil','Canada','China','Russian Federation','2020-11-03 02:22:28',1),(8,'Which country is surrounded by only one ocean?','USA','Iceland','Panama','Canada','Iceland','2020-11-03 02:22:28',1),(9,'In what continent is the Gobi Desert located?','North America','Africa','Asia','South America','Asia','2020-11-03 02:22:28',1),(10,'What is the worlds deepest lake?','Victoria','Titicaca','Como','Baikal','Baikal','2020-11-03 02:22:28',1),(11,'What is the worlds longest above-water mountain range?','The Andes','Transantarctic Mountains','Rocky Mountains','Alpes Mountains','The Andes','2020-11-03 02:22:28',1),(12,'What is the longest river in Europe called?','Volga','Danube','Don','Reka','Volga','2020-11-03 02:22:28',1),(13,'Which is the only country where you can see above sea-level the longest mountain range Mid-Atlantic ridge?','Azore','Tristan da Cunha','Iceland','Ascension Island','Iceland','2020-11-03 02:22:28',1),(14,'What is the oldest city in the United States?','Jamestown Virginia','Saint Augustine Florida','Santa Fe New Mexico','Plymouth Massachusetts','Saint Augustine Florida','2020-11-03 02:22:28',1),(15,'What is the oldest continuously inhabited city in the world?','Aleppo Syria','Athens Greece','Faiyum Egypt','Damascus Syria','Damascus Syria','2020-11-03 02:22:28',1),(16,'Where is located the oldest continuously working university in the Americas?','Harvard Cambridge','Autonomous University of Santo Domingo','University of San Marcos Lima','Universidad de La Habana','University of San Marcos Lima','2020-11-03 02:22:28',1),(17,'Which US state borders Lake Huron?','Michigan','Wisconsin','Ohio','Pennsylvania','Michigan','2020-11-03 02:22:28',1),(18,'What was the most polluted country in 2019?','China','Bangladesh','India','USA','Bangladesh','2020-11-03 02:22:28',1),(19,'What is the smallest country in Europe?','Monaco','San Marino','Andorra','Vatican City','Vatican City','2020-11-03 02:22:28',1),(20,'What is the most densely populated country in Africa in 2020?','Ethiopia','Egypt','DR Congo','Nigeria','Nigeria','2020-11-03 02:22:28',1);
/*!40000 ALTER TABLE `qanda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scores`
--

DROP TABLE IF EXISTS `scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `scores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `score` float NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `game_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `game_id` (`game_id`),
  CONSTRAINT `scores_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `games` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scores`
--

LOCK TABLES `scores` WRITE;
/*!40000 ALTER TABLE `scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `scores` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-04 20:11:17
