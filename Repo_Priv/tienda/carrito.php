<?php
require "../control.php";
if (!isset($_SESSION["usuario"]) || ( !($_SESSION["tipo"] == "root") && !($_SESSION["tipo"] == "periodista") && !($_SESSION["tipo"] == "admin") && !($_SESSION["tipo"] == "normal") && !($_SESSION["tipo"] == "vendedor") ) ) {
    header("Location: ../restringido/sinpermiso.php");
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
			<a href="./tienda.php">Tienda</a>
			<a href="../restringido/resindex.php">Restringido</a>
        </div>

        
            <?php

            $carrito = $_SESSION["carrito"];

            if (!empty($carrito)) {
                
                echo '
                <div class="wrap">
                    <h1>RESUMEN DE TU COMPRA</h1>
                </div>
                ';

                $cont = 0;
                $total = 0;
                $lista = $_SESSION["carrito"];
                foreach ($lista as $item) {
                    $info = producto($item["id"]);


                    $texto = "<div class='jug'>
                        <div class='content'>
                        <h2>" .$info[0]["titulo"]. "</h2>
                        <p>Precio: " .$info[0]["precio"]. "$</p>
                        <p>Cantidad: </p> 
                            <form method='post' action='../control.php'>
                                <input type='number' name='cant' value=" .$item["cant"]. "></input>
                                <input type='hidden' name='table' value='carrito'></input>
                                <input type='hidden' name='id' value='" .$item["id"]. "'></input>
                                <input type='hidden' name='act' value='mod'></input>
                                <input type='submit' value='Cambiar'/>
                            </form>
                            <br/>
                        <a href='./producto.php?id=" .$info[0]["id"]. "'>Ver más</a>
                    </div>
                    <img src='../" .$info[0]["foto"]. "'/>
                    <div class='iconitos'>
                        <a href='../control.php?act=delete&table=carrito&id=" .$info[0]["id"]. "'><img src='../img/papelera.png'/></a>
                    </div>
                    </div>";

                    $total += ($info[0]["precio"]*$item["cant"]);

                    echo "$texto";
                            
                }

                echo "<h2 id='total-compra'>Total de tu compra = $total €</h2>";

                echo '
                <form autocomplete="off" id="carrito" method="post" action="control.php">
                    <button type="submit" name="comprar" action="yes" class="css-button-shadow-border-sliding--green">Confirmar Compra</button>
                </form>
                ';
            } else {
                echo '
                <div class="wrap">
                    <h1>AÚN NO HAS ELEGIDO NADA</h1>
                </div>
                ';
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
