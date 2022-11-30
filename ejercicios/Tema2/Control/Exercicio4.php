<html>
	<head>
		<title>Exer04</title>
	</head>
	<body>			
		<header>
			<h1>Estructuras de control<h1>
            <h2>Exercicio 4</h2>
		</header>
		<section>
			<article>
				<p> Determinar se un número é múltiplo de 3 e 5.</p>	
                    <?php 
                        $numero = 12;
                        if (($numero % 5) == 0) {
                            echo "$numero é multiplo de 5";
                        } else {
                            echo "$numero non é multiplo de 5";
                        };
                        echo "<p></p>";
                        if (($numero % 3) == 0) {
                            echo "$numero é multiplo de 3";
                        } else {
                            echo "$numero non é multiplo de 3";
                        };
                    ?>
			</article>
		</section>
		<footer>
            <p>&copy; IES de Teis</p>
		</footer>
	</body>
</html>