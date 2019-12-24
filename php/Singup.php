<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../html/Head.html' ?>
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
                                <input type="email" class="form-control" id="dirCorreo">
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>