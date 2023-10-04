<?php
  $baseImponible = $_POST['baseImponible'];
  $factura = $baseImponible * 1.21;

  echo "El total de la factura es: $factura €";

?>