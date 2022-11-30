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
				$xd= 6.678356;
				echo "<p> El valor es $xd y su entero es ".(int)$xd."</p>";
				echo "<p> Otra forma de hacer lo anterior
				, su valor es  es ".intval($xd)."</p>";

				echo "<p> El valor es $xd y su redondeo a las décimas 
				 hacia abajo es ".round($xd,1,PHP_ROUND_HALF_DOWN)."</p>";

				echo "<p> El valor es $xd y su redondeo a las centésimas
				 hacia arriba es ".round($xd,2,PHP_ROUND_HALF_UP)."</p>";
		
				

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