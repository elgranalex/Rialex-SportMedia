
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
			<h2>Arch15</h2>
			<p>usar empty</p>
		</div>
		
		<div>
			<h2>Resultado</h2>
			<p>
			<?php
				$b = 1;

				if(empty($b)) {
					echo "<p>Variable b no definida</p>";
				}else{
					echo "<p>Variable b definida con valor $b</p>";
				}

				$a;

				if(empty($a)) {
					echo "<p>Variable a no definida</p>";
				}else{
					echo "<p>Variable a definida con valor $a</p>";
				}

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