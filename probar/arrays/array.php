<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" 
        type="text/css" 
        href="../CSS_AlejandroIglesiasCarpintero.css" 
        media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Enunciado</h2>
			<p>PROBAR ARRAY</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php

			/*Orden de notas de pepito
			IAW
			EIE
			ASO
			*/ 
			$notasPepito = [ 7, 9, 3, 8];
			$i = 0;
			$suma = 0;
			$totalNotas = count($notasPepito);
			
			for($i == 0;$i < $totalNotas;$i++) {
				$suma += $notasPepito[$i];
				echo "<p>La $i nota es un " .$notasPepito[$i]. "</p>";
			}
			$media = $suma / $totalNotas;
			echo "<p>La nota media es $media</p>";
			echo "</br>";


			/*Añadimos nombre a cada posición del array
			*/ 
			$notasPepito = ["eie" => 7,"iaw" => 9,"sri" => 3,"asxbd" => 8];
			$i = 0;
			$suma = 0;
			$totalNotas = count($notasPepito);

			echo "<p>Pepito saca un " .$notasPepito["iaw"]. " en IAW</p>";
			echo "<p>Pepito saca un " .$notasPepito["eie"]. " en EIE</p>";
			echo "<p>Pepito saca un " .$notasPepito["sri"]. " en SRI</p>";
			echo "</br>";

			/*cada uno de los valores del array los mete en la variable valor
			*/ 
			foreach($notasPepito as $valor) {
				$suma += $valor;
			}
			$media = $suma / $totalNotas;
			echo "<p>La media es $media</p>";
			echo "</br>";

			/*cada uno de los valores del array los mete en la variable valor
			se mantiene el nombre de la clave que se puso
			*/ 
			$notasPepito = ["eie" => 7,"iaw" => 9,"sri" => 3,"asxbd" => 8];
			$suma = 0;
			$totalNotas = count($notasPepito);

			foreach($notasPepito as $clave => $valor) {
				$suma += $valor;
				echo "<p>La nota de $clave es $valor</p>";
			}
			$media = $suma / $totalNotas;
			echo "<p>La media es $media</p>";
			
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