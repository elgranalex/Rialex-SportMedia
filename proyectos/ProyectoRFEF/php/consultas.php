<?php
	require 'connection.php';
	$consulta = 'select nombre_e,win,loose,draw,total from datos order by total';
	$ejecutarConsulta = mysqli_query($enlace, $consulta);
	$verfilas = mysqli_num_rows($ejecutarConsulta);
	$fila = mysqli_fetch_array($ejecutarConsulta);
?>