-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: rfef
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `partidos`
--

DROP TABLE IF EXISTS `partidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `partidos` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `jornada` char(2) DEFAULT NULL,
  `temporada` year DEFAULT NULL,
  `e_local` int DEFAULT NULL,
  `e_visitante` int DEFAULT NULL,
  `arbitro` int DEFAULT NULL,
  `goles_local` int DEFAULT '0',
  `goles_visitante` int DEFAULT '0',
  `ganador` enum('e_local','e_visitante','empate') DEFAULT NULL,
  PRIMARY KEY (`cod`),
  KEY `e_local` (`e_local`),
  KEY `e_visitante` (`e_visitante`),
  KEY `arbitro` (`arbitro`),
  CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`e_local`) REFERENCES `equipos` (`cod_e`),
  CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`e_visitante`) REFERENCES `equipos` (`cod_e`),
  CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`arbitro`) REFERENCES `arbitros` (`n_licencia_a`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `partidos`
--

LOCK TABLES `partidos` WRITE;
/*!40000 ALTER TABLE `partidos` DISABLE KEYS */;
INSERT INTO `partidos` VALUES (1,'2022-08-12','21:00:00','1',2022,6,15,2,2,1,'e_local'),(2,'2022-08-13','17:00:00','1',2022,1,11,5,2,2,'empate'),(3,'2022-08-13','19:30:00','1',2022,19,5,15,0,3,'e_visitante'),(4,'2022-08-13','21:00:00','1',2022,3,10,12,0,0,'empate'),(5,'2022-08-14','17:30:00','1',2022,7,14,9,0,1,'e_visitante'),(6,'2022-08-14','19:30:00','1',2022,16,20,10,1,0,'e_local'),(7,'2022-08-14','22:00:00','1',2022,18,2,14,1,2,'e_visitante'),(8,'2022-08-15','17:30:00','1',2022,17,12,13,0,0,'empate'),(9,'2022-08-15','19:30:00','1',2022,9,4,19,0,3,'e_visitante'),(10,'2022-08-15','21:30:00','1',2022,13,8,8,3,0,'e_local'),(11,'2022-08-19','20:00:00','2',2022,11,10,NULL,0,0,NULL),(12,'2022-08-19','22:00:00','2',2022,15,19,NULL,0,0,NULL),(13,'2022-08-20','17:30:00','2',2022,6,7,NULL,0,0,NULL),(14,'2022-08-20','19:30:00','2',2022,12,13,NULL,0,0,NULL),(15,'2022-08-20','22:00:00','2',2022,1,2,NULL,0,0,NULL),(16,'2022-08-21','17:30:00','2',2022,17,16,NULL,0,0,NULL),(17,'2022-08-21','19:30:00','2',2022,4,5,NULL,0,0,NULL),(18,'2022-08-21','22:00:00','2',2022,14,3,NULL,0,0,NULL),(19,'2022-08-22','20:00:00','2',2022,8,18,NULL,0,0,NULL),(20,'2022-08-22','22:00:00','2',2022,20,9,NULL,0,0,NULL);
/*!40000 ALTER TABLE `partidos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-18 17:03:39
