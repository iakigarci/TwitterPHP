<script src="../js/InsertUserInfo.js"></script>


<?php 
  include 'DbConfig.php';
  //Creamos la conexion con la BD.
  $link = mysqli_connect($server, $user, $pass, $basededatos);
  if (!$link) {
    die("Fallo al conectar con la base de datos: " . mysqli_connect_error());
  }

  $sql = "SELECT * FROM usuarios WHERE email = '{$_GET['email']}';";
  $resul = mysqli_query($link, $sql);
  if (!$resul) {
    die("Error: " . mysqli_error($link));
  }
  $row = mysqli_fetch_array($resul);

  echo "<div class='card'>";
  echo "<img id='fotoPerfil' src='...' class='card-img-top' alt='...'>";
  echo "<div class='card-body text-center'>";
  echo "<h5 id='nombre' class='card-title'>".$row['nombre_apellidos']."</h5>";
  echo "<h3 id='user'></h3>";
  echo "<p class='card-text' id='biografia'></p>";
  echo "</div>";
  echo "</div>";
?>