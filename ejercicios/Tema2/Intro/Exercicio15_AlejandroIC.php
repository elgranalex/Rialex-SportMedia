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
            <?php
				const PI= 3.141516;
				const V= true;
				const F= false;
				define ("GRANDE", 456);
				define ("CHIKITO", 456);

				echo "<p> El valor es " .PI. "</p>";
				echo "<p> El valor es " .V. "</p>";
				echo "<p> El valor es " .F. "</p>";
				echo "<p> El valor es " .GRANDE. "</p>";
				echo "<p> El valor es " .CHIKITO. "</p>";

				if (PI == 3.141516){
					echo "<p> Eso es true as fuck we</p>";
				}else{
					echo "<p> Eso es falso we</p>";
				}
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