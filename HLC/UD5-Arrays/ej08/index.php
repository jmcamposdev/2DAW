<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 08</title>
</head>

<body>
  <h1>Organizar Array Primos</h1>
  <form action="index.php" method="POST">
    Introduzca 10 números: <br>
    <?php
    for ($i = 0; $i < 10; $i++) {
      echo "Número ", $i + 1, ": <input type='number' name='numeros[]' min='' max='' required> <br>";
    }
    ?>
    <input type="submit" value="Enviar" />
  </form>
  <?php
  /**
   * Realiza un programa que pida 10 números por teclado y que los almacene en un array. 
   * A continuación se mostrará el contenido de ese array junto al índice (0 – 9) utilizando para ello una tabla. 
   * Seguidamente el programa pasará los primos a las primeras posiciones, 
   * desplazando el resto de números (los que no son primos) de tal forma que no se pierda ninguno. 
   * Al final se debe mostrar el array resultante.
   */

  // VARIABLES
  $numeros = [];

  if (isset($_POST['numeros'])) {
    $numeros = $_POST['numeros'];
    $numerosOrdenados = ordenarArray($numeros);
    echo "<table>";
    echo "<tr>";
    echo "<th>Índice</th>";
    echo "<th>Número</th>";
    echo "</tr>";
    for ($i = 0; $i < count($numeros); $i++) {
      echo "<tr>";
      echo "<td>", $i, "</td>";
      echo "<td>", $numerosOrdenados[$i], "</td>";
      echo "</tr>";
    }
    echo "</table>";
  }




  function ordenarArray($array)
  {
    $arrayOrdenado = [];
    $arrayPrimos = [];
    $arrayNoPrimos = [];
    foreach ($array as $numero) {
      if (esPrimo($numero)) {
        $arrayPrimos[] = $numero;
      } else {
        $arrayNoPrimos[] = $numero;
      }
    }
    $arrayOrdenado = array_merge($arrayPrimos, $arrayNoPrimos);
    return $arrayOrdenado;
  }

  /**
   * Comprueba si un número es primo
   * @param int $numero Número a comprobar
   * @return bool True si es primo, false si no lo es
   */
  function esPrimo($numero)
  {
    $esPrimo = true;
    for ($i = 2; $i < $numero; $i++) {
      if ($numero % $i == 0) {
        $esPrimo = false;
      }
    }
    return $esPrimo;
  }
  ?>
</body>

</html>