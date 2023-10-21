<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 28</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Factorial</h1>
  <form action="index.php" method="post">
    <label for="num">Número:</label>
    <input type="number" name="num" id="num" required>
    <input type="submit" value="Enviar">
    <br>
  </form>
  <?php
  /**
   * Escribe un programa que muestre, cuente y sume los múltiplos de 3 que hay entre 1 y un número leído por teclado.
   */

  // Si no esta declarado num o num no es un número no seguimos ejecutando el código
  if (!isset($_POST["num"]) || !is_numeric($_POST["num"])) {
    echo "Introduce un número";
    exit; // Salimos del programa
  };

  $userNumber = $_POST["num"]; // Guardamos el número introducido por el usuario

  echo "El factorial de $userNumber es " . factorial($userNumber);
  

  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

  /**
    * Calculate the factorial of a number recursively
    * @param int $num Number to calculate the factorial
    * @return int Factorial of the number
    */
  function factorial($num) {
    if ($num == 1) {
      return 1;
    } else {
      return $num * factorial($num-1);
    }
  }
  ?>
</body>

</html>