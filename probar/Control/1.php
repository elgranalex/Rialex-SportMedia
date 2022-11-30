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
			<h2>Arch20</h2>
			<p>Operadores de control if, elseif o else</p>
			<p></p>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php
                 
                 $aleatorio = rand(1, 15);

                 if ($aleatorio < 5) {
                    echo "<p>Estás suspenso jajajaja bobo</p>\n";
                 }elseif (($aleatorio >= 5) and ($aleatorio < 6)){
                    echo "<p>Aprobao pero casi no</p>\n";
                 }



                 if ($aleatorio == 3){
                    echo "<p>$aleatorio, Te la meto del revés</p>\n";
                 }elseif ($aleatorio == 4){
                    echo "<p>$aleatorio, Por tu culo mi aparato</p>\n";
                 }elseif ($aleatorio == 5){
                    echo "<p>$aleatorio, Por el culo te la hinco</p>\n";
                 }elseif ($aleatorio == 6){
                    echo "<p>$aleatorio, Os la meto y no me veis</p>\n";
                 }elseif ($aleatorio == 7){
                    echo "<p>$aleatorio, Por el culo se te mete</p>\n";
                 }elseif ($aleatorio == 13){
                    echo "<p>$aleatorio, Agárramela que me crece</p>\n";
                 }else{
                    echo "<p>$aleatorio, Lo siento no hay rima</p>\n";
                 }

                 /* En este caso % mira el resto de la división de
                 */
                 if (($aleatorio % 2) == 0) {
                    echo "<p>Es un número par</p>\n";
                 }else{
                    echo "<p>Es un número impar</p>\n";
                 }

                /* Hace exactamente lo mismo que el anterior
                 */
                 echo (($aleatorio % 2) == 0) ? "<p>Es un número par</p>\n" : "<p>Es un número impar</p>\n";

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