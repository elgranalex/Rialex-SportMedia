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
-- Table structure for table `tarjetas`
--

DROP TABLE IF EXISTS `tarjetas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tarjetas` (
  `cod` int NOT NULL AUTO_INCREMENT,
  `n_licencia_j` int DEFAULT NULL,
  `cod_partido` int DEFAULT NULL,
  `tipo` enum('roja','amarilla') DEFAULT NULL,
  `minuto` char(3) DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cod`),
  KEY `n_licencia_j` (`n_licencia_j`),
  KEY `cod_partido` (`cod_partido`),
  CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`n_licencia_j`) REFERENCES `jugadores` (`n_licencia_j`),
  CONSTRAINT `tarjetas_ibfk_2` FOREIGN KEY (`cod_partido`) REFERENCES `partidos` (`cod`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjetas`
--

LOCK TABLES `tarjetas` WRITE;
/*!40000 ALTER TABLE `tarjetas` DISABLE KEYS */;
INSERT INTO `tarjetas` VALUES (1,124,1,'amarilla','34',NULL),(2,123,1,'amarilla','50',NULL),(3,139,1,'amarilla','68',NULL),(4,339,1,'amarilla','72',NULL),(5,335,1,'amarilla','83',NULL),(6,120,1,'amarilla','92',NULL),(7,134,1,'amarilla','94',NULL),(8,346,1,'amarilla','95',NULL),(9,2,2,'amarilla','15',NULL),(10,8,2,'amarilla','37',NULL),(11,1,2,'amarilla','80',NULL),(12,7,2,'amarilla','92',NULL),(13,3,2,'amarilla','97',NULL),(14,244,2,'amarilla','60',NULL),(15,232,2,'amarilla','91',NULL),(16,431,3,'amarilla','52',NULL),(17,64,4,'amarilla','14',NULL),(18,57,4,'amarilla','74',NULL),(19,57,4,'amarilla','93',NULL),(20,209,4,'amarilla','45',NULL),(21,225,4,'amarilla','45',NULL),(22,208,4,'amarilla','54',NULL),(23,226,4,'amarilla','69',NULL),(24,222,4,'amarilla','86',NULL),(25,205,4,'amarilla','89',NULL),(26,164,5,'amarilla','45',NULL),(27,147,5,'amarilla','45',NULL),(28,158,5,'amarilla','70',NULL),(29,150,5,'amarilla','85',NULL),(30,315,5,'amarilla','85',NULL),(31,308,5,'amarilla','98',NULL),(32,358,6,'roja','51',NULL),(33,351,6,'amarilla','56',NULL),(34,359,6,'amarilla','69',NULL),(35,443,6,'amarilla','14',NULL),(36,448,6,'amarilla','44',NULL),(37,440,6,'amarilla','45',NULL),(38,36,7,'amarilla','40',NULL),(39,412,7,'amarilla','41',NULL),(40,413,7,'amarilla','66',NULL),(41,408,7,'amarilla','86',NULL),(42,259,8,'amarilla','22',NULL),(43,272,8,'amarilla','31',NULL),(44,271,8,'amarilla','35',NULL),(45,269,8,'amarilla','66',NULL),(46,273,8,'amarilla','71',NULL),(47,268,8,'amarilla','76',NULL),(48,203,9,'amarilla','19',NULL),(49,198,9,'amarilla','55',NULL),(50,87,9,'amarilla','90',NULL),(51,289,10,'amarilla','4',NULL),(52,297,10,'amarilla','22',NULL),(53,293,10,'amarilla','78',NULL),(54,171,10,'roja','16',NULL),(55,182,10,'amarilla','16',NULL),(56,179,10,'amarilla','30',NULL),(57,184,10,'amarilla','45',NULL),(58,186,10,'amarilla','64',NULL),(59,177,10,'amarilla','81',NULL),(60,181,10,'amarilla','89',NULL);
/*!40000 ALTER TABLE `tarjetas` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `acumulacion` AFTER INSERT ON `tarjetas` FOR EACH ROW begin
 
	/*En caso de que se acumulen 5 amarillas, hay sanción y se vuelve a comenzar el recuento*/
	if (new.tipo like "amarilla") and (select * from (select count(*) from tarjetas where tipo like "_amarilla" and n_licencia_j=new.n_licencia_j) as TempP)=5
    then 
        insert into sanciones
        values
        (new.n_licencia_j,(select arbitro from partidos where cod=new.cod_partido),new.cod_partido,1)
        ;
        update jugadores
        set amarillas=0 where n_licencia_j=new.n_licencia_j
        ;
    
    /*Una roja produce sancion*/
	elseif new.tipo like "roja"
    then
        insert into sanciones
        values
        (new.n_licencia_j,new.cod_partido,1)
        ;
        update jugadores
        set amarillas=0 where n_licencia_j=new.n_licencia_j
        ;
    
    /*Doble amarilla en un partido*/
	elseif (select * from (select count(*) from tarjetas where cod_partido=new.cod_partido and n_licencia_j=new.n_licencia_j and tipo like "amarilla") as TempP)=2
    then
        insert into sanciones
        values
        (new.n_licencia_j,new.cod_partido,1)
        ;
        update jugadores
        set amarillas=0 where n_licencia_j=new.n_licencia_j
        ;

    else
		update jugadores
        set amarillas=amarillas+1 where n_licencia_j=new.n_licencia_j
        ;
        
    end if;
    
end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-18 17:03:39
