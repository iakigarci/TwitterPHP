<?php
    function getUserFoto($email) {
        include 'ConnectionDB.php';
        $sql = "SELECT foto FROM usuarios WHERE email='$email'";
        $resul = mysqli_query($mysqli,$sql, MYSQLI_USE_RESULT);
        if(!$resul){
            die("Error: ".mysqli_error($mysqli));
        }

        while($row = mysqli_fetch_array($resul)){
            if($row['media']==""){
                include 'ShowTweet.php';
            }else{
                include 'ShowTweetWithImage.php';
            }
        }
    }
?>  