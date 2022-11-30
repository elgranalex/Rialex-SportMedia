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
-- Table structure for table `goles`
--

DROP TABLE IF EXISTS `goles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `goles` (
  `n_licencia_j` int DEFAULT NULL,
  `cod_partido` int DEFAULT NULL,
  `n_gol` int NOT NULL AUTO_INCREMENT,
  `tipo` enum('falta','cabeza','volea','tiro','p.p','penalty') DEFAULT NULL,
  `minuto` char(3) DEFAULT NULL,
  `asistencia` int DEFAULT NULL,
  PRIMARY KEY (`n_gol`),
  KEY `n_licencia_j` (`n_licencia_j`),
  KEY `asistencia` (`asistencia`),
  CONSTRAINT `goles_ibfk_1` FOREIGN KEY (`n_licencia_j`) REFERENCES `jugadores` (`n_licencia_j`),
  CONSTRAINT `goles_ibfk_2` FOREIGN KEY (`asistencia`) REFERENCES `jugadores` (`n_licencia_j`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goles`
--

LOCK TABLES `goles` WRITE;
/*!40000 ALTER TABLE `goles` DISABLE KEYS */;
INSERT INTO `goles` VALUES (139,1,1,'tiro','9',137),(344,1,2,'tiro','11',339),(143,1,3,'penalty','74',NULL),(1,2,4,'tiro','45',17),(20,2,5,'tiro','63',7),(247,2,6,'tiro','72',NULL),(249,2,7,'penalty','94',NULL),(119,3,8,'tiro','49',118),(113,3,9,'tiro','81',110),(113,3,10,'tiro','90',NULL),(311,5,11,'tiro','24',310),(363,6,12,'penalty','45',138),(411,7,13,'tiro','6',405),(39,7,14,'tiro','61',44),(25,7,15,'falta','75',NULL),(93,9,16,'tiro','15',89),(93,9,17,'tiro','59',89),(90,9,18,'tiro','75',89),(294,10,19,'tiro','28',289),(293,10,20,'tiro','39',288),(293,10,21,'tiro','60',NULL);
/*!40000 ALTER TABLE `goles` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `gol` AFTER INSERT ON `goles` FOR EACH ROW begin

	if ((select equipo_actual from jugadores  where jugadores.n_licencia_j=new.n_licencia_j) 
    like 
    (select e_local from partidos where partidos.cod=new.cod_partido)
    ) and new.tipo not like "p.p"
		then update partidos
        set partidos.goles_local=(partidos.goles_local+1) where partidos.cod=new.cod_partido;
    end if;

	if ((select equipo_actual from jugadores where jugadores.n_licencia_j=new.n_licencia_j) 
    like 
    (select e_visitante from partidos where partidos.cod=new.cod_partido)
    ) and new.tipo not like "p.p"
		then update partidos
        set partidos.goles_visitante=(partidos.goles_visitante+1) where partidos.cod=new.cod_partido;
    end if;

	if ((select equipo_actual from jugadores where jugadores.n_licencia_j=new.n_licencia_j) 
    like 
    (select e_visitante from partidos where partidos.cod=new.cod_partido)
    ) and new.tipo like "p.p"
		then update partidos
        set partidos.goles_local=(partidos.goles_local+1) where partidos.cod=new.cod_partido;
    end if;

	if ((select equipo_actual from jugadores where jugadores.n_licencia_j=new.n_licencia_j) 
    like 
    (select e_local from partidos where partidos.cod=new.cod_partido)
    ) and new.tipo like "p.p"
		then update partidos
        set partidos.goles_visitante=(partidos.goles_visitante+1) where partidos.cod=new.cod_partido;
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

-- Dump completed on 2022-08-19 15:04:37
