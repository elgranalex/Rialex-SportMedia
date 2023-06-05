<?php require "../control.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>FootPassion</title>
		<link rel="stylesheet" 
        type="text/css" 
        href="../index.css" 
        media="screen" /> 
        <link rel="shortcut icon" href="../iconos/ms-icon-70x70.png">	
	</head>
	<body>

		<header>
            <img class="letras" src="../img/letrasheader.png"/>
            <a href="../index.php"><img class="logo" src="../img/LogoProyecto.png"/></a>
            <?php
              $foto = "";
              if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != "") {
                $usuarios = usuarios($_SESSION["usuario"]);
                foreach ($usuarios as $usuario) {
                    if ($usuario["nombre"] == $_SESSION["usuario"] && $usuario["foto"] != "img/usuarios/" && $usuario["foto"] != "") {
                        // Guardar datos de sesión
                        $foto = "" .$usuario["foto"]. "";
                        echo '<a href="../login/registrado.php?usuario=' .$usuario["IdUsuario"]. '"><img class="user" src="../' .$foto. '"/></a>';
                    }elseif ($usuario["nombre"] == $_SESSION["usuario"] && ( $usuario["foto"] == "img/usuarios/" || $usuario["foto"] == "" )) {
                        // Guardar datos de sesión
                        $foto = "img/user.png";
                        echo '<a href="../login/registrado.php?usuario=' .$usuario["IdUsuario"]. '"><img class="user" src="../' .$foto. '"/></a>';
                    }
                }

              }
              
            if ($foto == "" || $foto == "img/usuarios/") {
                $foto = "img/user.png";
                echo '<a href="../login/login.php"><img class="user" src="../' .$foto. '"/></a>';
             }

            ?>        </header>

        <div class="topnav">
			<a href="../noticias/noticias.php">Noticias</a>
			<a href="../stats/stats.php">Estadísticas</a>
			<a href="../tienda/tienda.php">Tienda</a>
			<a href="../restringido/resindex.php">Restringido</a>
        </div>

        <div class="wrap">
            <h1>PARTIDOS DE LA JORNADA</h1>
        </div>

        <table class="partidosinfo">
            <form action="partidos.php" method="get">
                <caption>
                <select aria-describedby="searchDropdownDescription" class="nav-search-dropdown searchSelect nav-progressive-attrubute nav-progressive-search-dropdown" data-nav-digest="NovDWLoMJ++FDxkPJG2fksB8LbM=" data-nav-selected="18" id="searchDropdownBox" name="jornada" style="display: block; top: 2.5px;" tabindex="0" title="Buscar jornada">
                        <?php

                            $jornadas = jornadas();
                            
                            if (isset($_GET["jornada"]) && $_GET["jornada"] <= 10 && 0 <= $_GET["jornada"] ) {
                    
                                $jornadaselect = $_GET["jornada"];

                                foreach ($jornadas as $jornada) {
                                    
                                    if ($jornada["jornada"] == $jornadaselect) {
                                        $textj = "<option selected='selected' value='" .$jornada["jornada"]. "'>Jornada " .$jornada["jornada"]. "</option>";
                
                                        echo $textj;
                                    } else {
                                        $textj = "<option value='" .$jornada["jornada"]. "'>Jornada " .$jornada["jornada"]. "</option>";
                
                                        echo $textj;
                                    }
                                }

                            } else {
                                foreach ($jornadas as $jornada) {
                                    
                                    $textj = "<option value='" .$jornada["jornada"]. "'>Jornada " .$jornada["jornada"]. "</option>";
            
                                    echo $textj;
                                    
                                }
                            }
                        ?>
                </select>
                <button type="submit" class="css-button-shadow-border-sliding--green">Buscar</button>

                </caption>
            </form>
           <tbody>

           <?php

                $equipos = equipos();
                if (isset($_GET["jornada"]) && $_GET["jornada"] <= 20 && 0 <= $_GET["jornada"] ) {
                    
                    $jornada = $_GET["jornada"];
                    $partidos = partidosjornada($jornada);
                    $total = 0;
                    foreach ($partidos as $partido) {

                        if ($partido["jornada"] == $jornada) {

                            foreach ($equipos as $equipo) {

                                if ($partido["e_local"] == $equipo["id"]) {
                                    $nlocal = $equipo["nombre_e"];
                                    $flocal = $equipo["escudo"];
                                } elseif ($partido["e_visitante"] == $equipo["id"]) {
                                    $nvisitante = $equipo["nombre_e"];
                                    $fvisitante = $equipo["escudo"];
                                }
                            }

                            $text = "<tr>
                                <td class='equipo1'>
                                    " .$nlocal. "
                                    <img src='../" .$flocal. "'>
                                </td>
                                <td class='marcador'><a href='./infopartido.php?id=" .$partido["cod"]. "'>" .$partido["goles_local"]. "-" .$partido["goles_visitante"]. "</a></td>
                                <td class='equipo2'><img src='../" .$fvisitante. "'> " .$nvisitante. "</td>
                            </tr>
                            ";
    
                        echo $text;
                        $total++;
                        }   

                        
                    }

                    if ($total == 0) {
                        echo "<tr><td>No hay partidos en esta jornada</td></tr>";
                    }

                } else {
                    $jornada = 1;
                    $total = 0;
                    $partidos = partidosjornada($jornada);
                    foreach ($partidos as $partido) {

                        if ($partido["jornada"] == $jornada) {

                            foreach ($equipos as $equipo) {

                                if ($partido["e_local"] == $equipo["id"]) {
                                    $nlocal = $equipo["nombre_e"];
                                    $flocal = $equipo["escudo"];
                                } elseif ($partido["e_visitante"] == $equipo["id"]) {
                                    $nvisitante = $equipo["nombre_e"];
                                    $fvisitante = $equipo["escudo"];
                                }
                            }

                            $text = "<tr>
                                <td class='equipo1'>" .$nlocal. "</a><img src='../" .$flocal. "'></td>
                                <td class='marcador'><a href='./infopartido.php?id=" .$partido["cod"]. "'>" .$partido["goles_local"]. "-" .$partido["goles_visitante"]. "</a></td>
                                <td class='equipo2'><img src='../" .$fvisitante. "'> " .$nvisitante. "</td>
                            </tr>
                            ";
    
                        echo $text;
                        $total++;
                        }   
                    }
                }

            ?>
           </tbody>
       </table>

        <div class="deco">
            <img  src="../img/aspas.jpg"/>
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