<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" type="text/css" href="./CSS_AlejandroIglesiasCarpintero.css" media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>eNUNCIADO</h2>
            <?php

            $producto = 2;
            $calidad = 3;
            $precio = 0;
            if ($producto == 1) {
                if ($calidad == 1) {
                    $precio = 5000;
                }elseif ($calidad == 2) {
                    $precio = 450;
                }elseif ($calidad == 3) {
                    $precio = 4000;
                }
            }elseif ($producto == 2) {
                if ($calidad == 1) {
                    $precio = 4500;
                }elseif ($calidad == 2) {
                    $precio = 4000;
                }elseif ($calidad == 3) {
                    $precio = 3500;
                }
            }elseif ($producto == 3) { 
                if ($calidad == 1) {
                    $precio = 4000;
                }elseif ($calidad == 2) {
                    $precio = 3500;
                }elseif ($calidad == 3) {
                    $precio = 3000;
                }
            }

            ?>

        </br><a href="./index.php">Index</a>
            
		</div>

		<div>
			<h2>Resultado</h2>
			<?php

                echo "El precio a pagar por la calidad $calidad del producto $producto es $precio";

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
