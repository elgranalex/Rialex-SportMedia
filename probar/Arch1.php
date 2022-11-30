
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="./CSS_AlejandroIglesiasCarpintero.css" media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Enunciado</h2>
			<p>Se supone que pondría lo que hay que hacer</p>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php
				$prueba = "Variable fuera de bloque";
				function caramoko()
				{
					/*Usando global mantiene todo el archivo la variable, si no
					si al acabar la función caramoko hay 1 variable que no pilla*/
					global $color;

					require 'Arch1_var.php';
					echo "<p>$prueba</p>";
					
					//Si usamos require en lugar de include y no pila una variable no se ejecutaría más
					echo "<p>unha $froita $color $españa</p>";
				}
				caramoko();

				echo "<p>unha $froita $color $españa</p>";

				//Si ahora pongo otro valor a $color se sobreescribe
				$color = "amarillo";
				echo "<p>unha $color</p>";
				echo "<p>$prueba</p>";
			?>
			</p>
			<!-- En la siguiente se pete solo un echo así fácil -->
			<p> <?= $prueba ?> </p>
		</div>
		
		<div class="foot">
			<footer>
				<table>
					<td><h2>Alejandro Iglesias Carpintero</h2></td>
					<td><h2>12/5/14</h2></td>
				</table>
			</footer>
		</div>
	
	</body>
</html>       