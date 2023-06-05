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


if ( isset($_GET["act"]) && $_GET["act"] != "" ) {
    
    $act = validaVbleForm("act");
 
    if (isset($_GET["state"])) {
        if ($_GET["state"] == "ok" && $_GET["act"] == "delete") {
            echo "
            <div class='wrap'>
                <h1>JUGADOR BORRADO CORRECTAMENTE</h1>
            </div>";
        } else {
            if ($_GET["state"] == "ok" && $_GET["act"] == "new") {
                echo "
                <div class='wrap'>
                    <h1>JUGADOR INSERTADO CORRECTAMENTE</h1>
                </div>";
            }
            if ($_GET["state"] == "ok" && $_GET["act"] == "mod") {
                echo "
                <div class='wrap'>
                    <h1>JUGADOR MODIFICADO  CORRECTAMENTE</h1>
                </div>";
            }
        } 
        
    } else {

        if ( $act == "mod" && $_GET["id"] != "" 
        && isset($_GET["id"])) {

            $id = validaVbleForm("id");

            $jugadores = jugador($id);
            
            foreach ($jugadores as $jugador) {
                
                if ( $jugador["id"] == $id ){
 
                    echo "
                    <div class='wrap'>
                    <h1>MODIFICAR JUGADOR</hi>
                    </div>
            
            
                    <div class='form-new'>
                    <form method='post' action='../../control.php' enctype='multipart/form-data'>
                        <input type='hidden' name='table' value='jugadores' id='autor'/>    
                        <input type='hidden' name='id' value='$id' id='autor'/>
                        <h4>Datos del jugador</h4>
                        <input class='controlador' type='text' name='nombre_j' value='" .$jugador["nombre_j"]. "' id='nombre_j' placeholder='Nombre'/>
                        <h4>EQUIPO</h4>
                        <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='equipo_actual' title='Local'>
                        ";
                    
                    foreach ($equipos as $equipo) {

                        if ($equipo["id"] == $jugador["equipo_actual"]) {
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
                    echo"
                        <input class='controlador' type='number' name='dorsal' value='" .$jugador["dorsal"]. "' id='dorsal' placeholder='Dorsal'/>
            
                        <h4>Posición</h4>
                    ";

                    $pos = array("DC","POR","DFC","LI","MD","ED","LD","EI");

                    foreach ($pos as $posicion) {
                        if ($posicion == $jugador["posicion"]) {
                            echo "<input checked='checked' class='formradio' type='radio' id='posicion' value='$posicion' name='posicion'/>$posicion
                            ";
                        } else {
                            echo "<input class='formradio' type='radio' id='posicion' value='$posicion' name='posicion'/>$posicion
                            ";
                        }
                    }

                    echo "
                        <h4>Valor</h4>
                        <input class='controlador' type='number' name='valor_mercado' value='" .$jugador["valor_mercado"]. "' id='dorsal' placeholder='Valor de Mercado'/>
            
                        <h4>Introduce Foto</h4>
                        <img src='../../" .$jugador["foto_jug"]. "'/></br></br></br>
                        <input type='file'  id='foto' name='foto_jug'/>
            
                        <p> Estoy de acuerdo con <a href='#'>Terminos y Condiciones </a></p>
                        <input class='boton' type='submit' name=act value='$act'>
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
            <h1>INTRODUCIR JUGADOR</hi>
            </div>


            <div class='form-new'>
            <form method='post' action='../../control.php' enctype='multipart/form-data'>
                <h4>Datos del jugador</h4>
                <input type='hidden' name='table' value='jugadores' id='autor'/>
                <input class='controlador' type='text' name='nombre_j' id='nombre_j' placeholder='Nombre'/>
                <h4>EQUIPO</h4>
                    <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='equipo_actual' title='Local'>
                    ";
                
                foreach ($equipos as $equipo) {
                    echo "
                        <option value='" .$equipo["id"]. "'>" .$equipo["nombre_e"]. "</option>
                    ";
                }
                
                echo "</select>";
                echo"
                <input class='controlador' type='number' name='dorsal' id='dorsal' placeholder='Dorsal'/>

                <h4>Posición</h4>
                <input class='formradio' checked='checked' type='radio' id='posicion' value='POR' name='posicion'/>POR
                <input class='formradio' type='radio' id='posicion' value='DFC' name='posicion'/>DFC
                <input class='formradio' type='radio' id='posicion' value='LD' name='posicion'/>LD
                <input class='formradio' type='radio' id='posicion' value='LI' name='posicion'>LI
                <input class='formradio' type='radio' id='posicion' value='MD' name='posicion'>MD
                <input class='formradio' type='radio' id='posicion' value='ED' name='posicion'>ED
                <input class='formradio' type='radio' id='posicion' value='EI' name='posicion'>EI
                <input class='formradio' type='radio' id='posicion' value='DC' name='posicion'>DC

                <h4>Valor</h4>
                <input class='controlador' type='number' name='valor_mercado' id='dorsal' placeholder='Valor de Mercado'/>
            
                <h4>Introduce Foto</h4>
                <input type='file'  id='foto' value='foto_jug' name='foto_jug'/>

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
