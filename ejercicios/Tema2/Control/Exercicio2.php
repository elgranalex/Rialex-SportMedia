<html>
	<head>
		<title>Exer02</title>
	</head>
	<body>			
		<header>
			<h1>Estructuras de control<h1>
            <h2>Exercicio 2</h2>
		</header>
		<section>
			<article>
				<p>Determinar se un número enteiro é positivo, negativo ou neutro.</p>	
                    <?php 
                        $a = 0;
                        if ($a > 0){
                            echo "$a es positivo";
                        } elseif ($a < 0){
                            echo "$a es negativo";
                        } else {
                            echo "$a es neutro";
                        };
                    ?>
			</article>
		</section>
		<footer>
            <p>&copy; IES de Teis</p>
		</footer>
	</body>
</html>