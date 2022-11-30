
<?php
$sql = 'CALL match_animal(?, ?)';
$stmt = $conn->prepare($sql);

$second_name = "Rickety Ride";
$weight = 0;

$stmt->bindParam(1, $second_name, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 32);
$stmt->bindParam(2, $weight, PDO::PARAM_INT, 10);

print "Values of bound parameters _before_ CALL:\n";
print "  1: {$second_name} 2: {$weight}\n";

$stmt->execute();

print "Values of bound parameters _after_ CALL:\n";
print "  1: {$second_name} 2: {$weight}\n";
?>


Llame al método PDO::prepare para preparar una sentencia CALL con marcadores de parámetro que 
representen los parámetros OUT e INOUT.

Para cada marcado de parámetro de la sentencia CALL, llame al método PDOStatement::bindParam 
para vincular cada marcador de parámetro con el nombre de la variable de PHP que contendrá el
valor de salida del parámetro después de emitir la sentencia CALL. Para los parámetros INOUT, 
el valor de la variable de PHP se pasa como el valor de entrada del parámetro cuando se emite 
la sentencia CALL.

Establezca el tercer parámetro, data_type, en una de las constantes de PDO::PARAM_* que especifica el tipo de datos que se está vinculando:

PDO::PARAM_NULL
Representa el tipo de datos SQL NULL.

PDO::PARAM_INT
Representa los tipos enteros SQL.

PDO::PARAM_LOB
Representa los tipos de objetos grandes SQL.

PDO::PARAM_STR
Representa los tipos de datos de caracteres SQL.

Para un parámetro INOUT, utilice el operador basado en bits OR para añadir 
PDO::PARAM_INPUT_OUTPUT al tipo de datos que se está vinculando.

Establezca el cuarto parámetro, longitud, en la longitud máxima esperada del valor de salida.
Llame al método PDOStatement::execute, pasando la sentencia preparada como un argumento.