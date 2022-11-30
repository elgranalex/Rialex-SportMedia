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
			<p>Ejer 13 control

			</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php

				$numes=2;
				$ano=1700;
				$tipo=gettype($numes);

				if (((0 < $numes) && ($numes <= 12)) && ( $tipo == 'integer')) {

					if ($numes == 1) {
						echo "Enero 31 días";
					}elseif ($numes == 2) {

						if ($ano%400 == 0){
							echo  "Febrero 29 días";
						}else{
							if (($ano%4 == 0) && ($ano%100 != 0)){
								echo  "Febrero 29 días";
							}else{
								echo  "Febrero 28 días";
							}
						}
							
					}

					}elseif ($numes == 3) {
						echo "Marzo 31 días";
					}elseif ($numes == 4) {
						echo "Abril 30 días";
					}else{
						echo "<p>Nº de mes $numes no válido </p>";
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