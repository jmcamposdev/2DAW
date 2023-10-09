<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 13</title>
</head>

<body>
  <h1>Positivos y Negativos</h1>
  <p>Calcula cuantos números positivos y cuantos negativos existen en un array</p>
  <?php
  /**
   * Escribe un programa que lea una lista de diez números y 
   * determine cuántos son positivos, y cuántos son negativos.
   */

  $numbers = [1, 2, 3, 4, 5, -1, -2, -3, -4, -5]; // Array de números

  $positivesAndNegatives = countPositivesAndNegatives($numbers); // Calculamos el número de positivos y negativos

  echo "<p>Positivos: $positivesAndNegatives[0]</p>"; // Mostramos el número de positivos
  echo "<p>Negativos: $positivesAndNegatives[1]</p>"; // Mostramos el número de negativos




  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

   /**
    * Calcula el número de positivos y negativos de un array de números
    * @param array $numbers Array de números
    * @return array Array con el número de positivos y negativos [positivos, negativos]
    */
  function countPositivesAndNegatives($numbers) {
    $positives = 0; // Número de positivos
    $negatives = 0; // Número de negativos
    foreach ($numbers as $number) {
      if ($number > 0) {
        $positives++;
      } else {
        $negatives++;
      }
    }
    return [$positives, $negatives];
  }

  ?>
</body>

</html>