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

            

            ?>
            
		</div>

		<div>
			<h2>Resultado</h2>
			<?php
                $seis = 0;
                $cont = 0;

                for (;$cont < 3;$cont++) {
                    $tirada = rand(1,6);
                    switch ($tirada) {
                        case 6:
                            $seis++;
                            break;
                        
                        default:
                            break;
                    }
                    $cont++;

                }

                if ($seis == 1) {
                    echo "Has ganado Bronze, enhorabuena";
                }elseif ($seis == 2) {
                    echo "Has ganado Plata, enhorabuena";
                }elseif ($seis == 3) {
                    echo "Has ganado Oro, enhorabuena";
                }else {
                    echo "Eres un pringao";
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
