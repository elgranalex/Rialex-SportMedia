<?php
	define("PI", 3.1415 );

	function suma($num1, $num2) 
	{
		$suma = $num1 + $num2 ;
		return $suma;
	}


	function prezoFinal($valorventa) 
	{
		$valorventa = 55;
		$ivaprecio = $valorventa*21/100;
		$precio= $valorventa + $ivaprecio;
		return "<p>Precio final de $valorventa es $precio</p>";
	}
	

	function cociente(int $num1, int $num2) {
		$resul= $num1/$num2;
		$resto= $num1%$num2;
		echo "<p>El resultado de $num1/$num2 es $resul
		y El resto es $resto</p>";
	}
	

	function transformarHora(int $horas) 
	{
		$horas=5;
		$min= $horas * 60;
		$seg= $min * 60;
		echo "<p> $horas horas equivalen a $min minutos y $seg segundos</p>";
	}
	

	/*Resultados se meten en un array que se desace en 
	variables después */

	function area($r, $alt) 
	{
		$r= 23;
		$alt= 230;
		$resul[0] = round(2*$r*PI*($r+$alt), 2);
		$resul[1] = round($r**PI*$alt, 2);
		return $resul;
	}
	



?>
