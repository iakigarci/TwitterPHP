<?php
    $fechaAct = date("Y-m-d H:i:s");
    $nuevaFecha = strtotime ( '-2 day' , strtotime ( $fechaAct ) ) ;
    $nuevaFecha = date("Y-m-d H:i:s", $nuevaFecha);
    $_SESSION['time'] = $nuevaFecha;
?>