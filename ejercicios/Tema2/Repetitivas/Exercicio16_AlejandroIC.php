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

			$num = 389849467566;
			$cont = 0;
			$contpares = 0;
			$maior = 0;


			while ($num != 0) {
				$dixito = $num % 10 ;
				$num = floor($num / 10);
				/*La sentencia floor redondea a la baja*/
				$cont++;

				if ($dixito % 2 == 0) {
					$contpares++;
				}

				if ($dixito > $maior) {
					$maior = $dixito;
				
				}

			}

			echo "\t\t\t<ul>\n
					\t\t\t<li>Número de díxitos: $cont</li>\n
					\t\t\t<li>Número de pares: $contpares</li>\n
					\t\t\t<li>Número maior $maior</li>\n
				</ul>\n"

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
