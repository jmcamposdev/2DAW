<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 21</title>
</head>

<body>
  <h1>Calculo</h1>
  <p></p>
  <form action="index.php" method="post">
    <label for="base">Número:</label>
    <input type="number" name="num" id="base" required>
    <input type="submit" value="Enviar">
  <?php
  /**
   * Realiza un programa que vaya pidiendo números hasta que se 
   * introduzca un numero negativo y nos diga 
   * cuantos números se han introducido, 
   * la media de los impares y el mayor de los pares . 
   * El número negativo sólo se utiliza para indicar el final de la introducción de datos pero no se incluye en el cómputo.

   */

  // Si no esta declarado num o num no es un número no seguimos ejecutando el código
  if (!isset($_POST["num"]) || !is_numeric($_POST["num"])) {
    exit; // Salimos del programa
  };

  session_start(); // Iniciamos la sesión

  $num = $_POST["num"]; // Guardamos el número introducido por el usuario

  if (!isset($_SESSION["count"])) {
    $_SESSION["count"] = 0;
    $_SESSION["oddSum"] = 0;
    $_SESSION["oddCount"] = 0;
    $_SESSION["even"] = 0;
  }

  // Si el número es negativo mostramos los resultados
  if ($num <= 0) {
    showResults($_SESSION["count"], $_SESSION["oddSum"], $_SESSION["oddCount"], $_SESSION["even"]);
  } else { // Si no, seguimos guardando los datos

    $_SESSION["count"]++; // Aumentamos el contador

    if ($num % 2 == 0) { // Si el número es par
      // Comprobamos si es mayor que el mayor par guardado
      $_SESSION["even"] = $num > $_SESSION["even"] ? $num : $_SESSION["even"];
    } else {
      // Si es impar guardamos la suma y aumentamos el contador
      $_SESSION["oddSum"]+= $num;
      $_SESSION["oddCount"]++;
    }
  }





  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

   /**
    * Muestra los resultados
    * @param int $count Contador de números introducidos
    * @param int $oddSum Suma de los números impares
    * @param int $oddCount Contador de números impares
    * @param int $even Mayor número par
    * @return void
    */
  function showResults($count, $oddSum, $oddCount, $even)
  {
    echo "<p>Se han introducido {$count} números</p>";
    if ($oddCount == 0) {
      echo "<p>No se han introducido números impares</p>";
    } else {
      echo "<p>La media de los impares es " . ($oddSum/$oddCount) . "</p>";
    }
    echo "<p>El mayor de los pares es {$even}</p>";

    // Destruimos la sesión
    session_destroy();
  }

  ?>
</body>

</html>