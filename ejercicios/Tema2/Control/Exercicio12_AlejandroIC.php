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
			<p>Ejer 30

			</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php

				$numes=12;
				$tipo=gettype($numes);
				
				if (((0 < $numes) && ($numes <= 12)) && ( $tipo == 'integer')) {

					if ($numes <= 3) {
						echo "1º trimestre";
					}elseif ($numes <= 6){
						echo "2º Trimestre";
					}elseif ($numes <= 9){
						echo "3º Trimestre";
					}elseif ($numes <= 12){
						echo "4º Trimestre";
					}
				
				}else{
					echo "<p>Nº de mes $numes no válido no válido tipo $tipo</p>";
				};

	
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