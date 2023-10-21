<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 29</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Factorial</h1>
  <form action="index.php" method="post">
    <label for="numBase">Número Base:</label>
    <input type="number" name="numBase" id="numBase" required>
    <br>
    <label for="numNoDivisible">Número no divisible:</label>
    <input type="number" name="numNoDivisible" id="numNoDivisible" required>
    <input type="submit" value="Enviar">
    <br>
  </form>
  <?php
  /**
   * Escribe un programa que muestre por pantalla todos los números 
   * enteros positivos menores a uno leído por teclado que no sean divisibles entre otro también leído de igual forma.
   */

  $numBase = null;
  $numNoDivisible = null;

  if (isset($_POST["numBase"]) && is_numeric($_POST["numBase"])) {
    $numBase = $_POST["numBase"];
  }

  if (isset($_POST["numNoDivisible"]) && is_numeric($_POST["numNoDivisible"])) {
    $numNoDivisible = $_POST["numNoDivisible"];
  }


  // Si se ha declarado numBase y numNoDivisible
  if ($numBase != null && $numNoDivisible != null) {
    // Recorremos los números desde 1 hasta el número base
    for ($i=1; $i < $numBase; $i++) { 
      // Si el número no es divisible entre el número no divisible lo mostramos
      if ($i % $numNoDivisible != 0) {
        echo "$i <br>"; // Mostramos el número
      }
    }
  }
  ?>
</body>

</html>