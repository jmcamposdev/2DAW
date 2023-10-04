<?php
  // Inicializamos las variables
  $precioHoraOrdinaria = 12;
  $precioHoraExtra = 16;

  // Recogemos los datos del formulario
  $horasSemanales = $_POST['horasSemanales'];

  // Calculamos el sueldo
  $horasExtra = $horasSemanales - 40;

  // Si el número de horas extra es mayor que 0, calculamos el sueldo con las horas extra
  if ($horasExtra > 0) {
    $sueldo = $horasExtra * $precioHoraExtra + 40 * $precioHoraOrdinaria;
  } else { // Si no, calculamos el sueldo sin horas extra
    $sueldo = $horasSemanales * $precioHoraOrdinaria;
  }

  // Mostramos el sueldo
  echo "El sueldo semanal es $sueldo €";

?>