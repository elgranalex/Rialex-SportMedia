<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" 
        type="text/css" 
        href="./CSS_AlejandroIglesiasCarpintero.css" 
        media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Enunciado</h2>
			<p>Ejer 30

			</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php

				$num=rand(1,11);

				if (($num >= 1) && ($num <= 9)) {

					switch ($num) {

						case 1:
							echo "<p>$num Uno</p>";
							break;

						case 2:
							echo "<p>$num Dos</p>";
							break;

						case 3:
							echo "<p>$num Tres</p>";
							break;

						case 4:
							echo "<p>$num Cuatro</p>";
							break;


						default:
							echo "<p>$num no es del 5 al 9 incluídos</p>";
							break;
					}

				}else{
					echo "<p>$num no es correcto</p>";
				}
					
	
            ?>
			</p>
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