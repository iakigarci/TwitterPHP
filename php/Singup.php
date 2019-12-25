<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../html/Head.html' ?>
    <script src="../js/ShowImage.js"></script>
</head>

<body>
    <div class="container ">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Registro</h5>
                    <div class="card-title">
                        <form id="myForm">
                            <div class="form-group">
                                <label for="dirCorreo">Email</label>
                                <input type="email" class="form-control" id="dirCorreo" placeholder="correo@ejemplo.com">
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" id="pass">
                            </div>
                            <div class="form-group">
                                <label for="nombreApellidos">Nombre y Apellidos</label>
                                <input type="text" class="form-control" id="nombreApellidos" placeholder="Pablo Emilio Gavirria">
                            </div>
                            <div class="form-group">
                                <label for="user">Usuario</label>
                                <div class="input-group-prepend ">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" class="form-control" id="user" placeholder="jackDorsey76">
                                </div>
                            </div>
                            <div class="form-group ">
                                <input type="file" name="img[]" class="file" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="text" class="form-control" disabled placeholder="Selecciona foto" id="file">
                                    <div class="input-group-append">
                                        <button type="button" class="browse btn btn-primary">Browse...</button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
                                </div>
                            </div>
                            <div class="text-center mb-2">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="errores">
                                <?php
                                if (isset($_REQUEST['dirCorreo'])) {
                                    $regexNombre = "/(\w.+\s).+/";
                                    $regexPass = "/^.{6,}$/";
                                    if (preg_match($regexNombre, $_REQUEST['nombreApellidos'])) {
                                        if (preg_match($regexPass, $_REQUEST['pass'])) {
                                            introducirUsuario();
                                        } else {
                                            echo "La contraseña tiene que tener 6 carácteres.<br>";
                                            echo "<a href=\"javascript:history.back()\">Volver a atras</a>";
                                        }
                                    } else {
                                        echo "Debes introducir tu nombre y al menos un apellido.<br>";
                                        echo "<a href=\"javascript:history.back()\">Volver a atras</a>";
                                    }
                                }

                                function introducirUsuario(){
                                    include 'DbConfig.php';
                                    //Creamos la conexion con la BD.
                                    $mysqli = mysqli_connect($server, $user, $pass, $basededatos);
                                    if (!$mysqli) {
                                        die("Fallo al conectar a MySQL: " . mysqli_connect_error());
                                    }

                                    $email = $_REQUEST['dirCorreo'];
                                    $nombreApellidos = $_REQUEST['nombreApellidos'];
                                    $pass = $_REQUEST['pass'];
                                    $hashed_password = password_hash($pass, PASSWORD_DEFAULT);
                                    if ($_FILES['Imagen']['name'] == "") {
                                        $image = "../images/usuarioAnonimo.jpg";
                                    } else {
                                        $image = $_FILES['Imagen']['tmp_name'];
                                    }

                                    $contenido_imagen = base64_encode(file_get_contents($image));
                                    $sql = "INSERT INTO usuarios VALUES ($tipo,'$email','$nombreApellidos','$hashed_password','$contenido_imagen','1');";

                                    if (!mysqli_query($mysqli, $sql)) {
                                        die("Error: " . mysqli_error($mysqli));
                                    }
                                    echo "<script>
                                        alert('Registro realizado correctamente. Pulsa aceptar para acceder a la pantalla de LogIn.');
                                        window.location.href='LogIn.php';
                                        </script>";
                                }
                                ?>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>