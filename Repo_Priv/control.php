<?php

session_start();

if (!isset($_SESSION["tipo"])) {
    $_SESSION["tipo"] = "random";
}

function validaVbleForm($var)
{
    if (!isset($_REQUEST[$var])) {
        $tmp = "";
    } elseif (!is_array($_REQUEST[$var])) {
        $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
        $tmp = $_REQUEST[$var];
        array_walk_recursive($tmp, function (&$valor) {
            $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
        });
    }
    return $tmp;
}


function nextid($var)
{
    $datosuser = parse_ini_file("coonfig.ini", true);

    $db = mysqli_connect($datosuser["root"]["Server"], $datosuser["root"]["User"],  $datosuser["root"]["Password"], $datosuser["root"]["Database"]);
    if ($db) {

        $mod = "
        SELECT `AUTO_INCREMENT`
        FROM  INFORMATION_SCHEMA.TABLES
        WHERE TABLE_SCHEMA = 'grupo10'
        AND   TABLE_NAME   = '$var';
        ";

        $res = mysqli_query($db, $mod);

        $id = array();

        while ($fila = mysqli_fetch_assoc($res)) {
            array_push($id, $fila);
        }

        if ($res) {
            mysqli_close($db);

        }

        return $id;
    }
}



function foto($carpeta,$id){
    if (isset($_FILES) ) {
        foreach ($_FILES as $file) {
            if ($file['error'] === UPLOAD_ERR_OK ){
                $arqRutaTmp = $file['tmp_name'];
                $arqNome = $file['name'];
                $arqTam = $file['size'];
                $arqTipo = $file['type'];
                $arqNomeCmps = explode(".", $arqNome);
                $arqExtension = strtolower(end($arqNomeCmps));
                $arqNome = $id.".".$arqExtension;
                $extensionsPermitidas = array('jpg', 'png','jpeg');
                if (in_array($arqExtension, $extensionsPermitidas)) {
                    $dirSubida = "./img/$carpeta/";
                    $rutaDestino = $dirSubida . $arqNome;
                    if(move_uploaded_file($arqRutaTmp, $rutaDestino)) {
                        $message = 'Arquivo ' .$arqNome. ' subido correctamente.<br/>';
                        return $arqNome;
                    } else {
                        $message = "Error en el envío del archivo $arqNome <br/>";
                        echo $message;
                    }
                } else {
                    $message = "La extensión $arqExtension no es válida <br/>";
                    echo $message;
                }
            }
        }
    }
}

if (isset($_SESSION["tipo"])) {
    $user = $_SESSION["tipo"];
} else {
    $user = "normal";
}


require "arrays.php";

if ( ( isset($_POST["act"]) && $_POST["act"] == "login" &&
isset($_POST["nombre"]) && $_POST["nombre"] != "" &&
isset($_POST["password"]) && $_POST["password"] != "" ) ) {

    $usuarios = usuarios($_POST["nombre"]);
    foreach ($usuarios as $usuario) {
        if ($usuario["nombre"] == $_POST["nombre"] && $usuario["password"] == $_POST["password"]) {
            // Guardar datos de sesión
            $_SESSION["usuario"] = $usuario["nombre"];
            $_SESSION["id"] = $usuario["IdUsuario"];
            $_SESSION["tipo"] = $usuario["tipo"];
            $carrito = array();
            $_SESSION["carrito"] = $carrito;
            header("Location: index.php");
        }
    }

    if (!$_SESSION["usuario"]) {
        header("Location: ./login/login.php?error=other");
    }

} elseif ( isset($_POST["act"]) && $_POST["act"] == "login" && isset($_POST["nombre"]) && isset($_POST["password"])) {
    header("Location: ./login/login.php?error=other");
}


if ( isset($_GET["exit"]) && $_GET["exit"] == "yes") {

    session_destroy();
    header("Location: index.php");

}

$exitcode = "si";

