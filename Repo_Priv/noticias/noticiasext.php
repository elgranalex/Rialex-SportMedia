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
        <link rel="shortcut icon" href="../iconos/favicon.ico">	
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

            ?>
        </header>

        <div class="topnav">
			<a href="./noticias.php">Noticias</a>
			<a href="../stats/stats.php">Estadísticas</a>
			<a href="../tienda/tienda.php">Tienda</a>
			<a href="../restringido/resindex.php">Restringido</a>
			
        </div>

<?php


    $id = validaVbleForm("id");
    $pos = 0;
    
    $noticias = noticiasext($id);
    
    foreach($noticias as $noticia) {
        if ($id == $noticias[$pos]["id"]) {
                            $title = "<div class='wrap'>
                                <h1>" .$noticias[$pos]["titulo"]. "</h1>
                            </div>";

                    $texto = "<div class='cuerpo'>

                                <p>" .$noticias[$pos]["cuerpo"]. "</p>
                                
                                <img src='../" .$noticias[$pos]["foto"]. "'/>

                            </div>";

                        echo "$title";
                        echo "$texto";
                

                    echo "</div>";
            
            $orden = "no";
            $filtrado1 = "";
            $filtrado2 = "";
            $filtrado3 = "";
            $cadena = "";

            $related = noticias($orden,$filtrado1,$filtrado2,$filtrado3,$cadena);
            
            $total = count($related);

            if ($total <= 2 && $total > 0) {

                $title= "<div class='wrap'>
                                <h1>Noticias relacionadas</hi>
                            </div>";
                
                echo "$title";

                for ($i = 0; $i < $total; $i++) {

                    $texto = "<div class='content'>
                                <h2>" .$related[$i]["titulo"]. "</h2>
                                <p>" .$related[$i]["resumen"]. "</p>
                                <p>Hecho por : " .$related[$i]["nombre"]. "</p>
                                <p>Publicada en : " .$related[$i]["fecha"]. "</p>
                                <a href='./noticiasext.php?id=$idnoti'><p>Leer más</p></a>
                            </div>";

                    $imag = "<img src='../" .$related[$i]["foto"]. "'/>";

                    
                    echo "<div class='noticia'>"; 
                    
                    if ($i % 2 == 0) {
                        echo "$texto";
                        echo "$imag";
                    } else {
                        echo "$imag";
                        echo "$texto";
                    }

                    echo "</div>";

                }

            } elseif ($total > 2) {

                $title= "<div class='wrap'>
                                <h1>Noticias relacionadas</hi>
                            </div>";
                
                echo "$title";

                for ($i = 0; $i < 3; $i++) {

                    $idnoti = $i + 1;
                    
                    $texto = "<div class='content'>
                                <h2>" .$related[$i]["titulo"]. "</h2>
                                <p>" .$related[$i]["resumen"]. "</p>
                                <p>Hecho por : " .$related[$i]["nombre"]. "</p>
                                <p>Publicada en : " .$related[$i]["fecha"]. "</p>
                                <a href='./noticiasext.php?id=$idnoti'><p>Leer más</p></a>
                            </div>";

                    $imag = "<img src='../" .$related[$i]["foto"]. "'/>";

                    
                    echo "<div class='noticia'>"; 
                    
                    if ($i % 2 == 0) {
                        echo "$texto";
                        echo "$imag";
                    } else {
                        echo "$imag";
                        echo "$texto";
                    }

                    echo "</div>";

                }

            } elseif ($total == 0) {

                $title= "<div class='wrap'>
                                <h1>No se encuentran noticias relacionadas</hi>
                            </div>";
                
                echo "$title";
            }
        } else {
            $nada = 1;
        }
        
        $pos++;
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