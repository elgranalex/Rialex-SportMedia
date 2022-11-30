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
-- Table structure for table `equipos`
--

DROP TABLE IF EXISTS `equipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `equipos` (
  `cod_e` int NOT NULL AUTO_INCREMENT,
  `nombre_e` varchar(50) DEFAULT NULL,
  `abreviatura` varchar(3) DEFAULT NULL,
  `nombre_l` varchar(50) DEFAULT NULL,
  `presupuesto_e` int DEFAULT NULL,
  `win` int DEFAULT '0',
  `loose` int DEFAULT '0',
  `draw` int DEFAULT '0',
  `total` int DEFAULT '0',
  `estadio` varchar(50) DEFAULT NULL,
  `entrenador` varchar(50) DEFAULT NULL,
  `presidente` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cod_e`),
  KEY `nombre_l` (`nombre_l`),
  CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`nombre_l`) REFERENCES `ligas` (`nombre_l`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipos`
--

LOCK TABLES `equipos` WRITE;
/*!40000 ALTER TABLE `equipos` DISABLE KEYS */;
INSERT INTO `equipos` VALUES (1,'Real Club Celta de Vigo','RCC','Liga Santander',40000,0,0,1,1,'Abanca Balaídos',NULL,NULL),(2,'Real Madrid','RM','Liga Santander',10000000,1,0,0,3,'Santiago Bernabeu',NULL,NULL),(3,'Fútbol Club Barcelona','FCB','Liga Santander',0,0,0,1,1,'Spotify Camp Nou',NULL,NULL),(4,'Atlético de Madrid','ATM','Liga Santander',500000,1,0,0,3,'Wakanda Metropolitano',NULL,NULL),(5,'Villareal Club de Fútbol','VLL','Liga Santander',50500,1,0,0,3,'Estadio de la Cerámica',NULL,NULL),(6,'Club Atlético Osasuna','OSA','Liga Santander',50500,1,0,0,3,'El Sadar',NULL,NULL),(7,'Cádiz CF','CCF','Liga Santander',50500,0,1,0,0,'Estadio nuevo Mirandilla',NULL,NULL),(8,'Elche Club de Fútbol','ELC','Liga Santander',40500,0,1,0,0,'Estadio Martínez Valero',NULL,NULL),(9,'Getafe CF','GCF','Liga Santander',50500,0,1,0,0,'Coliseum Alfonso Pérez',NULL,NULL),(10,'Rayo Vallecano','RVA','Liga Santander',13500,0,0,1,1,'Estadio de Vallecas',NULL,NULL),(11,'RCD Espanyol','ESY','Liga Santander',8500,0,0,1,1,'RCDE Stadium',NULL,NULL),(12,'RCD Mallorca','CDM','Liga Santander',3500,0,0,1,1,'Visit Mallorca Estadi',NULL,NULL),(13,'Real Betis','RBB','Liga Santander',9500,1,0,0,3,'Estadio Benito Villamarín',NULL,NULL),(14,'Real Sociedad','RSO','Liga Santander',13500,1,0,0,3,'Reale Arena',NULL,NULL),(15,'Sevilla CF','SCF','Liga Santander',15500,0,1,0,0,'Ramón Sánchez Pizjuán',NULL,NULL),(16,'Valencia CF','VCF','Liga Santander',20500,1,0,0,3,'Camp de Mestalla',NULL,NULL),(17,'Atletic Club de Bilbao','ACB','Liga Santander',20500,0,0,1,1,'San Mamés',NULL,NULL),(18,'Almería FC','ALM','Liga Santander',20500,0,1,0,0,'Estadio de los juegos mediterráneos','Joan Francesc Ferrer','Turki Alalshikh'),(19,'Real Valladolid CF','RVA','Liga Santander',20500,0,1,0,0,'Estadio municipal José Zorrilla',NULL,NULL),(20,'Girona FC FC','GFC','Liga Santander',20500,0,1,0,0,'Estadio Municipal de Montilivi',NULL,NULL);
/*!40000 ALTER TABLE `equipos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-19 15:04:37
