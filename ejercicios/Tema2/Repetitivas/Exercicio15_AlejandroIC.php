<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" type="text/css" href="../CSS_AlejandroIglesiasCarpintero.css" media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>eNUNCIADO</h2>
            <?php

            echo "<p>Ej 14</p>";

            ?>
            
		</div>

		<div>
			<h2>Resultado</h2>
			<?php
			$N = 43 ;
			$cont = 0;
			$num = 0;
			while ($num <= $N) {
				if ($num % 5 == 0) {
					echo "<p>$num es múltiplo de 5</p>";
					$cont++;
				}else{
					echo "<p>$num no es múltiplo de 5</p>";				
				}
				$num++;
			}
			echo "<p>El Nº Total de múltiplos de 5 del 0 al $N es de $cont</p>";
            
            ?>
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
