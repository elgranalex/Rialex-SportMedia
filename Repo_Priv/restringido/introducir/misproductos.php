<?php
require "../../control.php";
if ( ($_SESSION["tipo"] != "root") && ($_SESSION["tipo"] != "vendedor") && ($_SESSION["tipo"] != "admin") ) {
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

        <div class="wrap">
            <h1>MIS PRODUCTOS</h1>
        </div>

        <section>
                <form autocomplete="off" action="<?php $_SERVER["PHP_SELF"] ?>" method="get">
                    <div class="busqueda">
                        <input type="text" name="cadena" placeholder="Buscar">
                        <button class="css-button-shadow-border-sliding--green" >Buscar</button>
                    </div>


                    <div class="filtro">
                        <div class="checkbox">
                            <div>
                                <input type="checkbox" name="filtro1" value="camisetas" id="checkbox1">
                                <label for="checkbox1">Camisetas</label>
                            </div>
                            
                            <div>
                                <input type="checkbox" name="filtro2" value="merch" id="checkbox2">
                                <label for="checkbox2">Merch</label>
                            </div>

                            <div>
                                <input type="checkbox" name="filtro3" value="botas" id="checkbox3">
                                <label for="checkbox3">Botas</label>
                            </div>

                                <select aria-describedby="searchDropdownDescription" class="select1" id="searchDropdownBox" name="url" title="Ordenar por">
                                    <option value="search-alias=jornada1">Precio Desc</option>
                                    <option value="search-alias=jornada2">Precio Asc</option>
                                    <option value="search-alias=jornada3">Tipo</option>
                                </select>
      
                        </div>
                    </div>

                </form>
            </section>

        <div class="options">
            <ul>
                <li><a href="./productosins.php?act=new">New Producto</a></li>
            </ul>
        </div>


		<div class="tienda">
             <div class="container-items">

             <?php

                $nuser = $_SESSION["usuario"];

                $orden = ""; 
                $filtro1 = ""; 
                $filtro2 = ""; 
                $filtro3 = ""; 
                $cadena = ""; 

                if (isset($_GET["ordenar"]) && $_GET["ordenar"] == "no") {
                    $orden = "no";
                } elseif (isset($_GET["ordenar"]) && $_GET["ordenar"] == "asc") {
                    $orden = "asc";
                } elseif (isset($_GET["ordenar"]) && $_GET["ordenar"] == "desc") {
                    $orden = "desc";
                } else {
                    $orden = "no";
                }

                if ($_SESSION["tipo"] == "admin" && ( (isset($_GET["filtro1"]) && $_GET["filtro1"] != "") ||
                (isset($_GET["filtro2"]) && $_GET["filtro2"] != "") || 
                (isset($_GET["filtro3"]) && $_GET["filtro3"] != "") ||
                (isset($_GET["cadena"]) && $_GET["cadena"] != "") ) ) {

                        
                    if (isset($_GET["filtro1"]) && $_GET["filtro1"] != "") {
                        $filtro1 = $_GET["filtro1"]; 
                    } else {
                        $filtro1 = ""; 
                    }

                    if (isset($_GET["filtro2"]) && $_GET["filtro2"] != "") {
                        $filtro2 = $_GET["filtro2"]; 
                    } else {
                        $filtro2 = ""; 
                    }

                    if (isset($_GET["filtro3"]) && $_GET["filtro3"] != "") {
                        $filtro3 = $_GET["filtro3"]; 
                    } else {
                        $filtro3 = ""; 
                    }

                    if (isset($_GET["cadena"]) && $_GET["cadena"] != "") {
                        $palabras = explode(" ", $_GET["cadena"]);
                        $cadena = "";
                        foreach($palabras as $palabra) {
                            $cadena = $cadena."%".$palabra;
                        }
                    } else {
                        $cadena = ""; 
                    }
                    
                    $productos = misproductos($orden,$filtro1,$filtro2,$filtro3,$cadena);

                } else {
                    $productos = misproductos($orden,"","","","");
                }

                $total = count($productos);

                if  ( isset($_GET['pax']) ) {
                    $pax = $_GET['pax'];
                } else {
                    $pax = 0;
                }

                if ( $total < ((6 * $pax) +6)) {

                    for ($i = (6 * $pax) ; $i < $total; $i++) {

                        $texto = "<a href='./productosins.php?id=" .$productos[$i]["id"]. "&act=mod'>
                                    <div class='item'>
                                        <figure>
                                            <img src='../../" .$productos[$i]["foto"]. "' alt'producto'/>
                                        </figure>
                                        <div class='info-product'>
                                            <h2>" .$productos[$i]["titulo"]. "</h2>
                                            <p class='price'>" .$productos[$i]["precio"]. "$</p>
                                        </div>
                                    </div>
                                </a>";
        
                        
                        echo "$texto";
        
                    }

                } else {
                    $ultimo = ($pax * 6) + 6;    
                    if ( $ultimo > $total){
                            $ultimo = $total;
                        }

                    for ($i = (6 * $pax); $i < $ultimo; $i++) {

                        $texto = "<a href='./productosins.php?id=" .$productos[$i]["id"]. "&act=mod'>
                                    <div class='item'>
                                        <figure>
                                            <img src='../../" .$productos[$i]["foto"]. "' alt'producto'/>
                                        </figure>
                                        <div class='info-product'>
                                            <h2>" .$productos[$i]["titulo"]. "</h2>
                                            <p class='price'>" .$productos[$i]["precio"]. "$</p>
                                        </div>
                                    </div>
                                </a>";
        
                        
                        echo "$texto";
                    }
                }

            ?>

            </div>

          </div>

             <?php

                $paxante = $pax - 1;

                $paxd = $pax + 1;
            
                if ($pax == 0 && ($pax * 6) + 6 < $total){
                    echo"
                    <div class='pasar'>
                        <p>
                            <a href='./misproductos.php?pax=$paxd'>Pág Siguiente</a>
                        </p>
                    </div>";
                } elseif ($pax != 0 && ($pax * 6) + 6 >= $total){
                    echo"
                    <div class='pasar'>
                        <p>
                            <a href='./misproductos.php?pax=$paxante'>Pág anterior</a>
                        </p>
                    </div>";
                } elseif ($pax == 0 && ($pax * 6) + 6 > $total){
                    echo"
                    <div class='pasar'>
                        <p>No hay más productos
                        </p>
                    </div>";
                } else {
                    echo"
                    <div class='pasar'>
                        <p>
                            <a href='./misproductos.php?pax=$paxante'>Pág anterior</a>
                            <a href='./misproductos.php?pax=$paxd'>Pág Siguiente</a>
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
