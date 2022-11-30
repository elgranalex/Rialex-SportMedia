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
-- Temporary view structure for view `v_equipos`
--

DROP TABLE IF EXISTS `v_equipos`;
/*!50001 DROP VIEW IF EXISTS `v_equipos`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `v_equipos` AS SELECT 
 1 AS `cod_e`,
 1 AS `nombre_e`,
 1 AS `abreviatura`,
 1 AS `nombre_l`,
 1 AS `presupuesto_e`,
 1 AS `win`,
 1 AS `loose`,
 1 AS `draw`,
 1 AS `total`,
 1 AS `estadio`,
 1 AS `entrenador`,
 1 AS `presidente`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `jornada1`
--

DROP TABLE IF EXISTS `jornada1`;
/*!50001 DROP VIEW IF EXISTS `jornada1`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `jornada1` AS SELECT 
 1 AS `cod_e`,
 1 AS `nombre_e`,
 1 AS `abreviatura`,
 1 AS `nombre_l`,
 1 AS `presupuesto_e`,
 1 AS `win`,
 1 AS `loose`,
 1 AS `draw`,
 1 AS `total`,
 1 AS `estadio`,
 1 AS `entrenador`,
 1 AS `presidente`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `goleadores`
--

DROP TABLE IF EXISTS `goleadores`;
/*!50001 DROP VIEW IF EXISTS `goleadores`*/;
SET @saved_cs_client     = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `goleadores` AS SELECT 
 1 AS `nombre_j`,
 1 AS `Goles`*/;
SET character_set_client = @saved_cs_client;

--
-- Final view structure for view `v_equipos`
--

/*!50001 DROP VIEW IF EXISTS `v_equipos`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `v_equipos` AS select `equipos`.`cod_e` AS `cod_e`,`equipos`.`nombre_e` AS `nombre_e`,`equipos`.`abreviatura` AS `abreviatura`,`equipos`.`nombre_l` AS `nombre_l`,`equipos`.`presupuesto_e` AS `presupuesto_e`,`equipos`.`win` AS `win`,`equipos`.`loose` AS `loose`,`equipos`.`draw` AS `draw`,`equipos`.`total` AS `total`,`equipos`.`estadio` AS `estadio`,`equipos`.`entrenador` AS `entrenador`,`equipos`.`presidente` AS `presidente` from `equipos` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `jornada1`
--

/*!50001 DROP VIEW IF EXISTS `jornada1`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `jornada1` AS select `equipos`.`cod_e` AS `cod_e`,`equipos`.`nombre_e` AS `nombre_e`,`equipos`.`abreviatura` AS `abreviatura`,`equipos`.`nombre_l` AS `nombre_l`,`equipos`.`presupuesto_e` AS `presupuesto_e`,`equipos`.`win` AS `win`,`equipos`.`loose` AS `loose`,`equipos`.`draw` AS `draw`,`equipos`.`total` AS `total`,`equipos`.`estadio` AS `estadio`,`equipos`.`entrenador` AS `entrenador`,`equipos`.`presidente` AS `presidente` from `equipos` order by `equipos`.`total` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `goleadores`
--

/*!50001 DROP VIEW IF EXISTS `goleadores`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_0900_ai_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `goleadores` AS select `jugadores`.`nombre_j` AS `nombre_j`,count(0) AS `Goles` from (`goles` join `jugadores` on((`goles`.`n_licencia_j` = `jugadores`.`n_licencia_j`))) where (not((`goles`.`tipo` like 'p.p'))) group by `goles`.`n_licencia_j` order by count(0) desc */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Dumping events for database 'rfef'
--

