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
			<p>Ejer 28</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php

				$num= 1235;
				/*Si start es negativo, la cadena devuelta empezará en 
				start contando desde el final de string.*/ 
				$unidades = substr("$num", -1);
				$decenas = substr("$num", -2,1);
				$centenas = substr("$num", -3,1);
				$millar = substr("$num", -4,1);

				echo "Teniendo un número $num, podemos descomponerlo en
				$num=($unidades * 1) + ($decenas * 10) + ($centenas * 100) +
				($millar * 1000) ";
	
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