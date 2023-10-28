<?php
/**
 * Función que genera un array de números enteros aleatorios
 * @param int $n Número de elementos del array
 * @param int $min Valor mínimo del rango de números aleatorios
 * @param int $max Valor máximo del rango de números aleatorios
 * @return array Array de números enteros aleatorios
 */
function generateArrayInt(int $n, int $min, int $max): array {
  // Si el valor mínimo es mayor que el máximo, se intercambian
  if ($min > $max) {
    $aux = $min;
    $min = $max;
    $max = $aux;
  }
  // Se genera el array
  $array = [];
  // Se añaden los elementos al array
  for ($i=0; $i < $n; $i++) { 
    // Se añade un número aleatorio al array
    array_push($array, random_int($min, $max));
  }
  return $array;
}

/**
 * Función que devuelve el minimo de un array de números enteros
 * @param array $array Array de números enteros
 * @return int Mínimo del array
 */
function minimoArrayInt(array $array): int {
  // Se puede haver con min() pero para practicar no lo he utilizado.
  // Obtengo un número aleatorio del array
  $minimo = array_rand($array, 1);

  // Recorro el array y si el número es menor que el mínimo, lo guardo
  for ($i=0; $i < count($array); $i++) { 
    if ($array[$i] < $minimo) {
      $minimo = $array[$i];
    }
  }

  return $minimo;
}

/**
 * Función que devuelve el máximo de un array de números enteros
 * @param array $array Array de números enteros
 * @return int Mínimo del array
 */
function maximoArrayInt(array $array): int {
  // Se puede haver con max() pero para practicar no lo he utilizado.
  // Obtengo un número aleatorio del array
  $maximo = array_rand($array, 1);

  // Recorro el array y si el número es menor que el mínimo, lo guardo
  for ($i=0; $i < count($array); $i++) { 
    if ($array[$i] > $maximo) {
      $maximo = $array[$i];
    }
  }

  return $maximo;
}

/**
 * Función que devuelve la media de un array de números enteros
 * @param array $array Array de números enteros
 * @return float Media del array
 */
function mediaArrayInt(array $array): float {
  // Se puede haver con array_sum() pero para practicar no lo he utilizado.
  $suma = 0;
  // Iteramos el array y sumamos todos los valores
  foreach ($array as $value) {
    $suma += $value;
  }
  // Devolvemos la media si el array tiene elementos, si no devolvemos 0
  return count($array) > 0 ? ($suma / count($array)) : 0;
}

/**
 * Función que dice si un número está o no en un array de números enteros
 * @param array $array Array de números enteros
 * @param int $valueToFind Valor a buscar en el array
 * @return bool True si el valor está en el array, false si no
 */
function estaEnArrayInt(array $array, int $valueToFind) {
  // Se puede haver con in_array() pero para practicar no lo he utilizado.
  $isFound = false;
  // Iteramos el array y si encontramos el valor, cambiamos la variable a true
  for ($i=0; $i < count($array) && !$isFound; $i++) { 
    if ($array[$i] === $valueToFind) {
      $isFound = true;
    }
  }
  return $isFound;
}

/**
 * Función que devuelve la posición de un número en un array de números enteros
 * @param array $array Array de números enteros
 * @param int $valueToFind Valor a buscar en el array
 * @return int Posición del valor en el array, -1 si no está
 */
function posicionEnArray(array $array, int $valueToFind) {
  // Se puede haver con array_search() pero para practicar no lo he utilizado.
  $index = -1;
  // Iteramos el array y si encontramos el valor, cambiamos la variable al índice
  for ($i=0; $i < count($array) && $index === -1; $i++) { 
    if ($array[$i] === $valueToFind) {
      $index = $i;
    }
  }
  return $index;
}

/**
 * Función que le da la vuelta a un array de números enteros
 * @param array $array Array de números enteros
 * @return array Array volteado
 */
function volteaArrayInt(array $array) {
  // Se puede haver con array_reverse() pero para practicar no lo he utilizado.
  // Creamos un array vacío
  $copiaArray = [];

  // Recorremos el array al revés y añadimos los elementos al nuevo array
  for ($i=count($array)-1; $i >= 0; $i--) { 
    array_push($copiaArray, $array[$i]);
  }

  return $copiaArray;
}

/**
 * Función que rota n posiciones a la derecha los números de un array de números enteros
 * @param array $array Array de números enteros
 * @param int $n Número de rotaciones
 */
function rotarDerechaArrayInt(array $array, int $n) {
  // Si el número de rotaciones es mayor que el número de elementos del array
  if ($n >= count($array)) { 
    // Se calcula el resto de dividir el número de rotaciones entre el número de elementos del array
    $n = $n % count($array);
  }

  // Creamos una copia del array para no modificar el original
  $arrayCopy = array_merge(array(), $array);

  // Creamos un array auxiliar con los últimos n elementos
  $aux = array_slice($arrayCopy, (count($arrayCopy) - $n), $n);
  // Eliminamos los últimos n elementos del array
  $arrayCopy = array_splice($array, 0, (count($arrayCopy) - $n));
  // Añadimos los elementos del array auxiliar al principio del array
  $arrayCopy = array_merge($aux, $arrayCopy);

  return $arrayCopy;
}

/**
 * Función que rota n posiciones a la izquierda los números de un array de números enteros
 * @param array $array Array de números enteros
 * @param int $n Número de rotaciones
 */
function rotarIzquierdaArrayInt(array $array, int $n) {
  // Si el número de rotaciones es mayor que el número de elementos del array
  if ($n >= count($array)) { 
    // Se calcula el resto de dividir el número de rotaciones entre el número de elementos del array
    $n = $n % count($array);
  }

  // Creamos una copia del array para no modificar el original
  $arrayCopy = array_merge(array(), $array);

  // Creamos un array auxiliar con los primeros n elementos
  $aux = array_slice($arrayCopy, 0, $n);
  // Eliminamos los primeros n elementos del array
  $arrayCopy = array_splice($array, $n, count($arrayCopy));
  // Añadimos los elementos del array auxiliar al final del array
  $arrayCopy = array_merge($arrayCopy, $aux);

  return $arrayCopy;
}
