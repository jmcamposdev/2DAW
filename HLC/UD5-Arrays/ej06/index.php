<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 06</title>
</head>

<body>
  <h1>Pares e Impares</h1>
  <?php
  /**
   * Realiza un programa que pida 8 números enteros 
   * y que luego muestre esos números de colores, 
   * los pares de un color y los impares de otro.
   */

  // VARIABLES
  $formularioEnviado = isset($_POST['numeros']);
  $numeros = [];

  // Recogemos los datos del formulario si se han introducido
  if ($formularioEnviado) {
    $numeros = $_POST['numeros'];


    // Mostramos los números
    echo "Pares: Rojo, Impares: Azul <br>";
    foreach ($numeros as $numero) {
      if ($numero % 2 == 0) {
        echo "<span style='color: red;'>", $numero, "</span> ";
      } else {
        echo "<span style='color: blue;'>", $numero, "</span> ";
      }
    }
  }

  // Mostramos el formulario sino se ha introducido el número
  if (!$formularioEnviado) {
    echo "<p> Introduzca 8 números: </p>";
    echo "<form action='index.php' method='POST'>";
    for ($i=0; $i < 8; $i++) { 
      echo "Número ", $i+1, ": <input type='number' name='numeros[]' min='' max='' required> <br>";
    }
    echo "<input type='submit' value='Enviar'>";
    echo "</form>";
  }

  ?>
</body>

</html>