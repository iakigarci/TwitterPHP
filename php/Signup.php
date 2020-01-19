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
                        <form id="myForm" method="post" action="Signup.php" role="form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="dirCorreo">Email</label>
                                <input type="email" class="form-control" name="dirCorreo" id="dirCorreo" maxlength="30" placeholder="correo@ejemplo.com" requiered>
                            </div>
                            <div class="form-group">
                                <label for="pass">Password</label>
                                <input type="password" class="form-control" name="pass" id="pass" maxlength="30" requiered>
                            </div>
                            <div class="form-group">
                                <label for="nombreApellidos">Nombre y Apellidos</label>
                                <input type="text" class="form-control" name="nombreApellidos" id="nombreApellidos" maxlength="30" placeholder="Alvaro Riaño Santamaria" requiered>
                            </div>
                            <div class="form-group">
                                <label for="user">Usuario</label>
                                <div class="input-group-prepend ">
                                    <span class="input-group-text" id="basic-addon1">@</span>
                                    <input type="text" class="form-control" id="user" name="user" placeholder="jackDorsey76" maxlength="10" requiered>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="biografia">Biografia</label>
                                <textarea id="biografia" name="biografia" class="md-textarea form-control" rows="3" maxlength="30" ></textarea>
                                <small id="biografiaHelp" class="form-text text-muted">Texto explicativo del usuario con máximo 30 carácteres.</small>
                            </div>
                            <!-- <div class="form-group ">
                                <input type="file" id="fileHidden" name="fileHidden" hidden class="file" accept="image/*">
                                <div class="input-group my-3">
                                    <input type="text" class="form-control" disabled placeholder="Selecciona foto" id="file">
                                    <div class="input-group-append">
                                        <button type="button" class="browse btn btn-primary">Browse...</button>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail">
                                </div>
                            </div> -->
                            <div id="selector">
                                <p>Selecciona una foto de perfil: (Opcional) </p>
                                <input type="file" id="filehidden" name="fileHidden" accept="image/*">
                            </div>
                            <div class="text-center mb-2">
                                <button type="submit" id="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="text-center">
                                <a href="../php/Login.php">Ya tengo cuenta</a>
                            </div>
                        </form>
                    </div>
                    <div class="errores">
                        <?php
                        if (isset($_REQUEST['dirCorreo'])) {
                            $regexNombre = "/(\w.+\s).+/";
                            $regexPass = "/^.{6,}$/";
                            $regexBiografia = "/^.{1,30}$/";
                            

                            $errorPass = "La contraseña tiene que tener más de 6 carácteres.<br>";
                            $errorBiografia = "La biografia tiene que tener entre 0  y 30 carácteres.<br>";
                            $errorNombre = "Debes introducir tu nombre y al menos un apellido.<br>";
                            //Boolean para saber si introducir consilta SQL o no.
                            $introducir = True;

                            if (!preg_match($regexNombre, $_REQUEST['nombreApellidos'])) {
                                $introducir = False;
                                echo $errorNombre;
                            }
                            if (!preg_match($regexPass, $_REQUEST['pass'])) {
                                $introducir = False;
                                echo $errorPass;
                            }
                            if (!preg_match($regexBiografia, $_REQUEST['biografia'])) {
                                $introducir = False;
                                echo $errorBiografia;
                            }

                            if ($introducir) {
                                introducirUsuario();
                            } else {
                                echo "<a href=\"javascript:history.back()\">Volver a atras</a>";
                            }
                        }

                        function introducirUsuario()
                        {
                            $errorCorreo = "El correo introducido ya está registrado";
                            include 'ConnectionDB.php';
                            $email = $_REQUEST['dirCorreo'];
                            if ($resul = $mysqli->query("SELECT * FROM usuarios WHERE email='$email'")) {
                                $row_cnt = $resul->num_rows;
                                if($row_cnt!=0){
                                    die("Existe un usuario registrado con ese email");
                                }
                                $resul->close();
                            }

                            $nombreApellidos = strip_tags($_REQUEST['nombreApellidos']);
                            $pass = strip_tags($_REQUEST['pass']);
                            $pass = md5($pass);
                            $user = strip_tags($_REQUEST['user']);
                            $date = date('Y-m-d H:i:s');
                            $biografia = strip_tags($_REQUEST['biografia']);
                            if ($_FILES['fileHidden']['name'] == "") {
                                $image = "../images/cuentaHuevo.png";
                            } else {
                                $image = $_FILES['fileHidden']['tmp_name'];
                            }

                            // Eliminamos los posibles @ de los usuarios 
                            $user = preg_replace("/@/", "", $user);

                            $contenido_imagen = base64_encode(file_get_contents($image));
                            $sql = "INSERT INTO usuarios(nombre_apellidos, fecha_ini, user, email, pass, biografia, foto) VALUES ('$nombreApellidos', '$date', '$user', '$email','$pass','$biografia','$contenido_imagen');";
                            if (!mysqli_query($mysqli, $sql)) {
                                die("Error: " . mysqli_error($mysqli));
                            }
                            $mysqli->close();
                            echo "<script>
                                        alert('Registro realizado correctamente. Pulsa aceptar para acceder a la pantalla de LogIn.');
                                        window.location.href='LogIn.php';
                                        </script>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>