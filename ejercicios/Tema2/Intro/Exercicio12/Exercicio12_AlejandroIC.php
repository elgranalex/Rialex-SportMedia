<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" 
        type="text/css" 
        href="../CSS_AlejandroIglesiasCarpintero.css" 
        media="screen" /> 	
	</head>
	<body>

		<header>
			<?php
			$modulo = "IAW";
			echo "<h1>MÓDULO DE $modulo</h1>";
			//Ahora es lo mismo pero concatenando
			echo '<h1>MÓDULO DE ' . $modulo . '</h1>';
			?>
		</header>
		<div>
			<h2>Enunciado</h2>
            <?php
            print "<p>Exercicio 6: a partir do exercicio 4, insire con código HTML unha táboa (co horario completo do
			grupo) entre o primeiro e o segundo parágrafo. Proba a inserir o código coas distintas
			alternativas para identificar código PHP.</p>\n"
            ?>
        </div>

		<div>
			<h2>Resultado</h2>
            <?php
			require "Exercicio12_texto1_AlejandroIC.php";
			echo "
			<table>

				<tr>
					<td colspan='6' scope='row'> $ </td>
				</tr>
				<tr>
					<td scope='row'>H</td>
					<td scope='col'>LUN</td>
					<td scope='col'>MAR</td>
					<td scope='col'>MER</td>
					<td scope='col'>XOV</td>
					<td scope='col'>VEN</td>
				</tr>
				<tr>
					<td scope='row'>8:10</td>
					<td rowspan='2'>ASXWD</td>
					<td rowspan='3'>SRI</td>
					<td rowspan='2'>SAD</td>
					<td rowspan='3'>ASO</td>
					<td rowspan='3'>ASO</td>
				</tr>
				<tr>
					<td scope='row'>9:00</td>
				</tr>
				<tr>
					<td scope='row'>9:50</td>
					<td rowspan='2'>ASO</td>
					<td rowspan='2'>IAW</td>
				</tr>
				<tr>
					<td scope='row'>10:40</td>
					<td>SAD</td>
					<td>IAW</td>
					<td>ASXWD</td>
				</tr>
				<tr>
					<td scope='row'>11:30</td>
					<td colspan='5'>RECREO</td>
				</tr>
				<tr>
					<td scope='row'>12:00</td>
					<td>EIE</td>
					<td>SAD</td>
					<td>IAW</td>
					<td>IAW</td>
					<td>ASXBD</td>
				</tr>
				<tr>
					<td scope='row'>12:50</td>
					<td rowspan='3'>SRI</td>
					<td rowspan='2'>EIE</td>
					<td rowspan='2'>SRI</td>
					<td rowspan='2'>SAD</td>
					<td rowspan='2'>IAW</td>
				</tr>
				<tr>
					<td scope='row'>13:40</td>
				</tr>
				<tr>
					<td scope='row'>14:30</td>
				</tr>
			</table>
	";
			require "Exercicio8_texto2_AlejandroIC.php";
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