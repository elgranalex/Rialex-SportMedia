<?php
require "../../control.php";
if (!isset($_SESSION["usuario"]) || ( !($_SESSION["tipo"] == "root") && !($_SESSION["tipo"] == "vendedor") && !($_SESSION["tipo"] == "admin") ) ) {
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
                    <h1>PRODUCTO BORRADO CORRECTAMENTE</h1>
                </div>";
            } else {
                if ($_GET["state"] == "ok" && $_GET["act"] == "new") {
                    echo "
                    <div class='wrap'>
                        <h1>PRODUCTO INSERTADO CORRECTAMENTE</h1>
                    </div>";
                }
                if ($_GET["state"] == "ok" && $_GET["act"] == "mod") {
                    echo "
                    <div class='wrap'>
                        <h1>PRODUCTO MODIFICADO  CORRECTAMENTE</h1>
                    </div>";
                }
            } 
            
        } else {

            $usuarios = usuarios($_SESSION["usuario"]);
            foreach ($usuarios as $usuario) {
                if ($usuario["nombre"] == $_SESSION["usuario"] ) {
                    // Guardar datos de sesión
                    $idusuario = $usuario["IdUsuario"];
                }
            }

        if ( $act == "mod" && $_GET["id"] != "" 
        && isset($_GET["id"])) {

            $id = validaVbleForm("id");
            $productos = producto($id);
            
            foreach ($productos as $producto) {
                
                if ( $producto["id"] == $id ){
                    echo "
                    <div class='wrap'>
                        <h1>MODIFICAR PRODUCTOS</hi>
                    </div>
                    <div class='form-new'>
                        <form method='POST' action='../../control.php' enctype='multipart/form-data'>
                            <h4>Introduce el Producto</h4>
                            <input type='hidden' name='IdUsuario' value='$idusuario' id='autor' placeholder='Partido'/>
                            <input class='controlador' type='text' name='titulo' value='" .$producto["titulo"]. "' id='titulo' placeholder='Ingrese el Titulo'></input>
                            <input class='controlador' type='number' name='precio' value='" .$producto["precio"]. "' id='autor' placeholder='Ingrese su Precio'></input>
                            <input class='controlador' type='text' name='keywords' value='" .$producto["keywords"]. "' id='autor' placeholder='Ingrese su Precio'></input>
                            <input type='hidden' name='table' value='productos' id='autor' placeholder='Partido'/>
                            <input type='hidden' name='id' value='$id'/>
                            <textarea class='controlador' rows='10' name='descripcion' id='cuerpo' placeholder='Ingrese su descripción'>" .$producto["descripcion"]. "</textarea>

                            </br></br></br></br></br>

                            
                            <img src='../../" .$producto["foto"]. "'/>
                            <h4>Introduce Foto si quieres cambiarla</h4>
                            <input type='file'  id='foto' value='valor' name='foto'></input>

                            <p> Estoy de acuerdo con <a href='../term-y-con.php'>Terminos y Condiciones </a></p>
                            <input class='boton' type='submit' name=act value='$act'>
                            <input class='boton' type='Reset' value='Reset'>
                            <input class='boton' id='delete' type='submit' name=act value='delete' onclick='Confirmar();''>

                        </form>
                    </div>";
                }
            }

        } elseif ( $act == "new") {

            echo "
            <div class='wrap'>
                <h1>INSERTAR PRODUCTOS</hi>
            </div>
            <div class='form-new'>
                <form method='POST' action='../../control.php' enctype='multipart/form-data'>
                    <h4>Introduce el Producto</h4>
                    <input type='hidden' name='IdUsuario' value='$idusuario' id='autor' placeholder='Partido'/>
                    <input class='controlador' type='text' name='titulo' id='titulo' placeholder='Ingrese el Titulo'/>
                    <input class='controlador' type='number' name='precio' id='autor' placeholder='Ingrese su Precio'/>
                    <input type='hidden' name='table' value='productos' id='autor'/>
                    <input class='controlador' type='text' name='keywords' id='autor' placeholder='Ingrese sus keywords'></input>
                    <textarea class='controlador' rows='10' name='descripcion' id='cuerpo' placeholder='Ingrese su descripción'></textarea>

                    <h4>Introduce Foto</h4>
                    <input type='file'  id='foto' value='valor' name='foto'/>

                    <p> Estoy de acuerdo con <a href='../term-y-con.php'>Terminos y Condiciones </a></p>
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
	
	</body>
</html>
