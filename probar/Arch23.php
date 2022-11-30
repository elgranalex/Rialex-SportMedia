
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="./CSS_AlejandroIglesiasCarpintero.css" media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Arch20</h2>
			<p>Operaciones y max</p>
			<p></p>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php
                
                $num1= 2;
                $num2= 2;
                $var= $num1 == $num2;

                echo "<p>Esto analiza la variable para que devuelva 1 valor si es 
                verdadero o la que va desppués de los 2 puntos si es falso</p>";
                echo "<p>" .($var)?("verdadeiro"):("falso"). "</p>";


                $num1= 2;
                $num2= "2";
                $var= $num1 === $num2;
                echo "<p>Al poner triple = no basta con ser el mismo valor si
                son de diferente tipo de dato</p>";
                echo "<p>" .($var)?("verdadeiro"):("falso"). "</p>";

                $num1= 2;
                $num2= "2";
                $var= $num1 === $num2;
                $res= "<p>" .(($var)?($num1 + $num2):("No lo voy a sumar")). "</p>";
                echo "<p>$res</p>";

                
                echo "<p>Mismo resultado</p>";
                $num1= 2;
                $num2= 6;
                $var= $num1 + ++$num2;
                echo "<p>$var</p>";
                $num1= 2;
                $num2= 6;
                ++$num2;
                $var= $num1 + $num2 ;
                echo "<p>$var</p>";
        
			?>
			</p>

		</div>
		
		<div class="foot">
			<footer>
				<table>
					<td><h2>Alejandro Iglesias Carpintero</h2></td>
					<td><h2>12/5/14</h2></td>
				</table>
			</footer>
		</div>
	
	</body>
</html>    