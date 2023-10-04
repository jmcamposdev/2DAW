<?php
  $precioHora = 12;
  $horasSemanales = $_POST['horasSemanales'];
  $sueldoSemanal = $precioHora * $horasSemanales;

  echo "El sueldo semanal es: $sueldoSemanal €";
  

?>