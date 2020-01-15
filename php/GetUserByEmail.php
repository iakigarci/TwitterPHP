<?php
function getUserByID($email){
    include 'ConnectionDB.php';
    $sql = "SELECT ID FROM usuarios WHERE email='$email'";
    $resul = mysqli_query($mysqli,$sql, MYSQLI_USE_RESULT);
    if(!$resul){
        die("Error: ".mysqli_error($mysqli));
    }
    $ID_usuario = mysqli_fetch_array($resul);
    $mysqli->close();
    return $ID_usuario[0];
}
?>