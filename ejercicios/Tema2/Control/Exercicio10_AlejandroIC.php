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

				$cant=rand(5,50);
				$cliente="X";
				$tipo="contado";

				echo "Estructura if";
				if ($cliente == "A") {

					if ($tipo == "contado") {

						$descuento=20;
						$total=$cant - $cant*$descuento/100;
						echo "<p>Pago final de $total, cliente tipo $cliente y precio $cant</p>";

					}elseif ($tipo == "prazos") {
						$recargo=5;
						$total=$cant + $cant*$recargo/100;
						echo "<p>Pago final de $total, cliente tipo $cliente y precio $cant</p>";
					}else{
						echo "<p>Tipo de pago no válido</p>";
					}

				}elseif ($cliente == "X") {

					if ($tipo == "contado") {

						$descuento=15;
						$total=$cant - $cant*$descuento/100;
						echo "<p>Pago final de $total, cliente tipo $cliente y precio $cant</p>";

					}elseif ($tipo == "prazos") {
						$recargo=10;
						$total=$cant + $cant*$recargo/100;
						echo "<p>Pago final de $total, cliente tipo $cliente y precio $cant</p>";
					}else{
						echo "<p>Tipo de pago no válido</p>";
					}

				}else{
					echo "<p>Tipo de cliente no válido</p>";
				};




				echo "Estructura switch";
				/* La función de abajo te da el strin en minúsculsa
				Para ponerlo en mayúsculas es strtoupper
				*/ 
				switch (strtolower($cliente)) {

					case "x":
						switch (strtoupper($tipo)) {
							case "CONTADO":
								$descuento=15;
								$total=$cant - $cant*$descuento/100;
								echo "<p>Pago final de $total, cliente tipo $cliente y precio $cant</p>";
								break;

							case "PRAZOS":
								$recargo=10;
								$total=$cant + $cant*$recargo/100;
								echo "<p>Pago final de $total, cliente tipo $cliente y precio $cant</p>";
								break;

							default :
								echo "<p>Tipo de pago no válido</p>";
								break;
						}
					break;

					case "a":
						switch ($tipo) {
							case "contado":
								$descuento=20;
								$total=$cant - $cant*$descuento/100;
								echo "<p>Pago final de $total, cliente tipo $cliente y precio $cant</p>";
								break;

							case "prazos":
								$recargo=5;
								$total=$cant + $cant*$recargo/100;
								echo "<p>Pago final de $total, cliente tipo $cliente y precio $cant</p>";
								break;

							default :
								echo "<p>Tipo de pago no válido</p>";
								break;
						}
					break;

					default:
						echo "<p>Tipo de cliente no válido</p>";
					break;
				}

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