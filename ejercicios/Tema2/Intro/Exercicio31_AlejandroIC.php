<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" 
        type="text/css" 
        href="../CSS_AlejandroIglesiasCarpintero.css" 
        media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Enunciado</h2>
			<p>Ejer 31 - FUNCIONES</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php
				include "Exercicio31_func.php";

				$numero1 = 3;
				$numero2 = 5;suma($numero1,$numero2);
				echo "<p>La suma de $numero1 $numero2 es " .suma($numero1,$numero2). "</p>";


				
				$presio = 55;
				$sumaxd = prezoFinal($presio);
				echo "$sumaxd";


				
				$dd1 = 55;
				$dd2 = 5;
				cociente($dd1, $dd2);


				
				$horas = 55;
				transformarHora($horas);

				/*Resultados se meten en un array que se desace en 
				variables después */
				
				$radio = 55;
				$altura = 2;
				$a = area($radio, $altura)[0];
				$v = area($radio, $altura)[1];
				echo "<p>Para un cilindro de radio $radio cm y $altura cm de altura, 
				tendrá un área de $a y volumen de $v</p>";



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