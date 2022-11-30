<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Alejandro Iglesias - Exercicio02</title>
		<link rel="stylesheet" type="text/css" href="./CSS_AlejandroIglesiasCarpintero.css" media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Alejandro Iglesias - Exercicio02</h2>
		</div>

		<div>
			<h2>Resultado</h2>
			<?php

			$dia = 12;
			$mes = 12;

			if( ((21 <= $dia) && ($mes == 12)) 
				|| 
				(($dia <= 20) && ($mes == 3)) 
				|| ($mes == 1) || ($mes == 2) ) {
					echo " el $dia del $mes es invierno";

				}elseif ( ((21 <= $dia) && ($mes == 3)) 
				|| 
				(($dia <= 21) && ($mes == 5)) 
				|| ($mes == 4) ){
					echo " el $dia del $mes es primavera";
				}elseif ( ((22 <= $dia) && ($mes == 5)) 
				|| 
				(($dia <= 22) && ($mes == 9)) 
				|| ($mes == 6) || ($mes == 7) || ($mes == 8) ){
					echo " el $dia del $mes es verano";
				}else {
					echo " el $dia del $mes es Otoño";
				}

			?>

		</br><a href="./index.php">Index</a>
			
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
