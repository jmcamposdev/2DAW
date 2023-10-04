<?php
// Recogemos los datos del formulario
$numero = $_POST['numero'];

if ($numero >= 0 && $numero <= 9) { // Número de un solo dígito
  echo "El número es capicúa";
} elseif ($numero >= 10 && $numero <= 99) { // Número de dos dígitos
  $digito1 = floor($numero / 10);
  $digito2 = $numero % 10;
  if ($digito1 == $digito2) {
    echo "El número es capicúa";
  } else {
    echo "El número no es capicúa";
  }
} elseif ($numero >= 100 && $numero <= 999) { // Número de tres dígitos
  $digito1 = floor($numero / 100);
  $digito3 = $numero % 10;
  if ($digito1 == $digito3) {
    echo "El número es capicúa";
  } else {
    echo "El número no es capicúa";
  }
} elseif ($numero >= 1000 && $numero <= 9999) { // Número de cuatro dígitos
  $digito1 = floor($numero / 1000);
  $digito2 = floor(($numero / 10) % 10);
  $digito3 = floor(($numero / 100) % 10);
  $digito4 = $numero % 10;
  if ($digito1 == $digito4 && $digito2 == $digito3) {
    echo "El número es capicúa";
  } else {
    echo "El número no es capicúa";
  }
} elseif ($numero >= 10000 && $numero <= 99999) { // Número de cinco dígitos
  $digito1 = floor($numero / 10000);
  $digito5 = $numero % 10;
  if ($digito1 == $digito5) {
    echo "El número es capicúa";
  } else {
    echo "El número no es capicúa";
  }
} else {
  echo "Número no válido (fuera del rango de hasta 5 dígitos)";
}

// Otra forma
// $numero = $_POST['numero'];
// $numeroInvertido = strrev($numero);
// if ($numero == $numeroInvertido) {
//   echo "El número es capicúa";
// } else {
//   echo "El número no es capicúa";
// }
