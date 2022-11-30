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
			<h2>Exercicio5</h2>


            
		</div>

		<div>
			<h2>Resultado</h2>
			<?php
            $numes=6;
            $ano=1702;
            $dia=31;
            $tipo=gettype($numes);
            $completa = "$dia de $numes de $ano" ;
            
            if (((0 < $numes) && ($numes <= 12)) && ( $tipo == 'integer')) {
            
                if (($numes == 1) || ($numes == 3) || ($numes == 5) || ($numes == 7) || ($numes == 8) || ($numes == 10) || ($numes == 12)) {
                    
                    if (($dia >= 1) && ($dia <= 31)){
                        echo "Fecha buena $completa";
                    }else{
                        echo "Fecha mala, día inválido";
                    }

                }elseif ($numes == 2) {
            
                    if ($ano%400 == 0){
                        if (($dia >= 1) && ($dia <= 29)){
                            echo "Fecha buena $completa";
                        }else{
                            echo "Fecha mala, día inválido";
                        }
                    }else{
                        if (($ano%4 == 0) && ($ano%100 != 0)){
                            if (($dia >= 1) && ($dia <= 29)){
                                echo "Fecha buena $completa";
                            }else{
                                echo "Fecha mala, día inválido";
                            }
                        }else{
                            if (($dia >= 1) && ($dia <= 28)){
                                echo "Fecha buena $completa";
                            }else{
                                echo "Fecha mala, día inválido, recuerda que es bisiesto";
                            }
                        }
                    }
                        
                }elseif (($numes == 4) || ($numes == 6) || ($numes == 9) || ($numes == 11)) {
                
                    if (($dia >= 1) && ($dia <= 30)){
                        echo "Fecha buena $completa";
                    }else{
                        echo "Fecha mala, día inválido";
                    }
    
                }else{
                    echo "<p>Nº de mes $numes no válido </p>";
                };

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
