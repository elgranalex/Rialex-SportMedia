
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" type="text/css" href="./CSS_AlejandroIglesiasCarpintero.css" media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
        <!-- Comentario hrml se ve pero php no -->
			<h2>Enunciado</h2>
            <?php
            // El \n es para pasar de línea en el cod fuente
            /*  El \t coloca un tabulador en el cod html, pero para
                el navegador no vale.
                Print vale para lo mismo que echo 
            */
            $caca = "Me cago en todo";
            $xd ="lo que se menea";
            echo "\t\t\t<p>$caca $xd";
            echo "<p>Posada Marica</p>\n","<p>xd</p>\n";
            print "<p>Posada Marica</p>"."<p>xd</p>";
            echo "<p>Posada Marica</p>\n";
            ?>
            <p>Esto es html puro, manin</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>Posada chupando pinga</p>
		</div>
	
		
		<div class="foot">
			<footer>
				<table>
					<td><h2>Alejandro Iglesias Carpintero</h2></td>
					<td><h2>28/9/2022</h2></td>
				</table>
			</footer>
		</div>
	
	</body>
</html>
