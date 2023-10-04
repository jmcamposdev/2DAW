<?php
  // Segundos faltantes hasta media noche
  // Recogemos los datos del formulario
  $hora = $_POST['hora'];
  $minuto = $_POST['minuto'];

  // Calculamos los segundos
  $segundos = (24 - $hora) * 3600 + (60 - $minuto) * 60;

  // Mostramos los segundos
  echo "Faltan $segundos segundos para media noche";

?>