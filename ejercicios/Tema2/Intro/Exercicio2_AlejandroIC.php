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
			<h2>Enunciado</h2>
     
            <p>Exercicio 2: a partir do script anterior substitúe o texto mostrado en HTML por unha sentenza
            echo de php que mostre o texto “O servidor web interpreta correctamente os scripts en php”.
            Na páxina mostrada no navegador consulta o código fonte e responde ás seguintes cuestións:</p>
            <p>– Aparece código en PHP?</p>
            <p>– Que tipo de código aparece?</p>
            <p>– Cal é a razón de que apareza a páxina escrita neste código?</p>
		</div>

		<div>
			<h2>Resultado</h2>
            <?php
			echo "<p>El server funciona correctamente</p>";
            echo "<p>El código no aparece en PHP, aparece en html</p>";
            echo "<p>El servidor interpreta el cod PHP de el script para devolverlo en html</p>"
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