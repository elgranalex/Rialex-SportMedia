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
			<h2>Exercicio 6</h2>


            
		</div>

		<div>
			<h2>Resultado</h2>
			<?php
            $num1 = 221;
            $num2 = 284;
            $i = 1;
            $sumdiv1 = 0;
            $sumdiv2 = 0;

            while ($i < $num1) {
                if ($num1 % $i == 0) {
                    $sumdiv1 = $sumdiv1 + $i ;
                }
                $i++;
            }

            $i = 1;

            while ($i < $num2) {
                if ($num2 % $i == 0) {
                    $sumdiv2 = $sumdiv2 + $i ;
                }
                $i++;
            }

            if (($sumdiv1 == $num2) && ($sumdiv2 == $num1)) {
                echo "Los números $num1 y $num2 son HABIBIS";
            }else{
                echo "Los números $num1 y $num2 no son HABIBIS";
            }
            
                       
            ?>

 

        </br><a href="./index.php">Index</a>
			
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
