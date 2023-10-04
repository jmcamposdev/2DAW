<?php
  // Recogemos los datos del formulario
  $numero = $_POST['numero'];
  // Calculamos las cifras y la última cifra
  $cifras = strlen($numero);
  $ultimaCifra = substr($numero, -1);

  // Mostramos los resultados
  echo "El número $numero tiene $cifras cifras y la última cifra es $ultimaCifra.";
?>