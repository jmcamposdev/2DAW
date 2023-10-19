<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ejercicio 11</title>
</head>

<body>
  <h1>Examen</h1>
  <?php
  /**
   * Realiza un programa que escoja al azar 5 palabras en español del mini-diccionario del ejercicio anterior. 
   * El programa pedirá que el usuario teclee la traducción al inglés de cada una de las palabras y comprobará si son correctas. 
   * Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas.
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

  if (!isset($_POST['espanol'])) {
    $palabrasElegidas = [];
    $palabrasElegidas = elegirPalabras(DICCIONARIO);
    mostrarFormulario($palabrasElegidas);
  } else {
    $espanol = $_POST['espanol'];
    $ingles = $_POST['ingles'];

    for ($i = 0; $i < 5; $i++) {
      if (DICCIONARIO[$espanol[$i]] == $ingles[$i]) {
        echo '<span style="color: green;">' . $espanol[$i] . ": " . $ingles[$i];
        echo " - correcto</span><br>";
      } else {
        echo '<span style="color: red;">' . $espanol[$i] . ": " . $ingles[$i];
        echo " - incorrecto</span>, la respuesta correcta es <b>" . DICCIONARIO[$espanol[$i]] . "</b><br>";
      }
    }
  }

  // /////////////////////////////////////////
  // /////////////// FUNCIONES //////////////
  // ////////////////////////////////////////

  function elegirPalabras($diccionario)
  {
    $palabrasEspanolas = [];
    foreach ($diccionario as $clave => $valor) {
      $palabrasEspanolas[] = $clave;
    }

    $palabrasElegidas = [];
    do {
      $palabra = $palabrasEspanolas[rand(0, 19)];
      if (!in_array($palabra, $palabrasElegidas)) {
        array_push($palabrasElegidas, $palabra);
      }
    } while (count($palabrasElegidas) < 5);
    return $palabrasElegidas;
  }

  function mostrarFormulario($palabras)
  {
    echo "<form action='index.php' method='POST'>";
    for ($i = 0; $i < count($palabras); $i++) {
      echo $palabras[$i] . " ";
      echo '<input type="hidden" name="espanol[' . $i . ']" value="' . $palabras[$i] . '">';
      echo '<input type="text" name="ingles[' . $i . ']" ><br>';
    }
    echo '<input type="submit" value="Aceptar">';
    echo '</form>';
  }
  ?>
</body>

</html>