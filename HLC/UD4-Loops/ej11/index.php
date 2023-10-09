<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 11</title>
</head>

<body>
  <h1>El Cuadrado y el Cubo</h1>
  <p>Muestra el cuadrado y el cubo de los siguientes 5 número del número introducido </p>
  <form action="index.php" method="post">
    <label for="num">Introduce un número:</label>
    <input type="number" name="num" id="num" required>
    <input type="submit" value="Enviar">
  </form>

  <?php
  /**
   * Escribe un programa que muestre en tres columnas, 
   * el cuadrado y el cubo de los 5 primeros números enteros a partir 
   * de uno que se introduce por teclado.
   */

  // Si no esta declarado num no seguimos ejecutando el código
  if (!isset($_POST["num"]) || !is_numeric($_POST["num"])) {
    exit; // Salimos del programa
  }

  $userNumber = $_POST["num"]; // Guardamos el número introducido por el usuario

  printTable($userNumber); // Mostramos la tabla


  /** -------------------------------------
  *              Funciones
  * ------------------------------------- */

  /**
   * Calcula el cuadrado de un número
   * @param int $number Número
   */
  function square($number) {
    return $number * $number;
  }

  /**
   * Calcula el cubo de un número
   * @param int $number Número
   */
  function cube($number) {
    return $number * $number * $number;
  }

  /**
   * Muestra una tabla con el cuadrado y el cubo de los 5 primeros números a partir de un número
   */
  function printTable($number) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Número</th>";
    echo "<th>Cuadrado</th>";
    echo "<th>Cubo</th>";
    echo "</tr>";
    for ($i=0; $i < 5; $i++) { 
      echo "<tr>";
      echo "<td>$number</td>";
      echo "<td>" . square($number) . "</td>";
      echo "<td>" . cube($number) . "</td>";
      echo "</tr>";
      $number++;
    }
    echo "</table>";
  }
  ?>
</body>

</html>