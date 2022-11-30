<html>
	<head>
		<title>Exer06</title>
	</head>
	<body>			
		<header>
			<h1>Estructuras de control<h1>
            <h2>Exercicio 6</h2>
		</header>
		<section>
			<article>
				<p>Dados 3 números enteiros, devolver o número maior.</p>	
                    <?php 
                        $numero1 = 11;
                        $numero2 = 2;
                        $numero3 = 1;

                        if ($numero1 < $numero2 ) {
                            if ($numero2 < $numero3){
                                echo "$numero3 es el mayor ";
                            } else {
                                    echo "$numero2 es el mayor";
                            }
                        } elseif ($numero1 < $numero3 ) {
                            echo "$numero3 es el mayor";
                        } else {
                            echo "$numero1 es el mayor";
                        };


                        if ($numero1 < $numero2 ) {
                            if ($numero2 < $numero3){
                                echo "$numero3 es el mayor ";
                            } else {
                                    echo "$numero2 es el mayor";
                            }
                        } elseif ($numero1 < $numero3 ) {
                            echo "$numero3 es el mayor";
                        } else {
                            echo "$numero1 es el mayor";
                        };
                    ?>
			</article>
		</section>
		<footer>
            <p>&copy; IES de Teis</p>
		</footer>
	</body>
</html>