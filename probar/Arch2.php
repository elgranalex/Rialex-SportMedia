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
            print "<p>Exercicio 6: a partir do exercicio 4, insire con código HTML unha táboa (co horario completo do
			grupo) entre o primeiro e o segundo parágrafo. Proba a inserir o código coas distintas
			alternativas para identificar código PHP.</p>\n"
            ?>
        </div>

		<div>
			<h2>Resultado</h2>
            <?php
			$num = "5";
			$numero = "1";
            echo "<p>Valor de num $num</p>\n";
			echo "<p>Valor de numero $numero</p>\n";
			echo "Valor suma:" .($num +$numero);
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