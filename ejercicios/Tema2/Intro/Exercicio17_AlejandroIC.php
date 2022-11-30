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
			<p>COJER EL ENTERO DE UNA VARIABLE Y REDONDEO</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php

				$num1=30;
				$num2=6;

				$div=$num1/$num2;
				if ( $div == 7){
					echo "<p> Operación bien hecha</p>";
				}else{
					echo "<p> Definitivamente, eres gilipollas</p>";
					echo "<p>El valor correcto sería</p>";
				}
				
				# Esto hace una suma y le asigna al valor a la 1º var
				$num1 += $num2;
				echo "<p>El valor de var1 ahora es $num1</p>";

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