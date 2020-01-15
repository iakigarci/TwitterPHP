<?php
include 'Seguridad.php';
include 'ConnectionDB.php';
include 'GetUserFoto.php'; 
include 'GetUserByEmail.php'; 
include 'GetUserByID.php';
$tiempo = $_SESSION['time'];

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
