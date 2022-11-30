<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>Pruebas</title>
		<link rel="stylesheet" 
        type="text/css" 
        href="../../CSS_AlejandroIglesiasCarpintero.css" 
        media="screen" /> 	
	</head>
	<body>

		<header>
			<h1>MÓDULO DE IAW</h1>
		</header>
		<div>
			<h2>Enunciado</h2>
			<p>Ejer 4 ARRAYS</p>
		</div>

		<div>
			<h2>Resultado</h2>
            <?php 

			function ej3($ej3) {
				if (isset($ej3) && is_array($ej3) && !empty($ej3)){
					echo "<p>" .var_dump($ej3). "</p>";
					echo "<p>" .print_r($ej3). "</p>";
					$mayor= 0;
					foreach ($ej3 as $ciudad => $poblacion) {
						if ($poblacion > $mayor) {
							$ciudadmayor = $ciudad;
							$mayor = $poblacion;
						}
					}
					return $ciudadmayor;
				}else{
					echo "<p>Los datos no son compatibles con la operación</p>";
				}
				
			}

			$ej3 = ["canada" => 50, "holanda" => 49000, "españa" => 5006];
			$ciudad = ej3($ej3);
			echo "<p>La mayor ciudad es $ciudad</p>";

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