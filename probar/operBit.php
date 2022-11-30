

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
			<p>Operadores de bits</p>
			<p></p>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php
                 echo "<p>Se opera en Binario</p>";

                echo "<p>El 4 es 110</p>";
                echo "<p>El 5 es 111</p>";

                $num1= 4;
                $num2= 5;

                echo "<p>Rdo OR: " .($num1 | $num2). "</p>";
                echo "<p>Rdo AND: " .($num1 & $num2). "</p>";

                $desp= 3;

                echo "<p>Rdo desprazamento de $num1 esq $desp ud: " .($num1 << $desp). "</p>";
                echo "<p>Rdo desprazamento de $num1 dereita $desp ud: " .($num1 >> $desp). "</p>";

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