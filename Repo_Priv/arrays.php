<?php


    function noticias($orden,$filtro1,$filtro2,$filtro3,$cadena) {
        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);        
        if ($db) {

            if ($orden == "no") {
                $order = "";
            } elseif ($orden == "asc") {
                $order = "order by fecha asc";
            } elseif ($orden == "desc") {
                $order = "order by fecha desc";
            } else {
                $order = "";
            }

            if ($filtro1 != "") {
                $filtro1 = "or keywords like '%$filtro1%'";
            } 

            if ($filtro2 != "") {
                $filtro2 = " or keywords like '%$filtro2%'";
            } 

            if ($filtro3 != "") {
                $filtro3 = " or keywords like '%$filtro3%'";
            } 

            if ($cadena != "") {
                $cadena = " or keywords like '%$cadena%'";
            }

            if ( $filtro1 == "" && $filtro2 == "" && $filtro3 == "" && $cadena == ""){
                $consulta = "
                select p.*, u.nombre 
                from noticias p inner join usuarios u on p.IdUsuario=u.IdUsuario
                $order 
                ;";
            } else {
                $consulta = "
                select p.*, u.nombre 
                from noticias p inner join usuarios u on p.IdUsuario=u.IdUsuario
                where keywords like 'aaaaaaaaaa' $filtro1 $filtro2 $filtro3 $cadena
                $order 
                ;";
            }

            $res = mysqli_query($db, $consulta);
            $noticias = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($noticias, $fila);
            }

            return $noticias;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function noticiasext($id) {
        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);        
        if ($db) {

            $consulta = '
            select n.*, u.nombre
            from noticias n inner join usuarios u on n.IdUsuario=u.IdUsuario
            where n.id="'.$id.'"
            ';
            $res = mysqli_query($db, $consulta);
            $noticias = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($noticias, $fila);
            }

            return $noticias;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function misnoticias($nombreuser) {
        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);        
        if ($db) {

            $consulta = '
            select n.*, u.nombre
            from noticias n inner join usuarios u on n.IdUsuario=u.IdUsuario
            where u.nombre="'.$nombreuser.'"
            ';
            $res = mysqli_query($db, $consulta);
            $noticias = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($noticias, $fila);
            }

            return $noticias;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function productos($orden,$filtro1,$filtro2,$filtro3,$cadena) {
        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);        
        if ($db) {

            if ($orden == "no") {
                $order = "";
            } elseif ($orden == "asc") {
                $order = "order by precio asc";
            } elseif ($orden == "desc") {
                $order = "order by precio desc";
            } else {
                $order = "";
            }

            if ($filtro1 != "") {
                $filtro1 = "or keywords like '%$filtro1%'";
            } 

            if ($filtro2 != "") {
                $filtro2 = " or keywords like '%$filtro2%'";
            } 

            if ($filtro3 != "") {
                $filtro3 = " or keywords like '%$filtro3%'";
            } 

            if ($cadena != "") {
                $cadena = " or keywords like '%$cadena%'";
            }

            if ( $filtro1 == "" && $filtro2 == "" && $filtro3 == "" && $cadena == ""){
                $consulta = "
                select p.*, u.nombre 
                from productos p inner join usuarios u on p.IdUsuario=u.IdUsuario
                $order 
                ;";
            } else {
                $consulta = "
                select p.*, u.nombre 
                from productos p inner join usuarios u on p.IdUsuario=u.IdUsuario
                where keywords like 'aaaaaaaaaa' $filtro1 $filtro2 $filtro3 $cadena
                $order 
                ;";
            }

            $res = mysqli_query($db, $consulta);
            $productos = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($productos, $fila);
            }

            return $productos;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function producto($id) {
        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);        
        if ($db) {

            $consulta = '
            select n.*, u.nombre
            from productos n inner join usuarios u on n.IdUsuario=u.IdUsuario
            where n.id="'.$id.'"
            ';
            $res = mysqli_query($db, $consulta);
            $noticias = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($noticias, $fila);
            }

            return $noticias;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function misproductos($orden,$filtro1,$filtro2,$filtro3,$cadena) {
        $user = "admin";

        $iduser = $_SESSION["id"];

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);        
        if ($db) {

            if ($orden == "no") {
                $order = "";
            } elseif ($orden == "asc") {
                $order = "order by precio asc";
            } elseif ($orden == "desc") {
                $order = "order by precio desc";
            } else {
                $order = "";
            }

            if ($filtro1 != "") {
                $filtro1 = "or keywords like '%$filtro1%'";
            } 

            if ($filtro2 != "") {
                $filtro2 = " or keywords like '%$filtro2%'";
            } 

            if ($filtro3 != "") {
                $filtro3 = " or keywords like '%$filtro3%'";
            } 

            if ($cadena != "") {
                $cadena = " or keywords like '%$cadena%'";
            }

            if ( $filtro1 == "" && $filtro2 == "" && $filtro3 == "" && $cadena == ""){
                $consulta = "
                select p.*, u.nombre 
                from productos p inner join usuarios u on p.IdUsuario=u.IdUsuario
                where u.IdUsuario = $iduser
                $order 
                ;";
            } else {
                $consulta = "
                select p.*, u.nombre 
                from productos p inner join usuarios u on p.IdUsuario=u.IdUsuario
                where u.IdUsuario = $iduser and keywords like 'aaaaaaaaaa' $filtro1 $filtro2 $filtro3 $cadena
                $order 
                ;";
            }

            $res = mysqli_query($db, $consulta);
            $productos = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($productos, $fila);
            }

            return $productos;

            mysql_close($db);

        } else {
            echo "Er";
        };
    }


    function clasificacion() {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);        
        if ($db) {

            $consulta = 'select * from equipos order by total desc';
            $res = mysqli_query($db, $consulta);
            $clasificacion = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($clasificacion, $fila);
            }

            return $clasificacion;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function goleadores() {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select nombre_j, nombre_e, count(goles.n_licencia_j) as "goles"
            from goles 
            inner join jugadores on goles.n_licencia_j=jugadores.id
            inner join equipos on equipo_actual=equipos.id
            group by jugadores.id
            order by count(goles.n_licencia_j) desc
            limit 10
            ';
            $res = mysqli_query($db, $consulta);
            $goleadores = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($goleadores, $fila);
            }

            return $goleadores;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function jornadas() {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select distinct(jornada) as "jornada"
            from partidos 
            ';
            $res = mysqli_query($db, $consulta);
            $jornadas = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($jornadas, $fila);
            }

            return $jornadas;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function asistencias() {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select nombre_j, nombre_e, count(goles.asistencia) as "asistencias"
            from goles 
            inner join jugadores on goles.asistencia=jugadores.id
            inner join equipos on equipo_actual=equipos.id
            group by jugadores.id
            order by count(goles.asistencia) desc
            limit 10
            ';
            $res = mysqli_query($db, $consulta);
            $goleadores = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($goleadores, $fila);
            }

            return $goleadores;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function jugadores($filtro1,$filtro2,$filtro3,$cadena) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            if ($filtro1 != "") {
                $filtro1 = "and equipo_actual like '$filtro1' ";
            } 

            if ($filtro2 != "") {
                $filtro2 = " and posicion like '$filtro2' ";
            } 

            if ($filtro3 != "") {
                $filtro3 = " and dorsal like '$filtro3' ";
            } 

            if ($cadena != "") {
                $cadena = "and nombre_j like '%$cadena%' ";
            }

            if ( $filtro1 == "" && $filtro2 == "" && $filtro3 == "" && $cadena == ""){
                $consulta = "
                select p.*, u.nombre_e
                from jugadores p inner join equipos u on p.equipo_actual=u.id
                ;";

            } else {
                $consulta = "
                select p.*, u.nombre_e
                from jugadores p inner join equipos u on p.equipo_actual=u.id
                where nombre_j like '%' $filtro1 $filtro2 $filtro3 $cadena 
                ;";
            }

            $res = mysqli_query($db, $consulta);
            $jugadores = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($jugadores, $fila);
            }

            return $jugadores;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function jugadoresequipo($equipo) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select jugadores.id as "id", nombre_j, equipo_actual, posicion, nombre_e, dorsal, foto_jug, valor_mercado
            from jugadores 
            inner join equipos on equipo_actual=equipos.id
            where equipo_actual = '.$equipo.'
            group by jugadores.id
            ';
            $res = mysqli_query($db, $consulta);
            $jugadores = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($jugadores, $fila);
            }

            return $jugadores;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function jugador($id) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select jugadores.id as "id", nombre_j, equipo_actual, posicion, nombre_e, dorsal, foto_jug, valor_mercado
            from jugadores 
            inner join equipos on equipo_actual=equipos.id
            where jugadores.id = '.$id.'
            ';
            $res = mysqli_query($db, $consulta);
            $jugadores = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($jugadores, $fila);
            }

            return $jugadores;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };


    function jugadorespartido($e1,$e2) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select jugadores.id as "id", nombre_j, equipo_actual, posicion, nombre_e, dorsal, foto_jug, valor_mercado
            from jugadores 
            inner join equipos on equipo_actual=equipos.id
            where equipo_actual = '.$e1.' or equipo_actual = '.$e2.'
            group by jugadores.id
            ';
            $res = mysqli_query($db, $consulta);
            $jugadores = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($jugadores, $fila);
            }

            return $jugadores;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };


    function posiciones() {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select distinct(posicion) as "posicion"
            from jugadores 
            ';
            $res = mysqli_query($db, $consulta);
            $posiciones = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($posiciones, $fila);
            }

            return $posiciones;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function arbitros() {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select *
            from arbitros 
            ';
            $res = mysqli_query($db, $consulta);
            $arbitros = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($arbitros, $fila);
            }

            return $arbitros;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function equipos() {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select *
            from equipos
            ';
            $res = mysqli_query($db, $consulta);
            $equipos = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($equipos, $fila);
            }

            return $equipos;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function equipo($id) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select *
            from equipos
            where id = '.$id.'
            ';
            $res = mysqli_query($db, $consulta);
            $equipos = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($equipos, $fila);
            }

            return $equipos;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function goles($partido) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select *
            from goles where cod_partido = '.$partido.'
            ';
            $res = mysqli_query($db, $consulta);
            $goles = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($goles, $fila);
            }

            return $goles;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    $tiposgol = array("normal","cabeza","falta","volea","penalty","tiro","p.p");

    function gol($id) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select *
            from goles where id = '.$id.'
            ';
            $res = mysqli_query($db, $consulta);
            $goles = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($goles, $fila);
            }

            return $goles;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function tarjetas($partido) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select *
            from tarjetas where cod_partido = '.$partido.'
            ';
            $res = mysqli_query($db, $consulta);
            $tarjetas = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($tarjetas, $fila);
            }

            return $tarjetas;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function tarjeta($id) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select *
            from tarjetas where cod = '.$id.'
            ';
            $res = mysqli_query($db, $consulta);
            $tarjetas = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($tarjetas, $fila);
            }

            return $tarjetas;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function arbitarjetas() {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select nombre_a, count(tarjetas.cod) as "total"
            from arbitros 
            inner join partidos on arbitros.id=partidos.arbitro
            inner join tarjetas on partidos.cod=tarjetas.cod_partido
            group by arbitros.id
            order by count(tarjetas.cod) desc
            limit 10
            ';
            $res = mysqli_query($db, $consulta);
            $arbitarjetas = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($arbitarjetas, $fila);
            }

            return $arbitarjetas;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function partidosjornada($jornada) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select * from partidos where jornada = '.$jornada.';
            ';
            $res = mysqli_query($db, $consulta);
            $partidos = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($partidos, $fila);
            }

            return $partidos;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function partido($id) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
        if ($db) {

            $consulta = '
            select * from partidos where cod = '.$id.';
            ';
            $res = mysqli_query($db, $consulta);
            $partidos = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($partidos, $fila);
            }

            return $partidos;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };

    function usuarios($nombre) {

        $user = "admin";

        $datosuser = parse_ini_file("coonfig.ini", true);

        $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);

        if ($db) {

            $consulta = '
            select * from usuarios where nombre like "' .$nombre. '";
            ';
            $res = mysqli_query($db, $consulta);
            $usuarios = array();
            while ($fila = mysqli_fetch_assoc($res)) {
                array_push($usuarios, $fila);
            }

            return $usuarios;

            mysql_close($db);

        } else {
            echo "Er";
        }

    };


 ?>