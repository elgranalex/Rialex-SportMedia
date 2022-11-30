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
			<p>PROBAR FUNCIÓN</p>
		</div>

		<div>
			<h2>Resultado</h2>
			<p>
            <?php

				$global = 33;

				function imprimirc() {
					echo "<p>Empresa Pepito </p>";
					echo "<p>A tu servicio desde el año 33</p>";
				}

				#Ejecutar funcion
				imprimirc();

				include 'mates.php';
				$op1 = 3;
				$op2 = 0;
				$opci = '/' ;

				suma($op1, $op2);
				resta($op1, $op2);
				multi($op1, $op2);
				div($op1, $op2);

				todo($op1, $op2);





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