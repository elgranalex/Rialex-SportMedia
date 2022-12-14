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
            <a href="../../login/login.php"><img class="user" src="../../img/user.png"/></a>
        </header>

        <div class="topnav">
			<a href="../../noticias/noticias.php">Noticias</a>
			<a href="../../stats/stats.php">Estadísticas</a>
			<a href="../../tienda/tienda.php">Tienda</a>
			<a href="../resindex.php">Restringido</a>
			
        </div>

        <div class="wrap">
            <h1>INSERTAR PRODUCTOS</hi>
        </div>


		<div class="form-new">
        <form>
            <h4>Introduce el Producto</h4>
            <input class="controlador" type="text" name="titulo" id="titulo" placeholder="Ingrese el Titulo"/>
            <input class="controlador" type="text" name="autor" id="autor" placeholder="Ingrese su Precio"/>
            <textarea class="controlador" rows="10" name="cuerpo" id="cuerpo" placeholder="Ingrese su descripción"></textarea>

            <h4>Introduce tipo</h4>
            <input class="formradio" type="radio" id="menos18" value="Camiseta" name="edad"/>Camiseta
            <input class="formradio" type="radio" id="18a30" value="Merch" name="edad"/>Merch
            <input class="formradio" type="radio" id="31a50" value="Botas" name="edad"/>Botas

            

            <h4>Introduce Foto</h4>
            <input type="file"  id="foto" value="valor" name="nombre"/>

            <p> Estoy de acuerdo con <a href="../term-y-con.php">Terminos y Condiciones </a></p>
            <input class="boton" type="submit" value="Subir"> 
            <input class="boton" type="Reset" value="Reset">
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