<?php include '../php/Seguridad.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../html/Head.html' ?>
    <script src="../js/AddImage.js"></script>
    <script src="../js/SendTweetAjax.js"></script>
</head>

<body>
    <?php include '../html/Header.html' ?>
    <?php include 'GetUserFoto.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <?php include '../php/Navbar.php' ?>
                </div>
            </div>

            <div class="col-md-6">
                <?php include '../php/Main.php' ?>
            </div>

            <div class="col-md-3">
                <div class="card">
                    <h1>sd</h1>
                </div>
            </div>
        </div>
    </div>
    <?php include '../html/Footer.html' ?>
</body>

</html>