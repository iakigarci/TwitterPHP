<?php include 'Seguridad.php'; ?>
<?php include 'GetUserByEmail.php'; ?>

<?php
if (isset($_REQUEST['tweetUsuario'])) {
    $usuario = getUserByEmail($_SESSION['email']);
    $ID_usuario = $usuario['ID'];
    include 'ConnectionDB.php';
    $email = $_SESSION['email'];
    $fecha = date("Y-m-d H:i:s");
    $texto = $_REQUEST['tweetUsuario'];
    
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
    }
    $mysqli->close();
}
?>