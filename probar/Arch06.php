
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
			<h2>Arch06</h2>
			<p>Switch para control</p>
			<p></p>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php
                
                $num1= rand(1,7);
                
                switch($num1){

					case 1:
						$texto="un";
					break;

					case 2:
						$texto="dous";
					break;

					case 3:
						$texto="tres";
						echo "$texto";
					break;

					case 4:
						$texto="cuatrto";
					break;

					case 5:
						$texto="cinco";
					break;

					case 5:
						$texto="cinco";

					break;

					default:
						$texto="algo que no va del 1 al 5";
					break;
				}
				echo "El texto del número $num1 es $texto";
        
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