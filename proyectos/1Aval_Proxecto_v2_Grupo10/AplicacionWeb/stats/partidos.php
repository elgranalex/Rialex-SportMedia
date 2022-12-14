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
            <a href="../login/login.php"><img class="user" src="../img/user.png"/></a>
        </header>

        <div class="topnav">
			<a href="../noticias/noticias.php">Noticias</a>
			<a href="../stats/stats.php">Estadísticas</a>
			<a href="../tienda/tienda.php">Tienda</a>
			<a href="../restringido/resindex.php">Restringido</a>
        </div>

        <div class="wrap">
            <h1>PARTIDOS DE LA JORNADA</h1>
        </div>

        <table class="partidosinfo">
            <form>
                <caption>
                <select aria-describedby="searchDropdownDescription" class="nav-search-dropdown searchSelect nav-progressive-attrubute nav-progressive-search-dropdown" data-nav-digest="NovDWLoMJ++FDxkPJG2fksB8LbM=" data-nav-selected="18" id="searchDropdownBox" name="jornada" style="display: block; top: 2.5px;" tabindex="0" title="Buscar jornada">
                        <?php

                            require "arraystats.php";

                            foreach ($jornadas as $jornada) {
                                $textj = "<option value='" .$jornada. "'>Jornada " .$jornada. "</option>";
            
                                echo $textj;
                            }
                        ?>
                </select>
                <button class="css-button-shadow-border-sliding--green" onClick="alert('¡En estos momentos no se puede buscar!')">Buscar</button>

                </caption>
            </form>
           <tbody>

           <?php

                require "arraystats.php";

                foreach ($partidos as $partido) {
                    $text = "<tr>
                    <td class='equipo1'>" .$partido[0]. "</a><img src='" .$partido[1]. "'></td>
                    <td class='marcador'><a href='./infopartido.php'>" .$partido[2]. "-" .$partido[5]. "</a></td>
                    <td class='equipo2'><img src='" .$partido[4]. "'> " .$partido[3]. "</td>
                 </tr>
                    ";

                    echo $text;
                }

            ?>
           </tbody>
       </table>

        <div class="deco">
            <img  src="../img/aspas.jpg"/>
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