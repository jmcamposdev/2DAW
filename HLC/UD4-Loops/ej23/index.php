<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 23</title>
</head>

<body>
  <h1>Suma hasta 10000</h1>
  <p>Introduce números hasta que la suma sea igual o superior a 10000 se mostrará la suma, contador de números y la media</p>
  <form action="index.php" method="post">
    <label for="base">Número:</label>
    <input type="number" name="num" id="base" required>
    <input type="submit" value="Enviar">
  <?php
  /**
   * Escribe un programa que permita ir introduciendo una serie indeterminada de números 
   * hasta que la suma de ellos supere el valor 10000. 
   * Cuando esto último ocurra, se debe mostrar el total acumulado, 
   * el contador de los números introducidos y la media.
   */

  // Si no esta declarado num o num no es un número no seguimos ejecutando el código
  if (!isset($_POST["num"]) || !is_numeric($_POST["num"])) {
    exit; // Salimos del programa
  };

  session_start(); // Iniciamos la sesión

  $num = $_POST["num"]; // Guardamos el número introducido por el usuario

  if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 0;
    $_SESSION["sum"] = 0;
  }

  // Sumamos el número introducido al total
  $_SESSION["sum"] += $num;
  // Aumentamos el contador
  $_SESSION["count"]++;

  // Si la suma es mayor o igual a 10000 mostramos los resultados
  if ($_SESSION["sum"] >= 10000) {
    showResults($_SESSION["count"], $_SESSION["sum"]);
  }


  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

  /**
    * Muestra los resultados
    * @param int $count Contador de números
    * @param int $sum Suma de los números
    * @return void
    */
  function showResults($count, $sum)
  {
    echo "La suma es {$sum} y se han introducido {$count} números";
    echo "<br>La media es " . ($sum/$count);

    // Destruimos la sesión
    session_destroy();
  }

  ?>
</body>

</html>