if (( isset($_POST["table"]) && $_POST["table"] != "" &&
isset($_POST["act"]) && 
( $_POST["act"] == "new" || $_POST["act"] == "mod" || $_POST["act"] == "delete" ) ) || isset($_GET["act"]) && $_GET["act"] == "fin"  ||
( isset($_GET["id"]) && isset($_GET["table"]) && $_GET["table"] == "carrito" &&  $_GET["act"] == "delete") ) {


    $act = validaVbleForm("act");
    
    $tabla = validaVbleForm("table");
    
    if ($tabla == "goles"){

        if ( $act == "new" ) {

            $datosuser = parse_ini_file("coonfig.ini", true);

            $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
            if ($db) {

                $insert = '
                insert into goles (minuto,cod_partido,n_licencia_j,asistencia,tipo) 
                values
                (' .$_POST["minuto"]. ',' .$_POST["partido"]. ',' .$_POST["jugador"]. ',' .$_POST["asistencia"]. ',"' .$_POST["tipo"]. '");
                ';

                $res = mysqli_query($db, $insert);

                if ($res) {
                    mysqli_close($db);

                    header("Location: restringido/admnliga/golesins.php?act=new&state=ok&partido=" .$_POST["partido"]. "");
                }
            }

        } elseif ( $act == "mod" ) {

            $id = $_POST["id"];

            $goles = gol($id);

            foreach ($goles as $gol) {
                if ($id == $gol["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        $delete = '
                        update goles
                        set minuto="' .$_POST["minuto"]. '", n_licencia_j="' .$_POST["jugador"]. '", asistencia=' .$_POST["asistencia"]. ', cod_partido="' .$_POST["partido"]. '", tipo="' .$_POST["tipo"]. '"
                        where id=' .$gol["id"]. ';
                        ';

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/golesins.php?act=new&state=ok");
                        }
                    }
                    header("Location: restringido/admnliga/golesins.php?id=$id&act=mod&state=ok");
                    $exitcode = "no";
                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        } elseif ( $act == "delete" ) {

            $id = $_POST["id"];

            $goles = gol($id);

            $cont = 0;

            foreach ($goles as $gol) {
                if ($id == $gol["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        $delete = '
                        delete from goles
                        where id=' .$gol["id"]. ';
                        ';

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/golesins.php?act=new&state=ok");
                        }
                    }
                    header("Location: restringido/admnliga/golesins.php?id=$id&act=delete&state=ok");
                    $exitcode = "no";
                }
                $cont++;
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        }

    } elseif ($tabla == "noticias") {

        if ( $act == "new" ) {

            $datosuser = parse_ini_file("coonfig.ini", true);

            $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
            if ($db) {

                $resul = nextid("noticias");
                $id = $resul[0]["AUTO_INCREMENT"];


                if (isset($_FILES["foto"]["name"]) && $_FILES["foto"]["name"] != "") {
                    $foto = "img/noticias/".foto("noticias",$id);
                } else {
                    $foto = "";
                }

                $insert = '
                insert into noticias (resumen,titulo,foto,cuerpo,keywords,IdUsuario,fecha) 
                values
                ("' .$_POST["resumen"]. '","' .$_POST["titulo"]. '","' .$foto. '","' .$_POST["cuerpo"]. '","' .$_POST["keywords"]. '",' .$_POST["IdUsuario"]. ',  now());
                ';

                $res = mysqli_query($db, $insert);

                if ($res) {
                    mysqli_close($db);

                    header("Location: restringido/introducir/noticiains.php?act=new&state=ok");
                    $exitcode = "no";

                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }


        } elseif ( $act == "mod" ) {

            $id = $_POST["id"];

            $noticias = noticiasext($id);

            foreach ($noticias as $noticia) {
                if ($id == $noticia["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if (isset($_FILES["foto"]["name"]) && $_FILES["foto"]["name"] != "") {
                            $actual = $noticia["foto"];
                            $nueva = $_FILES["foto"]['name'];
                            if ($actual == $nueva){
                                $foto = $actual;
                            } else {
                                $eliminar = $actual;
                                unlink($eliminar);
                                $foto = "img/noticias/".foto("noticias",$id);
                            }
                        } else {
                            $foto = $noticia["foto"];
                        }

                        $mod = '
                        update noticias
                        set resumen="' .$_POST["resumen"]. '", titulo="' .$_POST["titulo"]. '", cuerpo="' .$_POST["cuerpo"]. '", foto="' .$foto. '", keywords="' .$_POST["keywords"]. '", fecha = now()
                        where id = ' .$noticia["id"]. ' ;
                        ';

                        $res = mysqli_query($db, $mod);

                        if ($res) {
                            mysqli_close($db);
                            header("Location: restringido/introducir/noticiains.php?act=mod&state=ok");
                        }
                    }
                    $exitcode = "no";
                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        } elseif ( $act == "delete" ) {

            $id = $_POST["id"];

            $noticias = noticiasext($id);

            $cont = 0;

            foreach ($noticias as $noticia) {
                if ($id == $noticia["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if ( $noticia["foto"] != "" && $noticia["foto"] != "" ) {
                            unlink($noticia["foto"]);
                        }

                        $delete = '
                        delete from noticias
                        where id=' .$noticia["id"]. ';
                        ';

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/introducir/noticiains.php?id=$id&act=delete&state=ok&");
                        }
                    }

                    $exitcode = "no";
                }

                if ($exitcode == "si") {
                    echo "error en el envío";
                }

                $cont++;
            }

        }

    } elseif ($tabla == "productos"){

        if ( $act == "new" ) {

            $datosuser = parse_ini_file("coonfig.ini", true);

            $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
            if ($db) {

                $resul = nextid("productos");
                $id = $resul[0]["AUTO_INCREMENT"];

                if (isset($_FILES["foto"]["name"]) && $_FILES["foto"]["name"] != "") {
                    $foto = "img/productos/".foto("productos",$id);
                } else {
                    $foto = "";
                }

                $insert = '
                insert into productos (titulo,precio,foto,keywords,descripcion,IdUsuario,fecha) 
                values
                ("' .$_POST["titulo"]. '","' .$_POST["precio"]. '","' .$foto. '","' .$_POST["keywords"]. '","' .$_POST["descripcion"]. '",' .$_POST["IdUsuario"]. ',now());
                ';

                $res = mysqli_query($db, $insert);

                if ($res) {
                    mysqli_close($db);

                    header("Location: restringido/introducir/productosins.php?act=new&state=ok");
                    $exitcode = "no";

                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }


        } elseif ( $act == "mod" ) {

            $id = $_POST["id"];

            $productos = producto($id);

            foreach ($productos as $producto) {
                if ($id == $producto["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if (isset($_FILES["foto"]["name"]) && $_FILES["foto"]["name"] != "") {
                            $actual = $producto["foto"];
                            $nueva = $_FILES["foto"]['name'];
                            if ($actual == $nueva){
                                $foto = $actual;
                            } else {
                                $eliminar = $actual;
                                unlink($eliminar);
                                $foto = "img/productos/".foto("productos",$id);
                            }
                        } else {
                            $foto = $producto["foto"];
                        }


                        $mod = '
                        update productos
                        set titulo="' .$_POST["titulo"]. '", precio="' .$_POST["precio"]. '", descripcion="' .$_POST["descripcion"]. '", foto="' .$foto. '", keywords="' .$_POST["keywords"]. '", IdUsuario=' .$_POST["IdUsuario"]. ', fecha = now()
                        where id = ' .$producto["id"]. ' ;
                        ';

                        $res = mysqli_query($db, $mod);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/introducir/productosins.php?act=new&state=ok");
                        }
                    }
                    header("Location: restringido/introducir/productosins.php?id=$id&act=mod&state=ok");
                    $exitcode = "no";
                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        } elseif ( $act == "delete" ) {

            $id = $_POST["id"];

            $productos = producto($id);

            $cont = 0;

            foreach ($productos as $producto) {
                if ($id == $producto["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if ( $producto["foto"] != "" ) {
                            unlink($producto["foto"]);
                        }

                        $delete = '
                        delete from productos
                        where id=' .$producto["id"]. ';
                        ';

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/introducir/productosins.php?id=$id&act=delete&state=ok");
                        }
                    }

                    $exitcode = "no";
                }

                if ($exitcode == "si") {
                    echo "error en el envío";
                }

                $cont++;
            }

        }

    } elseif ($tabla == "partidos"){


        if ( $act == "new" ) {

            $datosuser = parse_ini_file("coonfig.ini", true);

            $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
            if ($db) {

                /*
                if(isset($_FILES)){
                    $foto = "img/partidos/".foto("productos");
                } else {
                    $foto = "";
                }
                */

                if ($_POST["arbitro"] == "desconocido") {
                    $arbitro = "";
                } else {
                    $arbitro = $_POST["arbitro"];
                }

                $insert = '
                insert into partidos (fecha,hora,e_local,e_visitante,arbitro,jornada) 
                values
                ("' .$_POST["fecha"]. '","' .$_POST["hora"]. '","' .$_POST["e_local"]. '","' .$_POST["e_visitante"]. '","' .$arbitro. '","' .$_POST["jornada"]. '");
                ';

                $res = mysqli_query($db, $insert);

                if ($res) {
                    mysqli_close($db);

                    header("Location: restringido/admnliga/partidosins.php?act=new&state=ok");
                    $exitcode = "no";

                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }


        } elseif ( $act == "mod" ) {

            $id = $_POST["id"];

            $partidos = partido($id);

            foreach ($partidos as $partido) {
                if ($id == $partido["cod"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if ($_POST["arbitro"] == "desconocido") {
                            $arbitro = "";
                        } else {
                            $arbitro = $_POST["arbitro"];
                        }

                        $mod = '
                        update partidos
                        set fecha="' .$_POST["fecha"]. '",arbitro=' .$arbitro. ', hora="' .$_POST["hora"]. '", jornada="' .$_POST["jornada"]. '", e_local="' .$_POST["e_local"]. '", e_visitante="' .$_POST["e_visitante"]. '"
                        where cod=' .$partido["cod"]. ' ;
                        ';

                        $res = mysqli_query($db, $mod);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/partidosins.php?act=mod&state=ok");
                        }
                    }
                    $exitcode = "no";
                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        } elseif ( $act == "delete" ) {

            $id = $_POST["id"];

            $cont = 0;

            $partidos = partido($id);

            foreach ($partidos as $partido) {
                if ($id == $partido["cod"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        $delete = '
                        delete from partidos
                        where cod=' .$partido["cod"]. ';
                        ';

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/partidosins.php?id=$id&act=delete&state=ok");
                        }
                    }

                    $exitcode = "no";
                }

                if ($exitcode == "si") {
                    echo "error en el envío";
                }

                $cont++;
            }

        }

    } elseif ($tabla == "equipos"){


        if ( $act == "new" ) {

            $datosuser = parse_ini_file("coonfig.ini", true);

            $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
            if ($db) {

                $resul = nextid("equipos");
                $id = $resul[0]["AUTO_INCREMENT"];

                if (isset($_FILES["escudo"]["name"]) && $_FILES["escudo"]["name"] != "") {
                    $foto = "img/escudos/".foto("escudos",$id);
                } else {
                    $foto = "";
                }

                $insert = '
                insert into equipos (nombre_e,abreviatura,entrenador,presidente,escudo,estadio,presupuesto_e) 
                values
                ("' .$_POST["nombre_e"]. '","' .$_POST["abreviatura"]. '","' .$_POST["entrenador"]. '","' .$_POST["presidente"]. '","' .$foto. '","' .$_POST["estadio"]. '","' .$_POST["presupuesto_e"]. '");
                ';

                echo $insert;

                $res = mysqli_query($db, $insert);

                if ($res) {
                    mysqli_close($db);

                    header("Location: restringido/admnliga/equiposins.php?act=new&state=ok");
                }
            }

        } elseif ( $act == "mod" ) {

            $id = $_POST["id"];

            $equipos = equipo($id);

            foreach ($equipos as $equipo) {
                if ($id == $equipo["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if (isset($_FILES["escudo"]["name"]) && $_FILES["escudo"]["name"] != "") {
                            $actual = $equipo["escudo"];
                            $nueva = $_FILES["escudo"]['name'];
                            if ($actual == $nueva){
                                $foto = $actual;
                            }elseif ($actual == ""){
                                $foto = "img/escudos/".foto("escudos",$id);
                            } else {
                                $eliminar = $actual;
                                unlink($eliminar);
                                $foto = "img/escudos/".foto("escudos",$id);
                            }
                        } else {
                            $foto = $equipo["escudo"];
                        }

                        $update = '
                        update equipos
                        set nombre_e="' .$_POST["nombre_e"]. '", abreviatura="' .$_POST["abreviatura"]. '", entrenador="' .$_POST["entrenador"]. '", escudo="' .$foto. '", estadio="' .$_POST["estadio"]. '", presupuesto_e="' .$_POST["presupuesto_e"]. '", presidente="' .$_POST["presidente"]. '"
                        where id=' .$equipo["id"]. ';
                        ';

                        $res = mysqli_query($db, $update);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/equiposins.php?act=mod&id=$id");
                        }
                    }
                    header("Location: restringido/admnliga/equiposins.php?act=mod&id=$id");
                    $exitcode = "no";
                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        } elseif ( $act == "delete" ) {

            $id = $_POST["id"];

            $equipos = equipo($id);

            $cont = 0;

            foreach ($equipos as $equipo) {
                if ($id == $equipo["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if ( $equipo["escudo"] != "" ) {
                            unlink($equipo["escudo"]);
                        }

                        $delete = '
                        delete from equipos
                        where id=' .$equipo["id"]. ';
                        ';

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/equiposins.php?act=new&state=ok");
                        }
                    }
                    header("Location: restringido/admnliga/equiposins.php?id=$id&act=delete&state=ok");
                    $exitcode = "no";
                }
                $cont++;
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }
        }
       
    } elseif ($tabla == "jugadores"){


        if ( $act == "new" ) {

            $datosuser = parse_ini_file("coonfig.ini", true);

            $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
            if ($db) {

                $resul = nextid("jugadores");
                $id = $resul[0]["AUTO_INCREMENT"];

                if (isset($_FILES["foto_jug"]["name"]) && $_FILES["foto_jug"]["name"] != "") {
                    $foto = "img/jugadores/".foto("jugadores",$id);
                } else {
                    $foto = "";
                }

                print_r($_POST);

                $insert = '
                insert into jugadores (nombre_j,equipo_actual,valor_mercado,posicion,foto_jug,dorsal) 
                values
                ("' .$_POST["nombre_j"]. '",' .$_POST["equipo_actual"]. ',"' .$_POST["valor_mercado"]. '","' .$_POST["posicion"]. '","' .$foto. '","' .$_POST["dorsal"]. '");
                ';

                $res = mysqli_query($db, $insert);

                if ($res) {
                    mysqli_close($db);

                    header("Location: restringido/admnliga/jugadoresins.php?act=new&state=ok");
                }
            }

        } elseif ( $act == "mod" ) {

            $id = $_POST["id"];

            $jugadores = jugador($id);

            foreach ($jugadores as $jugador) {
                if ($id == $jugador["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if (isset($_FILES["foto_jug"]["name"]) && $_FILES["foto_jug"]["name"] != "") {
                            $actual = $jugador["foto_jug"];
                            $nueva = $_FILES["foto_jug"]['name'];
                            if ($actual == $nueva){
                                $foto = $actual;
                            }elseif ($actual == ""){
                                $foto = "img/jugadores/".foto("jugadores",$id);
                            } else {
                                $eliminar = $actual;
                                unlink($eliminar);
                                $foto = "img/jugadores/".foto("jugadores",$id);
                            }
                        } else {
                            $foto = $jugador["foto_jug"];
                        }

                        $delete = '
                        update jugadores
                        set nombre_j="' .$_POST["nombre_j"]. '", equipo_actual=' .$_POST["equipo_actual"]. ', valor_mercado=' .$_POST["valor_mercado"]. ', posicion="' .$_POST["posicion"]. '", foto_jug="' .$foto. '", dorsal="' .$_POST["dorsal"]. '"
                        where id=' .$jugador["id"]. ';
                        ';

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/jugadoresins.php?act=new&state=ok");
                        }
                    }
                    header("Location: restringido/admnliga/jugadoresins.php?id=$id&act=mod&state=ok");
                    $exitcode = "no";
                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        } elseif ( $act == "delete" ) {

            $id = $_POST["id"];

            $jugadores = jugador($id);

            $cont = 0;

            foreach ($jugadores as $jugador) {
                if ($id == $jugador["id"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if ( $jugador["foto_jug"] != "" ) {
                            unlink($jugador["foto_jug"]);
                        }

                        $delete = '
                        delete from jugadores
                        where id=' .$jugador["id"]. ';
                        ';

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/jugadoresins.php?act=new&state=ok");
                        }
                    }
                    header("Location: restringido/admnliga/jugadoresins.php?id=$id&act=delete&state=ok");
                    $exitcode = "no";
                }
                $cont++;
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }
        }
       
    } elseif ($tabla == "tarjetas"){

        if ( $act == "new" ) {

            $datosuser = parse_ini_file("coonfig.ini", true);

            $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
            if ($db) {

                $insert = '
                insert into tarjetas (minuto,cod_partido,n_licencia_j,tipo,motivo) 
                values
                ("' .$_POST["minuto"]. '", ' .$_POST["partido"]. ' , ' .$_POST["jugador"]. ' ,"' .$_POST["tipo"]. '"," ' .$_POST["motivo"]. '");
                ';

                echo "</br></br></br>".$insert."</br></br></br>";

                $res = mysqli_query($db, $insert);

                if ($res) {
                    mysqli_close($db);

                    header("Location: restringido/admnliga/tarjetasins.php?act=new&state=ok&partido=" .$_POST["partido"]. "");
                }
            }

        } elseif ( $act == "mod" ) {

            $id = $_POST["id"];
            $tarjetas = tarjeta($id);

            foreach ($tarjetas as $tarjeta) {
                if ($id == $tarjeta["cod"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        $update = '
                        update tarjetas
                        set minuto="' .$_POST["minuto"]. '", n_licencia_j=' .$_POST["jugador"]. ', tipo="' .$_POST["tipo"]. '", cod_partido=' .$_POST["partido"]. ', motivo="' .$_POST["motivo"]. '"
                        where cod=' .$tarjeta["cod"]. ';
                        ';

                        echo $update;

                        $res = mysqli_query($db, $update);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/tarjetasins.php?act=mod&state=ok");
                        }
                    }
                    header("Location: restringido/admnliga/tarjetasins.php?id=$id&act=mod&state=ok");
                    $exitcode = "no";
                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        } elseif ( $act == "delete" ) {

            $id = $_POST["id"];

            $cont = 0;

            foreach ($tarjetas as $tarjeta) {
                if ($id == $tarjeta["cod"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        $delete = '
                        delete from tarjetas
                        where cod=' .$tarjeta["cod"]. ';
                        ';

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);

                            header("Location: restringido/admnliga/tarjetasins.php?act=delete&state=ok");
                        }
                    }
                    $exitcode = "no";
                }
                $cont++;
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        }


    } elseif ($tabla == "usuarios"){


        if ( $act == "new" ) {

            $usuario = usuarios($_POST["nombre"]);

            $datosuser = parse_ini_file("coonfig.ini", true);

            $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
            if ($db) {

                if ( $_POST["password"] == $_POST["rpassword"]) {
    
                    $insert = '
                    insert into usuarios (nombre,localidad,correo,password,tipo) 
                    values
                    ("' .$_POST["nombre"]. '","' .$_POST["localidad"]. '","' .$_POST["correo"]. '","' .$_POST["password"]. '","' .$_POST["tipo"]. '");
                    ';
    
                    $res = mysqli_query($db, $insert);
    
                    if ($res) {
                        $usuarios = usuarios($_POST["nombre"]);
                        foreach ($usuarios as $usuario) {
                            if ($usuario["nombre"] == $_POST["nombre"] && $usuario["password"] == $_POST["password"]) {
                                // Guardar datos de sesión
                                $_SESSION["usuario"] = $usuario["nombre"];
                                $_SESSION["tipo"] = $usuario["tipo"];
                                $carrito = array();
                                $_SESSION["carrito"] = $carrito;
                                header("Location: index.php");
                            }
                        }                    
                    }

                } else {
                    header("Location: login/registrsrse.php?error=password");
                }
            }

        } elseif ( $act == "mod" ) {

            $id = $_SESSION["usuario"];

            $usuarios = usuarios($id);

            foreach ($usuarios as $usuario) {
                if ($id == $usuario["nombre"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);
                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        if ( $_POST["contra"] == $_POST["contraconfirm"]) {
                            
                            if (isset($_FILES["foto"]["name"]) && $_FILES["foto"]["name"] != "") {
                                $actual = $usuario["foto"];
                                $nueva = $_FILES["foto"]['name'];
                                if ($actual == $nueva){
                                    $foto = $actual;
                                } else {
                                    $eliminar = $actual;
                                    if ($eliminar != "") {
                                        unlink($eliminar);
                                    }
                                    $foto = "img/usuarios/".foto("usuarios",$id);
                                }
                            } else {
                                $foto = $usuario["foto"];
                            }

                            $delete = '
                            update usuarios
                            set nombre="' .$_POST["nombre"]. '", correo="' .$_POST["correo"]. '", password="' .$_POST["contra"]. '", foto="' .$foto. '"
                            where IdUsuario=' .$usuario["IdUsuario"]. ';
                            ';

                            $res = mysqli_query($db, $delete);

                            if ($res) {
                                mysqli_close($db);

                                header("Location: login/registrado.php?usuario=$id");
                            }

                        } else {
                           header("Location: login/registrado.php?error=password");
                        }

                    }

                    $exitcode = "no";
                }
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        } elseif ( $act == "delete" ) {

            $id = $_POST["nombre"];

            $usuarios = usuarios($id);

            $cont = 0;

            foreach ($usuarios as $usuario) {

                if ($id == $usuario["nombre"]) {
                    $datosuser = parse_ini_file("coonfig.ini", true);

                    $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
                    if ($db) {

                        $delete = '
                        delete from usuarios
                        where nombre like "' .$usuario["nombre"]. '";
                        ';

                        $actual = $usuario["foto"];
                        unlink($actual);

                        $res = mysqli_query($db, $delete);

                        if ($res) {
                            mysqli_close($db);
                        }
                    }
                    header("Location: index.php?act=delete&state=ok");
                    $exitcode = "no";
                }
                $cont++;
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }
        }

    } elseif ((isset($_GET["table"]) &&  $_GET["table"] == "carrito")||(isset($_POST["table"]) &&  $_POST["table"] == "carrito")){

        if (!isset($_SESSION["usuario"]) ) {
            header("Location: restringido/sinpermiso.php");
        }

        if ( isset($_POST["act"]) && $_POST["act"] == "new" ) {

            $id = $_POST["id"];

            $cant = $_POST["cantidad"];

            $total = array("id"=>$id,"cant"=>$cant);

            array_push($_SESSION["carrito"], $total);

            header("Location: tienda/producto.php?id=$id&act=new&state=ok");
            $exitcode = "no";


        } elseif ( isset($_GET["act"]) && $_GET["act"] == "delete" && isset($_GET["id"]) ) {

            $id = $_GET["id"];
            $num = 0;
            foreach ($_SESSION["carrito"] as $producto) {
                if ($id == $producto["id"]) {
                    unset($_SESSION["carrito"][$num]);
                    header("Location: ./tienda/carrito.php");
                    $exitcode = "no";
                }
                $num++;
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        } elseif ( isset($_POST["act"]) && $_POST["act"] == "mod" && isset($_POST["id"]) ) {

            $id = $_POST["id"];
            $num = 0;
            foreach ($_SESSION["carrito"] as $producto) {
                if ($id == $producto["id"]) {
                    $_SESSION["carrito"][$num]["cant"] = $_POST["cant"];
                    header("Location: ./tienda/carrito.php");
                    $exitcode = "no";
                }
                $num++;
            }

            if ($exitcode == "si") {
                echo "error en el envío";
            }

        }
    }

    if ( isset($_GET["act"]) && $_GET["act"] == "fin" && isset($_GET["partido"]) ) {

        $id = $_GET["partido"];
        
        $datosuser = parse_ini_file("coonfig.ini", true);

            $db = mysqli_connect($datosuser["$user"]["Server"], $datosuser["$user"]["User"],  $datosuser["$user"]["Password"], $datosuser["$user"]["Database"]);
            if ($db) {

                $delete = '
                call finpartido('.$id.');
                ';

                $res = mysqli_query($db, $delete);

                if ($res) {
                    mysqli_close($db);
                }
            }
            header("Location: ./restringido/admnliga/infopartido.php?id=$id");
            $exitcode = "no";

        if ($exitcode == "si") {
            echo "error en el envío";
        }
    }
}

?>