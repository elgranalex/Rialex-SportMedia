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
            <a href="../login/login.php"><img class="user" src="../img/user.png"/></a>
        </header>

        <div class="topnav">
			<a href="../noticias/noticias.php">Noticias</a>
			<a href="../stats/stats.php">Estadísticas</a>
			<a href="../tienda/tienda.php">Tienda</a>
			<a href="../restringido/resindex.php">Restringido</a>
			
        </div>

        <div class="wrap">
            <h1>DETALLES DEL PARTIDO</hi>
        </div>

        <?php

                require "arraystats.php";
                    $text = "<div class='resul'>
                        <img id='img1' src='" .$partidoext[2]. " '>
                        <p>" .$partidoext[3]. " - " .$partidoext[1]. "</p>
                        <img id='img2' src='" .$partidoext[0]. " '></p>
                    </div>
                    ";

                    echo $text;

        ?>

        <table class="partidosinfo">
            <caption>DATOS GENERALES</caption>
           <tbody>

           <?php

        require "arraystats.php";
        foreach ($datospartido as $campo => $valor) {
            if ($campo == "estadio") {
                $text = "<tr>
                        <td>Estadio " .$valor. "</td>
                    </tr>";
                echo $text;
            } elseif ($campo == "arbi") {
                $text = "<tr>
                        <td>Árbitro " .$valor. "</td>
                    </tr>";
                echo $text;
            } elseif ($campo == "jornada") {
                $text = "<tr>
                        <td>Jornada " .$valor. "</td>
                    </tr>";
                echo $text;
            }  elseif ($campo == "hora") {
                $text = "<tr>
                        <td>" .$datospartido["fecha"]. " " .$valor. "</td>
                    </tr>";
                echo $text;
            } else {

            }
            
        }

        ?>

           </tbody>
       </table>

        <table class="partidosinfo">
            <caption>EVENTOS</caption>
           <tbody>
               <tr>
                   <th colspan="3">GOLES</th>
               </tr>

        <?php

        require "arraystats.php";
        foreach ($golespartido as $gol) {
            if ($gol[3] == "local") {
                $text = "<tr>
                        <td class ='jugador1'><img src='" .$gol[1]. "'>" .$gol[0]. "</td>
                        <td class='tiempo'>" .$gol[2]. "'</td>
                        <td class ='jugador2'></td>
                    </tr>";
            } elseif ($gol[3] == "visitante") {
                $text = "<tr>
                        <td class ='jugador1'></td>
                        <td class='tiempo'>" .$gol[2]. "'</td>
                        <td class ='jugador2'><img src='" .$gol[1]. "'>" .$gol[0]. "</td>
                    </tr>";
            }
            echo $text;
        }

        ?>

        <tr>
            <th colspan="3">TARJETAS</th>
        </tr>

        <?php

        require "arraystats.php";
        foreach ($tarpartido as $tar) {
            
            if ($tar[4] == "amarilla") {
                $color = "../img/amarilla.png";
            } elseif ($tar[4] == "roja") {
                $color = "../img/roja.png";
            }
            
            if ($tar[3] == "local") {
                $text = "<tr>
                        <td class ='jugador1'><img src='" .$tar[1]. "'>" .$tar[0]. "<img src='$color'></td>
                        <td class='tiempo'>" .$tar[2]. "'</td>
                        <td class ='jugador2'></td>
                    </tr>";
            } elseif ($tar[3] == "visitante") {
                $text = "<tr>
                        <td class ='jugador1'></td>
                        <td class='tiempo'>" .$tar[2]. "'</td>
                        <td class ='jugador2'><img src='$color'><img src='" .$tar[1]. "'>" .$tar[0]. "</td>
                    </tr>";
            }
            echo $text;
        }

        ?>

        <tr>
            <th colspan="3">ASISTENCIAS</th>
        </tr>

        <?php

        require "arraystats.php";
        foreach ($asistpartido as $asist) {
            if ($asist[3] == "local") {
                $text = "<tr>
                        <td class ='jugador1'><img src='" .$asist[1]. "'>" .$asist[0]. "</td>
                        <td class='tiempo'>" .$asist[2]. "'</td>
                        <td class ='jugador2'></td>
                    </tr>";
            } elseif ($asist[3] == "visitante") {
                $text = "<tr>
                        <td class ='jugador1'></td>
                        <td class='tiempo'>" .$asist[2]. "'</td>
                        <td class ='jugador2'><img src='" .$asist[1]. "'>" .$asist[0]. "</td>
                    </tr>";
            }
            echo $text;
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