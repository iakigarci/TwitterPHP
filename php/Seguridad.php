<?php
    session_start();
    if($_SESSION['identificado']!="SI"){
        alert('No puede acceder a la página. Pulsa aceptar para acceder a la pantalla anterior.');
        header('location:Login.php');
        exit();
    }
?>