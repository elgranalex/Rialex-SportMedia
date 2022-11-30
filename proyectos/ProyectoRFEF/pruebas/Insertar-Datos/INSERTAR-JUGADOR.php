
<?php
$user = 'invitado';
$password = 'abc123.';
$database = 'rfef';
$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if (!$mysqli) {
 die(”Fallo la conexión a la Base de Datos: ” . mysql_error());
 }
 
$nombrej = $_POST['nombrej'];
$nombree = $_POST['nombree'];
$dorsal = $_POST['dorsal'];
$pos = $_POST['pos'];

	$consulta="select * from equipos where nombre_e like";
	$ejecutarConsulta=mysqli_query($enlace,$consulta);
 if (!$insertar) {
 die(”Fallo en la insercion de registro en la Base de Datos: ” . mysql_error());
 }

 $insertar = mysql_query(”INSERT INTO jugadores (nombre_j, equipo_actual, posicion, dorsal)
 VALUES (’{$nombrej}’, ‘{$nombree}’, ‘{$posicion}’, ‘{$dorsal}’)”, $conexion);
 if (!$insertar) {
 die(”Fallo en la insercion de registro en la Base de Datos: ” . mysql_error());
 }
?>
    
	
	
	
	
	
	
