<?php
$user = 'invitado';
$password = 'abc123..';
$database = 'rfef';
$servername='localhost';
$mysqli = new mysqli($servername, $user,
                $password, $database);
 
// Checking for connections
if ($mysqli->connect_error) {
    die('Connect Error');
}
?>