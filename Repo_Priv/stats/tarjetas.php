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
            <h1>JUGADORES CON MÁS TARJETAS</hi>
        </div>

        <table class="styled-table"> 
            <thead> 
                <tr> 
                    <th>Posición</th> 
                    <th>Nombre</th>
                    <th>Equipo</th> 
                    <th>Amarillas</th> 
                    <th>Rojas</th> 
                </tr> 
            </thead> 
            <tbody> 

            <?php

                $pos = 1;
                if (count($tarjetas) <= 10) {
                    foreach ($tarjetas as $cadauno) {
                        echo "<tr> 
                            <td>$pos</td> 
                            <td>" .$cadauno[0]. "</td> 
                            <td>" .$cadauno[1]. "</td> 
                            <td>" .$cadauno[2]. "</td>
                            <td>" .$cadauno[3]. "</td>  
                        </tr>";
                        $pos++;
                    }
                } else {
                    for ($pos = 1; $pos <= 10; $pos++) {
                        echo "<tr> 
                            <td>$pos</td> 
                            <td>" .$tarjetas[$pos][0]. "</td> 
                            <td>" .$tarjetas[$pos][1]. "</td> 
                            <td>" .$tarjetas[$pos][2]. "</td> 
                            <td>" .$tarjetas[$pos][3]. "</td>
                        </tr>";
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