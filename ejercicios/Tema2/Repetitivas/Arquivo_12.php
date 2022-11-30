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

            echo "<p>Probar while</p>";

            ?>
            
		</div>

		<div>
			<h2>Resultado</h2>
			<?php
			$numinf= 10;
			$num=$numinf;
			$numsup= 20;
			$cont= 0;
			echo "<p>Números del $numinf incluído al $numsup excluído</p>";
			while (($num >= $numinf) && ($num < $numsup)) {
				echo "<p>El número es $num </p>\n";
				$num++;
				$cont++;
			}
			echo "<p>Fin</p>";
			echo "</br>";
			echo "<p>Entre $numinf y $numsup hay $cont números</p>";
            

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
