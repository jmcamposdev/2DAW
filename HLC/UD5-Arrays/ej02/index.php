<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 02</title>
</head>

<body>
  <?php
  /**
   * Escribe un programa que pida 10 números por teclado y que luego
   * muestre los números introducidos junto con las palabras “máximo” y “mínimo” 
   * al lado del máximo y del mínimo respectivamente.
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
  if ($contadorNumeros == 6) {
    $numeroTexto = $numeroTexto . " " . $n; // añade el último número leído $numeroTexto = substr($numeroTexto, 2); // quita los dos primeros
    $numeroTexto = trim($numeroTexto); // quita espacios por delante y por detrás
    $numero = explode(" ", $numeroTexto); // Convierte la cadena de caracteres en un array
    
    // Muestra el mínimo y el máximo
    echo "El mínimo es " . min($numero) . "<br>";
    echo "El máximo es " . max($numero) . "<br>";
  }

  // Pide número y añade el actual a la cadena
  if (($contadorNumeros < 6) || (!isset($n))) { 
    ?>
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