<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 15</title>
</head>

<body>
  <h1>Base ^ Exponente</h1>
  <p>Dado una base y un exponente calcula el resultado</p>
  <form action="index.php" method="post">
    <label for="base">Introduce la base:</label>
    <input type="number" name="base" id="base" required>
    <label for="exponent">Introduce el exponente:</label>
    <input type="number" name="exponent" id="exponent" required>
    <input type="submit" value="Enviar">
  <?php
  /**
   * Escribe un programa que dados dos números, uno real (base) y un entero positivo (exponente), 
   * saque por pantalla todas las potencias con base el numero dado y exponentes entre uno y el exponente introducido. 
   * No se deben utilizar funciones de exponenciación. 
   * Por ejemplo, si introducimos el 2 y el 5, se deberán mostrar 21, 22, 23, 24, 25.
   */

  // Si no esta declarado base o exponent no seguimos ejecutando el código
  if (!isset($_POST["base"]) || !is_numeric($_POST["base"]) || !isset($_POST["exponent"]) || !is_numeric($_POST["exponent"])) {
    exit; // Salimos del programa
  }

  $base = $_POST["base"]; // Guardamos la base introducida por el usuario
  $exponent = $_POST["exponent"]; // Guardamos el exponente introducido por el usuario

  if ($exponent < 0) { // Si el exponente es negativo mostramos un mensaje de error
    echo "<p>El exponente debe ser positivo</p>";
  } else { // Si el exponente es positivo mostramos el resultado
    for ($i = 1; $i <= $exponent; $i++) {
      echo "<p>$base<sup>$i</sup> = " . numberPower($base, $i) . "</p>";
    }
  }




  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

    /**
    * Calcula la potencia de un número
    * @param int $base Base
    * @param int $exponent Exponente
    * @return int Resultado de la potencia
    */
  function numberPower($base, $exponent) {
    // Podemos usar la función pow() de PHP o ** para calcular la potencia
    $result = 1;
    for ($i = 0; $i < $exponent; $i++) {
      $result *= $base;
    }
    return $result;
  }
  ?>
</body>

</html>