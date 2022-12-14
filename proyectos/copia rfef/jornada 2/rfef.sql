-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-08-2022 a las 17:07:01
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `rfef`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `diario` ()   begin
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
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `finpartido` (IN `a` INT)   begin
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
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ingreso` ()   begin

		
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `last_partidos` (IN `a` VARCHAR(50))   begin

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

end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ver_equipo` (IN `a` VARCHAR(50))   begin
	select * from equipos
    where nombre_e like a;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ver_jugadores` (IN `a` VARCHAR(50))   begin
	select n_licencia_j as 'cod', nombre_j as 'Nombre', valor_mercado as 'valor', posicion, dorsal,amarillas,sancion,lesion
    from jugadores 
    inner join equipos on equipo_actual=equipos.cod_e
    where nombre_e like a;
end$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arbitros`
--

CREATE TABLE `arbitros` (
  `n_licencia_a` int NOT NULL,
  `nombre_a` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arbitros`
--

INSERT INTO `arbitros` (`n_licencia_a`, `nombre_a`) VALUES
(1, 'Ricardo de Burgos Bergoetxea'),
(2, 'Carlos del Cerro Grande'),
(3, 'Antonio Mateu Lahoz'),
(4, 'Jesús Gil Manzano'),
(5, 'MIGUEL ÁNGEL ORTIZ ARIAS'),
(6, 'VALENTÍN PIZARRO GÓMEZ'),
(7, 'Javier Alberola Rojas'),
(8, 'Guillermo Cuadra Fernández'),
(9, 'Isidro Díaz de Mera Escuderos'),
(10, 'Jorge Figueroa Vázquez'),
(11, 'Pablo González Fuertes'),
(12, 'Alejandro Hernández Hernández'),
(13, 'Javier Iglesias Villanueva'),
(14, 'Juan Martínez Munuera'),
(15, 'Mario melero López'),
(16, 'José Luis Munuera Montero'),
(17, 'Alejandro Muñiz Ruiz'),
(18, 'Juan Luis Pulido Santana'),
(19, 'José María Sánchez Martínez'),
(20, 'César Soto Grado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `cod_e` int NOT NULL,
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
  `presidente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`cod_e`, `nombre_e`, `abreviatura`, `nombre_l`, `presupuesto_e`, `win`, `loose`, `draw`, `total`, `estadio`, `entrenador`, `presidente`) VALUES
