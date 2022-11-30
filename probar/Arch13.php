
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
			<h2>Enunciado</h2>
			<p>Se supone que pondría lo que hay que hacer</p>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php
				$a = 1;
				$b = 2;

				function suma()
				{
				//Globals coje la variable global aunqye se cambiara la local
					$b = 7;
					$GLOBALS['b'] = $GLOBALS['a'] + $GLOBALS['b'];
					echo "<p>$b</p>";
				}
				suma();
				echo "<p>$b</p>";
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