<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 17</title>
</head>

<body>
  <h1>Sumar</h1>
  <p>Suma los 100 siguiente número al introducido</p>
  <form action="index.php" method="post">
    <label for="base">Introduce un número:</label>
    <input type="number" name="num" id="base" required>
    <input type="submit" value="Enviar">
  <?php
  /**
   * Realiza un programa que sume los 100 números siguientes a un número entero y positivo introducido por teclado. 
   * Se debe comprobar que el dato introducido es correcto (que es un número positivo).
   */

  // Si no esta declarado num o num no es un número no seguimos ejecutando el código
  if (!isset($_POST["num"]) || !is_numeric($_POST["num"])) {
    exit; // Salimos del programa
  }

  $userNumber = $_POST["num"]; // Guardamos el número introducido por el usuario

  if ($userNumber < 0) {
    echo "<p>El número debe ser positivo</p>"; // Mostramos un mensaje de error
  } else {
    $result = 0;
    for ($i=$userNumber; $i <= $userNumber+100; $i++) { 
      $result += $i;
    }
    echo "<p>La suma de los 100 números siguientes a $userNumber es $result</p>";
  }




  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

  function isPrime($number) {
    $isPrime = true; // Inicializamos la variable

    // Iteramos hasta la Raíz cuadrada del número
    for ($i = 2; $i < $number && $isPrime ; $i++) { 
      // Comprobamos si es divisible entre $i si es divisible se sale del bucle
      if ($number % 2 == 0) {
        $isPrime = false;
      }
    }
    echo $isPrime;
    return $isPrime;
  }
  ?>
</body>

</html>