<?php require "../control.php"; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" 
        content="text/html; charset=utf-8" />
		<title>FootPassion</title>
		<link rel="stylesheet" 
        type="text/css" 
        href="../index.css" 
        media="screen" /> 
        <link rel="shortcut icon" href="../iconos/favicon.ico">	
	</head>
	<body>

		<header>
            <img class="letras" src="../img/letrasheader.png"/>
            <a href="../index.php"><img class="logo" src="../img/LogoProyecto.png"/></a>
            <?php
              $foto = "";
              if (isset($_SESSION["usuario"]) && $_SESSION["usuario"] != "") {
                $usuarios = usuarios($_SESSION["usuario"]);
                foreach ($usuarios as $usuario) {
                    if ($usuario["nombre"] == $_SESSION["usuario"] && $usuario["foto"] != "img/usuarios/" && $usuario["foto"] != "") {
                        // Guardar datos de sesión
                        $foto = "" .$usuario["foto"]. "";
                        echo '<a href="../login/registrado.php?usuario=' .$usuario["IdUsuario"]. '"><img class="user" src="../' .$foto. '"/></a>';
                    }elseif ($usuario["nombre"] == $_SESSION["usuario"] && ( $usuario["foto"] == "img/usuarios/" || $usuario["foto"] == "" )) {
                        // Guardar datos de sesión
                        $foto = "img/user.png";
                        echo '<a href="../login/registrado.php?usuario=' .$usuario["IdUsuario"]. '"><img class="user" src="../' .$foto. '"/></a>';
                    }
                }

              }
              
            if ($foto == "" || $foto == "img/usuarios/") {
                $foto = "img/user.png";
                echo '<a href="../login/login.php"><img class="user" src="../' .$foto. '"/></a>';
             }

            ?>        </header>

        <div class="topnav">
			<a href="../noticias/noticias.php">Noticias</a>
			<a href="../stats/stats.php">Estadísticas</a>
			<a href="../tienda/tienda.php">Tienda</a>
			<a href="../restringido/resindex.php">Restringido</a>
			
        </div>

        <div class="wrap">
            <h1>JUGADORES DE LA LIGA</hi>
        </div>

        <section>
            <form autocomplete="off" action="<?php $_SERVER["PHP_SELF"] ?>" method="get">
                <div class="busqueda">
                    <input type="text" name="cadena" placeholder="Nombre">
                    <button class="css-button-shadow-border-sliding--green">Buscar</button>
                </div>


                <div class="filtro">
                    <div class="checkbox">

                    <input  type="text" name="dorsal" id="titulo" placeholder="Dorsal"/>

                    <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='equipo' title='Ordenar por'>
                        <option value='any'>Cualquiera</option>

                        <?php

                        $equipos = equipos();

                        foreach ($equipos as $equipo) {

                        echo"
                            <option value='" .$equipo["id"]. "'>" .$equipo["nombre_e"]. "</option>
                        ";
                        }
                        ?>

                    
                    </select>

                    <select aria-describedby='searchDropdownDescription' class='select1' id='searchDropdownBox' name='posicion' title='Ordenar por'>
                        <?php

                        echo"
                        <option value='any'>Cualquiera</option>
                        ";

                        $posiciones = posiciones();

                        foreach ($posiciones as $posicion) {

                        echo"
                            <option value='" .$posicion["posicion"]. "'>" .$posicion["posicion"]. "</option>
                        ";

                        }
                        ?>
                    </select>
                    
                        
                    </div>
                </div>

            </form>
        </section>

        <?php
            $equipos = equipos();

            if (isset($_GET["dorsal"]) && $_GET["dorsal"] != "" ) {
                $dorsal = $_GET["dorsal"];
            } else {
                $dorsal = "";
            }
            

            if (isset($_GET["equipo"]) && $_GET["equipo"] != "" && $_GET["equipo"] != "any") {
                $team = $_GET["equipo"];
            } else {
                $team = "";
            }

            if (isset($_GET["posicion"]) && $_GET["posicion"] != "" && $_GET["posicion"] != "any") {

                $posicion = $_GET["posicion"];
            } else {
                $posicion = "";
            }

            if (isset($_GET["cadena"]) && $_GET["cadena"] != "") {

                    $cadena = $_GET["cadena"];
            } else {
                $cadena = "";
            }

            $filtrado = jugadores($team,$posicion,$dorsal,$cadena);

            $total = count($filtrado);


            if  ( isset($_GET['pax']) ) {
                $pax = $_GET['pax'];
            } else {
                $pax = 0;
            }

            if ( $total < ((6 * $pax) +6)) {

                for ($i = (6 * $pax) ; $i < $total; $i++) {

                    foreach($equipos as $equipo) {
                        if ( $equipo["id"] ==  $filtrado[$i]["equipo_actual"] ){
                            $nombreteam = $equipo["nombre_e"];
                        }
                    }

                    $texto = "<div class='content'>
                                <h2>" .$filtrado[$i]["nombre_j"]. "</h2>
                                <p>" .$nombreteam. "</p>
                                <p>Dorsal " .$filtrado[$i]["dorsal"]. "</p>
                                <p>Posición: " .$filtrado[$i]["posicion"]. "</p>
                            </div>";

                    if (isset($filtrado[$i]["foto_jug"]) && $filtrado[$i]["foto_jug"] != "") {
                        $img = $filtrado[$i]["foto_jug"];
                    } else {
                        $img = "img/gigachad.jpg";
                    }
    
                    $imag = "<img src='../$img'/>";
    
                    echo "<div class='jug'>"; 
                    
                    if ($i % 2 == 0) {
                        echo "$texto";
                        echo "$imag";
                    } else {
                        echo "$imag";
                        echo "$texto";
                    }
    
                    echo "</div>";
    
                }

            } else {
                $ultimo = ($pax * 6) + 6;    
                if ( $ultimo > $total){
                        $ultimo = $total;
                    }

                for ($i = (6 * $pax); $i < $ultimo; $i++) {

                    foreach($equipos as $equipo) {
                        if ( $equipo["id"] ==  $filtrado[$i]["equipo_actual"] ){
                            $nombreteam = $equipo["nombre_e"];
                        }
                    }
                    
                    $texto = "<div class='content'>
                                <h2>" .$filtrado[$i]["nombre_j"]. "</h2>
                                <p>" .$nombreteam. "</p>
                                <p>Dorsal " .$filtrado[$i]["dorsal"]. "</p>
                                <p>Posición: " .$filtrado[$i]["posicion"]. "</p>
                            </div>";

                    if (isset($filtrado[$i]["foto_jug"]) && $filtrado[$i]["foto_jug"] != "") {
                        $img = $filtrado[$i]["foto_jug"];
                    } else {
                        $img = "img/gigachad.jpg";
                    }
    
                    $imag = "<img src='../$img'/>";
    
                    echo "<div class='jug'>"; 
                    
                    if ($i % 2 == 0) {
                        echo "$texto";
                        echo "$imag";
                    } else {
                        echo "$imag";
                        echo "$texto";
                    }
    
                    echo "</div>";
                }
            }
            

            $paxante = $pax - 1;

                $paxd = $pax + 1;
            
                if ($pax == 0 && ($pax * 6) + 6 < $total){
                    echo"
                    <div class='pasar'>
                        <p>
                            <a href='./jugadores.php?pax=$paxd&cadena=$cadena&dorsal=$dorsal&equipo=$team&posicion=$posicion'>Pág Siguiente</a>
                        </p>
                    </div>";
                } elseif ($pax != 0 && ($pax * 6) + 6 >= $total){
                    echo"
                    <div class='pasar'>
                        <p>
                            <a href='./jugadores.php?pax=$paxante&cadena=$cadena&dorsal=$dorsal&equipo=$team&posicion=$posicion'>Pág anterior</a>
                        </p>
                    </div>";
                } elseif ($pax == 0 && ($pax * 6) + 6 > $total){
                    echo"
                    <div class='pasar'>
                        <p>No hay más Jugadores
                        </p>
                    </div>";
                } else {
                    echo"
                    <div class='pasar'>
                        <p>
                            <a href='./jugadores.php?pax=$paxante&cadena=$cadena&dorsal=$dorsal&equipo=$team&posicion=$posicion'>Pág anterior</a>
                            <a href='./jugadores.php?pax=$paxd&cadena=$cadena&dorsal=$dorsal&equipo=$team&posicion=$posicion'>Pág Siguiente</a>
                        </p>
                    </div>";
                }

        
        ?>

        <footer class="fixed_footer">
            <div class="footer">
                <h4 class="pPie">Acerca de nosotros</h4>

                <h4 class="pPie">Contacto</h4>

                <h4 class="somos">¿Quiénes somos?</h4>

            </div>
            <div class="footer1">
                <h4 class="pPie">Disfrutaréis de contenido sobre fútbol sin límite</br>
                    resultados, noticias, tienda y mucho más.</h4>

                <h4 class="pPie">+34 777 777 777</h4>

                <h4 class="somos"><a href="../nosotros/nosotros.php">Sobre nosotros</a></h4>
            </div>
            <div class="footer1">
                <h4 class="pPie">Calle Diego Armando Maradona. 25D</h4>

                <h4 class="pPie">info@FootPassion.es</h4>

                <h4 class="somos"></h4>
            </div>
        </footer>

    </footer>
	
	</body>
</html>