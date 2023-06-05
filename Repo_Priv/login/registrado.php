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
        <link rel="shortcut icon" href="iconos/ms-icon-70x70.png">	
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
                        echo '<a href="registrado.php?usuario=' .$usuario["IdUsuario"]. '"><img class="user" src="../' .$foto. '"/></a>';
                    }elseif ($usuario["nombre"] == $_SESSION["usuario"] && ( $usuario["foto"] == "img/usuarios/" || $usuario["foto"] == "" )) {
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

            ?>      
            
        </header>

        <div class="topnav">
            <a href="../noticias/noticias.php">Noticias</a>
            <a href="../stats/stats.php">Estadísticas</a>
            <a href="../tienda/tienda.php">Tienda</a>
            <a href="../restringido/resindex.php">Restringido</a>
        </div>

        <div class="wrap">
          <h1>DATOS DEL USUARIO</hi>
        </div>

        <div class="options">
            <ul>
                <li><a href="../control.php?exit=yes">Cerrar sesión</a></li>
            </ul>
        </div>

        <?php

        $usuarios = usuarios($_SESSION["usuario"]);

        foreach ($usuarios as $usuario) {
            if ($usuario["nombre"] == $_SESSION["usuario"] ) {

                if ( $usuario["foto"] != "img/usuarios/" && $usuario["foto"] != "") {
                    $foto = "../" .$usuario["foto"]. "";
                }elseif ( $usuario["foto"] == "img/usuarios/" || $usuario["foto"] == "") {
                    $foto = "../img/user.png";
                }

                echo '
                <div class="imagenregistrado">
                    <div class="content">
                        <h2>USUARIO</h2>
                        <p>' .$usuario["nombre"]. '</p>
                        <h2>IMAGEN</h2>
                    </div>
                    <img src="' .$foto. '"/>
                </div>
                ';

                echo '
                <div class="form-new">
                    <form action="../control.php" method="post" enctype="multipart/form-data">
                ';

                if (isset($_GET["error"])){

                    if ($_GET["error"] == "password") {
                      echo "<h4 style='color:red'>Error en el inicio de sesión</h4>";
                    }
        
                }

                echo '
                        <input class="input" type="hidden" name="table" value="usuarios" />
                        <input class="input" type="hidden" name="act" value="mod" />
                        <input class="input" type="hidden" name="id" value="' .$usuario["IdUsuario"]. '" />
                        <h4>Nombre y apellidos</h4>
                        <input class="controlador" type="text" name="nombre" id="titulo" placeholder="Modifica Nombre y Apellidos" value="' .$usuario["nombre"]. '" />
                        <h4>Correo</h4>
                        <input class="controlador" type="text" name="correo" id="titulo" placeholder="Ingrese el Nuevo Correo" value="' .$usuario["correo"]. '" />
                        <h4>Contraseña</h4>
                        <input class="controlador" type="password" name="contra" id="titulo" placeholder="Ingrese Nueva Contraseña" value="' .$usuario["password"]. '"/>
                        <h4>Confirme Contraseña</h4>
                        <input class="controlador" type="password" name="contraconfirm" id="titulo" placeholder="Ingrese Nueva Contraseña" value="' .$usuario["password"]. '"/>
                    
                        <h4>Introduce Foto</h4>
                        <input type="file"  id="foto" value="valor" name="foto" value="../' .$usuario["foto"]. '"/>
        
                        <p> Estoy de acuerdo con <a href="../restringido/term-y-con.php">Terminos y Condiciones </a></p>
                        <input class="boton" type="submit" name="act" value="mod">
                        <input class="boton" type="submit" name="act" value="delete">
                        <input class="boton" type="Reset" value="Reset">
                    </form>
                </div>
                ';
            }
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
	
	</body>
</html>