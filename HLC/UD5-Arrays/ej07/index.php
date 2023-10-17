<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 07</title>
</head>

<body>
  <h1>Organizar Array</h1>
  <?php
  /**
   * Escribe un programa que genere 20 números enteros aleatorios entre 0 y 100 y que los almacene en un array. 
   * El programa debe ser capaz de pasar todos los números pares a las primeras posiciones del array (del 0 en adelante) 
   * y todos los números impares a las celdas restantes. Utiliza arrays auxiliares si es necesario.
   */

  // VARIABLES
  $numeros = arrayAleatorio(20, 0, 100);
  
  // Mostramos los números
  echo "Array original: <br>";
  foreach ($numeros as $numero) {
    echo $numero, " ";
  }
  echo "<br>";

  // Mostramos los números
  echo "Array ordenado: <br>";
  $numeros = ordenarArray($numeros);



  /**
   * Genera un array de longitud $longitud con valores aleatorios entre $min y $max
   * @param int $longitud Longitud del array
   * @param int $min Valor mínimo
   * @param int $max Valor máximo
   * @return array Array de longitud $longitud con valores aleatorios entre $min y $max
   */
  function arrayAleatorio($longitud, $min, $max) {
    $arrayAleatorio = [];
    for ($i=0; $i < $longitud; $i++) { 
      $arrayAleatorio[] = rand($min, $max);
    }
    return $arrayAleatorio;
  }

  function ordenarArray($array) {
    $arrayOrdenado = [];
    foreach ($array as $numero) {
      if ($numero % 2 == 0) {
        array_unshift($arrayOrdenado, $numero);
      } else {
        array_push($arrayOrdenado, $numero);
      }
    }
    foreach ($arrayOrdenado as $numero) {
      echo $numero, " ";
    }
  }


  ?>
</body>

</html>