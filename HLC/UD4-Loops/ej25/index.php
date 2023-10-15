<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 25</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <h1>Número al Revés</h1>
  <p></p>
  <form action="index.php" method="post">
    <label for="base">Filas:</label>
    <input type="number" name="filas" id="base" required>
    <input type="submit" value="Enviar">
    <br>
  </form>
  <?php
  /**
   * 
   * Escribe un programa que lea un número N e imprima una pirámide de números con N filas como en la siguiente figura. 
   * Recuerda utilizar un tipo de letra de ancho fijo como por ejemplo Courier 
   * para que los espacios tengan la misma anchura que los números.
   */

  // Si no esta declarado filas o filas no es un número no seguimos ejecutando el código
  if (!isset($_POST["filas"]) || !is_numeric($_POST["filas"])) {
    echo "Introduce un número";
    exit; // Salimos del programa
  };

  session_start(); // Iniciamos la sesión

  $filas = $_POST["filas"]; // Guardamos el número introducido por el usuario
  printNumberPyramid($filas);

  /** -------------------------------------
   *              Funciones
   * ------------------------------------- */

  function printNumberPyramid($filas) {
    $altura = 1;
    $i = 0;
    $espacios = $filas - 1;

    while ($altura <= $filas) {
      // inserta espacios
      for ($i = 1; $i <= $espacios; $i++) {
        echo "&nbsp;";
      }
      
      // pinta la línea de números
      for ($i = 1; $i < $altura; $i++) {
        echo $i;
      }
      
      for ($i = $altura; $i > 0; $i--) {
        echo $i;
      }
      
      echo "<br>";
      
      $altura++;
      $espacios--;
    }
  }

  ?>
</body>

</html>