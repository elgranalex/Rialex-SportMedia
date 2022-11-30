
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
			<h2>Arch21</h2>
			<p>Cambio de tipo de una variable</p>
			<p></p>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php

				$var= 55;
				$rdo= (string) $var;
				echo "<p> Tipo ". gettype($rdo) ."; valor: " .$rdo."</p>";

				$var= "hola we";
				$rdo= (int) $var;
				echo "<p> Tipo ". gettype($rdo) ."; valor: " .$rdo."</p>";

				$imposible= 4/0;
				echo "<p> $imposible </p>";
	
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