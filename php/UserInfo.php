<script src="../js/InsertUserInfo.js"></script>
<?php
include 'DbConfig.php';
//Creamos la conexion con la BD.
$link = mysqli_connect($server, $user, $pass, $basededatos);
if (!$link) {
  die("Fallo al conectar con la base de datos: " . mysqli_connect_error());
}

$sql = "SELECT * FROM usuarios WHERE email='{$_SESSION['email']}';";
$resul = mysqli_query($link, $sql);
if (!$resul) {
  die("Error: " . mysqli_error($link));
}
$row = mysqli_fetch_array($resul);
$foto = getFoto();

echo "<div class='card'>";
/* echo "<img id='fotoPerfil' src='<?php echo $foto ?>' class='card-img-top' >"; */
echo "<img id='fotoPerfil' src='../images/cuentaHuevo.png' class='card-img-top' >";
echo "<div class='card-body text-center'>";
echo "<h5 id='nombre' class='card-title'>" . $row['nombre_apellidos'] . "</h5>";
echo "<h3 id='user'>" . $row['user'] . "</h3>";
echo "<p class='card-text' id='biografia'>" . $row['biografia'] . "</p>";
echo "</div>";
echo "</div>";

function getFoto()
{
  include 'DbConfig.php';
  //Creamos la conexion con la BD.
  $link = mysqli_connect($server, $user, $pass, $basededatos);
  if (!$link) {
    die("Fallo al conectar con la base de datos: " . mysqli_connect_error());
  }
  $sql = "SELECT foto FROM usuarios WHERE email=\"" . $_SESSION['email'] . "\";";
  $resul = mysqli_query($link, $sql, MYSQLI_USE_RESULT);
  
  $img = mysqli_fetch_array($resul);
  return $img['foto'];
}
?>