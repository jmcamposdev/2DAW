<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 22</title>
</head>

<body>
  <h1>Primos</h1>
  <p>Mostrar los primos entre 2 y 100 ambos incluidos</p>
  <?php
  /**
   * Muestra por pantalla todos los números primos entre 2 y 100, ambos incluidos.
   */
  
  // Iteramos desde 2 hasta 100
  for ($i = 2; $i <= 100; $i++) {
    // Si el número es primo lo mostramos
    if (isPrime($i)) {
      echo "$i <br>";
    }
  }



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
    return $isPrime;
  }
  ?>
</body>

</html>