<?php
    session_start();
    if($_SESSION['identificado']!="SI"){
        header('location:Login.php');
        exit;
    }
?>