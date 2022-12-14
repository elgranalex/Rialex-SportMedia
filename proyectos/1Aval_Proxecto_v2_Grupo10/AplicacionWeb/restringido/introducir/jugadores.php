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
            <h1>INTRODUCIR DATOS</hi>
        </div>


		<div class="form-new">
        <form>
            <h4>Datos del jugador</h4>
            <input class="controlador" type="text" name="titulo" id="titulo" placeholder="Nombre"/>
            <input class="controlador" type="text" name="autor" id="autor" placeholder="Equipo"/>
            <input class="controlador" type="text" name="autor" id="autor" placeholder="Dorsal"/>

            <h4>Posición</h4>
            <input class="formradio" type="radio" id="VFGRWEAFV" value="POR" name="POSICION"/>POR
            <input class="formradio" type="radio" id="18a30" value="DFC" name="POSICION"/>DFC
            <input class="formradio" type="radio" id="31a50" value="LD" name="POSICION"/>LD
            <input class="formradio" type="radio" id="mas50" value="LI" name="POSICION">LI
            <input class="formradio" type="radio" id="mas50" value="MD" name="POSICION">MD
            <input class="formradio" type="radio" id="mas50" value="ED" name="POSICION">ED
            <input class="formradio" type="radio" id="mas50" value="EI" name="POSICION">EI
            <input class="formradio" type="radio" id="mas50" value="DC" name="POSICION">DC

            <h4>Nacionalidad</h4>
            <select aria-describedby="searchDropdownDescription" class="select1" id="searchDropdownBox" name="url" title="Buscar jornada">
                <option value="search-alias=jornada1">Español</option>
                <option value="search-alias=jornada2">Resto del mundo</option>
            </select>

            <h4>Introduce Foto</h4>
            <input type="file"  id="foto" value="valor" name="nombre"/>

            <p> Estoy de acuerdo con <a href="#">Terminos y Condiciones </a></p>
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