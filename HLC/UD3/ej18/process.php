<?php
  // Recogemos los datos del formulario
  $numero = $_POST['numero'];
  // Calculamos las cifras
  $cifras = strlen($numero);

  // Si el número tiene 5 cifras o menos, mostramos los resultados
  if ($cifras <= 5) {
    echo "El número $numero tiene $cifras cifras.";
  } else {
    echo "Solo se permiten números de 5 cifras máximo.";
  }
?>