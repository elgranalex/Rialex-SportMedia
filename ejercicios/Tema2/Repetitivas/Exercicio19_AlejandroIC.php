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

            echo "<p>Ej 19 bucle for</p>";

            ?>
            
		</div>

		<div>
			<h2>Resultado</h2>
			<?php

			$numero = 51;
			$contpar = 0;
			$contimpar = 0;

			for ($i = 1; $i <= $numero; $i++) {
				if ($i % 2 == 0) {
					$contpar++ ;
				}else{
					$contimpar++ ;
				}
			}

            ?>

			<ul>
				<li>Pares <?= $contpar ?></li>
				<li>Impares <?= $contimpar ?></li>
			</ul>
			
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