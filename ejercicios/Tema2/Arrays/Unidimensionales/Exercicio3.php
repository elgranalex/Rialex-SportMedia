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
			<p>Ejer 3 ARRAYS</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php 
						function ej1($num) 
						{
							for ($i = 1; $i <= $num; $i++) {
								$random = rand(1,10);
								$arr[$i] = $random;
							}
							return $arr;
						}


						function contar($numcontar, $numero) {
							$contar = 0;
							$count = 1;
							$total = "";
							$ej3 = ej1($numero);

							foreach ($ej3 as $element) {
								echo "<p>nº $count del array es $element</p>";
								$count++;
								$total = "$total$element";
								if ($element == $numcontar) {
									$contar++;
								}
							}
							$resul = [$total, $numcontar, $contar, $ej3];

							return $resul;
						}

						$numero = 15;
						$numcontar = 5;

						$resul = contar($numcontar, $numero);
						
						echo "<p>El conjunto es $resul[0]</p>";
						echo "<p>" .print_r($resul[3]). "</p>";
						echo "<p>El num $resul[1] ha salido $resul[2] veces</p>";

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