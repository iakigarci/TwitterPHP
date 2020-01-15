<?php
echo '<div class="card my-1">';
echo '<div class="car-body">';
echo '<div class="d-flex align-items-center">';
echo '<div class="mr-2">';
$usuario = getUserByID($row['ID_usuario']);
echo "<img class='rounded-circle' height='55' width='55' src='data:image/*;base64, " .$usuario['foto']. "' />";
echo '</div>';
echo '<div class="mr-2">';
echo "<div class='h5 m-0'> " .$usuario['nombre_apellidos']." </div>";
echo "<div class='h7 text-muted'> @" .$usuario['user']." </div>";
echo '</div>';
echo '</div>';
echo '<div class="texto-tweet px-2 my-2 ml-5">';
echo "<p class='card-text'> " .$row['texto']. " </p>";
echo '</div>';
echo '<div class"card">';
echo "<img id='myImg' class='card-img-top' height='400' width='550'src='data:image/*;base64, " .$row['media']. "'>";
echo '</div>';
echo '</div>';
echo '</div>';

?>