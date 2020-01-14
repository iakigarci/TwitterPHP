<div class="card tweet">
    <div class="card-body">
        <div class="d-flex align-items-center">
            <div class="mr-2">
                <?php
                $foto = getUserFoto($_SESSION['email']);
                echo "<img class='rounded-circle' height='55' width='55' src='data:image/*;base64, $foto' />";
                ?>
            </div>
            <div class="mr-2">
                <?php
                $nombre = $_SESSION['nombre'];
                $user = $_SESSION['user'];
                echo "<div class='h5 m-0'> $nombre </div>";
                echo "<div class='h7 text-muted'> $user </div>";
                ?>
            </div>
        </div>

        <form class="mt-3" id="formTweetUser" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <textarea class="form-control" name="tweetUsuario" id="tweetUsuario" rows="3" placeholder="¿En qué estás pensando?" requiered></textarea>
            </div>
            <div class="btn-toolbar justify-content-between">
                <div class="btn-group adjuntar">
                    <label for="mediaTweet">
                        <img src="../images/adjuntar.png" width="20" height="20" >
                    </label>
                    <input type="file" id="mediaTweet" name="mediaTweet" >
                </div>
                <div class="btn-group">
                    <button type="button" id="submitTweet" name="submitTweet" class="btn btn-primary" onclick="sendTweet()">Publicar</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card lista-tweet">
    <div class="card-body">
        <h5 class="card-title" id="nombre_apellidos"></h5>
        <h6 class="card-subtitle mb-2 text-muted"></h6>
        <p class="card-text"></p>
    </div>
</div>