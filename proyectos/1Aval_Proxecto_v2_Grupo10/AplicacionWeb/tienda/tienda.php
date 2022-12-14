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
			<a href="">Tienda</a>
			<a href="../restringido/resindex.php">Restringido</a>
        </div>

        

            <div class="wrap">
                <h1>Escoge un producto</hi>
            </div>

            <section>
                <form autocomplete="off">
                    <div class="busqueda">
                        <input type="text" name="q" placeholder="Buscar">
                        <button class="css-button-shadow-border-sliding--green" onClick="alert('¡En estos momentos no se puede buscar!')">Buscar</button>
                    </div>


                    <div class="filtro">
                        <div class="checkbox">
                            <div>
                                <input type="checkbox" name="checkbox" id="checkbox1">
                                <label for="checkbox1">Camisetas</label>
                            </div>
                            
                            <div>
                                <input type="checkbox" name="checkbox" id="checkbox2">
                                <label for="checkbox2">Merch</label>
                            </div>

                            <div>
                                <input type="checkbox" name="checkbox" id="checkbox3">
                                <label for="checkbox3">Botas</label>
                            </div>

                                <select aria-describedby="searchDropdownDescription" class="select1" id="searchDropdownBox" name="url" title="Ordenar por">
                                    <option value="search-alias=jornada1">Precio Desc</option>
                                    <option value="search-alias=jornada2">Precio Asc</option>
                                    <option value="search-alias=jornada3">Tipo</option>
                                </select>

                            <a href="./carrito.php"><img src="../img/carrito.png" /></a>

                            
                        </div>
                    </div>

                </form>
            </section>

   
            
        <div class="tienda">
             <div class="container-items">

             <?php

                include "arraystienda.php";

                $total = count($producto) - 1;

            if ($total < 8) {

                for ($i = 0; $i < $total; $i++) {

                    $texto = "<a href='./producto.php'>
                                <div class='item'>
                                    <figure>
                                        <img src='" .$producto[$i][4]. "' alt'producto'/>
                                    </figure>
                                    <div class='info-product'>
                                        <h2>" .$producto[$i][0]. "</h2>
                                        <p class='price'>" .$producto[$i][2]. "$</p>
                                        <button>Añadir al carrito</button>
                                    </div>
                                </div>
                            </a>";
    
                    
                        echo "$texto";
                }

            } else {
                for ($i = 1; $i < 8; $i++) {

                    $texto = "<a href='./producto.php'>
                                <div class='item'>
                                    <figure>
                                        <img src='" .$producto[$i][4]. "' alt'producto'/>
                                    </figure>
                                    <div class='info-product'>
                                        <h2>" .$producto[$i][0]. "</h2>
                                        <p class='price'>" .$producto[$i][2]. "$</p>
                                        <button>Añadir al carrito</button>
                                    </div>
                                </div>
                            </a>";
    
                    
                        echo "$texto";
                }
            }
            
            echo "$texto";
                
             ?>
      
      
            </div>
            <div class="pasar">
                <p>
                    <a href="#">Pág anterior</a>
                    <a href="#">Pág Siguiente</a>
                <p>
            </div>
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