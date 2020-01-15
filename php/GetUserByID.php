<?php
function getUserByID($ID){
    include 'ConnectionDB.php';
    $sql = "SELECT * FROM usuarios WHERE ID='$ID'";
    $resul = mysqli_query($mysqli,$sql, MYSQLI_USE_RESULT);
    if(!$resul){
        die("Error: ".mysqli_error($mysqli));
    }
    $usuario = mysqli_fetch_array($resul);
    $mysqli->close();
    return $usuario;
}
?>