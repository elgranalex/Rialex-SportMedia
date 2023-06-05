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
	<body>

		<header>
            <img class="letras" src="../../img/letrasheader.png"/>
            <a href="../../index.php"><img class="logo" src="../../img/LogoProyecto.png"/></a>
            <?php
              $foto = "";
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
            <h1>EQUIPOS</hi>
        </div>

        <div class="options">
            <ul>
                <li><a href="./equiposins.php?act=new">New Team</a></li>
            </ul>
        </div>

        <?php

            $filtrado = equipos();
            

            $total = count($filtrado);


            if  ( isset($_GET['pax']) ) {
                $pax = $_GET['pax'];
            } else {
                $pax = 0;
            }

            if ( $total < ((6 * $pax) +6)) {

                for ($i = (6 * $pax) ; $i < $total; $i++) {


                    $texto = "<div class='content'>
                                <h2>" .$filtrado[$i]["nombre_e"]. "</h2>
                                <p>Presupuesto: " .$filtrado[$i]["presupuesto_e"]. "</p>
                                <p>Estadio " .$filtrado[$i]["estadio"]. "</p>
                                <p>Entrenador " .$filtrado[$i]["entrenador"]. "</p>
                                <p>Presidente " .$filtrado[$i]["presidente"]. "</p>
                            </div>";

                    if (isset($filtrado[$i]["escudo"]) && $filtrado[$i]["escudo"] != "") {
                        $img = "../../" .$filtrado[$i]["escudo"]. "";
                    } else {
                        $img = "";
                    }
    
                    $imag = "<img src='$img'/>";
    
                    echo "<div class='jug'>"; 
                    
                    if ($i % 2 == 0) {
                        echo "$texto";
                        echo "$imag";
                    } else {
                        echo "$imag";
                        echo "$texto";
                    }

                    echo "<a href='./equiposins.php?act=mod&id=" .$filtrado[$i]["id"]. "'><img src='../../img/editar.png'/></a>";
    
                    echo "</div>";
    
                }

            } else {
                $ultimo = ($pax * 6) + 6;    
                if ( $ultimo > $total){
                        $ultimo = $total;
                    }

                for ($i = (6 * $pax); $i < $ultimo; $i++) {

                    $texto = "<div class='content'>
                                <h2>" .$filtrado[$i]["nombre_e"]. "</h2>
                                <p>Presupuesto: " .$filtrado[$i]["presupuesto_e"]. "</p>
                                <p>Estadio " .$filtrado[$i]["estadio"]. "</p>
                                <p>Entrenador " .$filtrado[$i]["entrenador"]. "</p>
                                <p>Presidente " .$filtrado[$i]["presidente"]. "</p>
                            </div>";

                    if (isset($filtrado[$i]["escudo"]) && $filtrado[$i]["escudo"] != "") {
                        $img = "../../" .$filtrado[$i]["escudo"]. "";
                    } else {
                        $img = "";
                    }
    
                    $imag = "<img src='$img'/>";
    
                    echo "<div class='jug'>"; 
                    
                    if ($i % 2 == 0) {
                        echo "$texto";
                        echo "$imag";
                    } else {
                        echo "$imag";
                        echo "$texto";
                    }

                    echo "<a href='./equiposins.php?act=mod&id=" .$filtrado[$i]["id"]. "'><img src='../../img/editar.png'/></a>";
    
                    echo "</div>";
                }
            }
            

            $paxante = $pax - 1;

                $paxd = $pax + 1;
            
                if ($pax == 0 && ($pax * 6) + 6 < $total){
                    echo"
                    <div class='pasar'>
                        <p>
                            <a href='./equipos.php?pax=$paxd'>Pág Siguiente</a>
                        </p>
                    </div>";
                } elseif ($pax != 0 && ($pax * 6) + 6 >= $total){
                    echo"
                    <div class='pasar'>
                        <p>
                            <a href='./equipos.php?pax=$paxante'>Pág anterior</a>
                        </p>
                    </div>";
                } elseif ($pax == 0 && ($pax * 6) + 6 > $total){
                    echo"
                    <div class='pasar'>
                        <p>No hay más equipos
                        </p>
                    </div>";
                } else {
                    echo"
                    <div class='pasar'>
                        <p>
                            <a href='./equipos.php?pax=$paxante'>Pág anterior</a>
                            <a href='./equipos.php?pax=$paxd'>Pág Siguiente</a>
                        </p>
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
