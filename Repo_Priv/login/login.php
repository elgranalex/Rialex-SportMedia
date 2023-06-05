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
        <link rel="shortcut icon" href="../../iconos/favicon.ico">	
	</head>
	<body class="datos">

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
                        echo '<a href="registrado.php?usuario=' .$usuario["IdUsuario"]. '"><img class="user" src="../' .$foto. '"/></a>';
                    }elseif ($usuario["nombre"] == $_SESSION["usuario"] && $usuario["foto"] == "img/usuarios/") {
                        // Guardar datos de sesión
                        $foto = "img/user.png";
                        echo '<a href="registrado.php?usuario=' .$usuario["IdUsuario"]. '"><img class="user" src="../' .$foto. '"/></a>';
                    }
                }

              }
              
            if ($foto == "" || $foto == "img/usuarios/") {
                $foto = "img/user.png";
                echo '<a href="login.php"><img class="user" src="../' .$foto. '"/></a>';
             }

            ?>         </header>

        <div class="topnav">
			<a href="../noticias/noticias.php">Noticias</a>
			<a href="../stats/stats.php">Estadísticas</a>
			<a href="../tienda/tienda.php">Tienda</a>
			<a href="../restringido/resindex.php">Restringido</a>
			
        </div>

        <div class='wrap'>
          <h1>LOGIN</h1>
        </div>



          <div class='form-new'>
          <form method='post' action='../control.php' enctype='multipart/form-data'>

        <?php

          if (isset($_GET["error"])){

            if ($_GET["error"] == "other") {
              echo "<h4 style='color:red'>Error en el inicio de sesión</h4>";
            }

          }
          echo "";
        ?>

          <input class="controlador" type="hidden" name="act" value="login" />

          <h4>Username</h4>
            <input class="controlador" type="text" name="nombre" placeholder='Nombre'/>

          <h4>Contraseña</h4>
            <input class="controlador" type="password" name="password" placeholder='Contraseña'/>


        </br>
        </br>
        
          <div class="options">
            <div>
              Remember me <input type="checkbox" name="remeberme" id="" />
            </div>
          </div>

            <input class="boton" type="submit" name="act" value="login"/>
            <input class="boton" type="reset" name="act" value="reset"/>
            <input class="boton" type="hidden" name="table" value="usuarios" />

            <h4>No tienes cuenta ?</h4>
            <a href="registrsrse.php"><input class="boton" type="button" name="table" value="Registrarme" /></a>
        
          </form>
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