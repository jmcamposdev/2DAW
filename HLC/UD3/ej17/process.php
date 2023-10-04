<?php
  // Recogemos los datos del formulario
  $numero = $_POST['numero'];
  // Calculamos las cifras y la primera cifra
  $cifras = strlen($numero);
  $primeraCifra = substr($numero, 0, 1);

  // Si el número tiene 5 cifras o menos, mostramos los resultados
  if ($cifras <= 5) {
    echo "El número $numero tiene $cifras cifras y la primera cifra es $primeraCifra.";
  } else { // Si el número tiene más de 5 cifras, mostramos un mensaje de error
    echo "Solo se permiten números de 5 cifras máximo.";
  }
?>