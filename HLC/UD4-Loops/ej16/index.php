<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 16</title>
</head>

<body>
  <h1>Numero Primo</h1>
  <p>Calcula si un número es primo o no</p>
  <form action="index.php" method="post">
    <label for="base">Introduce un número:</label>
    <input type="number" name="num" id="base" required>
    <input type="submit" value="Enviar">
  <?php
  /**
   * Escribe un programa que diga si un número introducido por teclado es o no primo. U
   * n número primo es aquel que sólo es divisible entre él mismo y la unidad.
   */

  // Si no esta declarado num o num no es un número no seguimos ejecutando el código
  if (!isset($_POST["num"]) || !is_numeric($_POST["num"])) {
    exit; // Salimos del programa
  }

  $userNumber = $_POST["num"]; // Guardamos el número introducido por el usuario

  echo ("El número $userNumber" . (isPrime($userNumber) ? "si" : "no") . " es primo") ;




  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

  /**
   * Comprueba si un número es primo
   * @param int $number Número a comprobar
   * @return bool Devuelve true si es primo y false si no lo es
   */
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