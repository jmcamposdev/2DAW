<?php

/**
 * Rellena un array bidimensional de 6 filas por 9 columnas con números enteros positivos comprendidos entre 100 y 999 (ambos incluidos). 
 * Los números deben ser distintos, es decir, no se puede repetir ninguno. Muestra a continuación por pantalla el contenido del array de tal forma que se cumplan los siguientes requisitos:
 * • Los números de las dos diagonales donde está el mínimo deben aparecer en color verde. • El mínimo debe aparecer en color azul.
 * • El resto de números debe aparecer en color negro.
 */


// Crear un array bidimensional de 6 filas por 9 columnas.
$array = array();
for ($i = 0; $i < 6; $i++) {
  $array[$i] = array();
  for ($j = 0; $j < 9; $j++) {
    $array[$i][$j] = 0;
  }
}

// Rellenar el array con números enteros positivos comprendidos entre 100 y 999 sin repetir ninguno.
$used_numbers = array();
for ($i = 0; $i < 6; $i++) {
  for ($j = 0; $j < 9; $j++) {
    do {
      $number = rand(100, 999);
    } while (in_array($number, $used_numbers));
    $array[$i][$j] = $number;
    $used_numbers[] = $number;
  }
}

// Encontrar el número mínimo del array y guardar su posición.
$min_value = $array[0][0];
$min_row = 0;
$min_col = 0;
for ($i = 0; $i < 6; $i++) {
  for ($j = 0; $j < 9; $j++) {
    if ($array[$i][$j] < $min_value) {
      $min_value = $array[$i][$j];
      $min_row = $i;
      $min_col = $j;
    }
  }
}

// Recorrer el array y mostrar los números en diferentes colores según su posición.
echo "<table>";
for ($i = 0; $i < 6; $i++) {
  echo "<tr>";
  for ($j = 0; $j < 9; $j++) {
    $color = "black";
    if ($i == $j || $i + $j == 5) {
      $color = "green";
    }
    if ($i == $min_row && $j == $min_col) {
      $color = "blue";
    }
    echo "<td style='color: $color'>" . $array[$i][$j] . "</td>";
  }
  echo "</tr>";
}
echo "</table>";








