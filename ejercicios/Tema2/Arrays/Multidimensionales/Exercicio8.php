<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" 
        type="text/css" 
        href="../../CSS_AlejandroIglesiasCarpintero.css" 
        media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Enunciado</h2>
			<p>Ejer 8 ARRAYS</p>
		</div>

		<div>
			<h2>Resultado</h2>
            <?php 

			$notas["alum1"] = ["eie" => 6, "aso" => 6, "sri" => 6,];
			$notas["alum2"] = ["eie" => 7, "aso" => 9, "sri" => 9,];

			foreach ($notas as $alumno => $notasA) {
				echo "<p>O alumno $alumno tiene las siguientes notas<p>\n";
				echo "<ul>\n";

				foreach ($notasA as $asign => $nota) {
					echo "<li>En $asign ha sacado $nota</li>\n";
				}
				echo "</ul>\n";
			}

			$notas = [
				[6, 6, 6],
				[6, 6, 6]
			];

			for ($i = 0; $i < count($notas); $i++){
				for ($s = 0; $s < count($notas[$i]); $s++) {
				echo "<p>" .$notas[$i][$s]. "</p>";
				}
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