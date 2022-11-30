<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" type="text/css" href="./CSS_AlejandroIglesiasCarpintero.css" media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Exercicio7</h2>


            
		</div>

		<div>
			<h2>Resultado</h2>
			<?php
            $num1 = 221;
            $coc = $num1;
            $red = $coc;
            $cadea = 0; 

            while ($coc != 0) {
				$red = $coc % 10;
				$coc = floor($coc / 10);
                $cadea = ($cadea * 10) + $red;
            }

			echo "El inverso de $num1 es $cadea";
                       
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
