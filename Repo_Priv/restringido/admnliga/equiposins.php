<?php
require "../../control.php";
if (!isset($_SESSION["usuario"]) && !($_SESSION["tipo"] == "root") && !($_SESSION["tipo"] == "periodista") && !($_SESSION["tipo"] == "adminliga")) {
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


if ( isset($_GET["act"]) && $_GET["act"] != "" ) {
    
    $act = validaVbleForm("act");
 
    if (isset($_GET["state"])) {
        if ($_GET["state"] == "ok" && $_GET["act"] == "delete") {
            echo "
            <div class='wrap'>
                <h1>EQUIPO BORRADO CORRECTAMENTE</h1>
            </div>";
        } else {
            if ($_GET["state"] == "ok" && $_GET["act"] == "new") {
                echo "
                <div class='wrap'>
                    <h1>EQUIPO INSERTADO CORRECTAMENTE</h1>
                </div>";
            }
            if ($_GET["state"] == "ok" && $_GET["act"] == "mod") {
                echo "
                <div class='wrap'>
                    <h1>EQUIPO MODIFICADO  CORRECTAMENTE</h1>
                </div>";
            }
        } 
        
    } else {

        if ( $act == "mod" && $_GET["id"] != "" 
        && isset($_GET["id"])) {

            $id = validaVbleForm("id");

            $equipos = equipo($id);
            
            foreach ($equipos as $equipo) {
                
                if ( $equipo["id"] == $id ){

                    echo "
                    <div class='wrap'>
                    <h1>MODIFICAR EQUIPO</hi>
                    </div>
            
            
                    <div class='form-new'>
                    <form method='POST' action='../../control.php' enctype='multipart/form-data'>
                        <input type='hidden' name='table' value='equipos' id='autor'/>    
                        <input type='hidden' name='id' value='$id' id='autor'/>

                        <h4>NOMBRE DEL EQUIPO</h4>
                        <input class='controlador' type='text' name='nombre_e' id='nombre_j' placeholder='Nombre' value='".$equipo["nombre_e"]."'/>
                        <input class='controlador' type='text' name='abreviatura' id='nombre_j' placeholder='Abreviatura' value='".$equipo["abreviatura"]."'/>
                        <input class='controlador' type='text' name='estadio' id='nombre_j' placeholder='Estadio' value='".$equipo["estadio"]."'/>

                        <h4>Datos del entrenador</h4>
                        <input class='controlador' type='text' name='entrenador' id='nombre_j' placeholder='Nombre' value='".$equipo["entrenador"]."'/>

                        <h4>Datos del presidente</h4>
                        <input class='controlador' type='text' name='presidente' id='nombre_j' placeholder='Nombre' value='".$equipo["presidente"]."'/>

                        <h4>Presupuesto</h4>
                        <input class='controlador' type='number' name='presupuesto_e' id='dorsal' placeholder='Presupuesto' value='".$equipo["presupuesto_e"]."'/>
            
                        <h4>Introduce Escudo</h4>
                        <img src='../../" .$equipo["escudo"]. "'/></br></br></br>
                        <input type='file'  id='foto' name='escudo'/>
            
                        <p> Estoy de acuerdo con <a href='#'>Terminos y Condiciones </a></p>
                        <input class='boton' type='submit' name=act value='$act'>
                        <input class='boton' type='Reset' value='Reset'>
                        <input class='boton' type='submit' name=act value='delete'>
                    </form>
                    </div>";
                }
            }

        } elseif ( $act == "new") {

            echo "
            <div class='wrap'>
            <h1>NUEVO EQUIPO</hi>
            </div>
    
    
            <div class='form-new'>
            <form method='POST' action='../../control.php' enctype='multipart/form-data'>
                <input type='hidden' name='table' value='equipos' id='autor'/>    
          
                <h4>NOMBRE DEL EQUIPO</h4>
                <input class='controlador' type='text' name='nombre_e' id='nombre_j' placeholder='Nombre'/>
                <input class='controlador' type='text' name='abreviatura' id='nombre_j' placeholder='Abreviatura'/>
                <input class='controlador' type='text' name='estadio' id='nombre_j' placeholder='Estadio'/>

                <h4>Datos del entrenador</h4>
                <input class='controlador' type='text' name='entrenador' id='nombre_j' placeholder='Nombre'/>

                <h4>Datos del presidente</h4>
                <input class='controlador' type='text' name='presidente' id='nombre_j' placeholder='Nombre'/>

                <h4>Presupuesto</h4>
                <input class='controlador' type='number' name='presupuesto_e' id='dorsal' placeholder='Presupuesto'/>
    
                <h4>Introduce Escudo</h4>
                <input type='file'  id='foto' name='escudo'/>
    
                <p> Estoy de acuerdo con <a href='#'>Terminos y Condiciones </a></p>
                <input class='boton' type='submit' name=act value='$act'>
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
