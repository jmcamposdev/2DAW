<?php
  // Recogemos los datos del formulario
  $hora = $_POST['hora'];

  // Comprobamos la hora y mostramos el saludo correspondiente
  if ($hora >= 6 && $hora <= 12) {
    echo "Buenos días";
  } else if ($hora >= 13 && $hora <= 20) {
    echo "Buenas tardes";
  } else if (($hora >= 21 && $hora <= 23) || $hora <= 5) {
    echo "Buenas noches";
  } else {
    echo "Hora incorrecta";
  }
?>