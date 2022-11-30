
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
			<h2>Arch20</h2>
			<p>Operaciones y max</p>
			<p></p>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php

                echo "<p>Suma: Las primeras sumas y restas se recogen dentro de la 1º var que se pone</p>";

                echo "<ul>";
                
                $num1= 44;
                $num2= 2;

                $rdo= $num1 + $num2;
                echo "<li>Suma: " .$rdo. "</li>";
                $num1 += $num2;
                echo "<li>Suma: " .$num1. "</li><br/>";

                $num1= 44;
                $num2= 2;
                $rdo= $num1 - $num2;
                echo "<li>Resta: " .$rdo. "</li>";
                $num1 -= $num2;
                echo "<li>Resta: " .$num1. "</li><br/>";

                $num1= 44;
                $num2= 2;
                $rdo= $num1 * $num2;
                echo "<li>Multiplicación: " .$rdo. "</li><br/>";

                $rdo= $num1 / $num2;
                echo "<li>División: " .$rdo. "</li>";
                $tipo= gettype($rdo);
                echo "<li>La variable: " .$rdo. " inicialmente es de tipo $tipo</li><br/>";

                /*Se cambia la variable para forzar resultado de decimales*/ 
                $num1= 45;
                $rdo= $num1 / $num2;
                echo "<li>División: " .$rdo. "</p>";
                $tipo= gettype($rdo);
                echo "<li>La variable: " .$rdo. " se ha convertido en tipo $tipo</li><br/>";

                $rdo= $num1 % $num2;
                echo "<li>Resto de la división: " .$rdo. "</li><br/>";

                echo "<li>Valor más alto: " .max(55, -3, 33, -333). "</li>";
                echo "<li>Valor más alto de los valores absolutos: " .max(abs(55), abs(-3), abs(33), abs(-333)). "</li>";

                echo "</ul>"

			?>
			</p>

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