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
            <h1>MODIFICAR NOTICIA</hi>
        </div>


		<div class="form-new">
        <form>
            <h4>Introduce la Noticia</h4>
            <input class="controlador" type="text" name="titulo" id="titulo" placeholder="Ingrese el Titulo"/>
            <input class="controlador" type="text" name="autor" id="autor" placeholder="Ingrese su Nombre y Apellido"/>
            <textarea class="controlador" rows="20" name="cuerpo" id="cuerpo" placeholder="Ingrese su Nombre y Apellido"></textarea>

            <h4>Introduce tipo</h4>
            <input class="formradio" type="radio" id="menos18" value="menos18" name="edad"/>Menos de 18
            <input class="formradio" type="radio" id="18a30" value="18a30" name="edad"/>18 a 30
            <input class="formradio" type="radio" id="31a50" value="31a50" name="edad"/>31 a 50
            <input class="formradio" type="radio" id="mas50" value="mas50" name="edad">Más de 50

            <h4>Introduce Jornada</h4>
            <select aria-describedby="searchDropdownDescription" class="select1" id="searchDropdownBox" name="url" title="Buscar jornada">
                <option value="search-alias=jornada1">Jornada 1</option>
                <option value="search-alias=jornada2">Jornada 2</option>
                <option value="search-alias=jornada3">Jornada 3</option>
                <option value="search-alias=jornada4">Jornada 4</option>
                <option value="search-alias=jornada5">Jornada 5</option>
                <option value="search-alias=jornada6">Jornada 6</option>
                <option value="search-alias=jornada7">Jornada 7</option>
                <option value="search-alias=jornada8">Jornada  8</option>
                <option value="search-alias=jornada9">Jornada 9</option>
                <option value="search-alias=jornada10">Jornada 10</option>
                <option value="search-alias=jornada11">Jornada 11</option>
                <option value="search-alias=jornada12">Jornada 12</option>
                <option value="search-alias=jornada13">Jornada 13</option>
                <option value="search-alias=jornada14">Jornada 14</option>
                <option value="search-alias=jornada15">Jornada 15</option>
                <option value="search-alias=jornada16">Jornada 16</option>
                <option value="search-alias=jornada17">Jornada 17</option>
                <option value="search-alias=jornada18">Jornada 18</option>
                <option value="search-alias=jornada19">Jornada 19</option>
                <option value="search-alias=jornada20">Jornada 20</option>
                <option value="search-alias=jornada21">Jornada 21</option>
                <option value="search-alias=jornada22">Jornada 22</option>
                <option value="search-alias=jornada23">Jornada 23</option>
                <option value="search-alias=jornada24">Jornada 24</option>
                <option value="search-alias=jornada25">Jornada 25</option>
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