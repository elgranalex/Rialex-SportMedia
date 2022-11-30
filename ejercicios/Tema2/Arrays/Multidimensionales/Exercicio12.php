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
			<p>Ejer 12 ARRAYS</p>
			<p> Crea	un	script	que	cree	un	array	bidimensional	de	3x5	de	maneira	que	
cada	 elemento	 do	 array	 conteña	 o	 número	 que	 resulta	 de	 sumar	 o	 número	 que	
identifica	a	columna	co	número	que	identifica	a	fila	do	mesmo.	Mostrarase	o	contido	
do	array	dentro	dunha	táboa.</p>
		</div>

		<div>
			<h2>Resultado</h2>
            <?php 

			function ej12() {
				echo "<table>\n";
				for ($i = 0; $i < 3; $i++) {
					echo "<tr>\n";
					for ($s = 0; $s < 5; $s++) {
						$datos[$i][$s] = $i +$s;
						echo "<td>" .$datos[$i][$s]. "</td>\n";
					}
					echo "</tr>\n";
				}
				echo "</table>\n";
			}

			$tabla = ej12();

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