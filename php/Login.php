<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../html/Head.html' ?>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Log In</h5>
                        <form id="myForm" method="POST">
                            <div class="form-group">
                                <label for="dirCorreo">Email address</label>
                                <input type="email" class="form-control" id="dirCorreo" name="dirCorreo" aria-describedby="emailHelp">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="pass" name="pass">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1">Mantener sesión</label>
                            </div>
                            <div class="text-center mb-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="text-center">
                                <a href="../php/Singup.php">No tengo cuenta</a>
                            </div>
                        </form>
                        <div class="errores" style="color:red; background-color: #ff9999 ">
                            <?php
                            if (isset($_REQUEST['dirCorreo'])) {
                                include 'DBConfig.php';

                                $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
                                if (!$mysqli) {
                                    die("Fallo al conectar con Mysql: " . mysqli_connect_error());
                                }
                                $email = $_REQUEST['dirCorreo'];
                                $pass = $_REQUEST['pass'];

                                $sql = "SELECT * FROM usuarios WHERE email='$email';";

                                $resultado = mysqli_query($mysqli, $sql, MYSQLI_USE_RESULT);
                                if (!$resultado) {
                                    die("Error: " . mysqli_error($mysqli));
                                }
                                $row = mysqli_fetch_array($resultado);
                                if (hash_equals($row['pass'], crypt($pass, $row['pass']))) {
                                    session_start();
                                    $_SESSION['identificado'] = "SI";
                                    $_SESSION['email'] = $row['email'];
                                    echo "<script>
                                        alert('Inicio de sesion realizado correctamente. Pulsa aceptar para acceder a la pantalla principal.');
                                        window.location.href='Layout.php';
                                        </script>";
                                } else {
                                    $_SESSION['identificado'] = "NO";
                                    echo "Usuario o contraseña incorrectos, prueba de nuevo. <br>";
                                    echo '<script type="text/JavaScript">  
                                            document.getElementById("myForm").reset(); 
                                            </script>';
                                    echo "<a href=\"javascript:history.back()\">Volver a atras</a>";
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>