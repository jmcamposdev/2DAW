<?php
function estaEnArrayInt($array, $valor) {
  $isFound = false; // Variable que indica si se ha encontrado el valor en el array
  for ($i = 0; $i < count($array) && !$isFound; $i++) { // Recorre el array hasta que se encuentre el valor o se llegue al final del array
    if ($array[$i] == $valor) { // Si el valor del array en la posición $i es igual al valor que se busca
      $isFound = true;
    }
  }
  return $isFound;
}
// in_array();
?>