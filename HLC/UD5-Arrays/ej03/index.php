<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 03</title>
</head>

<body>
  <?php
  /**
   * Escribe un programa que lea 15 números por teclado y que los almacene en un array. 
   * Rota los elementos de ese array, es decir, el elemento de la posición 0 debe pasar a la posición 1, el de la 1 a la 2, etc. 
   * El número que se encuentra en la última posición debe pasar a la posición 0. Finalmente, muestra el contenido del array.
   */
  $n = NULL;
  $contadorNumeros = 0;
  $numeroTexto = "";

  if (isset($_POST['n'])) {
    $n = $_POST['n'];
    $contadorNumeros = $_POST['contadorNumeros'];
    $numeroTexto = $_POST['numeroTexto'];
  }

  // Muestra los números introducidos
  if ($contadorNumeros == 15) {
    $numeroTexto = $numeroTexto . " " . $n; // añade el último número leído $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros
    $numeroTexto = trim($numeroTexto); // quita espacios por delante y por detrás
    $numero = explode(" ", $numeroTexto); // Convierte la cadena de caracteres en un array
    $arrayRotado = rotarArray($numero);

    // Muestra el array rotado
    echo "Array original:<br>";
    foreach ($numero as $n) {
      echo $n, " ";
    }

    echo "<br>Array rotado:<br>";
    foreach ($arrayRotado as $n) {
      echo $n, " ";
    }
  }

  /**
   * Rota los elementos de un array una posición a la derecha
   * @param array $array array de números enteros
   * @return array array rotado
   */
  function rotarArray($array)
  {
    $lastElement = array_pop($array); // quita el último elemento y lo devuelve
    array_unshift($array, $lastElement); // añade el último elemento al principio
    return $array; // devuelve el array rotado
  }

  // Pide número y añade el actual a la cadena
  if (($contadorNumeros < 15) || (!isset($n))) {
  ?>
    <p>Te quedan <?= 15 - $contadorNumeros ?> números por introducir.</p>
    <form action="index.php" method="POST">
      Introduzca un número:
      <input type="number" name="n" autofocus>
      <input type="hidden" name="contadorNumeros" value="<?= ++$contadorNumeros ?>">
      <input type="hidden" name="numeroTexto" value="<?= $numeroTexto . " " . $n ?>">
      <input type="submit" value="Enviar">
    </form>
  <?php
  }
  ?>
</body>

</html>