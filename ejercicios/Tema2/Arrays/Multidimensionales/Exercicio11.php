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
			<p>Ejer 11 ARRAYS</p>
			<p> Crea	un	script	que	cree	un	array	bidimensional	de	6x4	de	maneira	que	
cada	 fila	 conteña	 os	 múltiplos	 sucesivos	 múltiplos	 de	 3,	 desde	 este	 en	 adiante.	
Mostrarase	o	contido	do	array	dentro	dunha	táboa.</p>
		</div>

		<div>
			<h2>Resultado</h2>
            <?php 

			function ej111() {
				echo "<table>\n";
				for ($i = 0; $i < 6; $i++) {
					echo "<tr>\n";
					for ($s = 0; $s < 4; $s++) {
						$datos[$i][$s] = 3* ($s +1);
						echo "<td>" .$datos[$i][$s]. "</td>\n";
					}
					echo "</tr>\n";
				}
				echo "</table>\n</br>";
			}

			function ej112() {
				echo "<table>\n";
				$cont = 0;
				for ($i = 0; $i < 6; $i++) {
					echo "<tr>\n";
					for ($s = 0; $s < 4; $s++) {
						$datos[$i][$s] = 3 + $cont;
						echo "<td>" .$datos[$i][$s]. "</td>\n";
						$cont = $datos[$i][$s];
					}
					echo "</tr>\n";
				}
				echo "</table>\n";
			}

			ej111();
			ej112();

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