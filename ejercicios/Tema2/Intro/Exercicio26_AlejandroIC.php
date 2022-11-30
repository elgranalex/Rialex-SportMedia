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
			<p>Ejer 26</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php

				$pesol= 180;
				$alturap= 6;
				$pesokg= $pesol * 0.45359237;
				$alturam= $alturap * 3.2808;
				$imc= round($pesokg / pow($alturam,2),2);

				echo "<p>El IMC de una persona de $pesol libras de 
				peso y $alturap pies de altura es $imc</p>";
	
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