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
			<p>Ejer 19</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php

				$dni= "53199591Q";
				$num1=1;
				$num2=6;
				$num3=6;
				$num4=2;

				$media= ($num1 + $num2 + $num3 + $num4)/4;

				if($media>=5){
					echo "La media del alumno $dni es $media y está aprobado";
				}else{
					echo "La media del alumno $dni es $media y está suspenso";
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