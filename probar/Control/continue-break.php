<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title></title>
		<link rel="stylesheet" type="text/css" href="../CSS_AlejandroIglesiasCarpintero.css" media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>CONTINUE Y BREAK</h2>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php
            $suma = 0;
            for ($i=0; $i < 10; $i++) {
               if ($i == 7) {
                  break;
               }elseif ($i == 4) {
                  continue;
               }
               echo "<p>$suma + $i es ";
               $suma += $i;
               echo "$suma</p>";
            } 
            echo "<p>La suma da igual a $suma</p>";
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