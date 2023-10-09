<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 12</title>
</head>

<body>
  <h1>Serie de Fibonacci</h1>
  <p>Muestra la serie de Fibonacci de n </p>
  <form action="index.php" method="post">
    <label for="num">Introduce un número:</label>
    <input type="number" name="num" id="num" required>
    <input type="submit" value="Enviar">
  </form>

  <?php
  /**
   * Escribe un programa que muestre los n primeros términos de la serie de Fibonacci. 
   * El primer término de la serie de Fibonacci es 0, el segundo es 1 
   * y el resto se calcula sumando los dos anteriores,
   *  por lo que tendríamos que los términos son 0, 1, 1, 2, 3, 5, 8, 13, 21, 34, 55, 89, 144... 
   * El número n se debe introducir por teclado.
   */

  // Si no esta declarado num no seguimos ejecutando el código
  if (!isset($_POST["num"]) || !is_numeric($_POST["num"])) {
    exit; // Salimos del programa
  }

  $userNumber = $_POST["num"]; // Guardamos el número introducido por el usuario

  $fibonacci = fibonacci($userNumber); // Calculamos la serie de Fibonacci

  // Mostramos la serie de Fibonacci
  echo "<p>Serie de Fibonacci de $userNumber: ";
  foreach ($fibonacci as $number) {
    echo "$number ";
  }



  /** -------------------------------------
  *              Funciones
  * ------------------------------------- */

  function fibonacci($number) {
    $fibonacci = [0, 1]; // Array con los dos primeros números de la serie de Fibonacci
    for ($i = 2; $i < $number; $i++) {
      $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2]; // Calculamos el siguiente número de la serie
    }
    return $fibonacci;
  }
  ?>
</body>

</html>