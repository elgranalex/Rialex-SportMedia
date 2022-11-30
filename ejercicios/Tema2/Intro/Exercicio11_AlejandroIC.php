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

				$nombre1 = $_SERVER['SERVER_NAME'];
				echo "<p>Nombre de server remoto: $nombre1</p>";
				echo "<p>Nombre de server remoto: {$_SERVER['SERVER_NAME']}</p></br>";
				echo "<p>Nombre de server remoto:" .$_SERVER['SERVER_NAME']."</p></br>";
				//De esta manera se meten los arrays entre {}

				$nombre2 = $_SERVER['SERVER_ADDR'];
				echo "<p>Dirección de server remoto: $nombre2</p>";

				$nombre3 = $_SERVER['DOCUMENT_ROOT'];
				echo "<p>Raíz del doc php: $nombre3</p>";

				$nombre4 = $_SERVER['SERVER_PORT'];
				echo "<p>Puerto de server remoto: $nombre4</p>";

				$nombre5 = $_SERVER['PHP_SELF'];
				echo "<p>Script php de server remoto: $nombre5</p>";

				$nombre6 = $_SERVER['REMOTE_ADDR'];
				echo "<p>Dirección de cliente: $nombre6</p>";

				$nombre7 = $_SERVER['REMOTE_PORT'];
				echo "<p>Puerto del cliente: $nombre7</p>";
	

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