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

			$divisor = 4;
			$num1 = 1;
			$ini = $num1;
			$num2 = 10;
			$cont = 0;

			for ( ;$num1 <= $num2; $num1++) {
				if ($num1 % $divisor == 0) {
					$cont++ ;
				}
			}

            
			echo "
			<ul>
				<li>Entre $ini y $num2 hay $cont múltiplos de $divisor</li>
			</ul>"

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