--
-- Dumping routines for database 'rfef'
--
/*!50003 DROP PROCEDURE IF EXISTS `diario` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `diario`()
begin
declare a date;
declare b int;
declare c date;

		set a=(select fecha from lesiones);
		set b=(select duración_dias from lesiones);
		set c=(select current_date());
		update jugadores
		set lesion="no" where 
								(
								(select date_add(a, interval -b day))<c
								)
		;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `finpartido` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `finpartido`(in a int)
begin
	if (
    (select goles_visitante from partidos where partidos.cod=a) 
    > 
    (select goles_local from partidos where partidos.cod=a)
    )
       then update partidos 
        set ganador="e_visitante" where partidos.cod=a;
        update equipos
        set win=win+1 where cod_e in (select * from (select e_visitante from partidos where partidos.cod=a) as TempP);
        update equipos
        set loose=loose+1 where cod_e in (select * from (select e_local from partidos where partidos.cod=a) as TempP);
        update equipos
        set total=(win*3)+(draw*1) where cod_e in (select * from (select e_local from partidos where partidos.cod=a) as TempP);
		update equipos
		set total=(win*3)+(draw*1) where cod_e in (select * from (select e_visitante from partidos where partidos.cod=a) as TempP);
    end if;

	if (
    (select goles_local from partidos where partidos.cod=a) 
    > 
    (select goles_visitante from partidos where partidos.cod=a)
    )
       then 
       update partidos 
		set ganador="e_local" where partidos.cod=a;
        update equipos
        set win=win+1 where cod_e in (select * from (select e_local from partidos where partidos.cod=a) as TempP);
        update equipos
        set loose=loose+1 where cod_e in (select * from (select e_visitante from partidos where partidos.cod=a) as TempP);
        update equipos
        set total=(win*3)+(draw*1) where cod_e in (select * from (select e_local from partidos where partidos.cod=a) as TempP);
		update equipos
		set total=(win*3)+(draw*1) where cod_e in (select * from (select e_visitante from partidos where partidos.cod=a) as TempP);
	end if;
    
	if (
    (select goles_local from partidos where partidos.cod=a) 
    =
    (select goles_visitante from partidos where partidos.cod=a)
    )
       then 
       update partidos 
		set ganador="empate" where partidos.cod=a;
        update equipos
        set draw=draw+1 where cod_e in (select * from (select e_local from partidos where partidos.cod=a) as TempP);
        update equipos
        set draw=draw+1 where cod_e in (select * from (select e_visitante from partidos where partidos.cod=a) as TempP);
        update equipos
        set equipos.total=(equipos.win*3)+(equipos.draw*1) where cod_e in (select * from (select e_visitante from partidos where partidos.cod=a) as TempP);
		update equipos
		set equipos.total=(equipos.win*3)+(equipos.draw*1) where cod_e in (select * from (select e_local from partidos where partidos.cod=a) as TempP);
	end if;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ingreso` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ingreso`()
begin

		
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `last_partidos` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `last_partidos`(in a varchar(50))
begin

select partidos.fecha, partidos.hora, partidos.jornada, 
(select nombre_e from equipos inner join partidos on cod_e=e_local limit 1) as 'local',
(select nombre_e from equipos inner join partidos on cod_e=e_visitante limit 1) as 'visitante'
from equipos inner join partidos on cod_e=e_local or cod_e=e_visitante
where nombre_e like "%Celta%"
;


select partidos.fecha, partidos.hora, partidos.jornada, nombre_e, nombre_e
from equipos inner join partidos on cod_e=e_local or cod_e=e_visitante
where nombre_e like "%Celta%"
;

select partidos.fecha, partidos.hora, partidos.jornada, nombre_e, nombre_e
from equipos inner join partidos on cod_e=e_local or cod_e=e_visitante
where (select nombre_e from equipos inner join partidos on cod_e=e_local) like "%Celta%" or (select nombre_e from equipos inner join partidos on cod_e=e_visitante) like "%Celta%"
order by fecha desc limit 5
;

select partidos.fecha, partidos.hora, partidos.jornada, nombre_e, nombre_e
from equipos inner join partidos on cod_e=e_local or cod_e=e_visitante
where (select nombre_e from equipos inner join partidos on cod_e=e_local) like "%Celta%" or (select nombre_e from equipos inner join partidos on cod_e=e_visitante) like "%Celta%"
order by fecha desc limit 5
;

end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ver_equipo` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ver_equipo`(in a varchar(50))
begin
	select * from equipos
    where nombre_e like a;
end ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `ver_jugadores` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_0900_ai_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `ver_jugadores`(in a varchar(50))
begin
	select n_licencia_j as 'cod', nombre_j as 'Nombre', valor_mercado as 'valor', posicion, dorsal,amarillas,sancion,lesion
    from jugadores 
    inner join equipos on equipo_actual=equipos.cod_e
    where nombre_e like a;
end ;;
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
