<?php	
	function conn(){
	$servidor="localhost"
	$usuario="invitado"
	$clave="Abc123.*"
	$basededatos="rfef"
	
	$enlace = mysql_connect($servidor, $usuario, $clave, $basededatos);
	
	if(!$enlace){
		echo "error en la conexión en el servidor"
	}
	}
?>