<html>
	<head>
		<title>Exer03</title>
	</head>
	<body>			
		<header>
			<h1>Estructuras de control<h1>
            <h2>Exercicio 3</h2>
		</header>
		<section>
			<article>
				<p>Dado un carácter, determinar se é unha vogal.</p>	
                    <?php 
                        $letra = 'e';
                        $vocales = array('a', 'e', 'i', 'o', 'u');
                        if ( in_array($letra, $vocales) ) {
                            echo $letra . " é unha vogal</br>";
                        }   else {
                            echo $letra . " é unha consoante";
                        };
						
						if ( ($letra=='a') || ($letra=='e') || ($letra=='i') || ($letra=='o') || ($letra=='u')) {
                            echo $letra . " é unha vogal";
                        }   else {
                            echo $letra . " é unha consoante";
                        };
                    ?>
			</article>
		</section>
		<footer>
            <p>&copy; IES de Teis</p>
		</footer>
	</body>
</html>