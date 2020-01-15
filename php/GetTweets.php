<?php
    include 'ConnectionDB.php';
    $tiempo = $_SESSION['tiempo'];
    $sql = "SELECT * FROM tweet WHERE fecha > '$tiempo' ";
    if(!$resul){
        die("Error: ".mysqli_error($mysqli));
    }
    $img = mysqli_fetch_array($resul);
    $mysqli->close();
?>