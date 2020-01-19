<?php
    $users = simplexml_load_file('../xml/Counter.xml');
    $cont = $users->user;
    $users->user[0] = $cont+1;

    $users->asXML('../xml/Counter.xml');
    
    header('location:Layout.php');
?>