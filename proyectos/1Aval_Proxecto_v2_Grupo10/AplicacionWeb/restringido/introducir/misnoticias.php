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
            <a href="../../login/login.php"><img class="user" src="../../img/user.png"/></a>
        </header>

        <div class="topnav">
			<a href="../../noticias/noticias.php">Noticias</a>
			<a href="../../stats/stats.php">Estadísticas</a>
			<a href="../../tienda/tienda.php">Tienda</a>
			<a href="../../restringido/resindex.php">Restringido</a>
			
        </div>

        <div class="wrap">
            <h1>MIS NOTICIAS</hi>
        </div>

        <div class="options">
            <ul>
                <li><a href="./noticiains.php">Crear Noticia</a></li>
            </ul>
        </div>

        <?php

        include "./arraysrestring.php";

        foreach ($misnoticias as $num => $noticia) {

        $texto = "<div class='content'>
                    <h2>" .$noticia[0]. "</h2>
                    <p>" .$noticia[1]. "</p>
                    <a href='./noticiasext.php'><p>Leer más</p></a>
                </div>";

        $imag = "<img src='" .$noticia[2]. "'/>";

        echo "<div class='noticia'>"; 

        if ($num % 2 == 0) {
            echo "$texto";
            echo "$imag";
        } else {
            echo "$imag";
            echo "$texto";
        }

        echo "<div class='iconitos'>
                <a href='./borrarconfirm.php'><img src='../../img/papelera.png'/></a>
                <a href='./noticiamod.php'><img src='../../img/editar.png'/></a>
            </div>";

        echo "</div>";

        }

        ?>

        <div class="pasar">
            <p>
                <a href="#">Pág anterior</a>
                <a href="#">Pág Siguiente</a>
            <p>
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