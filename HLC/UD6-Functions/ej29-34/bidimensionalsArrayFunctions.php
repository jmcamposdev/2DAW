<?php

/**
 * Genera un array bidimensional de tamaño $rows x $columns con números aleatorios
 * entre $min y $max si $rows o $columns es menor que 1, devuelve un array vacío
 * @param int $rows Número de filas del array
 * @param int $columns Número de columnas del array
 * @param int $min Número mínimo que puede contener el array
 * @param int $max Número máximo que puede contener el array
 * @return array Array bidimensional generado
 */
function generaArrayBiInt(int $rows, int $columns, int $min, int $max): array {
  // Si el número de filas o columnas es menor que 1, devolvemos un array vacío
  if ($rows < 1 || $columns < 1) {
    return [];
  }

  // Si el mínimo es mayor que el máximo, intercambiamos los valores
  if ($min > $max) {
    $aux = $min;
    $min = $max;
    $max = $aux;
  }
  
  $array = []; // Array que vamos a devolver
  // Generamos el array
  for ($i=0; $i < $rows; $i++) { 
    // Añadimos una fila vacía
    array_push($array, []);
    for ($j=0; $j < $columns; $j++) { 
      // Añadimos un número aleatorio entre $min y $max
      array_push($array[$i], random_int($min, $max));
    }
  }

  return $array;
}

/**
 * Devuelve la fila $row del array bidimensional $array
 * @param array $array Array bidimensional
 * @param int $row Fila que queremos devolver
 * @return array Fila $row del array $array o un array vacío si $row es mayor que el número de filas del array
 */
function filaDeArrayBiInt(array $array, int $row): array {
  if ($row > count($array) - 1) {
    return [];
  }

  return $array[$row];
}


/**
 * Devuelve la columna $column del array bidimensional $array
 * @param array $array Array bidimensional
 * @param int $column Columna que queremos devolver
 * @return array Columna $column del array $array o un array vacío si $column es mayor que el número de columnas del array
 */
function columnaDeArrayBiInt(array $array, int $column): array {
  if ($column > count($array[0]) - 1) {
    return [];
  }

  $columna = [];
  for ($i=0; $i < count($array); $i++) { 
    array_push($columna, $array[$i][$column]);
  }

  return $columna;
}

/**
 * Devuelve la fila y la columna (en un array con dos elementos) de la primera ocurrencia 
 * de un número dentro de un array bidimensional. 
 * Si el número no se encuentra en el array, la función devuelve el array {-1, -1}
 * @param array $array Array bidimensional
 * @param int $n Número que queremos buscar
 * @return array Array con las coordenadas de la primera ocurrencia de $n en $array
 */
function coordenadasEnArrayBiInt(array $array, int $n): array {
  $coordenadas = [];
  for ($i=0; $i < count($array); $i++) { // Recorremos las filas
    for ($j=0; $j < count($array[$i]); $j++) {  // Recorremos las columnas
      if ($array[$i][$j] == $n) { // Si encontramos el número, lo añadimos al array y salimos de la función
        array_push($coordenadas, [$i, $j]); // Añadimos las coordenadas al array
      }
    }
  }
  return $coordenadas;
}

/**
 * Dice si un número es o no punto de silla, es decir, mínimo en su fila y máximo en su columna
 * @param array $array Array bidimensional
 * @param int $row Fila del número
 * @param int $column Columna del número
 * @return bool Devuelve true si el número es punto de silla y false si no lo es
 */
function esPuntoDeSilla(array $array, int $row, int $column): bool {
  $minimo = min(filaDeArrayBiInt($array, $row));
  $maximo = max(columnaDeArrayBiInt($array, $column));
  return $minimo == $maximo;
}

/**
 * Devuelve un array con los números de la diagonal que se indica en el array $array
 * @param array $array Array bidimensional
 * @param int $row Fila del número
 * @param int $column Columna del número
 * @param string $direction Dirección de la diagonal (neso o nose)
 * @return array Array con los números de la diagonal
 */
function obtenerDiagonal(array $array, int $fila, int $columna, string $direccion) {
    $diagonal = array();
    $filas = count($array);
    $columnas = count($array[0]);

    // Verificar si los parámetros de fila y columna están dentro de los límites del array
    if ($fila >= $filas || $columna >= $columnas) {
        return "Fila o columna fuera de rango";
    }

    // Lógica para la dirección "nose"
    if ($direccion === "nose") {
        while ($fila < $filas && $columna < $columnas) {
            $diagonal[] = $array[$fila][$columna];
            $fila++;
            $columna++;
        }
    } elseif ($direccion === "neso") { // Lógica para la dirección "neso"
        while ($fila < $filas && $columna >= 0) {
            $diagonal[] = $array[$fila][$columna];
            $fila++;
            $columna--;
        }
    } else {
        return "Dirección no válida";
    }

    return $diagonal;
}



