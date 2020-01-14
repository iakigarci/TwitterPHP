<?php
include 'DbConfig.php';
//Creamos la conexion con la BD.
$mysqli = mysqli_connect($server, $user, $pass, $basededatos);
if (!$mysqli) {
    die("Fallo al conectar a MySQL: " . mysqli_connect_error());
}
?>