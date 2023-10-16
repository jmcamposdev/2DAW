<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 04</title>
</head>

<body>
  <h1>Reemplazar</h1>
  <?php
  /**
   * Escribe un programa que genere 100 números aleatorios del 0 al 20 
   * y que los muestre por pantalla separados por espacios. 
   * El programa pedirá entonces por teclado dos valores y a continuación cambiará 
   * todas las ocurrencias del primer valor por el segundo en la lista generada anteriormente. 
   * Los números que se han cambiado deben aparecer resaltados de un color diferente.
   */

  // VARIABLES
  $numberBuscar = NULL;
  $numeroReemplazar = NULL;
  $arrayAleatorio = [];

  // Recogemos los datos del formulario si se han introducido
  if (isset($_POST['buscar'])) {
    $numberBuscar = $_POST['buscar']; // Número a buscar
    $numeroReemplazar = $_POST['reemplazar']; // Número a reemplazar
    // Convertimos el array de texto en un array de números separados por espacios
    $arrayAleatorio = explode(" ", trim($_POST['arrayAleatorioTexto'])); 
  }

  // Muestra los números introducidos
  if (isset($numberBuscar) && isset($numeroReemplazar)) {
    echo "<p>";
    foreach ($arrayAleatorio as $n) {
      if ($n == $numberBuscar) {
        echo "<span style='color: red;'>", $numeroReemplazar, "</span> ";
      } else {
        echo $n, " ";
      }
    }
    echo "</p>";
  }


  // Mostramos el formulario sino se ha introducido el número
  if (!isset($numberBuscar)) {
    $arrayAleatorio = arrayAleatorio(100, 0, 20);
    echo "<p>";
    foreach ($arrayAleatorio as $n) {
      echo $n, " ";
    }
    echo "</p>";
  ?>
    <form action="index.php" method="POST">
      Introduzca un número a Buscar :
      <input type="number" name="buscar" autofocus> <br>
      Introduzca un número a Reemplazar :
      <input type="number" name="reemplazar" autofocus> <br>
      <input type="hidden" name="arrayAleatorioTexto" value="<?php foreach ($arrayAleatorio as $n) {echo $n, " ";} ?>">
      <input type="submit" value="Enviar">
    </form>
  <?php
  }

  // FUNCIONES

  /**
   * Genera un array de longitud $longitud con valores aleatorios entre $min y $max
   * @param int $longitud Longitud del array
   * @param int $min Valor mínimo
   * @param int $max Valor máximo
   * @return array Array de longitud $longitud con valores aleatorios entre $min y $max
   */
  function arrayAleatorio($longitud, $min, $max) {
    $arrayAleatorio = [];
    for ($i=0; $i < $longitud; $i++) { 
      $arrayAleatorio[] = rand($min, $max);
    }
    return $arrayAleatorio;
  }
  ?>
</body>

</html>