<?php
$foto = getUserFoto($_SESSION['email']);
echo "<div class='card'style='background-color: rgb(242, 242, 242, 0.3)'>";
/* echo "<img id='fotoPerfil' src='<?php echo $foto ?>' class='card-img-top' >"; */
echo "<img id='fotoPerfil' src='data:image/*;base64, $foto' class='card-img-top' >";
echo "<div class='card-body text-left'>";
echo "<h5 id='nombre' class='card-title'>" . $_SESSION['nombre'] . "</h5>";
echo "<h6 id='user'>" . $_SESSION['user'] . "</h6>";
echo "</div>";
echo "</div>";
