<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 11</title>
</head>
<body>
  <h1>Diccionario</h1>
  <form action="index.php" method="GET">
    <input type="text" name="palabra" id="palabra" autofocus>
    <input type="submit" value="Enviar">
  </form>

  <?php
    /**
     * Crea un mini-diccionario español-inglés que contenga, al menos, 20 palabras (con su traducción). 
     * Utiliza un array asociativo para almacenar las parejas de palabras. 
     * El programa pedirá una palabra en español y dará la correspondiente traducción en inglés.
     */

    // DICCIONARIO
    define("DICCIONARIO", [
      "hola" => "hello",
      "adiós" => "goodbye",
      "casa" => "house",
      "perro" => "dog",
      "gato" => "cat",
      "ratón" => "mouse",
      "ordenador" => "computer",
      "teléfono" => "phone",
      "libro" => "book",
      "pantalla" => "screen",
      "teclado" => "keyboard",
      "ratón" => "mouse",
      "cama" => "bed",
      "mesa" => "table",
      "silla" => "chair",
      "ventana" => "window",
      "puerta" => "door",
      "pared" => "wall",
      "techo" => "ceiling",
      "suelo" => "floor"
    ]);

    if (isset($_GET['palabra'])) {
      $userPalabra = strtolower($_GET['palabra']);
      if (array_key_exists($userPalabra, DICCIONARIO)) {
        echo "<p>", $userPalabra, " en inglés es ", DICCIONARIO[$userPalabra], "</p>";
      } else {
        echo "<p>La palabra introducida no está en el diccionario</p>";
      }
    }
    
  ?>
</body>
</html>