<?php
  // Recogemos los datos del formulario
  $nota1 = $_POST['nota1'];
  $nota2 = $_POST['nota2'];
  $nota3 = $_POST['nota3'];

  // Si alguna de las notas no está entre 0 y 10, mostramos un mensaje de error
  if ($nota1 < 0 || $nota1 > 10 || $nota2 < 0 || $nota2 > 10 || $nota3 < 0 || $nota3 > 10) {
    echo "Las notas deben estar entre 0 y 10";
  } else { // Si no, calculamos la media
    $media = ($nota1 + $nota2 + $nota3) / 3;
    echo "La media es $media <br>";
    // Comprobamos la media y mostramos el mensaje correspondiente
    switch ($media) {
      case $media < 5:
        echo "Insuficiente";
        break;
      case $media < 6:
        echo "Suficiente";
        break;
      case $media < 7:
        echo "Bien";
        break;
      case $media < 9:
        echo "Notable";
        break;
      case $media <= 10:
        echo "Sobresaliente";
        break;
    }
  }

?>