/* En la tabla se tiene que poner action y el archivo php */
<?php
	include_once('connection.php');
	//Para la conexión que está en ese archivo

/*Para registrarse
Lo que está en rojo son lo que están en name, registrarse es un submit y el resto 
es el name del input.*/

	$enlace=conn()

	if(isset($_POST['registrarse'])){
	$nombre = $_POST["nombre"]
	$correo = $_POST["correo"]
	$id = rand(1,99)
	/*Genera nº aleatorio*/
	$insertardatos = "insert into info (nombre,correo,id) values ('$nombre', '$correo', '$id')";
	
	$ejecutarinstrucciones = mysqli_query($enlace, $insertardatos)
	
	if (!$ejecutarinstrucciones){
		echo "Error en la linea de sql"
	}
	
	}
	
/*Para mostrar datos en una tabla, se tiene que colocar al principio de la tbody*/
/*Al principio del html se pone en php "require 'consultas.php'"*/
	<tbody>
	if(!$ejecutarConsulta){
		echo "error en la consulta"
	}else{
		if($verfilas<1){
			echo "<tr><td>Sin registros</td></tr>"
		}
		else{
			foreach ($ejecutarConsulta as $row){ 
			}
		}
	}?>
				
/*Se ponen las filas htpl por cada fila de datos que devuelva*/
			
				<tr>
					<td><?php echo $row['campo1'];?></td>
					<td><?php echo $row['campo2'];?></td>
					<td><?php echo $row['campo3'];?></td>
					<td><?php echo $row['campo4'];?></td>
				</tr>
	</tbody>