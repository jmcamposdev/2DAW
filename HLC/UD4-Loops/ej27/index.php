<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 27</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Múltiplos</h1>
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

  // Si el número introducido es menor a 3 no seguimos ejecutando el código
  if ($userNumber < 3) {
    echo "El número introducido es menor a 3";
  } else { // Si el número introducido es mayor o igual a 3
    $indice = 1; // Inicializamos el índice
    $suma = 0; // Inicializamos la suma
    // Recorremos los múltiplos de 3 hasta el número introducido
    for ($i=3; $i < $userNumber; $i+=3) { 
      $suma+=$i; // Sumamos el múltiplo de 3 a la suma
      echo "$indice -- $i -- $suma <br>"; // Mostramos el múltiplo de 3 y la suma y el índice
    }
  }
  ?>
</body>

</html>