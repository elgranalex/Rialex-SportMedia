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
			<p>Ejer 13 ARRAYS</p>
		</div>

		<div>
			<h2>Resultado</h2>
            <?php 

			function ejer131($tam) {
				echo "<h1>Esta es la parte 1</h1>\n</br>";
				echo "<table>\n";
				for ($i = 0; $i < $tam; $i++) {
					echo "<tr>\n";
					for ($s = 0; $s < $tam; $s++) {

						if (($s + 1) == ($i + 1)) {
							$datos[$i][$s] = 1;
							echo "<td>" .$datos[$i][$s]. "</td>\n";
						}else{
							$datos[$i][$s] = 0;
							echo "<td>" .$datos[$i][$s]. "</td>\n";
						}
					}
					echo "</tr>\n";
				}
				echo "</table>\n</br>";
			}
			$param = 7;
			$tabla = ejer131($param);


			function ejer132($tam) {
				echo "<h1>Esta es la parte 2</h1>\n</br>";
				echo "<table>\n";
				for ($i = 0; $i < $tam; $i++) {
					echo "<tr>\n";
					for ($s = 0; $s < $tam; $s++) {
						if (($s + 1) == ($i + 1)) {
							$datos[$i][$s] = rand(1,9);
							echo "<td>" .$datos[$i][$s]. "</td>\n";
						}else{
							$datos[$i][$s] = 0;
							echo "<td>" .$datos[$i][$s]. "</td>\n";
						}
					}
					echo "</tr>\n";
				}
				echo "</table>\n</br>";
			}
			$param = 4;
			$tabla = ejer132($param);


			function ejer133($arr) {
				echo "<h1>Esta es la parte 3</h1>\n</br>";
				echo "<table>\n";
				foreach ($arr as $num => $arr2) {
					echo "<tr>\n";
					foreach ($arr2 as $num2 => $valor) {
						echo "<td>$valor</td>";
					}
					echo "</tr>";
				}
				echo "</table>\n</br>";

				foreach ($arr as $num => $arr2) {
					foreach ($arr2 as $num2 => $valor) {
						$arrnuevo[$num2][$num] = $valor;
					}
				}

				print_r($arr);

				echo "<p>Traspuesta<p>\n";

				echo "<table>\n";
				foreach ($arrnuevo as $num => $arr2) {
					echo "<tr>\n";
					foreach ($arr2 as $num2 => $valor) {
						echo "<td>$valor</td>";
					}
					echo "</tr>";
				}
				echo "</table>\n</br>";

			}

			$param = [
				[1,4,5,7,3],
				[1,4,5,7,3],
				[1,4,5,7,3]
			];
			$tabla = ejer133($param);


			function ejer134($arr) {

				echo "<h1>Esta es la parte 4</h1>\n</br>";
				echo "<table>\n";
				foreach ($arr as $num => $arr2) {
					echo "<tr>\n";
					foreach ($arr2 as $num2 => $valor) {
						echo "<td>$valor</td>";
					}
					echo "</tr>";
				}
				echo "</table>\n</br>";

				
				if ((count($arr) > 0) && is_array($arr) && (count($arr) == count($arr[0]))) {

					$noes = 0;
					foreach ($arr as $num => $arr2) {
						foreach ($arr2 as $num2 => $valor) {
							if ($arr[$num][$num2] != $arr[$num2][$num]) {
								$noes = 1;
							}
						}
					}

					if ($noes == 1) {
						echo "<p> Esta matriz no es simétrica</p>";
					}else{
						echo "<p> Esta matriz es simétrica</p>";
					}

				}else{
					echo "<p> Esta no es una matriz cuadrada ni siquiera</p>";
				} 

			}

			$param = [
				[1,4,1],
				[4,4,5],
				[1,5,5]
			];
			$tabla = ejer134($param);

			
			function ejer135($arr1, $arr2, $ope) {
				echo "<h1>Esta es la parte 5 -> $ope</h1>\n</br>";

				if ((count($arr1) == count($arr1[0])) && (count($arr2) == count($arr2[0]))) {
					switch($ope) {
						case "suma":
							$total = count($arr1);
							echo "<table>\n";
							foreach ($arr1 as $num => $arri2) {
								echo "<tr>\n";
								foreach ($arri2 as $num2 => $valor) {
									$suma = $arr1[$num][$num2] + $arr2[$num][$num2];
									echo "<td>$suma</td>";
								}
								echo "</tr>";
							}
							echo "</table>\n</br>";
							break
						;
	
						case "resta":
							$total = count($arr1);
							echo "<table>\n";
							foreach ($arr1 as $num => $arri2) {
								echo "<tr>\n";
								foreach ($arri2 as $num2 => $valor) {
									$suma = $arr1[$num][$num2] - $arr2[$num][$num2];
									echo "<td>$suma</td>";
								}
								echo "</tr>";
							}
							echo "</table>\n</br>";
							break
						;
	
						case "prod":
							$total = count($arr1);
							echo "<table>\n";
							foreach ($arr1 as $num => $arri2) {
								echo "<tr>\n";
								foreach ($arri2 as $num2 => $valor) {
									$suma = $arr1[$num][$num2] + $arr2[$num][$num2];
									$prodesc[$num][$num2] = $valor * 4;
									echo "<td>$suma</td>";
								}
								echo "</tr>";
							}
							echo "</table>\n</br>";
							break
						;

						case "prodesc":
							$total = count($arr1);
							echo "<table>\n";
							foreach ($arr1 as $num => $arri2) {
								echo "<tr>\n";
								foreach ($arri2 as $num2 => $valor) {
									
									echo "<td>$suma</td>";
								}
								echo "</tr>";
							}
							echo "</table>\n</br>";
							break
						;
	
						default:
							echo "<p>Operación no válida</p>"
						;
					}
				}else{
					echo "<p>Arrays inadecuados para las operaciones</p>";
				}
			}

			$op = "prod";

			$arr1 = [
				[1,4,1],
				[2,8,5],
				[1,5,4]
			];

			$arr2 = [
				[1,4,1],
				[4,8,5],
				[1,5,5]
			];

			ejer135($arr1, $arr2, $op);

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