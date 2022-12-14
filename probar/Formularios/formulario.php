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
			<h2>FORMULARIO </h2>
		</div>
		
		<div>
			<p>

			<form action="./respuesta.php" method="GET">
				<h2>Credenciales</h2>
				<p>User  <input type="text" name="user"/></p>
				<p>Password  <input type="text" name="passd"/></p>

				<!-- En checkbox y en radiobutton importante el name -->

				<label>Baloncesto: <input type="checkbox" name="deporte1" value="Baloncesto"/></label>
				<label>Furbo: <input type="checkbox" name="deporte1" value="Furbo"/></label>
				<label>baske: <input type="checkbox" name="deporte2" value="baske"/></label>
				<label>Baloncesto: <input type="checkbox" name="deporte2" value="balonsito"/></label><br/><br/>
				
				<label>Maior: <input type="radio" name="edad" value="maior"/></label>
				<!-- Se pone como valor por defecto la siguiente para que n vaya
				vacío el valor -->
				<label>Menor: <input type="radio" name="edad" value="menor" checked="checked"/></label><br/><br/>

				<label>Estudios
					<select name="Estudios">
						<option>ESO</option>
						<option>Bachillerato</option>
					</select>
				</label><br/><br/>

				<label>Usertype
					<select name="Usertype">
						<option value="1">Admin</option>
						<option value="2">Normal</option>
					</select>
				</label><br/><br/>

				<!--  -->

				<?php

					include "datos.php";
					echo "<label>Usertype
							<select name='Datos'>";
					foreach($tipos as $value) {
						echo "<option value='" .$value[0]. "'>" .$value[1]. "</option>";
					}
					echo "</select>
					</label><br/><br/>";

				?>

				<input type="submit"/>
				<input type="reset"/>
				
			</form>

			<!-- Se le mete en el enlace info a pelo -->
			<p><a href="respuesta.php?num=2">Siguiente</a></p>

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