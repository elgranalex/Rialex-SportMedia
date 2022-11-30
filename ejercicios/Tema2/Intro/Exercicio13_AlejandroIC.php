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
            <?php
            print "<p>Info del servidor en php</p>\n"
            ?>
        </div>

		<div>
			<h2>Resultado</h2>
            <?php

			$var = true ;
			$var1=4;
			$var2="-Isto e unha cadea-";
			$var3=3.56465645;

			$tipo = gettype($var);
			echo "<p>El valor de $var es $tipo</p>";

			if (is_numeric($var)) {
				echo "<p>El valor var es numérico</p>";
			}else{
				echo "<p>El valor var no es numérica</p>";					
			}

			if (is_scalar($var)) {
				echo "<p>El valor var es escalar</p> </br> </br>";
			}else{
				echo "<p>El valor var no es escalar</p> </br> </br>";					
			}





			$tipo = gettype($var1);
			echo "<p>El valor de $var1 es $tipo</p>";

			if (is_numeric($var1)) {
				echo "<p>El valor var1 es numérico</p>";
			}else{
				echo "<p>El valor var1 no es numérica</p>";					
			}

			if (is_scalar($var1)) {
				echo "<p>El valor var1 es escalar</p> </br> </br>";
			}else{
				echo "<p>El valor var1 no es escalar</p> </br> </br>";					
			}



			$tipo = gettype($var2);
			echo "<p>El valor de $var2 es $tipo</p>";

			if (is_numeric($var2)) {
				echo "<p>El valor var2 es numérico</p>";
			}else{
				echo "<p>El valor var2 no es numérica</p>";					
			}

			if (is_scalar($var2)) {
				echo "<p>El valor var2 es escalar</p> </br> </br>";
			}else{
				echo "<p>El valor var2 no es escalar</p> </br> </br>";					
			}




			$tipo = gettype($var3);
			echo "<p>El valor de $var3 es $tipo</p>";

			if (is_numeric($var3)) {
				echo "<p>El valor var3 es numérico</p>";
			}else{
				echo "<p>El valor var3 no es numérica</p>";					
			}

			if (is_scalar($var3)) {
				echo "<p>El valor var3 es escalar</p>";
			}else{
				echo "<p>El valor var3 no es escalar</p>";					
			}

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