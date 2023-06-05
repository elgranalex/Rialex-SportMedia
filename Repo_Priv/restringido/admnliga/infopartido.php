<?php
require "../../control.php";
if (!isset($_SESSION["usuario"]) || ( !($_SESSION["tipo"] == "root") && !($_SESSION["tipo"] == "periodista") && !($_SESSION["tipo"] == "admin") ) ) {
    header("Location: ../sinpermiso.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>FootPassion</title>
		<link rel="stylesheet" 
        type="text/css" a
        href="../../index.css" 
        media="screen" /> 
        <link rel="shortcut icon" href="../../iconos/ms-icon-70x70.png">	
	</head>
	<body>

		<header>
            <img class="letras" src="../../img/letrasheader.png"/>
            <a href="../../index.php"><img class="logo" src="../../img/LogoProyecto.png"/></a>
            <?php
              $foto = "";
              if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != "") {
                $usuarios = usuarios($_SESSION["usuario"]);
                foreach ($usuarios as $usuario) {
                    if ($usuario["nombre"] == $_SESSION["usuario"] && $usuario["foto"] != "img/usuarios/" && $usuario["foto"] != "") {
                        // Guardar datos de sesión
                        $foto = "" .$usuario["foto"]. "";
                        echo '<a href="../../login/registrado.php?usuario=' .$usuario["IdUsuario"]. '"><img class="user" src="../../' .$foto. '"/></a>';
                    }elseif ($usuario["nombre"] == $_SESSION["usuario"] && ( $usuario["foto"] == "img/usuarios/" || $usuario["foto"] == "" )) {
                        // Guardar datos de sesión
                        $foto = "img/user.png";
                        echo '<a href="../../login/registrado.php?usuario=' .$usuario["IdUsuario"]. '"><img class="user" src="../../' .$foto. '"/></a>';
                    }
                }

              }
              
            if ($foto == "" || $foto == "img/usuarios/") {
                $foto = "img/user.png";
                echo '<a href="../../login/login.php"><img class="user" src="../../' .$foto. '"/></a>';
             }

            ?>        </header>

        <div class="topnav">
			<a href="../../noticias/noticias.php">Noticias</a>
			<a href="../../stats/stats.php">Estadísticas</a>
			<a href="../../tienda/tienda.php">Tienda</a>
			<a href="../../restringido/resindex.php">Restringido</a>
			
        </div>

        <div class="wrap">
            <h1>DETALLES DEL PARTIDO</hi>
        </div>

        <?php

        $id = validaVbleForm("id");

        $pos = 0;

        $goles = goles($id);
        $equipos = equipos();
        $tarjetas = tarjetas($id);
        $partidos = partido($id);
        $arbitros = arbitros();

        foreach($partidos as $partido) {
            if ($id == $partido["cod"]) {

                foreach ($equipos as $equipo) {

                    if ($partido["e_local"] == $equipo["id"]) {
                        $local = $equipo["id"];
                        $nlocal = $equipo["nombre_e"];
                        $flocal = $equipo["escudo"];
                        $estadio = $equipo["estadio"];
                    } elseif ($partido["e_visitante"] == $equipo["id"]) {
                        $visitante = $equipo["id"];
                        $nvisitante = $equipo["nombre_e"];
                        $fvisitante = $equipo["escudo"];
                    }
                }

                $jugadores = jugadorespartido($local,$visitante);

                $text = "<div class='resul'>
                    <img id='img1' src='../../" .$flocal. " '>
                    <p>" .$partido["goles_local"]. " - " .$partido["goles_visitante"]. "</p>
                    <img id='img2' src='../../" .$fvisitante. " '></p>
                </div>
                ";

                echo $text;

                echo "
                <table class='partidosinfo'>
                    <caption>DATOS GENERALES</caption>
                <tbody>";

                $text = "<tr>
                        <td>Estadio " .$estadio. "</td>
                    </tr>";
                echo $text;

                foreach ($arbitros as $arbitro) {

                    if ($partido["arbitro"] == $arbitro["id"]) {
                        $arbi = $arbitro["nombre_a"];
                    } 
                }

                if (!isset($arbi)) {
                    $arbi = "No establecido";
                }

                $text = "<tr>
                        <td>Árbitro: $arbi</td>
                    </tr>";
                echo $text;

                $text = "<tr>
                        <td>Jornada " .$partido["jornada"]. "</td>
                    </tr>";
                echo $text;

                $text = "<tr>
                        <td>" .$partido["fecha"]. " " .$partido["hora"]. "</td>
                    </tr>";
                echo $text;

            }

            $pos++;

        }

        echo "
            </tbody>
        </table>

            <table class='partidosinfo'>
                <caption>EVENTOS</caption>
            <tbody>
                <tr>
                    <th colspan='3'>GOLES</th>
                </tr>";



        $cont = 0;


        foreach ($goles as $gol) {

            if ($id == $gol["cod_partido"]) {

                foreach ($jugadores as $jugador) {

                    if ($jugador["id"] == $gol["n_licencia_j"]){

                        if ( ! isset($jugador['foto_jug']) || $jugador['foto_jug'] == "") {
                            $foto = "";
                        } else {
                            $foto = "<img src='../" .$jugador['foto_jug']. "'>";
                        }

                        if ($local == $jugador["equipo_actual"]) {
                            $text = "<tr>
                                    <td class ='jugador1'>
                                        <a href='golesins.php?id=" .$gol["id"]. "&act=mod&partido=$id'><img src='../../img/editar.png'></a>
                                        $foto
                                        " .$jugador["nombre_j"]. "
                                    </td>
                                    <td class='tiempo'>" .$gol['minuto']. "'</td>
                                    <td class ='jugador2'></td>
                                </tr>";
                            echo $text;
                        } elseif ($visitante == $jugador["equipo_actual"]) {
                            $text = "<tr>
                                    <td class ='jugador1'></td>
                                    <td class='tiempo'>" .$gol["minuto"]. "'</td>
                                    <td class ='jugador2'>" .$jugador["nombre_j"]. "$foto<a href='golesins.php?id=" .$gol["id"]. "&act=mod&partido=$id'><img src='../../img/editar.png'></a></td>
                                </tr>";
                            echo $text;
                        } 

                    }

                }

                $cont++;

            }
        }

        if ($cont == 0){
            $text = "<tr>
                    <td colspan='3'> No ha habido goles en este partido</td>
                </tr>";
            echo $text;
        }


        echo "
            <tbody>
                <tr>
                    <th colspan='3'>TARJETAS</th>
                </tr>";

        $cont = 0;


        foreach ($tarjetas as $tarjeta) {

            if ($id == $tarjeta["cod_partido"]) {

                foreach ($jugadores as $jugador) {

                    if ($jugador["id"] == $tarjeta["n_licencia_j"]){

                        if ( ! isset($jugador['foto_jug']) || $jugador['foto_jug'] == "") {
                            $foto = "";
                        } else {
                            $foto = "<img src='../" .$jugador['foto_jug']. "'>";
                        }

                        if ($tarjeta["tipo"] == "amarilla") {
                            $color = "../../img/amarilla.png";
                        } elseif ($tarjeta["tipo"] == "roja") {
                            $color = "../../img/roja.png";
                        }

                        if ($local == $jugador["equipo_actual"]) {
                            $text = "<tr>
                                    <td class ='jugador1'><a href='tarjetasins.php?id=" .$tarjeta["cod"]. "&act=mod&partido=$id'><img src='../../img/editar.png'></a>$foto" .$jugador["nombre_j"]. "<img src='$color'></td>
                                    <td class='tiempo'>" .$tarjeta['minuto']. "'</td>
                                    <td class ='jugador2'></td>
                                </tr>";
                            echo $text;
                        } elseif ($visitante == $jugador["equipo_actual"]) {
                            $text = "<tr>
                                    <td class ='jugador1'></td>
                                    <td class='tiempo'>" .$tarjeta["minuto"]. "'</td>
                                    <td class ='jugador2'><img src='$color'>" .$jugador["nombre_j"]. "$foto<a href='tarjetasins.php?id=" .$tarjeta["cod"]. "&act=mod&partido=$id'><img src='../../img/editar.png'></a></td>
                                </tr>";
                            echo $text;
                        } 

                        $cont++;

                    }

                }

            }
        }

        if ($cont == 0){
            $text = "<tr>
                    <td colspan='3'> No ha habido Tarjetas en este partido</td>
                </tr>";
            echo $text;
        }


        echo "
            <tbody>
                <tr>
                    <th colspan='3'>ASISTENCIAS</th>
                </tr>";
        
        $cont = 0;

        foreach ($goles as $gol) {

            if ($id == $gol["cod_partido"]) {

                foreach ($jugadores as $jugador) {

                    if ($jugador["id"] == $gol["asistencia"]){

                        if ( ! isset($jugador['foto_jug']) || $jugador['foto_jug'] == "") {
                            $foto = "";
                        } else {
                            $foto = "<img src='../" .$jugador['foto_jug']. "'>";
                        }

                        if ($local == $jugador["equipo_actual"]) {
                            $text = "<tr>
                                    <td class ='jugador1'>
                                        <a href='golesins.php?id=" .$gol["id"]. "&act=mod&partido=$id'><img src='../../img/editar.png'></a>
                                        $foto
                                        " .$jugador["nombre_j"]. "
                                    </td>
                                    <td class='tiempo'>" .$gol['minuto']. "'</td>
                                    <td class ='jugador2'></td>
                                </tr>";
                            echo $text;
                        } elseif ($visitante == $jugador["equipo_actual"]) {
                            $text = "<tr>
                                    <td class ='jugador1'></td>
                                    <td class='tiempo'>" .$gol["minuto"]. "'</td>
                                    <td class ='jugador2'>" .$jugador["nombre_j"]. "$foto<a href='golesins.php?id=" .$gol["id"]. "&act=mod&partido=$id'><img src='../../img/editar.png'></a></td>
                                </tr>";
                            echo $text;
                        } 

                    }

                }

                $cont++;

            }
        }

        if ($cont == 0){
            $text = "<tr>
                    <td colspan='3'> No ha habido asistencias en este partido</td>
                </tr>";
            echo $text;
        }


        echo "
        </tbody>
        </table>

        <div class='options'>
        <ul>
            <li><a href='./golesins.php?&act=new&partido=" .$id. "'>New GOL</a></li>
            <li><a href='./tarjetasins.php?&act=new&partido=" .$id. "'>New Tarjeta</a></li>
            <li><a href='../../control.php?&act=fin&partido=" .$id. "'>Fin del partido</a></li>
        </ul>
        </div>";

        ?>

        <div class="deco">
            <img  src="../../img/aspas.jpg"/>
        </div>
	

        <footer class="fixed_footer">
            <div class="footer">
                <h4 class="pPie">Acerca de nosotros</h4>

                <h4 class="pPie">Contacto</h4>

                <h4 class="somos">¿Quiénes somos?</h4>

            </div>
            <div class="footer1">
                <h4 class="pPie">Disfrutaréis de contenido sobre fútbol sin límite</br>
                    resultados, noticias, tienda y mucho más.</h4>

                <h4 class="pPie">+34 777 777 777</h4>

                <h4 class="somos"><a href="../nosotros/nosotros.php">Sobre nosotros</a></h4>
            </div>
            <div class="footer1">
                <h4 class="pPie">Calle Diego Armando Maradona. 25D</h4>

                <h4 class="pPie">info@FootPassion.es</h4>

                <h4 class="somos"></h4>
            </div>
        </footer>

    </footer>
	
	</body>
</html>
