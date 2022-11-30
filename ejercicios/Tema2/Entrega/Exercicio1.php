<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Alejandro Iglesias - Exercicio01</title>
		<link rel="stylesheet" type="text/css" href="./CSS_AlejandroIglesiasCarpintero.css" media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Alejandro Iglesias - Exercicio01</h2>
		</div>

		<div>
			<h2>Resultado</h2>
			<?php

			$hora = 23;
			$min = 59;
			$seg = 59;
			$mins = $min;
			$segs = $seg;
			$horas = $hora;

			if ($seg == 59) {
				$mins = $min+1;
				$segs = 0;
				if ($mins == 60) {
					$horas = $hora+1;
					$mins = 0;
					if ($horas == 24) {
						$mins = 0;
						$segs = 0;
						$horas = 0;
					}
				}
			}else{
				$segs = $seg+1;
			}

			echo "La hora tras las $hora:$min:$seg es $horas:$mins:$segs";

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
