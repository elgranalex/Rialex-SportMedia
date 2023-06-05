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
        type="text/css" 
        href="../../index.css" 
        media="screen" /> 
        <link rel="shortcut icon" href="../../iconos/favicon.ico">	
	</head>
	<body class="datos">

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
			<a href="../resindex.php">Restringido</a>
			
        </div>

<?php


if (isset($_GET["act"]) && $_GET["act"] != "" ) {
 
    if (isset($_GET["state"])) {
        if ($_GET["state"] == "ok" && $_GET["act"] == "delete") {
            echo "
            <div class='wrap'>
                <h1>GOL BORRADO CORRECTAMENTE</h1>
            </div>";
        } else {
            if ($_GET["state"] == "ok" && $_GET["act"] == "new") {
                echo "
                <div class='wrap'>
                    <h1>GOL INSERTADO CORRECTAMENTE</h1>
                </div>";
            }
            if ($_GET["state"] == "ok" && $_GET["act"] == "mod") {
                echo "
                <div class='wrap'>
                    <h1>GOL MODIFICADO  CORRECTAMENTE</h1>
                </div>";
            }
        } 
    } else {

        $act = validaVbleForm("act");

        $partido = validaVbleForm("partido");
        $partidos = partido($partido);
        $equipos = equipos();
        
        if ( $act == "mod" && $_GET["id"] != "" 
        && isset($_GET["id"])) {

            $id = validaVbleForm("id");
            $goles = gol($id);
            $partidoid = validaVbleForm("partido");

            foreach($goles as $gol) {
                if ($id == $gol["id"]) {
                    $goleador = $gol["n_licencia_j"];
                    $asistencia = $gol["asistencia"];
                    foreach($partidos as $partido) {
                        if ($partidoid == $partido["cod"]) {
                            $equipos = equipo($partido["e_local"]);
                            foreach ($equipos as $equipo) {
                                if ($partido["e_local"] == $equipo["id"]) {
                                    $local = $equipo["id"];
                                    $nlocal = $equipo["nombre_e"];
                                }
                            }
                            $equipos = equipo($partido["e_visitante"]);
                            foreach ($equipos as $equipo) {
                                if ($partido["e_visitante"] == $equipo["id"]) {
                                    $visitante = $equipo["id"];
                                    $nvisitante = $equipo["nombre_e"];
                                }
                            }
                        }
                    }
                    $jugadores = jugadorespartido($local,$visitante);

                    echo "
                    <div class='wrap'>
                        <h1>MODIFICAR GOL</h1>
                    </div>";

                    echo "
                    <div class='form-new'>
                    <form method='POST' action='../../control.php'>
                        <h4>Introducir Gol</h4>
                        <input class='controlador' type='number' name='minuto' id='autor' value='" .$gol["minuto"]. "' placeholder='Minuto'/>
                        <input type='hidden' name='table' value='goles' id='autor' placeholder='Partido'/>
                        <input type='hidden' name='partido' value='$partidoid' id='autor' placeholder='Partido'/>
                        <input type='hidden' name='id' value='$id' id='autor' placeholder='Partido'/>
                        <h4>Anotador</h4>
                        <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='jugador' title='Jugador'>";
            
                        echo "<optgroup label='" .$nlocal. "'>";
                
                        foreach ($jugadores as $jugador) {
                            if( $jugador["equipo_actual"] == $local) {
                                if( $jugador["id"] == $goleador) {
                                    echo "
                                        <option selected='selected' value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                                    ";
                                } else {
                                    echo "
                                        <option value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                                    ";
                                }
                            }
                        }
                
                        echo "</optgroup>";
                
                        echo "<optgroup label='" .$nvisitante. "'>";

                
                        foreach ($jugadores as $jugador) {
                            if( $jugador["equipo_actual"] == $visitante) {
                                if( $jugador["id"] == $goleador) {
                                    echo "
                                        <option selected='selected' value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                                    ";
                                } else {
                                    echo "
                                        <option value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                                    ";
                                }
                            }
                        }
                        
                        echo "</optgroup>";
            
                    echo "</select>";
            
                    echo "<h4>Asistencia</h4>
                    <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='asistencia' title='Jugador'>";
                    echo "<option value='null'>Sin Asistencia</option>";
                    echo "<optgroup label='" .$nlocal. "'>";
            
                    foreach ($jugadores as $jugador) {
                        if( $jugador["equipo_actual"] == $local) {
                            if( $jugador["id"] == $asistencia) {
                                echo "
                                    <option selected='selected' value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                                ";
                            } else {
                                echo "
                                    <option value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                                ";
                            }
                        }
                    }
            
                    echo "</optgroup>";
            
                    echo "<optgroup label='" .$nvisitante. "'>";
            
                    foreach ($jugadores as $jugador) {
                        if( $jugador["equipo_actual"] == $visitante) {
                            if( $jugador["id"] == $asistencia) {
                                echo "
                                    <option selected='selected' value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                                ";
                            } else {
                                echo "
                                    <option value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                                ";
                            }
                        }
                    }
                    echo "</optgroup>";
            
                    echo "</select>";

                    echo "<h4>Tipo</h4>
                    <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='tipo' title='Jugador'>
                        ";
                        foreach ($tiposgol as $tipo) {
                            if( $gol["tipo"] == $tipo) {
                                echo "
                                    <option selected='selected' value='" .$tipo. "'>" .$tipo. "</option>
                                ";
                            } else {
                                echo "
                                    <option value='" .$tipo. "'>" .$tipo. "</option>
                                ";
                            }
                            
                        }
                    echo "
                    </select>
                        ";
            
                    echo "
                    <p> Estoy de acuerdo con <a href='#'>Terminos y Condiciones </a></p>
                    <input class='boton' type='submit' name='act' value='$act'>
                    <input class='boton' type='Reset' value='Reset'>
                    <input class='boton' type='submit' name=act value='delete'>";
            
                    echo "</form>
                    </div>";
                }
            }
            

        } elseif ( $act == "new") {   

            $partidoid = validaVbleForm("partido");

            foreach($partidos as $partido) {
                if ($partidoid == $partido["cod"]) {
                    foreach ($equipos as $equipo) {
                        if ($partido["e_local"] == $equipo["id"]) {
                            $local = $equipo["id"];
                            $nlocal = $equipo["nombre_e"];
                        } elseif ($partido["e_visitante"] == $equipo["id"]) {
                            $visitante = $equipo["id"];
                            $nvisitante = $equipo["nombre_e"];
                        }
                    }
                }
            }

            $jugadores = jugadorespartido($local,$visitante);

            echo "
            <div class='wrap'>
                <h1>GOLES</hi>
            </div>

            <div class='form-new'>
            <form method='POST' action='../../control.php'>
                <h4>Introducir Gol</h4>
                <input type='hidden' name='table' value='goles' id='autor' placeholder='Partido'/>
                <input class='controlador' type='number' name='minuto' id='autor' placeholder='Minuto'/>
                <input type='hidden' name='partido' value='$partidoid' id='autor' placeholder='Partido'/>
                <h4>Anotador</h4>
                <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='jugador' title='Jugador'>";

            echo "<optgroup label='" .$nlocal. "'>";
        
            foreach ($jugadores as $jugador) {
                if( $jugador["equipo_actual"] == $local)
                echo "
                    <option value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                ";
            }

            echo "</optgroup>";

            echo "<optgroup label='" .$nvisitante. "'>";
        
            foreach ($jugadores as $jugador) {
                if( $jugador["equipo_actual"] == $visitante)
                echo "
                    <option value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                ";
            }
            echo "</optgroup>";

            echo "</select>";

            echo "<h4>Asistencia</h4>
            <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='asistencia' title='Jugador'>";
            echo "<option value='null'>Sin Asistencia</option>";
            echo "<optgroup label='" .$nlocal. "'>";

            foreach ($jugadores as $jugador) {
                if( $jugador["equipo_actual"] == $local)
                echo "
                    <option value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                ";
            }

            echo "</optgroup>";

            echo "<optgroup label='" .$nvisitante. "'>";

            foreach ($jugadores as $jugador) {
                if( $jugador["equipo_actual"] == $visitante)
                echo "
                    <option value='" .$jugador["id"]. "'>" .$jugador["nombre_j"]. "</option>
                ";
            }
            echo "</optgroup>";

            echo "</select>";

            echo "<h4>Tipo</h4>
            <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='tipo' title='Jugador'>
                ";
                foreach ($tiposgol as $tipo) {
                        echo "
                            <option value='" .$tipo. "'>" .$tipo. "</option>
                        ";
                }
            echo "
            </select>
                ";

            echo "
            <p> Estoy de acuerdo con <a href='#'>Terminos y Condiciones </a></p>
            <input class='boton' type='submit' name=act value='$act'> 
            <input class='boton' type='Reset' value='Reset'>";

            echo "</form>
            </div>";

                
        } else {
            echo "<div class='wrap'>
            <h1>VALORES ANÓMALOS ENCONTRADOS</hi>
            </div>";
        }
    
    }

} else {
    echo "<div class='wrap'>
        <h1>VALORES ANÓMALOS ENCONTRADOS</hi>
    </div>";
}

?>



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

                <h4 class="somos"><a href="../../nosotros/nosotros.php">Sobre nosotros</a></h4>
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
