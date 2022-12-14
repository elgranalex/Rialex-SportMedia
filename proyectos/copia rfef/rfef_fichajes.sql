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
-- Table structure for table `fichajes`
--

DROP TABLE IF EXISTS `fichajes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `fichajes` (
  `fecha_trasp` date NOT NULL,
  `jugador` int NOT NULL,
  `equipo_next` int DEFAULT NULL,
  `precio` int DEFAULT '0',
  `tipo` enum('cesion','traspaso','libre') DEFAULT NULL,
  PRIMARY KEY (`fecha_trasp`,`jugador`),
  KEY `jugador` (`jugador`),
  KEY `equipo_next` (`equipo_next`),
  CONSTRAINT `fichajes_ibfk_1` FOREIGN KEY (`jugador`) REFERENCES `jugadores` (`n_licencia_j`),
  CONSTRAINT `fichajes_ibfk_2` FOREIGN KEY (`equipo_next`) REFERENCES `equipos` (`cod_e`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fichajes`
--

LOCK TABLES `fichajes` WRITE;
/*!40000 ALTER TABLE `fichajes` DISABLE KEYS */;
/*!40000 ALTER TABLE `fichajes` ENABLE KEYS */;
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
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `fichaje` BEFORE INSERT ON `fichajes` FOR EACH ROW begin
		if new.precio > (select presupuesto_e from equipos where cod_e = new.equipo_next)
			then
			signal sqlstate '45000' 
			set message_text = "A Este equipo no le da la pasta xdxd";
        elseif new.precio < (select presupuesto_e from equipos where cod_e = new.equipo_next)
			then
			update jugadores
				set equipo_actual = new.equipo_next where jugadores.n_licencia_j=new.jugador;
				
			if new.tipo like "traspaso"
				then 
				update equipos
				set presupuesto_e = presupuesto_e - new.precio where cod_e like new.equipo_next
				;
			end if ;
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

-- Dump completed on 2022-08-19 15:03:58