(1, 'Real Club Celta de Vigo', 'RCC', 'Liga Santander', 40000, 0, 0, 1, 1, 'Abanca Balaídos', NULL, NULL),
(2, 'Real Madrid', 'RM', 'Liga Santander', 10000000, 1, 0, 0, 3, 'Santiago Bernabeu', NULL, NULL),
(3, 'Fútbol Club Barcelona', 'FCB', 'Liga Santander', 0, 0, 0, 1, 1, 'Spotify Camp Nou', NULL, NULL),
(4, 'Atlético de Madrid', 'ATM', 'Liga Santander', 500000, 1, 0, 0, 3, 'Wakanda Metropolitano', NULL, NULL),
(5, 'Villareal Club de Fútbol', 'VLL', 'Liga Santander', 50500, 1, 0, 0, 3, 'Estadio de la Cerámica', NULL, NULL),
(6, 'Club Atlético Osasuna', 'OSA', 'Liga Santander', 50500, 1, 0, 0, 3, 'El Sadar', NULL, NULL),
(7, 'Cádiz CF', 'CCF', 'Liga Santander', 50500, 0, 1, 0, 0, 'Estadio nuevo Mirandilla', NULL, NULL),
(8, 'Elche Club de Fútbol', 'ELC', 'Liga Santander', 40500, 0, 1, 0, 0, 'Estadio Martínez Valero', NULL, NULL),
(9, 'Getafe CF', 'GCF', 'Liga Santander', 50500, 0, 1, 0, 0, 'Coliseum Alfonso Pérez', NULL, NULL),
(10, 'Rayo Vallecano', 'RVA', 'Liga Santander', 13500, 0, 0, 1, 1, 'Estadio de Vallecas', NULL, NULL),
(11, 'RCD Espanyol', 'ESY', 'Liga Santander', 8500, 0, 0, 1, 1, 'RCDE Stadium', NULL, NULL),
(12, 'RCD Mallorca', 'CDM', 'Liga Santander', 3500, 0, 0, 1, 1, 'Visit Mallorca Estadi', NULL, NULL),
(13, 'Real Betis', 'RBB', 'Liga Santander', 9500, 1, 0, 0, 3, 'Estadio Benito Villamarín', NULL, NULL),
(14, 'Real Sociedad', 'RSO', 'Liga Santander', 13500, 1, 0, 0, 3, 'Reale Arena', NULL, NULL),
(15, 'Sevilla CF', 'SCF', 'Liga Santander', 15500, 0, 1, 0, 0, 'Ramón Sánchez Pizjuán', NULL, NULL),
(16, 'Valencia CF', 'VCF', 'Liga Santander', 20500, 1, 0, 0, 3, 'Camp de Mestalla', NULL, NULL),
(17, 'Atletic Club de Bilbao', 'ACB', 'Liga Santander', 20500, 0, 0, 1, 1, 'San Mamés', NULL, NULL),
(18, 'Almería FC', 'ALM', 'Liga Santander', 20500, 0, 1, 0, 0, 'Estadio de los juegos mediterráneos', 'Joan Francesc Ferrer', 'Turki Alalshikh'),
(19, 'Real Valladolid CF', 'RVA', 'Liga Santander', 20500, 0, 1, 0, 0, 'Estadio municipal José Zorrilla', NULL, NULL),
(20, 'Girona FC FC', 'GFC', 'Liga Santander', 20500, 0, 1, 0, 0, 'Estadio Municipal de Montilivi', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fichajes`
--

CREATE TABLE `fichajes` (
  `fecha_trasp` date NOT NULL,
  `jugador` int NOT NULL,
  `equipo_next` int DEFAULT NULL,
  `precio` int DEFAULT '0',
  `tipo` enum('cesion','traspaso','libre') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Disparadores `fichajes`
--
DELIMITER $$
CREATE TRIGGER `fichaje` BEFORE INSERT ON `fichajes` FOR EACH ROW begin
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
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `goleadores`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `goleadores` (
`Goles` bigint
,`nombre_j` varchar(50)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `goles`
--

CREATE TABLE `goles` (
  `n_licencia_j` int DEFAULT NULL,
  `cod_partido` int DEFAULT NULL,
  `n_gol` int NOT NULL,
  `tipo` enum('falta','cabeza','volea','tiro','p.p','penalty') DEFAULT NULL,
  `minuto` char(3) DEFAULT NULL,
  `asistencia` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `goles`
--

INSERT INTO `goles` (`n_licencia_j`, `cod_partido`, `n_gol`, `tipo`, `minuto`, `asistencia`) VALUES
(139, 1, 1, 'tiro', '9', 137),
(344, 1, 2, 'tiro', '11', 339),
(143, 1, 3, 'penalty', '74', NULL),
(1, 2, 4, 'tiro', '45', 17),
(20, 2, 5, 'tiro', '63', 7),
(247, 2, 6, 'tiro', '72', NULL),
(249, 2, 7, 'penalty', '94', NULL),
(119, 3, 8, 'tiro', '49', 118),
(113, 3, 9, 'tiro', '81', 110),
(113, 3, 10, 'tiro', '90', NULL),
(311, 5, 11, 'tiro', '24', 310),
(363, 6, 12, 'penalty', '45', 138),
(411, 7, 13, 'tiro', '6', 405),
(39, 7, 14, 'tiro', '61', 44),
(25, 7, 15, 'falta', '75', NULL),
(93, 9, 16, 'tiro', '15', 89),
(93, 9, 17, 'tiro', '59', 89),
(90, 9, 18, 'tiro', '75', 89),
(294, 10, 19, 'tiro', '28', 289),
(293, 10, 20, 'tiro', '39', 288),
(293, 10, 21, 'tiro', '60', NULL);

--
-- Disparadores `goles`
--
DELIMITER $$
CREATE TRIGGER `gol` AFTER INSERT ON `goles` FOR EACH ROW begin

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
    
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `jornada1`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `jornada1` (
`abreviatura` varchar(3)
,`cod_e` int
,`draw` int
,`entrenador` varchar(50)
,`estadio` varchar(50)
,`loose` int
,`nombre_e` varchar(50)
,`nombre_l` varchar(50)
,`presidente` varchar(50)
,`presupuesto_e` int
,`total` int
,`win` int
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

CREATE TABLE `jugadores` (
  `n_licencia_j` int NOT NULL,
  `nombre_j` varchar(50) DEFAULT NULL,
  `valor_mercado` int DEFAULT NULL,
  `posicion` enum('DC','DFC','LD','LI','MC','MCD','MCO','EI','ED','POR') DEFAULT NULL,
  `equipo_actual` int DEFAULT NULL,
  `dorsal` char(2) DEFAULT NULL,
  `amarillas` int DEFAULT '0',
  `sancion` enum('si','no') DEFAULT 'no',
  `lesion` enum('si','no') DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`n_licencia_j`, `nombre_j`, `valor_mercado`, `posicion`, `equipo_actual`, `dorsal`, `amarillas`, `sancion`, `lesion`) VALUES
(1, 'Iago Aspas Juncal', 5000000, 'DC', 1, '10', 1, 'no', 'no'),
(2, 'Hugo Mallo', 50000, 'LD', 1, '2', 1, 'no', 'no'),
(3, 'Agustín Marchesín', 50000, 'POR', 1, '13', 1, 'no', 'no'),
(4, 'Iván Villar', 50000, 'POR', 1, '1', 0, 'no', 'no'),
(5, 'Óscar Mingueza', 50000, 'DFC', 1, '3', 0, 'no', 'no'),
(6, 'Unai Núñez', 50000, 'DFC', 1, '4', 0, 'no', 'no'),
(7, 'Javi Galán', 50000, 'LI', 1, '17', 1, 'no', 'no'),
(8, 'Joseph Aidoo', 50000, 'DFC', 1, '15', 1, 'no', 'no'),
(9, 'Kevin Vázquez', 50000, 'LD', 1, '20', 0, 'no', 'no'),
(10, 'Óscar Rodríguez', 50000, 'MCO', 1, '5', 0, 'no', 'no'),
(11, 'Denis Suárez', 50000, 'MCO', 1, '6', 0, 'no', 'no'),
(12, 'Fran Beltrán', 50000, 'MC', 1, '8', 0, 'no', 'no'),
(13, 'Franco Cervi', 50000, 'EI', 1, '11', 0, 'no', 'no'),
(14, 'Renato Tapia', 50000, 'MCD', 1, '14', 0, 'no', 'no'),
(15, 'Miguel Baeza', 50000, 'MC', 1, '16', 0, 'no', 'no'),
(16, 'Williot Swedberg', 50000, 'MC', 1, '19', 0, 'no', 'no'),
(17, 'Augusto Solari', 50000, 'ED', 1, '21', 0, 'no', 'no'),
(18, 'Luca de la Torre', 50000, 'ED', 1, '23', 0, 'no', 'no'),
(19, 'Carles Pérez', 50000, 'ED', 1, '7', 0, 'no', 'no'),
(20, 'Gonçalo Paciência', 50000, 'DC', 1, '9', 0, 'no', 'no'),
(21, 'Vinicius JR', 5000000, 'EI', 2, '20', 0, 'no', 'no'),
(22, 'Thibaut Courtois', 5000000, 'POR', 2, '1', 0, 'no', 'no'),
(23, 'Andrii Lunin', 5000000, 'POR', 2, '13', 0, 'no', 'no'),
(24, 'Eder Militão', 5000000, 'DFC', 2, '3', 0, 'no', 'no'),
(25, 'David Alaba', 5000000, 'DFC', 2, '4', 0, 'no', 'no'),
(26, 'Jesús vallejo', 5000000, 'DFC', 2, '5', 0, 'no', 'no'),
(27, 'Nacho', 5000000, 'DFC', 2, '6', 0, 'no', 'no'),
(28, 'Dani Carvajal', 509000, 'LD', 2, '2', 0, 'no', 'no'),
(29, 'Nacho', 5000000, 'DFC', 2, '6', 0, 'no', 'no'),
(30, 'Álvaro Odriozola', 5000000, 'LD', 2, '16', 0, 'no', 'no'),
(31, 'Antonio Rudriguer', 5000000, 'DFC', 2, '22', 0, 'no', 'no'),
(32, 'Ferland Mendy', 5000000, 'LI', 2, '23', 0, 'no', 'no'),
(33, 'Nacho', 5000000, 'DFC', 2, '6', 0, 'no', 'no'),
(34, 'Toni Kroos', 5000000, 'MC', 2, '8', 0, 'no', 'no'),
(35, 'Luka Modric', 5000000, 'MC', 2, '10', 0, 'no', 'no'),
(36, 'Eduardo Camavinga', 5000000, 'MCO', 2, '12', 1, 'no', 'no'),
(37, 'Casemiro', 5000000, 'MCD', 2, '14', 0, 'no', 'no'),
(38, 'Federico Valverde', 5000000, 'MC', 2, '15', 0, 'no', 'no'),
(39, 'Lucas Vázquez', 5000000, 'ED', 2, '17', 0, 'no', 'no'),
(40, 'Aurélien Tchouaméni', 5000000, 'MC', 2, '18', 0, 'no', 'no'),
(41, 'Dani Ceballos', 5000000, 'MC', 2, '19', 0, 'no', 'no'),
(42, 'Eden Hazard', 5000000, 'EI', 2, '7', 0, 'no', 'no'),
(43, 'Marco Asensio', 5000000, 'EI', 2, '11', 0, 'no', 'no'),
(44, 'Karim Benzema', 80000000, 'DC', 2, '9', 0, 'no', 'no'),
(45, 'Rodrygo', 80000000, 'ED', 2, '21', 0, 'no', 'no'),
(46, 'Mariano', 80000000, 'ED', 2, '24', 0, 'no', 'no'),
(47, 'Marc-André ter Stegen', 50000000, 'POR', 3, '1', 0, 'no', 'no'),
(48, 'Iñaki Peña', 50000000, 'POR', 3, '13', 0, 'no', 'no'),
(49, 'Jules Koundé', 50000000, 'DFC', 3, NULL, 0, 'no', 'no'),
(50, 'Andreas Christensen', 50000000, 'DFC', 3, '15', 0, 'no', 'no'),
(51, 'Sergiño Dest', 50000000, 'LD', 3, '2', 0, 'no', 'no'),
(52, 'Ronald Araújo', 50000000, 'DFC', 3, '4', 0, 'no', 'no'),
(53, 'Jordi Alba', 50000000, 'LI', 3, '18', 0, 'no', 'no'),
(54, 'Sergi Roberto', 50000000, 'LD', 3, '20', 0, 'no', 'no'),
(55, 'Samuel Umtiti', 50000000, 'DFC', 3, NULL, 0, 'no', 'no'),
(56, 'Eric García', 50000000, 'DFC', 3, '24', 0, 'no', 'no'),
(57, 'Sergio Busquets', 50000000, 'MC', 3, '5', 0, 'si', 'no'),
(58, 'Pedri González', 50000000, 'MC', 3, '8', 0, 'no', 'no'),
(59, 'Ferran Torres', 50000000, 'ED', 3, '11', 0, 'no', 'no'),
(60, 'Pjanic', 50000000, 'MC', 3, '16', 0, 'no', 'no'),
(61, 'Kessie', 50000000, 'MC', 3, '19', 0, 'no', 'no'),
(62, 'Frankie de Jong', 50000000, 'MC', 3, '21', 0, 'no', 'no'),
(63, 'Aymeric Aubameyang', 50000000, 'DC', 3, '17', 0, 'no', 'no'),
(64, 'Ousmane Dembélé', 50000000, 'ED', 3, '7', 1, 'no', 'no'),
(65, 'Robert Lewandowski', 50000000, 'DC', 3, '9', 0, 'no', 'no'),
(66, 'Memphis Depay', 50000000, 'DC', 3, '14', 0, 'no', 'no'),
(67, 'Ansu Fati', 50000000, 'EI', 3, '10', 0, 'no', 'no'),
(68, 'Raphinha', 50000000, 'EI', 3, '22', 0, 'no', 'no'),
(69, 'Martin Braithwaite', 50000000, 'DC', 3, NULL, 0, 'no', 'no'),
(70, 'Gerard Piqué', 5000000, 'DFC', 3, '3', 0, 'no', 'no'),
(71, 'Pedri González', 50000000, 'MC', 3, '16', 0, 'no', 'no'),
(72, 'Jan Oblack', 6500000, 'POR', 4, '13', 0, 'no', 'no'),
(73, 'Grbic', 6500000, 'POR', 4, '1', 0, 'no', 'no'),
(74, 'Felipe', 5000000, 'DFC', 4, '4', 0, 'no', 'no'),
(75, 'Jose María Jiménez', 5000000, 'DFC', 4, '2', 0, 'no', 'no'),
(76, 'Renan Lodi', 5000000, 'LD', 4, '12', 0, 'no', 'no'),
(77, 'Savić', 5000000, 'DFC', 4, '15', 0, 'no', 'no'),
(78, 'Molina L', 5000000, 'DFC', 4, '16', 0, 'no', 'no'),
(79, 'Mario Hermoso', 5000000, 'DFC', 4, '22', 0, 'no', 'no'),
(80, 'Reinildo', 506500, 'LI', 4, '23', 0, 'no', 'no'),
(81, 'Kondogbia', 5000000, 'MC', 4, '4', 0, 'no', 'no'),
(82, 'Rodrigo de Paul', 5000000, 'MC', 4, '5', 0, 'no', 'no'),
(83, 'Koke', 5000000, 'MC', 4, '6', 0, 'no', 'no'),
(84, 'Thomas Lemar', 5000000, 'MC', 4, '11', 0, 'no', 'no'),
(85, 'Marcos Llorente', 509000, 'MC', 4, '14', 0, 'no', 'no'),
(86, 'Witsel', 509000, 'MC', 4, '20', 0, 'no', 'no'),
(87, 'Carrasco', 509000, 'EI', 4, '21', 1, 'no', 'no'),
(88, 'Daniel Wass', 509000, 'MC', 4, '24', 0, 'no', 'no'),
(89, 'João Félix', 509000, 'DC', 4, '7', 0, 'no', 'no'),
(90, 'Antoine Griezmann', 509000, 'DC', 4, '8', 0, 'no', 'no'),
(91, 'Matheus Cunha', 509000, 'DC', 4, '9', 0, 'no', 'no'),
(92, 'Correa', 509000, 'DC', 4, '10', 0, 'no', 'no'),
(93, 'Morata', 509000, 'DC', 4, '19', 0, 'no', 'no'),
(94, 'Marcos Paulo', 509000, 'DC', 4, NULL, 0, 'no', 'no'),
(95, 'Reina', 10, 'POR', 5, '1', 0, 'no', 'no'),
(96, 'Rulli', 10, 'POR', 5, '13', 0, 'no', 'no'),
(97, 'Kiko Fernández', 10, 'DFC', 5, '2', 0, 'no', 'no'),
(98, 'Pau Torres', 10, 'DFC', 5, '4', 0, 'no', 'no'),
(99, 'J. Cuenca', 10, 'DFC', 5, '5', 0, 'no', 'no'),
(100, 'Raúl Albiol', 10, 'DFC', 5, '3', 0, 'no', 'no'),
(101, 'Foyth', 10, 'LI', 5, '8', 0, 'no', 'no'),
(102, 'Estupiñán', 10, 'LI', 5, '12', 0, 'no', 'no'),
(103, 'Mandi', 10, 'LD', 5, '23', 0, 'no', 'no'),
(104, 'Antonio Pedraza', 10, 'LD', 5, '24', 0, 'no', 'no'),
(105, 'Alberto Moreno', 10, 'DFC', 5, '18', 0, 'no', 'no'),
(106, 'Manuel Trigueros', 5000000, 'MC', 5, '14', 0, 'no', 'no'),
(107, 'Capoue', 5000000, 'MC', 5, '6', 0, 'no', 'no'),
(108, 'Parejo', 5000000, 'MC', 5, '10', 0, 'no', 'no'),
(109, 'Chukwueze', 5000000, 'MCO', 5, '11', 0, 'no', 'no'),
(110, 'Danjuma', 5000000, 'MC', 5, '15', 0, 'no', 'no'),
(111, 'Coquelin', 5000000, 'MC', 5, '19', 0, 'no', 'no'),
(112, 'Morlanes', 5000000, 'MC', 5, '20', 0, 'no', 'no'),
(113, 'Alex . B', 5000000, 'MC', 5, '30', 0, 'no', 'no'),
(114, 'Gerard Moreno', 5000000, 'DC', 5, '7', 0, 'no', 'no'),
(115, 'Paco Alcácer', 5000000, 'DC', 5, '9', 0, 'no', 'no'),
(116, 'Boulaye Dia', 5000000, 'DC', 5, '17', 0, 'no', 'no'),
(117, 'Yeremy Pino', 5000000, 'DC', 5, '21', 0, 'no', 'no'),
(118, 'Morales', 5000000, 'EI', 5, '22', 0, 'no', 'no'),
(119, 'N.jackson', 5000000, 'DC', 5, '26', 0, 'no', 'no'),
(120, 'Sergio Herrera', 10, 'POR', 6, '1', 1, 'no', 'no'),
(121, 'Aitor Fernández', 10, 'POR', 6, '25', 0, 'no', 'no'),
(122, 'Nacho Vidal', 10, 'DFC', 6, '2', 0, 'no', 'no'),
(123, 'Unai García', 10, 'DFC', 6, '4', 1, 'no', 'no'),
(124, 'David García', 10, 'DFC', 6, '5', 1, 'no', 'no'),
(125, 'Juan Cruz', 10, 'DFC', 6, '3', 0, 'no', 'no'),
(126, 'Herrando', 10, 'LI', 6, '31', 0, 'no', 'no'),
(127, 'Aridane', 10, 'LI', 6, '23', 0, 'no', 'no'),
(128, 'Manu Sánchez', 10, 'LD', 6, '20', 0, 'no', 'no'),
(129, 'Areso', 10, 'LD', 6, '12', 0, 'no', 'no'),
(130, 'Torró', 10, 'MC', 6, '6', 0, 'no', 'no'),
(131, 'Moncayola', 5000000, 'MC', 6, '7', 0, 'no', 'no'),
(132, 'Darko', 5000000, 'MC', 6, '8', 0, 'no', 'no'),
(133, 'Roberto Torres', 5000000, 'MC', 6, '10', 0, 'no', 'no'),
(134, 'Moi Gómez', 5000000, 'MCO', 6, '16', 1, 'no', 'no'),
(135, 'Ibañez', 5000000, 'MC', 6, '19', 0, 'no', 'no'),
(136, 'Javi Martinez', 5000000, 'MC', 6, '21', 0, 'no', 'no'),
(137, 'R. Peña', 5000000, 'MC', 6, '15', 0, 'no', 'no'),
(138, 'Budimir', 5000000, 'DC', 6, '17', 0, 'no', 'no'),
(139, 'Chimy Avila', 5000000, 'DC', 6, '9', 1, 'no', 'no'),
(140, 'Kike García', 5000000, 'DC', 6, '18', 0, 'no', 'no'),
(141, 'Kike Barja', 5000000, 'DC', 6, '11', 0, 'no', 'no'),
(142, 'Barbero', 5000000, 'EI', 6, '22', 0, 'no', 'no'),
(143, 'Aimar', 5000000, 'DC', 6, '29', 0, 'no', 'no'),
(144, 'I.b.sanchez', 5000000, 'DC', 6, '33', 0, 'no', 'no'),
(145, 'Ledesma', 10, 'POR', 7, '1', 0, 'no', 'no'),
(146, 'David Gil', 10, 'POR', 7, '13', 0, 'no', 'no'),
(147, 'Zaldua', 10, 'DFC', 7, '2', 1, 'no', 'no'),
(148, 'Iza', 10, 'LI', 5, '20', 0, 'no', 'no'),
(149, 'Arzamendia', 10, 'LD', 7, '21', 0, 'no', 'no'),
(150, 'Fali', 10, 'DFC', 7, '3', 1, 'no', 'no'),
(151, 'A. Espino', 10, 'DFC', 7, '22', 0, 'no', 'no'),
(152, 'Juan Cala', 10, 'DFC', 7, '16', 0, 'no', 'no'),
(153, 'Luis Hernández', 10, 'LD', 7, '23', 0, 'no', 'no'),
(154, 'Jose Mari', 10, 'MC', 7, '6', 0, 'no', 'no'),
(155, 'Alex', 10, 'MC', 7, '8', 0, 'no', 'no'),
(156, 'R. Alcaraz', 10, 'MC', 7, '4', 0, 'no', 'no'),
(157, 'A. Perea', 5000000, 'MC', 7, '10', 0, 'no', 'no'),
(158, 'I. Alejo', 5000000, 'MCO', 7, '11', 1, 'no', 'no'),
(159, 'Tomás Alarcón', 5000000, 'MC', 7, '12', 0, 'no', 'no'),
(160, 'Mabil', 5000000, 'MC', 7, '17', 0, 'no', 'no'),
(161, 'Fede S.', 5000000, 'MC', 7, '24', 0, 'no', 'no'),
(162, 'Sobrino', 5000000, 'DC', 7, '7', 0, 'no', 'no'),
(163, 'Lozano', 5000000, 'DC', 7, '9', 0, 'no', 'no'),
(164, 'Lucas Pérez', 5000000, 'DC', 7, '15', 1, 'no', 'no'),
(165, 'A. Negredo', 5000000, 'DC', 7, '18', 0, 'no', 'no'),
(166, 'Alvaro G.C', 5000000, 'EI', 7, '19', 0, 'no', 'no'),
(167, 'Edgar Badia', 10, 'POR', 8, '13', 0, 'no', 'no'),
(168, 'R.p. Bigas', 10, 'DFC', 8, '6', 0, 'no', 'no'),
(169, 'Diego González', 10, 'DFC', 8, '4', 0, 'no', 'no'),
(170, 'Gonzalo Verdú', 10, 'DFC', 8, '5', 0, 'no', 'no'),
(171, 'Jhon C', 10, 'DFC', 8, '26', 0, 'si', 'no'),
(172, 'Enzo Roco', 10, 'DFC', 8, '3', 0, 'no', 'no'),
(173, 'H.palacios', 10, 'LI', 8, '14', 0, 'no', 'no'),
(174, 'C. Clerc', 10, 'LI', 8, '23', 0, 'no', 'no'),
(175, 'Pastore', 5000000, 'MC', 8, '7', 0, 'no', 'no'),
(176, 'Raúl Guti', 5000000, 'MC', 8, '8', 0, 'no', 'no'),
(177, 'Josan', 5000000, 'MC', 8, '17', 1, 'no', 'no'),
(178, 'T. Morente', 5000000, 'MCO', 8, '11', 0, 'no', 'no'),
(179, 'Gumbau', 5000000, 'MC', 8, '20', 1, 'no', 'no'),
(180, 'Omar Mascarell', 5000000, 'MC', 8, '21', 0, 'no', 'no'),
(181, 'J. Mojica', 5000000, 'MC', 8, '22', 1, 'no', 'no'),
(182, 'Pere Milla', 5000000, 'DC', 8, '10', 1, 'no', 'no'),
(183, 'Lucas Boyé', 5000000, 'DC', 8, '9', 0, 'no', 'no'),
(184, 'Fidel', 5000000, 'ED', 8, '16', 1, 'no', 'no'),
(185, 'E. Ponce', 5000000, 'DC', 8, '19', 0, 'no', 'no'),
(186, 'Roger Ms.', 5000000, 'EI', 8, '18', 1, 'no', 'no'),
(187, 'David Soria', 10, 'POR', 9, '13', 0, 'no', 'no'),
(188, 'Djene', 10, 'DFC', 9, '2', 0, 'no', 'no'),
(189, 'Gaston', 10, 'DFC', 9, '4', 0, 'no', 'no'),
(190, 'Domingos D.', 10, 'DFC', 9, '6', 0, 'no', 'no'),
(191, 'F. Angileri', 10, 'DFC', 9, '3', 0, 'no', 'no'),
(192, 'Damián', 10, 'LD', 9, '22', 0, 'no', 'no'),
(193, 'Iglesias', 10, 'LI', 9, '21', 0, 'no', 'no'),
(194, 'Mitrovic', 10, 'LD', 9, '23', 0, 'no', 'no'),
(195, 'L. Milla', 5000000, 'MC', 9, '9', 0, 'no', 'no'),
(196, 'Seoane', 5000000, 'MC', 9, '8', 0, 'no', 'no'),
(197, 'Algobia', 5000000, 'MC', 9, '16', 0, 'no', 'no'),
(198, 'Aleñá', 5000000, 'MCO', 9, '11', 1, 'no', 'no'),
(199, 'M. Arambarri', 5000000, 'MC', 9, '18', 0, 'no', 'no'),
(200, 'Maksimovic', 5000000, 'MC', 9, '20', 0, 'no', 'no'),
(201, 'Mata', 5000000, 'DC', 9, '7', 0, 'no', 'no'),
(202, 'Portu', 5000000, 'ED', 9, '9', 0, 'no', 'no'),
(203, 'Enes Ünal', 5000000, 'DC', 9, '10', 1, 'no', 'no'),
(204, 'B. Mayoral', 5000000, 'DC', 9, '19', 0, 'no', 'no'),
(205, 'Dimitrievski', 10, 'POR', 10, '1', 1, 'no', 'no'),
(206, 'Diego Lopez', 10, 'POR', 10, '13', 0, 'no', 'no'),
(207, 'Kiko Fernández', 10, 'DFC', 10, '2', 0, 'no', 'no'),
(208, 'Lejeune', 10, 'DFC', 10, '19', 1, 'no', 'no'),
(209, 'Catena', 10, 'DFC', 10, '5', 1, 'no', 'no'),
(210, 'Fran Garcia', 10, 'DFC', 10, '3', 0, 'no', 'no'),
(211, 'Balliu', 10, 'LI', 10, '20', 0, 'no', 'no'),
(212, 'E. Saveljilch', 10, 'LI', 10, '24', 0, 'no', 'no'),
(213, 'Diego Mendez', 10, 'LD', 10, '29', 0, 'no', 'no'),
(214, 'Mario H.', 5000000, 'MC', 10, '2', 0, 'no', 'no'),
(215, 'M. Suárez', 5000000, 'MC', 10, '4', 0, 'no', 'no'),
(216, 'Santi C.v.', 5000000, 'MC', 10, '6', 0, 'no', 'no'),
(217, 'Nteka', 5000000, 'MCO', 10, '11', 0, 'no', 'no'),
(218, 'Isi Palazón', 5000000, 'MC', 10, '7', 0, 'no', 'no'),
(219, 'Salvi Sánchez', 5000000, 'MC', 10, '14', 0, 'no', 'no'),
(220, 'Unai Lopez', 5000000, 'MC', 10, '17', 0, 'no', 'no'),
(221, 'Álvaro', 5000000, 'MC', 10, '18', 0, 'no', 'no'),
(222, 'Pathé Ciss', 5000000, 'MC', 10, '21', 1, 'no', 'no'),
(223, 'Óscar', 5000000, 'MC', 10, '23', 0, 'no', 'no'),
(224, 'Pablo Muñoz', 5000000, 'MCO', 10, '28', 0, 'no', 'no'),
(225, 'Oscar Trejo', 5000000, 'DC', 10, '8', 1, 'no', 'no'),
(226, 'Falcao', 5000000, 'DC', 10, '9', 1, 'no', 'no'),
(227, 'Bebé', 5000000, 'EI', 10, '10', 0, 'no', 'no'),
(228, 'Jose Pozo', 5000000, 'ED', 10, '22', 0, 'no', 'no'),
(229, 'Camello', 5000000, 'EI', 10, '34', 0, 'no', 'no'),
(230, 'J. Garcia', 10, 'POR', 11, '1', 0, 'no', 'no'),
(231, 'Lecomte', 10, 'POR', 11, '13', 0, 'no', 'no'),
(232, 'Oscar Gil', 10, 'DFC', 11, '2', 1, 'no', 'no'),
(233, 'Cabrera', 10, 'DFC', 11, '4', 0, 'no', 'no'),
(234, 'Calero', 10, 'DFC', 11, '5', 0, 'no', 'no'),
(235, 'Pedrosa', 10, 'DFC', 11, '3', 0, 'no', 'no'),
(236, 'Aleix V.c', 10, 'LI', 11, '22', 0, 'no', 'no'),
(237, 'B. Olivan', 10, 'LI', 11, '14', 0, 'no', 'no'),
(238, 'Omar', 10, 'LD', 11, '26', 0, 'no', 'no'),
(239, 'S. Gómez', 10, 'DFC', 11, '24', 0, 'no', 'no'),
(240, 'Simo', 10, 'DFC', 11, '28', 0, 'no', 'no'),
(241, 'Puado', 5000000, 'MC', 11, '7', 0, 'no', 'no'),
(242, 'K. Bare', 5000000, 'MC', 11, '8', 0, 'no', 'no'),
(243, 'S. Darder', 5000000, 'MC', 11, '10', 0, 'no', 'no'),
(244, 'Vini De Souza', 5000000, 'MCO', 11, '12', 1, 'no', 'no'),
(245, 'Ruben', 5000000, 'MC', 11, '27', 0, 'no', 'no'),
(246, 'Villahermosa', 5000000, 'MC', 11, '31', 0, 'no', 'no'),
(247, 'Edu Expósito', 5000000, 'MC', 11, '20', 0, 'no', 'no'),
(248, 'R.D.T', 5000000, 'DC', 11, '11', 0, 'no', 'no'),
(249, 'Joselu', 5000000, 'DC', 11, '9', 0, 'no', 'no'),
(250, 'M. Vargas', 5000000, 'DC', 11, '17', 0, 'no', 'no'),
(251, 'Nico M.r.', 5000000, 'DC', 11, '21', 0, 'no', 'no'),
(252, 'Dimata', 5000000, 'EI', 11, '18', 0, 'no', 'no'),
(253, 'Embarba', 5000000, 'EI', 11, '23', 0, 'no', 'no'),
(254, 'Koleosho', 5000000, 'DC', 11, '30', 0, 'no', 'no'),
(255, 'Nabil', 5000000, 'ED', 11, '32', 0, 'no', 'no'),
(256, 'Rajkovic', 10, 'POR', 12, '1', 0, 'no', 'no'),
(257, 'Greif', 10, 'POR', 12, '13', 0, 'no', 'no'),
(258, 'Kiko Fernández', 10, 'DFC', 12, '2', 0, 'no', 'no'),
(259, 'Copete', 10, 'DFC', 12, '6', 1, 'no', 'no'),
(260, 'F. Russo', 10, 'DFC', 12, '5', 0, 'no', 'no'),
(261, 'B. Cufré', 10, 'DFC', 12, '3', 0, 'no', 'no'),
(262, 'Maffeo', 10, 'LI', 12, '15', 0, 'no', 'no'),
(263, 'J. Costa', 10, 'LI', 12, '18', 0, 'no', 'no'),
(264, 'G. Gonzalez', 10, 'LD', 12, '20', 0, 'no', 'no'),
(265, 'Valjent', 10, 'LD', 12, '24', 0, 'no', 'no'),
(266, 'A. Raillo', 10, 'DFC', 12, '21', 0, 'no', 'no'),
(267, 'Manuel Trigueros', 5000000, 'MC', 12, '14', 0, 'no', 'no'),
(268, 'Grenier', 5000000, 'MC', 12, '8', 1, 'no', 'no'),
(269, 'Sánchez', 5000000, 'MC', 12, '10', 1, 'no', 'no'),
(270, 'Baba', 5000000, 'MCO', 12, '12', 0, 'no', 'no'),
(271, 'Dani Rodriguez', 5000000, 'MC', 12, '14', 1, 'no', 'no'),
(272, 'Battaglia', 5000000, 'MC', 12, '16', 1, 'no', 'no'),
(273, 'Lee Kang In', 5000000, 'MC', 12, '19', 1, 'no', 'no'),
(274, 'Muriqi', 5000000, 'DC', 12, '7', 0, 'no', 'no'),
(275, 'Abdón', 5000000, 'DC', 12, '9', 0, 'no', 'no'),
(276, 'Amath', 5000000, 'DC', 12, '23', 0, 'no', 'no'),
(277, 'Lago Junior', 5000000, 'DC', 12, '11', 0, 'no', 'no'),
(278, 'Ángel', 5000000, 'EI', 12, '22', 0, 'no', 'no'),
(279, 'Hoppe', 5000000, 'EI', 12, NULL, 0, 'no', 'no'),
(280, 'Dani', 10, 'POR', 13, '1', 0, 'no', 'no'),
(281, 'Rui Silva', 10, 'POR', 13, '13', 0, 'no', 'no'),
(282, 'Montoya', 10, 'DFC', 13, '2', 0, 'no', 'no'),
(283, 'Sabaly', 10, 'DFC', 13, '23', 0, 'no', 'no'),
(284, 'Bartra', 10, 'DFC', 13, '5', 0, 'no', 'no'),
(285, 'Victor Ruiz', 10, 'DFC', 13, '6', 0, 'no', 'no'),
(286, 'Pezzella', 10, 'LI', 13, '16', 0, 'no', 'no'),
(287, 'Edgar', 10, 'MC', 13, '3', 0, 'no', 'no'),
(288, 'William', 5000000, 'MC', 13, '14', 0, 'no', 'no'),
(289, 'Fekir', 5000000, 'MC', 13, '8', 1, 'no', 'no'),
(290, 'Canales', 5000000, 'MC', 13, '10', 0, 'no', 'no'),
(291, 'Paul', 5000000, 'MCO', 13, '4', 0, 'no', 'no'),
(292, 'G. Rodriguez', 5000000, 'MC', 13, '21', 0, 'no', 'no'),
(293, 'Juanmi', 5000000, 'DC', 13, '7', 1, 'no', 'no'),
(294, 'B. Iglesias', 5000000, 'DC', 13, '9', 0, 'no', 'no'),
(295, 'Alex Moreno', 5000000, 'DC', 13, '15', 0, 'no', 'no'),
(296, 'Loren', 5000000, 'DC', 13, '20', 0, 'no', 'no'),
(297, 'Aitor R.', 5000000, 'EI', 13, '24', 1, 'no', 'no'),
(298, 'A. Remiro', 10, 'POR', 14, '1', 0, 'no', 'no'),
(299, 'Zubiaurre', 10, 'POR', 14, '13', 0, 'no', 'no'),
(300, 'A.sola', 10, 'DFC', 14, '2', 0, 'no', 'no'),
(301, 'Aritz', 10, 'DFC', 14, '6', 0, 'no', 'no'),
(302, 'Rico', 10, 'DFC', 14, '15', 0, 'no', 'no'),
(303, 'Pacheco', 10, 'DFC', 14, '20', 0, 'no', 'no'),
(304, 'Gorosabel', 10, 'LI', 14, '18', 0, 'no', 'no'),
(305, 'Aihen', 10, 'LI', 14, '12', 0, 'no', 'no'),
(306, 'Le Normand', 10, 'LD', 14, '24', 0, 'no', 'no'),
(307, 'Zubimendi', 10, 'MC', 14, '3', 0, 'no', 'no'),
(308, 'Illarra', 10, 'MC', 14, '4', 1, 'no', 'no'),
(309, 'Zubeldia', 5000000, 'MC', 14, '5', 0, 'no', 'no'),
(310, 'Merino', 5000000, 'MC', 14, '8', 0, 'no', 'no'),
(311, 'Take', 5000000, 'MC', 14, '14', 0, 'no', 'no'),
(312, 'Guevara', 5000000, 'MCO', 14, '16', 0, 'no', 'no'),
(313, 'Silva', 5000000, 'MC', 14, '21', 0, 'no', 'no'),
(314, 'Coquelin', 5000000, 'MC', 14, '19', 0, 'no', 'no'),
(315, 'Brais Méndez', 5000000, 'MC', 14, '23', 1, 'no', 'no'),
(316, 'Barrenetxea', 5000000, 'DC', 14, '7', 0, 'no', 'no'),
(317, 'Carlos Fdez', 5000000, 'DC', 14, '9', 0, 'no', 'no'),
(318, 'Oyarzabal', 5000000, 'ED', 14, '10', 0, 'no', 'no'),
(319, 'Cho', 5000000, 'DC', 14, '11', 0, 'no', 'no'),
(320, 'Isak', 5000000, 'EI', 14, '19', 0, 'no', 'no'),
(321, 'Dmitrovic', 10, 'POR', 15, '1', 0, 'no', 'no'),
(322, 'Bono', 10, 'POR', 15, '13', 0, 'no', 'no'),
(323, 'G. Montiel', 10, 'DFC', 15, '2', 0, 'no', 'no'),
(324, 'K. Rekik', 10, 'DFC', 15, '4', 0, 'no', 'no'),
(325, 'J. Navas', 10, 'DFC', 15, '16', 0, 'no', 'no'),
(326, 'Alex Telles', 10, 'DFC', 15, '3', 0, 'no', 'no'),
(327, 'Acuña', 10, 'LI', 15, '19', 0, 'no', 'no'),
(328, 'Marcao', 10, 'LI', 15, '23', 0, 'no', 'no'),
(329, 'Kike Salas', 10, 'LD', 15, '29', 0, 'no', 'no'),
(330, 'Carmona', 10, 'LD', 15, '30', 0, 'no', 'no'),
(331, 'Manuel Trigueros', 5000000, 'MC', 15, '14', 0, 'no', 'no'),
(332, 'Jordán', 5000000, 'MC', 15, '8', 0, 'no', 'no'),
(333, 'I. Rakitic', 5000000, 'MC', 15, '10', 0, 'no', 'no'),
(334, 'Gudelj', 5000000, 'MCO', 15, '6', 0, 'no', 'no'),
(335, 'Fernando', 5000000, 'MC', 15, '20', 1, 'no', 'no'),
(336, 'Delaney', 5000000, 'MC', 15, '18', 0, 'no', 'no'),
(337, 'Oliver T.', 5000000, 'MC', 15, '21', 0, 'no', 'no'),
(338, 'Isco', 5000000, 'MC', 15, '22', 0, 'no', 'no'),
(339, 'Papu Gomez', 5000000, 'MC', 15, '24', 1, 'no', 'no'),
(340, 'Suso', 5000000, 'DC', 15, '7', 0, 'no', 'no'),
(341, 'Tecatito', 5000000, 'DC', 15, '9', 0, 'no', 'no'),
(342, 'Munir', 5000000, 'DC', 15, '11', 0, 'no', 'no'),
(343, 'L. Ocampos', 5000000, 'DC', 15, '5', 0, 'no', 'no'),
(344, 'Rafa Mir', 5000000, 'DC', 15, '12', 0, 'no', 'no'),
(345, 'Y. En-Nesyri', 5000000, 'DC', 15, '15', 0, 'no', 'no'),
(346, 'Iván', 5000000, 'DC', 15, '36', 1, 'no', 'no'),
(347, 'E. Lamela', 5000000, 'EI', 15, '17', 0, 'no', 'no'),
(348, 'Domenech', 10, 'POR', 16, '1', 0, 'no', 'no'),
(349, 'C.rivero', 10, 'POR', 16, '13', 0, 'no', 'no'),
(350, 'Mamardashvili', 10, 'POR', 16, '28', 0, 'no', 'no'),
(351, 'Thierry R.', 10, 'DFC', 16, '2', 1, 'no', 'no'),
(352, 'Hugo G.', 10, 'DFC', 16, '6', 0, 'no', 'no'),
(353, 'G. Paulista', 10, 'DFC', 16, '5', 0, 'no', 'no'),
(354, 'Lato', 10, 'DFC', 16, '3', 0, 'no', 'no'),
(355, 'Gayà', 10, 'LI', 16, '14', 0, 'no', 'no'),
(356, 'Diakhaby', 10, 'LI', 16, '12', 0, 'no', 'no'),
(357, 'Foulquier', 10, 'LD', 16, '20', 0, 'no', 'no'),
(358, 'Cömert', 10, 'LD', 16, '24', 0, 'si', 'no'),
(359, 'J. Vázquez', 10, 'DFC', 16, '18', 1, 'no', 'no'),
(360, 'Cristhian', 10, 'DFC', 16, '33', 0, 'no', 'no'),
(361, 'Musah', 5000000, 'MC', 16, '4', 0, 'no', 'no'),
(362, 'Račić', 5000000, 'MC', 16, '8', 0, 'no', 'no'),
(363, 'C.Soler', 5000000, 'MC', 16, '10', 0, 'no', 'no'),
(364, 'Nico', 5000000, 'MCO', 16, '17', 0, 'no', 'no'),
(365, 'K.koba Leïn', 5000000, 'MC', 16, '18', 0, 'no', 'no'),
(366, 'Fran Pérez', 5000000, 'MC', 16, '29', 0, 'no', 'no'),
(367, 'M. Gómez', 5000000, 'DC', 16, '7', 0, 'no', 'no'),
(368, 'Hugo Duro', 5000000, 'DC', 16, '19', 0, 'no', 'no'),
(369, 'S. Castillejo', 5000000, 'DC', 16, '11', 0, 'no', 'no'),
(370, 'Manu Vallejo', 5000000, 'DC', 16, '21', 0, 'no', 'no'),
(371, 'Marcos Andre', 5000000, 'EI', 16, '22', 0, 'no', 'no'),
(372, 'S.lino', 5000000, 'DC', 16, '16', 0, 'no', 'no'),
(373, 'Unai Simon', 10, 'POR', 17, '1', 0, 'no', 'no'),
(374, 'I. Lekue', 10, 'DFC', 17, '15', 0, 'no', 'no'),
(375, 'I. Martinez', 10, 'DFC', 17, '4', 0, 'no', 'no'),
(376, 'Yeray', 10, 'DFC', 17, '5', 0, 'no', 'no'),
(377, 'Vivian', 10, 'DFC', 17, '3', 0, 'no', 'no'),
(378, 'Yuri B.', 10, 'LI', 17, '17', 0, 'no', 'no'),
(379, 'De Marcos', 10, 'LI', 17, '18', 0, 'no', 'no'),
(380, 'Balenziaga', 10, 'LI', 17, '24', 0, 'no', 'no'),
(381, 'Nolaskoain', 10, 'DFC', 17, '23', 0, 'no', 'no'),
(382, 'Capa', 10, 'DFC', 17, '21', 0, 'no', 'no'),
(383, 'Dani García', 5000000, 'MC', 17, '14', 0, 'no', 'no'),
(384, 'O. Sancet', 5000000, 'MC', 17, '8', 0, 'no', 'no'),
(385, 'Muniain', 5000000, 'MC', 17, '10', 0, 'no', 'no'),
(386, 'Vesga', 5000000, 'MCO', 17, '6', 0, 'no', 'no'),
(387, 'Vencedor', 5000000, 'MC', 17, '16', 0, 'no', 'no'),
(388, 'Zarraga', 5000000, 'MC', 17, '19', 0, 'no', 'no'),
(389, 'Berenguer', 5000000, 'DC', 17, '7', 0, 'no', 'no'),
(390, 'Williams', 5000000, 'DC', 17, '9', 0, 'no', 'no'),
(391, 'Morci', 5000000, 'DC', 17, '2', 0, 'no', 'no'),
(392, 'Villalibre', 5000000, 'DC', 17, '20', 0, 'no', 'no'),
(393, 'Raul Garcia', 5000000, 'EI', 17, '22', 0, 'no', 'no'),
(394, 'Guruzeta', 5000000, 'DC', 17, '12', 0, 'no', 'no'),
(395, 'Williams Jr', 5000000, 'DC', 17, '11', 0, 'no', 'no'),
(396, 'Fuoli', 10, 'POR', 18, '1', 0, 'no', 'no'),
(397, 'Fernando C.', 10, 'POR', 18, '13', 0, 'no', 'no'),
(398, 'Kaiky', 10, 'DFC', 18, '2', 0, 'no', 'no'),
(399, 'Akieme', 10, 'DFC', 18, '15', 0, 'no', 'no'),
(400, 'R. Ely', 10, 'DFC', 18, '19', 0, 'no', 'no'),
(401, 'Centelles', 10, 'DFC', 18, '20', 0, 'no', 'no'),
(402, 'Chumi', 10, 'LI', 18, '21', 0, 'no', 'no'),
(403, 'Babic', 10, 'LI', 18, '22', 0, 'no', 'no'),
(404, 'Ivan Martos', 10, 'LD', 18, NULL, 0, 'no', 'no'),
(405, 'Eguaras', 5000000, 'MC', 18, '4', 0, 'no', 'no'),
(406, 'Robertone', 5000000, 'MC', 18, '5', 0, 'no', 'no'),
(407, 'Lazo', 5000000, 'MC', 18, '16', 0, 'no', 'no'),
(408, 'Arnau', 5000000, 'MCO', 18, '18', 1, 'no', 'no'),
(409, 'Samu', 5000000, 'MC', 18, '23', 0, 'no', 'no'),
(410, 'C.rojas', 5000000, 'MC', 18, '33', 0, 'no', 'no'),
(411, 'L. Ramazani', 5000000, 'DC', 18, '7', 0, 'no', 'no'),
(412, 'Sadiq', 5000000, 'DC', 18, '9', 1, 'no', 'no'),
(413, 'Curro', 5000000, 'DC', 18, '10', 1, 'no', 'no'),
(414, 'Dyego', 5000000, 'DC', 18, '11', 0, 'no', 'no'),
(415, 'Appiah', 5000000, 'EI', 18, '14', 0, 'no', 'no'),
(416, 'Portillo', 5000000, 'DC', 18, '8', 0, 'no', 'no'),
(417, 'Masip', 10, 'POR', 19, '1', 0, 'no', 'no'),
(418, 'S. Asenjo', 10, 'POR', 19, '25', 0, 'no', 'no'),
(419, 'L. Pérez', 10, 'DFC', 19, '2', 0, 'no', 'no'),
(420, 'Escudero', 10, 'DFC', 19, '18', 0, 'no', 'no'),
(421, 'Javi Sanchez', 10, 'DFC', 19, '5', 0, 'no', 'no'),
(422, 'Fresneda', 10, 'DFC', 19, '27', 0, 'no', 'no'),
(423, 'J. El Yamiq', 10, 'LI', 19, '15', 0, 'no', 'no'),
(424, 'L. Olaza', 10, 'LI', 19, '12', 0, 'no', 'no'),
(425, 'MKike', 5000000, 'MC', 19, '4', 0, 'no', 'no'),
(426, 'Monchu', 5000000, 'MC', 19, '8', 0, 'no', 'no'),
(427, 'I. Sánchez', 5000000, 'MC', 19, '21', 0, 'no', 'no'),
(428, 'Aguado', 5000000, 'MCO', 19, '6', 0, 'no', 'no'),
(429, 'G. Plata', 5000000, 'MC', 19, '11', 0, 'no', 'no'),
(430, 'Toni Villa', 5000000, 'MC', 19, '19', 0, 'no', 'no'),
(431, 'Roque Mesa', 5000000, 'MC', 19, '17', 1, 'no', 'no'),
(432, 'Anuar', 5000000, 'MC', 19, '23', 0, 'no', 'no'),
(433, 'Joaquín F.', 5000000, 'MC', 19, '24', 0, 'no', 'no'),
(434, 'Sergio León', 5000000, 'DC', 19, '7', 0, 'no', 'no'),
(435, 'Weissman', 5000000, 'DC', 19, '9', 0, 'no', 'no'),
(436, 'S. Gassama', 5000000, 'EI', 19, '22', 0, 'no', 'no'),
(437, 'Juan Carlos', 10, 'POR', 20, '1', 0, 'no', 'no'),
(438, 'Bernardo', 10, 'DFC', 20, '2', 0, 'no', 'no'),
(439, 'Arnau', 10, 'DFC', 20, '4', 0, 'no', 'no'),
(440, 'Valery', 10, 'DFC', 20, '11', 1, 'no', 'no'),
(441, 'Gutierrez', 10, 'DFC', 20, '3', 0, 'no', 'no'),
(442, 'Juanpe Rl', 10, 'LI', 20, '15', 0, 'no', 'no'),
(443, 'Yan Couto', 10, 'LI', 20, '20', 1, 'no', 'no'),
(444, 'S. Bueno', 10, 'LD', 20, '22', 0, 'no', 'no'),
(445, 'Monjonell', 10, 'LD', 20, '31', 0, 'no', 'no'),
(446, 'David Lopez', 5000000, 'MC', 20, '5', 0, 'no', 'no'),
(447, 'R. Terrats', 5000000, 'MC', 20, '8', 0, 'no', 'no'),
(448, 'Samu Saiz', 5000000, 'MC', 20, '10', 1, 'no', 'no'),
(449, 'I. Kebe', 5000000, 'MCO', 20, '6', 0, 'no', 'no'),
(450, 'Aleix Garcia', 5000000, 'MC', 20, '14', 0, 'no', 'no'),
(451, 'Riquelme', 5000000, 'MC', 20, '17', 0, 'no', 'no'),
(452, 'Herrera', 5000000, 'MC', 20, '21', 0, 'no', 'no'),
(453, 'Iván Martín', 5000000, 'MC', 20, '23', 0, 'no', 'no'),
(454, 'Artero', 5000000, 'MC', 20, '36', 0, 'no', 'no'),
(455, 'Pau Victor', 5000000, 'MC', 20, '35', 0, 'no', 'no'),
(456, 'Alex Sala', 5000000, 'MC', 20, '34', 0, 'no', 'no'),
(457, 'Borja Garcia', 5000000, 'MC', 20, '24', 0, 'no', 'no'),
(458, 'Stuani', 5000000, 'DC', 20, '7', 0, 'no', 'no'),
(459, 'Taty Castellanos', 5000000, 'DC', 20, '9', 0, 'no', 'no'),
(460, 'Ureña', 5000000, 'DC', 20, '32', 0, 'no', 'no');

--
-- Disparadores `jugadores`
--
DELIMITER $$
CREATE TRIGGER `meter_jugador` BEFORE INSERT ON `jugadores` FOR EACH ROW begin

end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lesiones`
--

CREATE TABLE `lesiones` (
  `n_licencia_j` int NOT NULL,
  `fecha` date NOT NULL,
  `duración_dias` int DEFAULT NULL,
  `tipo` varchar(30) DEFAULT NULL,
  `motivo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Disparadores `lesiones`
--
DELIMITER $$
CREATE TRIGGER `lesion` AFTER INSERT ON `lesiones` FOR EACH ROW begin
		update jugadores
		set lesion="si" where new.n_licencia_j=jugadores.n_licencia_j
        ;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ligas`
--

CREATE TABLE `ligas` (
  `nombre_l` varchar(50) NOT NULL,
  `presupuesto_l` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ligas`
--

INSERT INTO `ligas` (`nombre_l`, `presupuesto_l`) VALUES
('Liga Santander', 100000),
('Liga SmartBank', 50000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `partidos`
--

CREATE TABLE `partidos` (
  `cod` int NOT NULL,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `jornada` int DEFAULT NULL,
  `temporada` year DEFAULT NULL,
  `e_local` int DEFAULT NULL,
  `e_visitante` int DEFAULT NULL,
  `arbitro` int DEFAULT NULL,
  `goles_local` int DEFAULT '0',
  `goles_visitante` int DEFAULT '0',
  `ganador` enum('e_local','e_visitante','empate') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `partidos`
--

INSERT INTO `partidos` (`cod`, `fecha`, `hora`, `jornada`, `temporada`, `e_local`, `e_visitante`, `arbitro`, `goles_local`, `goles_visitante`, `ganador`) VALUES
(1, '2022-08-12', '21:00:00', 1, 2022, 6, 15, 2, 2, 1, 'e_local'),
(2, '2022-08-13', '17:00:00', 1, 2022, 1, 11, 5, 2, 2, 'empate'),
(3, '2022-08-13', '19:30:00', 1, 2022, 19, 5, 15, 0, 3, 'e_visitante'),
(4, '2022-08-13', '21:00:00', 1, 2022, 3, 10, 12, 0, 0, 'empate'),
(5, '2022-08-14', '17:30:00', 1, 2022, 7, 14, 9, 0, 1, 'e_visitante'),
(6, '2022-08-14', '19:30:00', 1, 2022, 16, 20, 10, 1, 0, 'e_local'),
(7, '2022-08-14', '22:00:00', 1, 2022, 18, 2, 14, 1, 2, 'e_visitante'),
(8, '2022-08-15', '17:30:00', 1, 2022, 17, 12, 13, 0, 0, 'empate'),
(9, '2022-08-15', '19:30:00', 1, 2022, 9, 4, 19, 0, 3, 'e_visitante'),
(10, '2022-08-15', '21:30:00', 1, 2022, 13, 8, 8, 3, 0, 'e_local'),
(11, '2022-08-19', '20:00:00', 2, 2022, 11, 10, NULL, 0, 0, NULL),
(12, '2022-08-19', '22:00:00', 2, 2022, 15, 19, NULL, 0, 0, NULL),
(13, '2022-08-20', '17:30:00', 2, 2022, 6, 7, NULL, 0, 0, NULL),
(14, '2022-08-20', '19:30:00', 2, 2022, 12, 13, NULL, 0, 0, NULL),
(15, '2022-08-20', '22:00:00', 2, 2022, 1, 2, NULL, 0, 0, NULL),
(16, '2022-08-21', '17:30:00', 2, 2022, 17, 16, NULL, 0, 0, NULL),
(17, '2022-08-21', '19:30:00', 2, 2022, 4, 5, NULL, 0, 0, NULL),
(18, '2022-08-21', '22:00:00', 2, 2022, 14, 3, NULL, 0, 0, NULL),
(19, '2022-08-22', '20:00:00', 2, 2022, 8, 18, NULL, 0, 0, NULL),
(20, '2022-08-22', '22:00:00', 2, 2022, 20, 9, NULL, 0, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sanciones`
--

CREATE TABLE `sanciones` (
  `n_licencia_j` int NOT NULL,
  `cod_partido` int NOT NULL,
  `tiempo_jornadas` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sanciones`
--

INSERT INTO `sanciones` (`n_licencia_j`, `cod_partido`, `tiempo_jornadas`) VALUES
(57, 4, 1),
(171, 10, 1),
(358, 6, 1);

--
-- Disparadores `sanciones`
--
DELIMITER $$
CREATE TRIGGER `sancion` AFTER INSERT ON `sanciones` FOR EACH ROW begin
		update jugadores
		set sancion="si" where new.n_licencia_j=jugadores.n_licencia_j
        ;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `cod` int NOT NULL,
  `n_licencia_j` int DEFAULT NULL,
  `cod_partido` int DEFAULT NULL,
  `tipo` enum('roja','amarilla') DEFAULT NULL,
  `minuto` char(3) DEFAULT NULL,
  `motivo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`cod`, `n_licencia_j`, `cod_partido`, `tipo`, `minuto`, `motivo`) VALUES
(1, 124, 1, 'amarilla', '34', NULL),
(2, 123, 1, 'amarilla', '50', NULL),
(3, 139, 1, 'amarilla', '68', NULL),
(4, 339, 1, 'amarilla', '72', NULL),
(5, 335, 1, 'amarilla', '83', NULL),
(6, 120, 1, 'amarilla', '92', NULL),
(7, 134, 1, 'amarilla', '94', NULL),
(8, 346, 1, 'amarilla', '95', NULL),
(9, 2, 2, 'amarilla', '15', NULL),
(10, 8, 2, 'amarilla', '37', NULL),
(11, 1, 2, 'amarilla', '80', NULL),
(12, 7, 2, 'amarilla', '92', NULL),
(13, 3, 2, 'amarilla', '97', NULL),
(14, 244, 2, 'amarilla', '60', NULL),
(15, 232, 2, 'amarilla', '91', NULL),
(16, 431, 3, 'amarilla', '52', NULL),
(17, 64, 4, 'amarilla', '14', NULL),
(18, 57, 4, 'amarilla', '74', NULL),
(19, 57, 4, 'amarilla', '93', NULL),
(20, 209, 4, 'amarilla', '45', NULL),
(21, 225, 4, 'amarilla', '45', NULL),
(22, 208, 4, 'amarilla', '54', NULL),
(23, 226, 4, 'amarilla', '69', NULL),
(24, 222, 4, 'amarilla', '86', NULL),
(25, 205, 4, 'amarilla', '89', NULL),
(26, 164, 5, 'amarilla', '45', NULL),
(27, 147, 5, 'amarilla', '45', NULL),
(28, 158, 5, 'amarilla', '70', NULL),
(29, 150, 5, 'amarilla', '85', NULL),
(30, 315, 5, 'amarilla', '85', NULL),
(31, 308, 5, 'amarilla', '98', NULL),
(32, 358, 6, 'roja', '51', NULL),
(33, 351, 6, 'amarilla', '56', NULL),
(34, 359, 6, 'amarilla', '69', NULL),
(35, 443, 6, 'amarilla', '14', NULL),
(36, 448, 6, 'amarilla', '44', NULL),
(37, 440, 6, 'amarilla', '45', NULL),
(38, 36, 7, 'amarilla', '40', NULL),
(39, 412, 7, 'amarilla', '41', NULL),
(40, 413, 7, 'amarilla', '66', NULL),
(41, 408, 7, 'amarilla', '86', NULL),
(42, 259, 8, 'amarilla', '22', NULL),
(43, 272, 8, 'amarilla', '31', NULL),
(44, 271, 8, 'amarilla', '35', NULL),
(45, 269, 8, 'amarilla', '66', NULL),
(46, 273, 8, 'amarilla', '71', NULL),
(47, 268, 8, 'amarilla', '76', NULL),
(48, 203, 9, 'amarilla', '19', NULL),
(49, 198, 9, 'amarilla', '55', NULL),
(50, 87, 9, 'amarilla', '90', NULL),
(51, 289, 10, 'amarilla', '4', NULL),
(52, 297, 10, 'amarilla', '22', NULL),
(53, 293, 10, 'amarilla', '78', NULL),
(54, 171, 10, 'roja', '16', NULL),
(55, 182, 10, 'amarilla', '16', NULL),
(56, 179, 10, 'amarilla', '30', NULL),
(57, 184, 10, 'amarilla', '45', NULL),
(58, 186, 10, 'amarilla', '64', NULL),
(59, 177, 10, 'amarilla', '81', NULL),
(60, 181, 10, 'amarilla', '89', NULL);

--
-- Disparadores `tarjetas`
--
DELIMITER $$
CREATE TRIGGER `acumulacion` AFTER INSERT ON `tarjetas` FOR EACH ROW begin
 
	/*En caso de que se acumulen 5 amarillas, hay sanción y se vuelve a comenzar el recuento*/
	if (new.tipo like "amarilla") and (select amarillas from jugadores where n_licencia_j=new.n_licencia_j)=5
    then 
        insert into sanciones
        values
        (new.n_licencia_j,new.cod_partido,1)
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
    
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `v_equipos`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `v_equipos` (
`abreviatura` varchar(3)
,`cod_e` int
,`draw` int
,`entrenador` varchar(50)
,`estadio` varchar(50)
,`loose` int
,`nombre_e` varchar(50)
,`nombre_l` varchar(50)
,`presidente` varchar(50)
,`presupuesto_e` int
,`total` int
,`win` int
);

-- --------------------------------------------------------

--
-- Estructura para la vista `v_equipos`
--
DROP TABLE IF EXISTS `v_equipos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_equipos`  AS SELECT `equipos`.`cod_e` AS `cod_e`, `equipos`.`nombre_e` AS `nombre_e`, `equipos`.`abreviatura` AS `abreviatura`, `equipos`.`nombre_l` AS `nombre_l`, `equipos`.`presupuesto_e` AS `presupuesto_e`, `equipos`.`win` AS `win`, `equipos`.`loose` AS `loose`, `equipos`.`draw` AS `draw`, `equipos`.`total` AS `total`, `equipos`.`estadio` AS `estadio`, `equipos`.`entrenador` AS `entrenador`, `equipos`.`presidente` AS `presidente` FROM `equipos``equipos`  ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arbitros`
--
ALTER TABLE `arbitros`
  ADD PRIMARY KEY (`n_licencia_a`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`cod_e`),
  ADD KEY `nombre_l` (`nombre_l`);

--
-- Indices de la tabla `fichajes`
--
ALTER TABLE `fichajes`
  ADD PRIMARY KEY (`fecha_trasp`,`jugador`),
  ADD KEY `jugador` (`jugador`),
  ADD KEY `equipo_next` (`equipo_next`);

--
-- Indices de la tabla `goles`
--
ALTER TABLE `goles`
  ADD PRIMARY KEY (`n_gol`),
  ADD KEY `n_licencia_j` (`n_licencia_j`),
  ADD KEY `asistencia` (`asistencia`);

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD PRIMARY KEY (`n_licencia_j`),
  ADD KEY `equipo_actual` (`equipo_actual`);

--
-- Indices de la tabla `lesiones`
--
ALTER TABLE `lesiones`
  ADD PRIMARY KEY (`n_licencia_j`,`fecha`);

--
-- Indices de la tabla `ligas`
--
ALTER TABLE `ligas`
  ADD PRIMARY KEY (`nombre_l`);

--
-- Indices de la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `e_local` (`e_local`),
  ADD KEY `e_visitante` (`e_visitante`),
  ADD KEY `arbitro` (`arbitro`);

--
-- Indices de la tabla `sanciones`
--
ALTER TABLE `sanciones`
  ADD PRIMARY KEY (`n_licencia_j`,`cod_partido`),
  ADD KEY `cod_partido` (`cod_partido`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `n_licencia_j` (`n_licencia_j`),
  ADD KEY `cod_partido` (`cod_partido`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arbitros`
--
ALTER TABLE `arbitros`
  MODIFY `n_licencia_a` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `equipos`
--
ALTER TABLE `equipos`
  MODIFY `cod_e` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `goles`
--
ALTER TABLE `goles`
  MODIFY `n_gol` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `jugadores`
--
ALTER TABLE `jugadores`
  MODIFY `n_licencia_j` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=461;

--
-- AUTO_INCREMENT de la tabla `partidos`
--
ALTER TABLE `partidos`
  MODIFY `cod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `cod` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`nombre_l`) REFERENCES `ligas` (`nombre_l`);

--
-- Filtros para la tabla `fichajes`
--
ALTER TABLE `fichajes`
  ADD CONSTRAINT `fichajes_ibfk_1` FOREIGN KEY (`jugador`) REFERENCES `jugadores` (`n_licencia_j`),
  ADD CONSTRAINT `fichajes_ibfk_2` FOREIGN KEY (`equipo_next`) REFERENCES `equipos` (`cod_e`);

--
-- Filtros para la tabla `goles`
--
ALTER TABLE `goles`
  ADD CONSTRAINT `goles_ibfk_1` FOREIGN KEY (`n_licencia_j`) REFERENCES `jugadores` (`n_licencia_j`),
  ADD CONSTRAINT `goles_ibfk_2` FOREIGN KEY (`asistencia`) REFERENCES `jugadores` (`n_licencia_j`);

--
-- Filtros para la tabla `jugadores`
--
ALTER TABLE `jugadores`
  ADD CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`equipo_actual`) REFERENCES `equipos` (`cod_e`);

--
-- Filtros para la tabla `lesiones`
--
ALTER TABLE `lesiones`
  ADD CONSTRAINT `lesiones_ibfk_1` FOREIGN KEY (`n_licencia_j`) REFERENCES `jugadores` (`n_licencia_j`);

--
-- Filtros para la tabla `partidos`
--
ALTER TABLE `partidos`
  ADD CONSTRAINT `partidos_ibfk_1` FOREIGN KEY (`e_local`) REFERENCES `equipos` (`cod_e`),
  ADD CONSTRAINT `partidos_ibfk_2` FOREIGN KEY (`e_visitante`) REFERENCES `equipos` (`cod_e`),
  ADD CONSTRAINT `partidos_ibfk_3` FOREIGN KEY (`arbitro`) REFERENCES `arbitros` (`n_licencia_a`);

--
-- Filtros para la tabla `sanciones`
--
ALTER TABLE `sanciones`
  ADD CONSTRAINT `sanciones_ibfk_1` FOREIGN KEY (`n_licencia_j`) REFERENCES `jugadores` (`n_licencia_j`),
  ADD CONSTRAINT `sanciones_ibfk_2` FOREIGN KEY (`cod_partido`) REFERENCES `partidos` (`cod`);

--
-- Filtros para la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD CONSTRAINT `tarjetas_ibfk_1` FOREIGN KEY (`n_licencia_j`) REFERENCES `jugadores` (`n_licencia_j`),
  ADD CONSTRAINT `tarjetas_ibfk_2` FOREIGN KEY (`cod_partido`) REFERENCES `partidos` (`cod`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
