<?php
include 'Seguridad.php';
include 'ConnectionDB.php';
include 'GetUserFoto.php'; 
include 'GetUserByEmail.php'; 
include 'GetUserByID.php';

// mode == '1' -- Actualizar los tweets
// mode == '0' -- Cargar todos los tweet

if($_GET['mode'] == '0') {
    $fechaAct = date("Y-m-d H:i:s");
    $nuevaFecha = strtotime ( '-2 day' , strtotime ( $fechaAct ) ) ;
    $nuevaFecha = date("Y-m-d H:i:s", $nuevaFecha);
    $tiempo = $nuevaFecha;
}else{
    $tiempo = $_SESSION['time'];
}
$_SESSION['time'] = date("Y-m-d H:i:s");

$sql = "SELECT * FROM tweet WHERE fecha > '" .$tiempo. "' ORDER BY fecha DESC";
$resul = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
if (!$resul) {
    die("Error: " . mysqli_error($mysqli));
}
while ($row = mysqli_fetch_array($resul)) {
    if($row['media'] == ""){
        include 'ShowTweet.php';
    }else{
        include 'ShowTweetWithImage.php';
    }
}
$mysqli->close();
?>
