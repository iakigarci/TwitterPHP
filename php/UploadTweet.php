<?php include '../php/Seguridad.php' ?>
<?php
if (isset($_REQUEST['tweetUsuario'])) {
    include 'ConnectionDB.php';
    $email = $_SESSION['email'];
    $fecha = date("Y-m-d H:i:s");
    $texto = $_REQUEST['tweetUsuario'];
    $sql = "SELECT ID FROM usuarios WHERE email='$email'";
    $resul = mysqli_query($mysqli,$sql, MYSQLI_USE_RESULT);
    if(!$resul){
        die("Error: ".mysqli_error($mysqli));
    }
    $ID_usuario = mysqli_fetch_array($resul);
    $ID_usuario = $ID_usuario[0];
    print_r($ID_usuario);
    if ($_FILES['mediaTweet']['name'] == "") {
        //No se introduce nada
        $sql = "INSERT INTO tweet(ID_usuario, fecha, texto) VALUES ('$ID_usuario', '$fecha', '$texto')";
    } else {
        $image = $_FILES['mediaTweet']['tmp_name'];
        $contenido_imagen = base64_encode(file_get_contents($image));
        $sql = "INSERT INTO tweet(ID_usuario, fecha, media, texto) VALUES ('$ID_usuario', '$fecha', '$contenido_imagen', '$texto')";
    }

    if (!mysqli_query($mysqli, $sql)) {
        die("Error: " . mysqli_error($mysqli));
    } else {
        echo "<script>
        alert('Se ha insertado el tweet perfectamente.');
        </script>";
    }
    $mysqli->close();
}
?>