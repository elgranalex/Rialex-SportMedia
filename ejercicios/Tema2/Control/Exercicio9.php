<html>
	<head>
		<title>Exer09</title>
	</head>
	<body>			
		<header>
			<h1>Estructuras de control<h1>
            <h2>Exercicio 9</h2>
		</header>
		<section>
			<article>
				<p>Ao	introducir	o	valor	dunha	temperatura,	obter	o	tipo	de	clima	segundo	a	seguinte	
táboa</p>	
                    <?php 
                        $temperatura = 31;
                        if ($temperatura < 10) {
                            echo "Frio ${temperatura}º";
                        }   elseif ($temperatura >= 10 and $temperatura <= 20) {
                            echo "Nubrado ${temperatura}º";
                        }   elseif ($temperatura >= 21 and $temperatura <= 30) {
                            echo "Calor ${temperatura}º";
                        }   else {
                            echo "Tropical ${temperatura}º";
                        };
                    ?>
			</article>
		</section>
		<footer>
            <p>&copy; IES de Teis</p>
		</footer>
	</body>
</html>