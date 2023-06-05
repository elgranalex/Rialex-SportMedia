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

$equipos = equipos();

$arbitros = arbitros();


if ( isset($_GET["act"]) && $_GET["act"] != "" ) {
    
    $act = validaVbleForm("act");

    if (isset($_GET["state"])) {
        if ($_GET["state"] == "ok" && $_GET["act"] == "delete") {
            echo "
            <div class='wrap'>
                <h1>PARTIDO BORRADO CORRECTAMENTE</h1>
            </div>";
        } else {
            if ($_GET["state"] == "ok" && $_GET["act"] == "new") {
                echo "
                <div class='wrap'>
                    <h1>PARTIDO INSERTADO CORRECTAMENTE</h1>
                </div>";
            }
            if ($_GET["state"] == "ok" && $_GET["act"] == "mod") {
                echo "
                <div class='wrap'>
                    <h1>PARTIDO MODIFICADO  CORRECTAMENTE</h1>
                </div>";
            }
        } 
        
    } else {

        if ( $act == "mod" && $_GET["id"] != "" 
        && isset($_GET["id"])) {

            $id = validaVbleForm("id");

            $partidos = partido($id);
            
            foreach ($partidos as $partido) {
                
                if ( $partido["cod"] == $id ){
                    
                    echo "
                    <div class='wrap'>
                    <h1>PARTIDOS</hi>
                    </div>


                    <div class='form-new'>
                    <form method='POST' action='../../control.php'>
                        <h4>MODIFICAR  PARTIDO</h4>
                        <input type='hidden' name='table' value='partidos' id='autor' placeholder='Partido'/>
                        <input type='hidden' name='id' value='$id' id='autor' placeholder='Partido'/>
                        <input class='controlador' type='time' value='" .$partido["hora"]. "' name='hora' id='autor' placeholder='Hora'/>
                        <input class='controlador' type='date' value='" .$partido["fecha"]. "' name='fecha' id='titulo' placeholder='Fecha'/>
                        <h4> Equipo Local</h4>
                        <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='e_local' title='Local'>
                        ";
                    
                    foreach ($equipos as $equipo) {
                        if ($partido["e_local"] == $equipo["id"]) {
                            echo "
                            <option selected='selected' value='" .$equipo["id"]. "'>" .$equipo["nombre_e"]. "</option>
                            ";
                        } else {
                            echo "
                            <option value='" .$equipo["id"]. "'>" .$equipo["nombre_e"]. "</option>
                            ";
                        }
                        
                    }
                    
                    echo "</select>";

                    echo "<h4> Equipo Visitante</h4>
                    <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='e_visitante' title='Visitante'>
                    ";
                    
                    foreach ($equipos as $equipo) {
                        if ($partido["e_visitante"] == $equipo["id"]) {
                            echo "
                            <option selected='selected' value='" .$equipo["id"]. "'>" .$equipo["nombre_e"]. "</option>
                            ";
                        } else {
                            echo "
                            <option value='" .$equipo["id"]. "'>" .$equipo["nombre_e"]. "</option>
                            ";
                        }
                        
                    }
                    
                    echo "</select>";

                    echo "<h4> Árbitro</h4>
                    <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='arbitro' title='Árbitro'>
                        <option value='desconocido'>No establecido</option>
                    ";
                    
                    foreach ($arbitros as $arbitro) {
                        if ($partido["arbitro"] == $arbitro["id"]) {
                            echo "
                            <option selected='selected' value='" .$arbitro["id"]. "'>" .$arbitro["nombre_a"]. "</option>
                            ";
                        } else {
                            echo "
                            <option value='" .$arbitro["id"]. "'>" .$arbitro["nombre_a"]. "</option>
                            ";
                        }
                    }
                    
                    echo "</select>";

                    echo "
                    <h4>Introduce Jornada</h4>
                        <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='jornada' title='Buscar jornada'>
                    ";

                    for ($i = 1; $i <= 20; $i++) {
                        if ($partido["jornada"] == $i) {
                            echo "
                            <option selected='selected' value='$i'>Jornada $i</option>
                            ";
                        } else {
                            echo "
                            <option value='$i'>Jornada $i</option>
                            ";
                        }
                    }

                    echo "
                        </select>  
                        <p> Estoy de acuerdo con <a href='#'>Terminos y Condiciones </a></p>
                        <input class='boton' type='submit' name='act' value='$act'>
                        <input class='boton' type='Reset' value='Reset'>
                        <input class='boton' type='submit' name=act value='delete'>
                    </form>
                    </div>";
                }
            }

        } elseif ( $act == "new") {

            $id = validaVbleForm("id");

            echo "
            <div class='wrap'>
            <h1>NUEVO PARTIDOS</hi>
            </div>


            <div class='form-new'>
            <form method='POST' action='../../control.php'>
                <h4>Introduce el Partido</h4>
                <input type='hidden' name='table' value='partidos' id='autor' placeholder='Partido'/>
                <input class='controlador' type='time' name='hora' id='autor' placeholder='Hora'/>
                <input class='controlador' type='date' name='fecha' id='titulo' placeholder='Fecha'/>
                <h4> Equipo Local</h4>
                <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='e_local' title='Local'>
                ";
            
            foreach ($equipos as $equipo) {
                echo "
                    <option value='" .$equipo["id"]. "'>" .$equipo["nombre_e"]. "</option>
                ";
            }
            
            echo "</select>";

            echo "<h4> Equipo Visitante</h4>
            <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='e_visitante' title='Visitante'>
            ";
            
            foreach ($equipos as $equipo) {
                echo "
                    <option value='" .$equipo["id"]. "'>" .$equipo["nombre_e"]. "</option>
                ";
            }
            
            echo "</select>";

            echo "<h4> Árbitro</h4>
            <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='arbitro' title='Árbitro'>
                <option value='desconocido'>No establecido</option>
            ";
            
            foreach ($arbitros as $arbitro) {
                echo "
                    <option value='" .$arbitro["id"]. "'>" .$arbitro["nombre_a"]. "</option>
                ";
            }
            
            echo "</select>";

            echo "
            <h4>Introduce Jornada</h4>
                <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='jornada' title='Buscar jornada'>";
                
                for ($i = 1; $i <= 20; $i++) {
                        echo "
                        <option value='$i'>Jornada $i</option>
                        ";
                }

            echo "
                </select>
                
                <p> Estoy de acuerdo con <a href='#'>Terminos y Condiciones </a></p>
                <input class='boton' type='submit' name='act' value='$act'>
                <input class='boton' type='Reset' value='Reset'>
            </form>
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
