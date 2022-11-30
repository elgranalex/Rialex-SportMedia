<form action="accion.php" method="post">
 <p>Su nombre: <input type="text" name="nombre" /></p>
 <p>Su edad: <input type="text" name="edad" /></p>
 <p><input type="submit" /></p>
</form>

// Cuando el usuario rellena este formulario y 
oprime el botón de envío, se llama a la página accion.php

Hola <?php echo htmlspecialchars($_POST['nombre']); ?>.
Usted tiene <?php echo (int)$_POST['edad']; ?> años.

<?php
 //1. Crear conexión a la Base de Datos
 $conexion = mysql_connect(”localhost”,”root”,”);
 if (!$conexion) {
 die(”Fallo la conexión a la Base de Datos: ” . mysql_error());
 }
 //2. Seleccionar la Base de Datos a utilizar
 $seleccionar_bd = mysql_select_db(”empresa”, $conexion);
 if (!$seleccionar_bd) {
 die(”Fallo la selección de la Base de Datos: ” . mysql_error());
 }
 //3. Tomar los campos provenientes del Formulario
 $nombre = $_POST['nombre_form'];
 $apellido = $_POST['apellido_form'];
 //4. Insertar campos en la Base de Datos (No inserto el id_empleado ya que se genera automaticamente)
 $insertar = mysql_query(”INSERT INTO empleados (nombre, apellido)
 VALUES (’{$nombre}’, ‘{$apellido}’)”, $conexion);
 if (!$insertar) {
 die(”Fallo en la insercion de registro en la Base de Datos: ” . mysql_error());
 }
 //4. Cerrar conexión a la Base de Datos
 mysql_close($conexion);
 ?>
 
 
 
 


<?php
$db_host="localhost";
$db_user="nombre_de_usuario";
$db_password="contraseña";
$db_name="nombre_de_base_de_datos";
$db_table_name="nombre_de_tabla";
   $db_connection = mysql_connect($db_host, $db_user, $db_password);
 
if (!$db_connection) {
 die('No se ha podido conectar a la base de datos');
}
$subs_name = utf8_decode($_POST['nombre']);
$subs_last = utf8_decode($_POST['apellido']);
$subs_email = utf8_decode($_POST['email']);
 
$resultado=mysql_query("SELECT * FROM ".$db_table_name." WHERE Email = '".$subs_email."'", $db_connection);
 
if (mysql_num_rows($resultado)>0)
{
 
header('Location: Fail.html');
 
} else {
 
 $insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`Nombre` , `Apellido` , `Email`) VALUES ("' . $subs_name . '", "' . $subs_last . '", "' . $subs_email . '")';
 
mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);
 
if (!$retry_value) {
   die('Error: ' . mysql_error());
}
 
header('Location: Success.html');
}
 
mysql_close($db_connection);
 
?>