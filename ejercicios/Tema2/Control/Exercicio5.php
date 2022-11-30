<html>
	<head>
		<title>Exer05</title>
	</head>
	<body>			
		<header>
			<h1>Estructuras de control<h1>
            <h2>Exercicio 5</h2>
		</header>
		<section>
			<article>
				<p>Determinar se un número enteiro é par ou impar.</p>	
                    <?php 
                    $numero = "a";
					if (isset($numero)){
						if (is_integer($numero)){
							if (($numero % 2) == 0) {
								echo "$numero é par";
							} else {
								echo "$numero é impar";
							};
						}else{
							echo "No es un entero";
						}
					}else{
						echo "No está definida";
					}
                    ?>
			</article>
		</section>
		<footer>
            <p>&copy; IES de Teis</p>
		</footer>
	</body>
</html>