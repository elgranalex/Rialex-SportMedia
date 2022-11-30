<html>
	<head>
		<title>Exer07</title>
	</head>
	<body>			
		<header>
			<h1>Estructuras de control<h1>
            <h2>Exercicio 7</h2>
		</header>
		<section>
			<article>
				<p>Dados 3 números enteiros, devolver o número maior.</p>	
                    <?php 
                        $numero = 13;
                        if (($numero%2) == 0) {
                            echo "$numero é par, o doble é " . $numero * 2;
                        }   else {
                            echo "$numero é impar, o triple é " . $numero * 3;
                        };
                    ?>
			</article>
		</section>
		<footer>
            <p>&copy; IES de Teis</p>
		</footer>
	</body>
</html>