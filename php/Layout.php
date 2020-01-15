<?php include '../php/Seguridad.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../html/Head.html' ?>
    <script src="../js/AddImage.js"></script>
    <script src="../js/SendTweetAjax.js"></script>
    <script src="../js/LoadTweets.js"></script>
</head>

<body>
    <?php include '../html/Header.html' ?>
    <?php include 'GetUserFoto.php'; ?>
    <?php
    $fechaHoy = date("Y-m-d H:i:s");
    $nuevaFecha = strtotime ( '-2 day' , strtotime ( $fechaHoy ) ) ;
    $nuevaFecha = date("Y-m-d H:i:s", $nuevaFecha);
    $_SESSION['time'] = $nuevaFecha;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3" style="position: sticky" id="div-usuario">
                <div class="card">
                    <?php include '../php/Navbar.php' ?>
                </div>
            </div>

            <div class="col-md-6" id="div-tweets">
                <?php include '../php/Main.php' ?>
            </div>

            <div class="col-md-3" id="div-otros">
                <div class="card">
                    <h1>sd</h1>
                </div>
            </div>
        </div>
    </div>
    <?php include '../html/Footer.html' ?>
</body>

</html>