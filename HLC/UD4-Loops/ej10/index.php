<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 10</title>
</head>

<body>
  <h1>Media de N</h1>
  <p>Escribe un números y se mostrará la media cuando se introduzca el primer número negativo</p>
  <form action="index.php" method="post">
    <label for="num">Introduce un número:</label>
    <input type="number" name="num" id="num" required>
    <input type="submit" value="Enviar">
  </form>

  <?php
  /*
    * Escribe un programa que calcule la media de un conjunto de números positivos introducidos por teclado. 
    * A priori, el programa no sabe cuántos números se introducirán. 
    * El usuario indicará que ha terminado de introducir los datos cuando meta un número negativo.
    *
    * PD: Usaré sesiones pero si no sabes se puede solucionar añadiendo inputs ocultos para almacenar los datos
    */

    session_start(); // Iniciamos la sesión
    // Si no esta declarado num no seguimos ejecutando el código
    if (!isset($_POST["num"]) || !is_numeric($_POST["num"])) {
      exit; // Salimos del programa
    }

    // Si no esta declarado el array de números en la sesión lo creamos
    if (!isset($_SESSION["numbers"])) {
      $_SESSION["numbers"] = [];
    }

    // Guardamos el número introducido por el usuario
    $userNumber = $_POST["num"];
    
    // Si el número es positivo lo añadimos al array de números
    if ($userNumber > 0) {
      array_push($_SESSION["numbers"], $userNumber);
    } else { // Si el número es negativo mostramos la media
      // Si no hay números mostramos un mensaje
      if (count($_SESSION["numbers"]) == 0) { 
        echo "No has introducido ningún número para realizar la media";
      } else { // Si hay números mostramos la media
        imprimirMedia($_SESSION["numbers"]);
      }
      $_SESSION["numbers"] = []; // Borramos todos los datos de la sesión
    }

    /**
     * Calcula la media de un array de números
     * @param array $numbers Array de números
     * @return float Media de los números
     */
    function average($numbers) {
      $totalSum = 0;
      foreach ($numbers as $number) {
        $totalSum += $number;
      }
      return round($totalSum / count($numbers), 2);
    }

    /**
     * Imprime la media de un array de números
     * @param array $numbers Array de números
     * @return void
     */
    function imprimirMedia($numbers) {
      echo "La media es de";
      foreach ($numbers as $number) {
        echo ", $number";
      }
      echo " es " . average($numbers);
    }

  ?>
</body>

</html>